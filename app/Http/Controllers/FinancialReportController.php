<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\ReportComment;
use App\Http\Traits\imageTrait;
use App\Mail\Comment_from_user;
use App\Models\FinancialReport;
use App\Mail\Comment_from_Auditor;
use App\Mail\UploadFileRequirments;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Mail;
use Stevebauman\Purify\Facades\Purify;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use App\Mail\UploadFileRequirments_from_user;
use App\Mail\UploadFileRequirments_from_admin;
use App\Notifications\NewCommentForAdminNotify;
use App\Notifications\CommentFinancialReportForClient;
use App\Notifications\CommentFinancialReportForAdminNotify;

class FinancialReportController extends Controller
{
    use imageTrait;
    public function store(Request $request, $id)
    {
        $request->validate([
            'financial_report1' => ['required'],
        ]);
        $user = User::whereId($id)->first();
        $f = FinancialReport::whereUserId($id)->first();

        // to select id auditor
        $user_auditor = User::whereId($user->assign_editor)->first();


        // if ($f->financial) {
        //     unlink($f->financial);
        // }
        $image = $request->file('financial_report1');
        $file_name = $image->getClientOriginalName();


        // $request->user()->report()->updateOrCreate(['upload_to' => $user->id], [
        $request->user()->report()->create([
            'upload_to' => $user->id,
            'financial' => $file_name,
            'user_id' => auth()->user()->id,
        ]);

        $imageName = $request->financial_report1->getClientOriginalName();
        $request->financial_report1->move(public_path('upload_attachments/' . $user->id . '/' . 'financial_report'), $imageName);

        $data['name'] = auth()->user()->name;

        //it will sent email only client in both status from upload admin or client
        if (auth()->user()->id == 1 || $user->assign_editor == auth()->user()->id) {
            Mail::to($user->email)->send(new UploadFileRequirments_from_admin());
        } else {
            if (!$user_auditor == null) {
                Mail::to($user_auditor->email)->send(new UploadFileRequirments_from_user($data));
            }
            Mail::to('ad.sal.kab@gmail.com')->send(new UploadFileRequirments_from_user($data));
        }


        return redirect()->back()->with([
            'message' => 'Financial report created successfully',
            'alert-type' => 'success'
        ]);
    }

    public function open_file($user_id, $file_name)

    {
        $files = Storage::disk('upload_attachments')->getDriver()->getAdapter()->applyPathPrefix('upload_attachments/' . $user_id . '/financial_report//' . $file_name);
        return response()->file($files);
    }

    public function get_file($user_id, $file_name)

    {
        $contents = Storage::disk('upload_attachments')->getDriver()->getAdapter()->applyPathPrefix('upload_attachments/' . $user_id . '/financial_report//' . $file_name);
        return response()->download($contents);
    }

    public function destroy(Request $request, $id)
    {
        $f_file = FinancialReport::whereId($id)->first();
        if ($f_file->financial != '') {
            if (File::exists('upload_attachments/' . $f_file->upload_to . '/' . 'financial_report/' . $f_file->financial)) {
                unlink('upload_attachments/' . $f_file->upload_to . '/' . 'financial_report/' . $f_file->financial);
            }
        }

        $f_file->delete();


        return back();
    }


    //save comment by admin and auditor
    public function show_financial_report($id)
    {
        $financialReport_id = FinancialReport::query()
            ->with('report_comments')
            ->whereHas('user', function ($query) {
                $query->whereStatus(1);
            })
            ->whereId($id)
            ->first();
        $comments = $financialReport_id->report_comments()
            ->with(['report', 'user'])->get();
        return view('backend.users.show_financial_report', compact('financialReport_id', 'comments'));
    }

    public function store_comment(Request $request, $id)
    {
        $validation = Validator::make($request->all(), [
            //'name'      => 'required',
            //'email'     => 'required|email',
            // 'url'       => 'nullable|url',
            'comment'   => 'required|min:10',
        ]);
        if ($validation->fails()) {
            toastr()->error('There is no written comment', 'Something Wrong');
            return redirect()->back()->withErrors($validation)->withInput();
        }

        $post = FinancialReport::whereId($id)->first();
        if ($post) {

            $userId = auth()->check() ? auth()->id() : null;
            $data['name']           = auth()->user()->name; //$request->name;
            $data['email']          =  auth()->user()->email; //$request->email;
            $data['comment']        = Purify::clean($request->comment);
            $data['financial_report_id']        = $post->id;
            $data['user_id']        = $userId;

            $comment = $post->report_comments()->create($data);

            // if (auth()->guest() || auth()->id() != $post->user_id) {
            //     $post->user->notify(new NewCommentForPostOwnerNotify($comment));
            // }

            if (auth()->guest() || auth()->id() != $post->user_id) {
                $post->user->notify(new CommentFinancialReportForClient($comment));
            }

            $user = User::whereId($post->upload_to)->first();

            $auditor = User::whereId($user->assign_editor)->first();


            $data['name'] = auth()->user()->name;

            if (auth()->user()->id == 1) {
                Mail::to($user->email)->send(new Comment_from_Auditor($data));
            } elseif ($auditor != null && $auditor->id == auth()->user()->id) {

                Mail::to($user->email)->send(new Comment_from_Auditor($data));
            } else {
                if ($auditor != null) {
                    Mail::to($auditor->email)->send(new Comment_from_user($data));
                } else {
                    Mail::to('ad.sal.kab@gmail.com')->send(new Comment_from_user($data));
                }
            }

            User::whereHas('roles', function ($query) {
                $query->whereIn('name', ['admin']);
            })->each(function ($admin, $key) use ($comment) {
                $admin->notify(new CommentFinancialReportForAdminNotify($comment));
            });

            User::whereId($user->assign_editor)->each(function ($admin, $key) use ($comment) {
                $admin->notify(new CommentFinancialReportForAdminNotify($comment));
            });


            toastr()->success(__('Frontend/general.comment_added_successfully'));
            return redirect()->back();
        }

        return redirect()->back()->with([
            'message' => __('Frontend/general.something_was_wrong'),
            'alert-type' => 'danger'
        ]);
    }

    public function delete_comment($id)
    {
        $comment = ReportComment::whereId($id)->first();
        $comment->delete();
        toastr()->success(__('Frontend/general.comment_deleted_successfully'));
        return redirect()->back();
    }
}
