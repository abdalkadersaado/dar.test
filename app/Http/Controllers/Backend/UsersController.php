<?php

namespace App\Http\Controllers\Backend;

use Carbon\Carbon;
use App\Models\Role;
use App\Models\User;
use App\Mail\NewUser;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\ReportComment;
use App\Models\FinancialReport;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Cache;
use Intervention\Image\Facades\Image;
use Stevebauman\Purify\Facades\Purify;
use Illuminate\Support\Facades\Validator;
use App\Notifications\NewCommentForAdminNotify;

class UsersController extends Controller
{
    public function __construct()
    {
        if (\auth()->check()) {
            $this->middleware('auth');
        } else {
            return view('backend.auth.login');
        }
    }

    public function index()
    {
        if (!\auth()->user()->ability('admin', 'manage_users,show_users')) {
            return redirect('admin/index');
        }

        $users = User::query()
            ->whereHas('roles', function ($query) {
                $query->where('name', 'user');
            })
            ->when(request('keyword') != '', function ($query) {
                $query->search(request('keyword'));
            })
            ->when(request('status') != '', function ($query) {
                $query->whereStatus(request('status'));
            })
            ->when(request('status_order') != '', function ($query) {
                $query->whereStatusOrder(request('status_order'));
            })
            ->orderBy(request('sort_by') ?? 'id', request('order_by') ?? 'desc')
            ->paginate(request('limit_by') ?? 10)
            ->withQueryString();

        return view('backend.users.index', compact('users'));
    }

    public function get_users_editor()
    {
        $users = User::query()
            ->whereHas('roles', function ($query) {
                $query->where('name', 'user');
            })->whereAssignEditor(auth()->user()->id)->paginate();

        return  view('backend.users.users_editor', compact('users'));
    }


    public function status_orders()
    {
        if (!\auth()->user()->ability('admin', 'manage_status_order')) {
            return redirect('admin/index');
        }
        $users = User::query()
            ->whereHas('roles', function ($query) {
                $query->where('name', 'user');
            })
            ->when(request('status_order') != '', function ($query) {
                $query->whereStatusOrder(request('status_order'));
            })
            // ->whereStatusOrder(1)
            ->paginate();


        return view('backend.users.status_order', compact('users'));
    }

