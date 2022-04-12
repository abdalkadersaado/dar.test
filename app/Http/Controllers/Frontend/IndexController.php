<?php

namespace App\Http\Controllers\Frontend;

use toastr;
use App\Models\Tag;
use App\Models\Post;
use App\Models\User;
use App\Models\Quote;
use App\Mail\Subscribe;
use App\Models\Comment;
use App\Models\Contact;
use App\Models\Service;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\ReportComment;
use App\Http\Traits\imageTrait;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Stevebauman\Purify\Facades\Purify;
use Illuminate\Support\Facades\Validator;
use App\Notifications\NewCommentForAdminNotify;
use App\Notifications\NewCommentForPostOwnerNotify;

class IndexController extends Controller
{
    use imageTrait;

    public function index()
    {
        $user = auth()->user();
        if ($user && $user->category_id != null) {

            $posts = Post::with(['media', 'user', 'tags'])
                ->whereCategoryId($user->category_id)
                ->post()
                ->active()
                ->orderBy('id', 'desc')
                ->get();
            // ->withQueryString();

            $posts_by_category_id = Post::with(['media', 'user', 'tags'])
                ->whereCategoryId($user->category_id)
                ->post()
                ->active()
                ->orderBy('id', 'desc')
                ->paginate(5)
                ->withQueryString();

            $users = User::whereHas('roles', function ($query) use ($user) {
                $query->where('name', 'user')->where('client_top', 1)->where('category_id', $user->category_id);
            })->orderBy('sequential_order', 'asc')->get();
            $services = Service::latest()->paginate(10);
            $categories = Category::latest('id')->take(10)->get();
            return view('dar_al_nuzum.index1', compact('posts', 'categories', 'users', 'user', 'posts_by_category_id', 'services'));
        } else {
            $posts = Post::with(['media', 'user', 'tags'])
                ->whereHas('category', function ($query) {
                    $query->whereStatus(1);
                })
                ->whereHas('user', function ($query) {
                    $query->whereStatus(1);
                })
                ->post()
                ->active()
                ->orderBy('id', 'desc')
                ->get();
            // ->withQueryString();

            $posts_by_category_id = Post::with(['media', 'user', 'tags'])
                ->whereHas('category', function ($query) {
                    $query->whereStatus(1);
                })
                ->whereHas('user', function ($query) {
                    $query->whereStatus(1);
                })
                ->post()
                ->active()
                ->orderBy('id', 'desc')
                ->paginate(5)
                ->withQueryString();
            $services = Service::get();
            $categories = Category::latest('id')->take(10)->get();

            $users = User::whereHas('roles', function ($query) {
                $query->where('name', 'user')->where('client_top', 1);
            })->orderBy('sequential_order', 'asc')->get();

            return view('dar_al_nuzum.index1', compact('posts', 'categories', 'users', 'user', 'posts_by_category_id', 'services'));
        }
    }

    public function filterBy_category($slug)
    {
        $categories = Category::get();
        $category = Category::whereSlug($slug)->orWhere('slug_en', $slug)->orWhere('id', $slug)->whereStatus(1)->first()->id;

        if ($category) {
            $posts = Post::with(['media', 'user', 'tags'])
                ->whereCategoryId($category)
                ->post()
                ->active()
                ->orderBy('id', 'desc')
                ->paginate(5)
                ->withQueryString();

            $users = User::with('category')->whereHas('roles', function ($query) use ($category) {
                $query->where('name', 'user')->where('client_top', 1)->where('category_id', $category);
            })->orderBy('sequential_order', 'asc')->get();
            $services = Service::get();
            return view('dar_al_nuzum.filter_by_category_index', compact('posts', 'category', 'categories', 'users', 'services'));
        }

        if ($user = auth()->user()->id) {

            if ($category) {
                $posts = Post::with(['media', 'user', 'tags'])
                    ->whereCategoryId($user->category_id)
                    ->post()
                    ->active()
                    ->orderBy('id', 'desc')
                    ->paginate(5)
                    ->withQueryString();

                $users = User::whereHas('roles', function ($query) {
                    $query->where('name', 'user')->where('client_top', 1);
                })->orderBy('sequential_order', 'asc')->get();
                $services = Service::get();
                return view('dar_al_nuzum.filter_by_category_index', compact('posts', 'category', 'categories', 'users', 'services'));
            }
        }

        return redirect()->route('frontend.index');
    }

