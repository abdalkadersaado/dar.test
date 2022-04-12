<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Quote;
use Illuminate\Http\Request;

class QuoteController extends Controller
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
        if (!\auth()->user()->ability('admin', 'manage_Quote,show_Quote')) {
            return redirect('admin/index');
        }

        $messages = Quote::query()
            ->when(request('keyword') != '', function ($query) {
                $query->search(request('keyword'));
            })
            ->orderBy(request('sort_by') ?? 'id', request('order_by') ?? 'desc')
            ->paginate(request('limit_by') ?? 10)
            ->withQueryString();

        return view('backend.Quote.index', compact('messages'));
    }

    public function show($id)
    {
        if (!\auth()->user()->ability('admin', 'display_Quote')) {
            return redirect('admin/index');
        }

        $message = Quote::whereId($id)->first();

        return view('backend.Quote.show', compact('message'));
    }

    public function destroy($id)
    {
        if (!\auth()->user()->ability('admin', 'delete_Quote')) {
            return redirect('admin/index');
        }

        $message = Quote::whereId($id)->first();

        if ($message) {
            $message->delete();

            return redirect()->route('admin.Quote.index')->with([
                'message' => 'Message deleted successfully',
                'alert-type' => 'success',
            ]);
        }

        return redirect()->route('admin.Quote.index')->with([
            'message' => 'Something was wrong',
            'alert-type' => 'danger',
        ]);
    }
}