    public function order_under_processing($id)
    {
        $user = User::whereId($id)->first();

        $user->update(['status_order' => '1']);
        $notification = array(
            'message' => 'Status Order under processing',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function order_accepted($id)
    {
        $user = User::whereId($id)->first();

        $user->update(['status_order' => '2']);

        $notification = array(
            'message' => 'Status Order under processing',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function show_order($id)
    {
        $user = User::whereId($id)->first();
        if ($user) {
            return view('backend.users.show_order', compact('user'));
        }
        return redirect()->route('admin.users.index')->with([
            'message' => 'Something was wrong',
            'alert-type' => 'danger',
        ]);
    }

    public function create()
    {
        if (!\auth()->user()->ability('admin', 'create_users')) {
            return redirect('admin/index');
        }

        return view('backend.users.create');
    }

    public function store(Request $request)
    {
        if (!\auth()->user()->ability('admin', 'create_users')) {
            return redirect('admin/index');
        }

        $validator = Validator::make($request->all(), [
            'name'          => 'required',
            'username'      => 'required|max:20|unique:users',
            'email'         => 'required|email|max:255|unique:users',
            'mobile'        => 'required|numeric|unique:users',
            'status'        => 'required',
            'password'      => 'required|min:8',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $data['name']           = $request->name;
        $data['username']       = $request->username;
        $data['email']          = $request->email;
        $data['email_verified_at'] = Carbon::now();
        $data['mobile']         = $request->mobile;
        $data['password']       = bcrypt($request->password);
        $data['status']         = $request->status;
        $data['bio']            = $request->bio;
        $data['receive_email']  = $request->receive_email;

        if ($user_image = $request->file('user_image')) {
            $filename = Str::slug($request->username) . '.' . $user_image->getClientOriginalExtension();
            $path = public_path('assets/users/' . $filename);
            Image::make($user_image->getRealPath())->resize(300, 300, function ($constraint) {
                $constraint->aspectRatio();
            })->save($path, 100);
            $data['user_image']  = $filename;
        }

        $user = User::create($data);
        $user->attachRole(Role::whereName('user')->first()->id);

        Mail::to($request->email)->send(new NewUser());

        return redirect()->route('admin.users.index')->with([
            'message' => 'Users created successfully',
            'alert-type' => 'success',
        ]);
    }

    public function show(Request $request, $id)
    {
        if (!\auth()->user()->ability('admin', 'display_users')) {
            return redirect('admin/index');
        }

        $editors = User::query()
            ->whereHas('roles', function ($query) {
                $query->where('name', 'editor');
            })->get();

        // $user = User::whereId($id)->withCount('posts')->first();
        $user = User::whereId($id)->first();
        $financial_file = FinancialReport::with('report_comments')->where('upload_to', $user->id)->get();
        $categories = Category::get();
        $financial_file_final = FinancialReport::where('upload_to', $user->id)->latest()->first();
        if ($user) {
            return view('backend.users.show', compact('user', 'financial_file', 'financial_file_final', 'editors', 'categories'));
        }
        return redirect()->route('admin.users.index')->with([
            'message' => 'Something was wrong',
            'alert-type' => 'danger',
        ]);
    }

    public function update_assign_auditor(Request $request, $id)
    {
        $user = User::whereId($id)->first();
        if ($user) {

            $data['assign_editor'] = $request->assign_editor;
            $data['category_id'] = $request->category_id;
            $user->update($data);

            return redirect()->back()->with([
                'message' => 'User updated successfully',
                'alert-type' => 'success',
            ]);
        }
        return redirect()->route('admin.users.index')->with([
            'message' => 'Something was wrong',
            'alert-type' => 'danger',
        ]);
    }
    public function edit($id)
    {
        if (!\auth()->user()->ability('admin', 'update_users')) {
            return redirect('admin/index');
        }
        $editors = User::query()
            ->whereHas('roles', function ($query) {
                $query->where('name', 'editor');
            })->get();

        $user = User::whereId($id)->first();
        if ($user) {
            return view('backend.users.edit', compact('user', 'editors'));
        }
        return redirect()->route('admin.users.index')->with([
            'message' => 'Something was wrong',
            'alert-type' => 'danger',
        ]);
    }

    public function update(Request $request, $id)
    {
        if (!\auth()->user()->ability('admin', 'update_users')) {
            return redirect('admin/index');
        }

        $validator = Validator::make($request->all(), [
            'name'          => 'required',
            'username'      => 'required|max:20|unique:users,username,' . $id,
            'email'         => 'required|email|max:255|unique:users,email,' . $id,
            'mobile'        => 'required|numeric|unique:users,mobile,' . $id,
            'status'        => 'required',
            'password'      => 'nullable|min:8',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $user = User::whereId($id)->first();

        if ($user) {
            $data['name']           = $request->name;
            $data['username']       = $request->username;
            $data['email']          = $request->email;
            $data['mobile']         = $request->mobile;
            if (trim($request->password) != '') {
                $data['password'] = bcrypt($request->password);
            }
            $data['status']         = $request->status;
            $data['bio']            = $request->bio;
            $data['receive_email']  = $request->receive_email;

            if ($user_image = $request->file('user_image')) {
                if ($user->user_image != '') {
                    if (File::exists('assets/users/' . $user->user_image)) {
                        unlink('assets/users/' . $user->user_image);
                    }
                }
                $filename = Str::slug($request->username) . '.' . $user_image->getClientOriginalExtension();
                $path = public_path('assets/users/' . $filename);
                Image::make($user_image->getRealPath())->resize(300, 300, function ($constraint) {
                    $constraint->aspectRatio();
                })->save($path, 100);
                $data['user_image']  = $filename;
            }

            $data['status_order'] = $request->status_order;

            $data['assign_editor'] = $request->assign_editor;
            $data['client_top'] = $request->client_top;
            $data['sequential_order'] = $request->sequential_order;

            $user->update($data);

            return redirect()->route('admin.users.index')->with([
                'message' => 'User updated successfully',
                'alert-type' => 'success',
            ]);
        }
        return redirect()->route('admin.users.index')->with([
            'message' => 'Something was wrong',
            'alert-type' => 'danger',
        ]);
    }

    public function destroy($id)
    {
        if (!\auth()->user()->ability('admin', 'delete_users')) {
            return redirect('admin/index');
        }

        $user = User::whereId($id)->first();

        if ($user) {
            if ($user->user_image != '') {
                if (File::exists('assets/users/' . $user->user_image)) {
                    unlink('assets/users/' . $user->user_image);
                }
            }
            $user->delete();

            return redirect()->route('admin.users.index')->with([
                'message' => 'User deleted successfully',
                'alert-type' => 'success',
            ]);
        }

        return redirect()->route('admin.users.index')->with([
            'message' => 'Something was wrong',
            'alert-type' => 'danger',
        ]);
    }

    public function removeImage(Request $request)
    {
        if (!\auth()->user()->ability('admin', 'delete_users')) {
            return redirect('admin/index');
        }

        $user = User::whereId($request->user_id)->first();
        if ($user) {
            if (File::exists('assets/users/' . $user->user_image)) {
                unlink('assets/users/' . $user->user_image);
            }
            $user->user_image = null;
            $user->save();
            return 'true';
        }
        return 'false';
    }
}
