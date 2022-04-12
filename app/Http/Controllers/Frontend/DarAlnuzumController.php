<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Post;
use App\Models\User;
use App\Models\Service;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\ReportComment;
use App\Models\FinancialReport;
use App\Http\Controllers\Controller;

class DarAlnuzumController extends Controller
{
    public function home()
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

    public function contact()
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
            ->paginate(5)
            ->withQueryString();

        $categories = Category::get();

        $users = User::whereHas('roles', function ($query) {
            $query->where('name', 'user');
        })->get();
        $services = Service::get();
        return view('dar_al_nuzum.contact_us_show', compact('posts', 'categories', 'users', 'services'));
    }

    public function show_service($id)
    {
        $service = Service::whereId($id)->first();

        return view('dar_al_nuzum.service_show', compact('service'));
    }
    public function profile()
    {
        $financial_file_all = FinancialReport::with('report_comments')->where('upload_to', auth()->user()->id)->get();
        $financial_file = FinancialReport::where('upload_to', auth()->user()->id)->latest()->first();
        $services = Service::get();

        if ($financial_file) {
            $financial_file_all = FinancialReport::with('report_comments')->where('upload_to', auth()->user()->id)->get();
            $comments = ReportComment::with(['report', 'user'])->where('financial_report_id', $financial_file->id)->get();
            return view('dar_al_nuzum.profile', compact('financial_file', 'services', 'comments', 'financial_file_all'));
        }
        return view('dar_al_nuzum.profile', compact('financial_file', 'services', 'financial_file_all'));
    }
    public function edit_profile()
    {
        $categories = Category::get();
        $financial_file = FinancialReport::where('upload_to', auth()->user()->id)->latest()->first();

        if ($financial_file) {
            $comments = ReportComment::with(['report', 'user'])->where('financial_report_id', $financial_file->id)->get();
            $services = Service::get();
            return view('dar_al_nuzum.edit_profile', compact('financial_file',  'categories', 'comments', 'services'));
        }
        $services = Service::get();
        return view('dar_al_nuzum.edit_profile', compact('financial_file',  'categories', 'services'));
    }
    public function blogs()
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
            ->paginate()
            ->withQueryString();
        $categories = Category::latest('id')->take(10)->get();
        $services = Service::get();
        return view('dar_al_nuzum.blogs', compact('posts', 'categories', 'services'));
    }
    public function filter_blogs($slug)
    {
        $categories = Category::get();
        $category = Category::whereSlug($slug)->orWhere('slug_en', $slug)->orWhere('id', $slug)->whereStatus(1)->first()->id;

        if ($category) {
            $posts = Post::with(['media', 'user', 'tags'])
                ->whereCategoryId($category)
                ->post()
                ->active()
                ->orderBy('id', 'desc')
                ->paginate(6)
                ->withQueryString();

            $services = Service::get();
        }
        return view('dar_al_nuzum.blogs_filter', compact('categories', 'category', 'services', 'posts'));
    }
    public function filter_all_blogs()
    {
        $categories = Category::get();


        $posts = Post::with(['media', 'user', 'tags'])
            ->post()
            ->active()
            ->orderBy('id', 'desc')
            ->paginate(6)
            ->withQueryString();

        $services = Service::get();

        return view('dar_al_nuzum.blogs_All_filter', compact('categories', 'services', 'posts'));
    }
    public function show_single_blog($slug)
    {

        $post = Post::query()
            ->with([
                'category', 'media', 'user', 'tags',
                'approved_comments' => function ($query) {
                    $query->orderBy('id', 'desc');
                }
            ])
            ->whereHas('category', function ($query) {
                $query->whereStatus(1);
            })
            ->whereHas('category', function ($query) {
                $query->whereStatus(1);
            })
            ->whereHas('user', function ($query) {
                $query->whereStatus(1);
            })
            ->whereSlugEn($slug)
            ->orWhere('slug', $slug)
            ->active()
            ->first();

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
        $services = Service::get();
        return view('dar_al_nuzum.single_blog', compact('post', 'posts', 'services'));
    }
}
