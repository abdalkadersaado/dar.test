@extends('layouts.admin')
@section('style')
    <link rel="stylesheet" href="{{ asset('backend/vendor/select2/css/select2.min.css') }}">
@endsection
@section('content')

    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex">
            <h6 class="m-0 font-weight-bold text-primary">Create Blog</h6>
            <div class="ml-auto">
                <a href="{{ route('admin.posts.index') }}" class="btn btn-primary">
                    <span class="icon text-white-50">
                        <i class="fa fa-home"></i>
                    </span>
                    <span class="text">Blogs</span>
                </a>
            </div>
        </div>
        <div class="card-body">

            <form action="{{ route('admin.posts.store') }}" method="post" enctype="multipart/form-data">
                @csrf

            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="title">Title (Arabic)</label>
                        <input type="text" name="title" value="{{ old('title') }}" class="form-control">
                        @error('title')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                </div>

                <div class="col-6">
                    <div class="form-group">
                        <label for="title_en">Title (English)</label>
                        <input type="text" name="title_en" value="{{ old('title_en') }}" class="form-control">
                        @error('title')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="description">Description (Arabic)</label>
                        <textarea name="description" class="form-control summernote" >{!! old('description')  !!}</textarea>
                        @error('description')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                </div>



                <div class="col-6">
                    <div class="form-group">
                        <label for="description_en">Description (English)</label>
                        <textarea name="description_en" class="form-control summernote" >{!! old('description_en')  !!}</textarea>
                        @error('description_en')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col-4">
                    <label for="category_id"> Select Category </label>
                    <select name="category_id" class="form-control">
                <option value=""> --- </option>
                @foreach ($categories as $cat )
                <option value="{{ $cat->id }}" {{ old('category_id') == $cat->id ? 'selected': '' }}>{{ $cat->name() }}</option>
                @endforeach
            </select>
                    @error('category_id')<span class="text-danger">{{ $message }}</span>@enderror
                </div>

                <div class="col-4">
                    <label for="status">Status</label>
                    <select name="status" class="form-control">
                <option value="1" {{ old('status') == '1' ? 'selected' : ''  }}>Active</option>
                <option value="0" {{ old('status') == '0' ? 'selected' : ''  }}>Inactive</option>
            </select>
                    @error('status')<span class="text-danger">{{ $message }}</span>@enderror
                </div>
            </div>

            <div class="row pt-4">
                <div class="col-12">
                     <label for="Sliders">Image</label>

                    <br>
                    <div class="file-loading">
                        <input  type="file" name="images[]" id="post-images" class="file-input-overview"  multiple="multiple">
                        <span class="form-text text-muted">Image width should be 800px x 500px</span>
                        @error('images')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                </div>
            </div>

            <div class="form-group pt-4">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
            </form>
        </div>
    </div>

@endsection
@section('script')
    <script src="{{ asset('backend/vendor/select2/js/select2.full.min.js') }}"></script>
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
                theme: "fas",
                maxFileCount: 5,
                allowedFileTypes: ['image'],
                showCancel: true,
                showRemove: false,
                showUpload: false,
                overwriteInitial: false,
            });
        });
    </script>
@endsection