    public function filter_all()
    {
        $posts = Post::with(['media', 'user', 'tags'])
            ->whereHas('category', function ($query) {
                $query->whereStatus(1);
            })
            ->whereHas('user', function ($query) {
                $query->whereStatus(1);
            })
            ->post()
            ->active()
            ->orderBy('id', 'desc')
            ->paginate(5);

        $users = User::whereHas('roles', function ($query) {
            $query->where('name', 'user')->where('client_top', 1);
        })->orderBy('sequential_order', 'asc')->get();

        $services = Service::get();
        $categories = Category::get();
        return view('dar_al_nuzum.filter_by_All_category_index', compact('services', 'posts', 'users', 'categories'));
    }


    public function complete_register()
    {

        $categories = Category::get();

        $users = User::whereHas('roles', function ($query) {
            $query->where('name', 'user');
        })->get();

        return view('dar_al_nuzum.complete_register', compact('categories', 'users'));
    }
    public function contact()
    {
        return view('frontend.contact');
    }

    public function do_contact(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'name'      => 'required',
            'email'     => 'required|email',
            'mobile'    => 'nullable|numeric|required',
            'title'     => 'required|min:5',
            'message'   => 'required|min:10',
        ]);
        if ($validation->fails()) {
            toastr()->error(__('Frontend/general.empty_field'), __('Frontend/general.something_was_wrong'));
            return redirect()->back()->withErrors($validation)->withInput();
        }

        $data['name']       = $request->name;
        $data['email']      = $request->email;
        $data['mobile']     = $request->mobile;
        $data['title']      = $request->title;
        $data['message']    = $request->message;
        Contact::create($data);
        toastr()->success(__('Frontend/general.message_sent_successfully'));;

        return redirect()->back();
    }

    public function get_quote(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'name'      => 'required',
            'email'     => 'required|email',
            'mobile'    => 'nullable|numeric',
            'company_name'     => 'required|min:5',
            'category_id'   => 'required',
        ]);
        if ($validation->fails()) {
            toastr()->error(__('Frontend/general.empty_field'), __('Frontend/general.something_was_wrong'));
            return redirect()->back()->withErrors($validation)->withInput();
        }

        $data['name']       = $request->name;
        $data['email']      = $request->email;
        $data['mobile']     = $request->mobile;
        $data['company_name']      = $request->company_name;
        $data['service_id']    = $request->category_id;


        Quote::create($data);
        Mail::to($request->email)->send(new Subscribe($data));

        toastr()->success(__('Frontend/general.message_sent_successfully'));
        return redirect()->back();
    }

    //about us

    public function about_us()
    {
        $services = Service::get();
        return view('dar_al_nuzum.about_us', compact('services'));
    }

    // services frontend

    public function service1()
    {
        $services = Service::get();
        return view('dar_al_nuzum.services.service1', compact('services'));
    }
    public function service2()
    {
        $services = Service::get();
        return view('dar_al_nuzum.services.service2', compact('services'));
    }
    public function service3()
    {
        $services = Service::get();
        return view('dar_al_nuzum.services.service3', compact('services'));
    }
    public function service4()
    {
        $services = Service::get();
        return view('dar_al_nuzum.services.service4', compact('services'));
    }
    public function service5()
    {
        $services = Service::get();
        return view('dar_al_nuzum.services.service5', compact('services'));
    }
    public function service6()
    {
        $services = Service::get();
        return view('dar_al_nuzum.services.service6', compact('services'));
    }
    public function service7()
    {
        $services = Service::get();
        return view('dar_al_nuzum.services.service7', compact('services'));
    }
    public function service8()
    {
        $services = Service::get();
        return view('dar_al_nuzum.services.service8', compact('services'));
    }
    public function service9()
    {
        $services = Service::get();
        return view('dar_al_nuzum.services.service9', compact('services'));
    }
    public function service10()
    {
        $services = Service::get();
        return view('dar_al_nuzum.services.service10', compact('services'));
    }
}
