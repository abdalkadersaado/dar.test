@extends('layouts.app')
@section('style')
    <link rel="stylesheet" href="{{ asset('frontend/js/summernote/summernote-bs4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/js/select2/css/select2.min.css') }}">
@endsection
@section('content')

    <div class="col-lg-9 col-12">
        <h3>Edit Post ({{ $post->title() }})</h3>
        <form action="{{ route('users.post.update', $post->id) }}" method="put">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" value="{{ old('title', $post->title) }}" class="form-control">
            @error('title')<span class="text-danger">{{ $message }}</span>@enderror
        </div>

        <div class="form-group">
            <label for="title_en">Title (English)</label>
            <input type="text" name="title_en" value="{{ old('title_en', $post->title_en) }}" class="form-control">
            @error('title_en')<span class="text-danger">{{ $message }}</span>@enderror
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" class="form-control summernote"  cols="30" rows="10">{{ old('description',$post->description) }}</textarea>
            @error('description')<span class="text-danger">{{ $message }}</span>@enderror
        </div>
        <div class="form-group">
            <label for="description_en">Description (English)</label>
            <textarea name="description_en" class="form-control summernote"  cols="30" rows="10">{{ old('description_en',$post->description_en) }}</textarea>
            @error('description_en')<span class="text-danger">{{ $message }}</span>@enderror
        </div>

        <div class="form-group">
            <label for="tags">Tags</label>
            <button type="button" class="btn btn-primary btn-xs" id="select_btn_tag">Select all</button>
            <button type="button" class="btn btn-primary btn-xs" id="deselect_btn_tag">Deselect all</button>
            <select name="tags[]" class="form-control selects" multiple="multiple" id="select_all_tags">
                   @foreach ($tags as $tag )
                       {{-- <option value="{{ $tag->id }}" {{ in_array($tag->id,old('tag[]',$post->tags)) }}>{{ $tag->name() }}</option> --}}
                       <option value="{{ $tag->id }}" {{ in_array($tag->id, old('tags[]',$post->tags->pluck('id')->toArray())) ? 'selected': '' }}>{{ $tag->name() }}</option>
                       @endforeach
                </select>
            @error('tags')<span class="text-danger">{{ $message }}</span>@enderror
        </div>

        <div class="row">
            <div class="col-4">
                <label for="category_id">Category</label>
                <select name="category_id" class="form-control">
                   @foreach ($categories as $category )
                       <option value="{{ $category->id }}" {{ old('category_id',$post->category_id) == $category->id ? 'selected' : '' }}>{{ $category->name() }}</option>
                   @endforeach
                </select>
                @error('category_id')<span class="text-danger">{{ $message }}</span>@enderror
            </div>
            <div class="col-4">
                <label for="comment_able">Comment able</label>
                <select name="comment_able" class="form-control">
                    <option value="1" {{ old('comment_able', $post->comment_able) == '1' ? 'selected' : '' }}>Yes</option>
                    <option value="0" {{ old('comment_able', $post->comment_able) == '0' ? 'selected' : '' }}>No</option>
                </select>
                @error('comment_able')<span class="text-danger">{{ $message }}</span>@enderror
            </div>
            <div class="col-4">
                <label for="status">Status</label>
                <select name="status" class="form-control">
                    <option value="1" {{ old('status', $post->status) == '1' ? 'selected' : '' }}>Active</option>
                     <option value="0" {{ old('status', $post->status) == '0' ? 'selected' : '' }}>Inactive</option>
                </select>
                @error('status')<span class="text-danger">{{ $message }}</span>@enderror
            </div>
        </div>

        <div class="row pt-4">
            <div class="col-12">
                <div class="file-loading">
                    <input type="file" name="images[]" id="post-images" multiple="multiple">
                </div>
            </div>
        </div>

        <div class="form-group pt-4">
            <button type="submit" class="btn btn-primary">Update</button>
        </div>

        </form>
    </div>
    <div class="col-lg-3 col-12 md-mt-40 sm-mt-40">
        @include('partial.frontend.users.sidebar')
    </div>

@endsection
@section('script')
    <script src="{{ asset('frontend/js/summernote/summernote-bs4.min.js') }}"></script>
    <script src="{{ asset('frontend/js/select2/js/select2.full.min.js') }}"></script>
    <script>
        $(function () {
            $('.summernote').summernote({
                tabSize: 2,
                height: 200,
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'underline', 'clear']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['table', ['table']],
                    ['insert', ['link', 'picture', 'video']],
                    ['view', ['fullscreen', 'codeview', 'help']]
                ]
            });

            $('.selects').select2({
                tags: true,
                minimumResultsForSearch: Infinity
            });
            $('#select_btn_tag').click(function (){
                $('#select_all_tags > option').prop("selected", "selected");
                $('#select_all_tags').trigger('change');
            });

            $('#deselect_btn_tag').click(function (){
                $('#select_all_tags > option').prop("selected", "");
                $('#select_all_tags').trigger('change');
            });


            $('#post-images').fileinput({
                theme: "fa",
                maxFileCount: {{ 5 - $post->media->count() }},
                allowedFileTypes: ['image'],
                showCancel: true,
                showRemove: false,
                showUpload: false,
                overwriteInitial: false,
                initialPreview: [
                    @if($post->media->count() > 0)
                        @foreach($post->media as $media)
                            "{{ asset('assets/posts/' . $media->file_name) }}",
                        @endforeach
                    @endif
                ],
                initialPreviewAsData: true,
                initialPreviewFileType: 'image',
                initialPreviewConfig: [
                    @if($post->media->count() > 0)
                        @foreach($post->media as $media)
                            {caption: "{{ $media->file_name }}", size: {{ $media->file_size }}, width: "120px", url: "{{ route('users.post.media.destroy', [$media->id, '_token' => csrf_token()]) }}", key: "{{ $media->id }}"},
                        @endforeach
                    @endif
                ],
            })

        });
    </script>
@endsection
