@extends('layouts.app')
@section('content')

    <div class="col-lg-9 col-12">
        <h3>Edit Comment on: ({{ $comment->post->title() }})</h3>
        <form action="{{ route('users.comment.update', $comment->id) }}" method="put">
        @csrf
        @method('PUT')

        <div class="row">
            <div class="col-3">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" value="{{ old('name', $comment->name) }}" class="form-control">
                    @error('name')<span class="text-danger">{{ $message }}</span>@enderror
                </div>
            </div>
            <div class="col-3">
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" value="{{ old('email', $comment->email) }}" class="form-control">
                    @error('email')<span class="text-danger">{{ $message }}</span>@enderror
                </div>
            </div>
            <div class="col-3">
                <div class="form-group">
                    <label for="url">Website</label>
                    {!! Form::text('url', old('url', $comment->url), ['class' => 'form-control']) !!}
                    @error('url')<span class="text-danger">{{ $message }}</span>@enderror
                </div>
            </div>
            <div class="col-3">
                <label for="status">status</label>
                {!! Form::select('status', ['1' => 'Active', '0' => 'Inactive'], old('status', $comment->status), ['class' => 'form-control']) !!}
                @error('status')<span class="text-danger">{{ $message }}</span>@enderror
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <label for="comment">comment</label>
                <textarea name="comment" cols="30" rows="10"></textarea>
                {!! Form::textarea('comment', old('comment', $comment->comment), ['class' => 'form-control']) !!}
                @error('comment')<span class="text-danger">{{ $message }}</span>@enderror
            </div>
        </div>

        <div class="form-group pt-4">
            <button type="submit" class="btn btn-primary"></button>
        </div>
        </form>
    </div>
    <div class="col-lg-3 col-12 md-mt-40 sm-mt-40">
                    @include('partial.frontend.users.sidebar')
                </div>

@endsection
