<?php

namespace App\Http\Controllers\Frontend;

use toastr;
use App\Models\Tag;
use App\Models\Post;
use App\Models\User;
use App\Models\Comment;
use App\Models\Service;
use App\Models\Category;
use App\Models\PostMedia;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Mail\CompleteRegister;
use App\Http\Traits\imageTrait;
use App\Models\FinancialReport;
use App\Mail\AdminCompleteRegister;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Cache;
use Intervention\Image\Facades\Image;
use Stevebauman\Purify\Facades\Purify;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class UsersController extends Controller
{
    use imageTrait;

    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    public function index()
    {
        $posts = auth()->user()->posts()
            ->with(['media', 'category', 'user'])
            ->withCount('comments')->orderBy('id', 'desc')
            ->paginate(10)
            ->withQueryString();
        return view('frontend.users.dashboard', compact('posts'));
    }



    public function complete_user_info(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [

            'company_name' => 'required',
            'license_number' => 'required',
            'Commercial_Register' => 'required',
            'MOA' => 'required',
            'date_contract' => 'required',
            'contract_pdf' => 'required',
            'passport_number' => 'required',
            'emirates_id' => 'required',
            'expiry_date_passport' => 'required',
            'id_number' => 'required',
            'expiry_date' => 'required',
            'category_id' => 'required',
        ]);
        if ($validator->fails()) {
            toastr()->error(__('Frontend/general.empty_field'), __('Frontend/general.something_was_wrong'));
            return redirect()->back()->withErrors($validator)->withInput();
        }
        if ($request->file('emirates_id')) {

            if (auth()->user()->emirates_id != '') {
                if (File::exists('upload_attachments/' . auth()->user()->id . '/' . 'visa_attachment/' . auth()->user()->emirates_id)) {
                    unlink('upload_attachments/' . auth()->user()->id . '/' . 'visa_attachment/' . auth()->user()->emirates_id);
                }
            }
            $image = $request->file('emirates_id');
            $file_name = $image->getClientOriginalName();

            $imageName = $request->emirates_id->getClientOriginalName();
            $request->emirates_id->move(public_path('upload_attachments/' . auth()->user()->id . '/' . 'visa_attachment'), $imageName);

            $data['emirates_id']  = $file_name;
        }

        $data['id_number']  = $request->id_number;
        $data['expiry_date']  = $request->expiry_date;
        $data['passport_number']  = $request->passport_number;
        $data['expiry_date_passport']  = $request->expiry_date_passport;
        $data['date_contract'] = $request->date_contract;

        if ($request->file('contract_pdf')) {

            if (auth()->user()->contract_pdf != '') {
                if (File::exists('upload_attachments/' . auth()->user()->id . '/' . 'contract/' . auth()->user()->contract_pdf)) {
                    unlink('upload_attachments/' . auth()->user()->id . '/' . 'contract/' . auth()->user()->contract_pdf);
                }
            }

            $image = $request->file('contract_pdf');
            $file_name = $image->getClientOriginalName();
            $imageName = $request->contract_pdf->getClientOriginalName();
            $request->contract_pdf->move(public_path('upload_attachments/' . auth()->user()->id . '/' . 'contract'), $imageName);

            $data['contract_pdf']  = $file_name;
        }

        $data['company_name']  = $request->company_name;
        $data['license_number']  = $request->license_number;

        if ($request->file('Commercial_Register')) {
            if (auth()->user()->Commercial_Register != '') {
                if (File::exists('upload_attachments/' . auth()->user()->id . '/' . 'Commercial_Register/' . auth()->user()->Commercial_Register)) {
                    unlink('upload_attachments/' . auth()->user()->id . '/' . 'Commercial_Register/' . auth()->user()->Commercial_Register);
                }
            }
            $image = $request->file('Commercial_Register');
            $file_name = $image->getClientOriginalName();
            $imageName = $request->Commercial_Register->getClientOriginalName();
            $request->Commercial_Register->move(public_path('upload_attachments/' . auth()->user()->id . '/' . 'Commercial_Register'), $imageName);

            $data['Commercial_Register']  = $file_name;
        }

        if ($request->file('MOA')) {
            if (auth()->user()->MOA != '') {
                if (File::exists('upload_attachments/' . auth()->user()->id . '/' . 'MOA/' . auth()->user()->MOA)) {
                    unlink('upload_attachments/' . auth()->user()->id . '/' . 'MOA/' . auth()->user()->MOA);
                }
            }
            $image = $request->file('MOA');
            $file_name = $image->getClientOriginalName();
            $imageName = $request->MOA->getClientOriginalName();
            $request->MOA->move(public_path('upload_attachments/' . auth()->user()->id . '/' . 'MOA'), $imageName);

            $data['MOA']  = $file_name;
        }

        $data['status_order'] = '1';
        $data['category_id'] = $request->category_id;

        $data['name'] = auth()->user()->name;

        $update = auth()->user()->update($data);

        // Mail::to($request->email)->send(new CompleteRegister());

        Mail::to(auth()->user()->email)->send(new CompleteRegister());

        Mail::to('ad.sal.kab@gmail.com')->send(new AdminCompleteRegister($data));

        // save financial Report
        // $user = User::whereId($id)->first();
        // $f = FinancialReport::whereUserId($id)->first();

        // $image = $request->file('financial_report');
        // $file_name = $image->getClientOriginalName();
        // $request->user()->report()->updateOrCreate(['upload_to' => $user->id], [
        //     // $request->user()->report()->create([
        //     //     'upload_to' => $user->id,
        //     'financial' => $file_name,
        //     'user_id' => auth()->user()->id,
        // ]);

        // $imageName = $request->financial_report->getClientOriginalName();
        // $request->financial_report->move(public_path('upload_attachments/' . $user->id . '/' . 'financial_report'), $imageName);

        if ($update) {
            toastr()->success(__('Frontend/general.updated_successfully'));
            return redirect()->route('profile');
        } else {
            toastr()->error(__('Frontend/general.something_was_wrong'));
            return redirect()->back();
        }
    }

    public function edit_profile_user(Request $request)
    {
        $validator = Validator::make($request->all(), [

            // 'company_name' => 'required',
            // 'license_number' => 'required|numeric',
            // 'Commercial_Register' => 'required',
            // 'date_contract' => 'required',
            // 'contract_pdf' => 'required',
            // 'passport_number' => 'required',
            // 'emirates_id' => 'required',
            // 'expiry_date_passport' => 'required',
            // 'id_number' => 'required',
            // 'expiry_date' => 'required',
            // // 'user_category_id' => 'required',
        ]);
        if ($validator->fails()) {
            toastr()->error(__('Frontend/general.empty_field'), __('Frontend/general.something_was_wrong'));
            return redirect()->back()->withErrors($validator)->withInput();
        }
        if ($request->file('emirates_id')) {

            if (auth()->user()->emirates_id != '') {
                if (File::exists('upload_attachments/' . auth()->user()->id . '/' . 'visa_attachment/' . auth()->user()->emirates_id)) {
                    unlink('upload_attachments/' . auth()->user()->id . '/' . 'visa_attachment/' . auth()->user()->emirates_id);
                }
            }
            $image = $request->file('emirates_id');
            $file_name = $image->getClientOriginalName();

            $imageName = $request->emirates_id->getClientOriginalName();
            $request->emirates_id->move(public_path('upload_attachments/' . auth()->user()->id . '/' . 'visa_attachment'), $imageName);

            $data['emirates_id']  = $file_name;
        }

        $data['id_number']  = $request->id_number;
        $data['expiry_date']  = $request->expiry_date;
        $data['passport_number']  = $request->passport_number;
        $data['expiry_date_passport']  = $request->expiry_date_passport;
        $data['date_contract'] = $request->date_contract;

        if ($request->file('contract_pdf')) {

            if (auth()->user()->contract_pdf != '') {
                if (File::exists('upload_attachments/' . auth()->user()->id . '/' . 'contract/' . auth()->user()->contract_pdf)) {
                    unlink('upload_attachments/' . auth()->user()->id . '/' . 'contract/' . auth()->user()->contract_pdf);
                }
            }

            $image = $request->file('contract_pdf');
            $file_name = $image->getClientOriginalName();
            $imageName = $request->contract_pdf->getClientOriginalName();
            $request->contract_pdf->move(public_path('upload_attachments/' . auth()->user()->id . '/' . 'contract'), $imageName);

            $data['contract_pdf']  = $file_name;
        }

        $data['company_name']  = $request->company_name;
        $data['license_number']  = $request->license_number;

        if ($request->file('Commercial_Register')) {
            if (auth()->user()->Commercial_Register != '') {
                if (File::exists('upload_attachments/' . auth()->user()->id . '/' . 'Commercial_Register/' . auth()->user()->Commercial_Register)) {
                    unlink('upload_attachments/' . auth()->user()->id . '/' . 'Commercial_Register/' . auth()->user()->Commercial_Register);
                }
            }
            $image = $request->file('Commercial_Register');
            $file_name = $image->getClientOriginalName();
            $imageName = $request->Commercial_Register->getClientOriginalName();
            $request->Commercial_Register->move(public_path('upload_attachments/' . auth()->user()->id . '/' . 'Commercial_Register'), $imageName);

            $data['Commercial_Register']  = $file_name;
        }

        if ($request->file('MOA')) {
            if (auth()->user()->MOA != '') {
                if (File::exists('upload_attachments/' . auth()->user()->id . '/' . 'MOA/' . auth()->user()->MOA)) {
                    unlink('upload_attachments/' . auth()->user()->id . '/' . 'MOA/' . auth()->user()->MOA);
                }
            }
            $image = $request->file('MOA');
            $file_name = $image->getClientOriginalName();
            $imageName = $request->MOA->getClientOriginalName();
            $request->MOA->move(public_path('upload_attachments/' . auth()->user()->id . '/' . 'MOA'), $imageName);

            $data['MOA']  = $file_name;
        }

        $data['status_order'] = '1';
        $data['category_id'] = $request->user_category_id;

        $update = auth()->user()->update($data);

        if ($update) {
            toastr()->success(__('Frontend/general.updated_successfully'));
            return redirect()->back();
        } else {
            toastr()->error(__('Frontend/general.something_was_wrong'));
            return redirect()->back();
        }
    }

    public function update_info(Request $request)
    {
        $validator = Validator::make($request->all(), [

            'company_name' => 'required',
            'license_number' => 'required|numeric',
            'Commercial_Register' => 'required',
            'date_contract' => 'required',
            'contract_pdf' => 'required',
            'about_company' => 'required',
            'about_owner_company' => 'required',
            'partners_company' => 'nullable',

        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $data['company_name']  = $request->company_name;
        $data['license_number']  = $request->license_number;
        $data['Commercial_Register']  = $request->Commercial_Register;

        $data['date_contract']            = $request->date_contract;
        $data['about_company']  = $request->about_company;
        $data['about_owner_company']  = $request->about_owner_company;
        $data['partners_company']  = $request->partners_company;

        if ($image = $request->file('contract_pdf')) {
            if (auth()->user()->contract_pdf != '') {
                if (File::exists('/assets/users/contract_pdf/' . auth()->user()->contract_pdf)) {
                    unlink('/assets/users/' . auth()->user()->contract_pdf);
                }
            }
            $filename_pdf = Str::slug(auth()->user()->username) . '.' . $image->getClientOriginalExtension();
            $path = public_path('assets/users/contract_pdf/' . $filename_pdf);
            Image::make($image->getRealPath())->resize(300, 300, function ($constraint) {
                $constraint->aspectRatio();
            })->save($path, 100);

            $data['contract_pdf']  = $filename_pdf;
        }

        $data['status_order'] = '1';


        $update = auth()->user()->update($data);

        if ($update) {
            toastr()->success(__('Frontend/general.updated_successfully'));
            return redirect()->back();
        } else {
            toastr()->error(__('Frontend/general.something_was_wrong'));
            return redirect()->back();
        }
    }


    public function edit_password()
    {
        $services = Service::get();
        return view('frontend.users.update_password', compact('services'));
    }

    public function update_password(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'current_password'  => 'required',
            'password'          => 'required|confirmed'
        ]);
        if ($validator->fails()) {
            toastr()->error(__('Frontend/general.something_was_wrong'));
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $user = auth()->user();
        if (Hash::check($request->current_password, $user->password)) {
            $update = $user->update([
                'password' => bcrypt($request->password),
                'status_password' => '1',
            ]);

            if ($update) {
                toastr()->success(__('Frontend/general.password_updated'));
                return redirect()->route('users.complete_register');
            } else {
                toastr()->error(__('Frontend/general.something_was_wrong'));
                return redirect()->back();
            }
        } else {
            toastr()->error(__('Frontend/general.something_was_wrong'));
            return redirect()->back();
        }
    }
}
