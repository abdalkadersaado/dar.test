@extends('layouts.admin')
@section('style')
    <link rel="stylesheet" href="{{ asset('backend/vendor/select2/css/select2.min.css') }}">
@endsection
@section('content')

    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex">
            <h6 class="m-0 font-weight-bold text-primary">{{ __('BackEnd/supervisors.create_supervisors') }}</h6>
            <div class="ml-auto">
                <a href="{{ route('admin.supervisors.index') }}" class="btn btn-primary">
                    <span class="icon text-white-50">
                        <i class="fa fa-home"></i>
                    </span>
                    <span class="text">{{ __('BackEnd/supervisors.supervisors') }}</span>
                </a>
            </div>
        </div>
        <div class="card-body">

            <form action="{{ route('admin.supervisors.store') }}" autocomplete="off" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-3">
                    <div class="form-group">
                        <label for="name">{{__('BackEnd/supervisors.name')  }}</label>
                        <input type="text" name="name" value="{{ old('name') }}" class="form-control" >
                        @error('name')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <label for="username">{{ __('BackEnd/supervisors.Username') }}</label>
                        <input type="text" name="username" value="{{old('username')  }}" class="form-control">
                        @error('username')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <label for="email">{{ __('BackEnd/supervisors.Email') }}</label>
                        <input type="email" name="email" value="{{old('email')  }}" class="form-control">
                        @error('email')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <label for="mobile">{{ __('BackEnd/supervisors.Mobile') }}</label>
                        <input type="text" name="mobile" value="{{old('mobile')  }}" class="form-control">
                        @error('mobile')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                </div>

            </div>

            <div class="row">
                <div class="col-3">
                    <div class="form-group">
                         <label for="password">{{ __('BackEnd/supervisors.Password') }}</label>
                        <input type="password" name="password" value="{{old('password')  }}" class="form-control">
                        @error('password')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <label for="status">{{ __('BackEnd/user.status') }}</label>
                       <select name="status" class="form-control">
                            <option value=""> --- </option>
                            <option value="1" {{ old('status') == '1' ? 'selected': '' }}>{{ __('BackEnd/user.active') }}</option>
                            <option value="0" {{ old('status') == '0' ? 'selected': '' }}>{{ __('BackEnd/user.inactive') }}</option>
                     </select>
                        @error('status')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="receive_email">{{ __('BackEnd/supervisors.Receive_email') }}</label>
                        <select name="receive_email" class="form-control">
                            <option value=""> --- </option>
                            <option value="1" {{ old('receive_email') == '1' ? 'selected': '' }}>{{ __('BackEnd/user.yes') }}</option>
                            <option value="0" {{ old('receive_email ') == '0' ? 'selected': '' }}>{{ __('BackEnd/user.no') }}</option>
                         </select>
                        @error('receive_email')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="form-group">
                        <label for="bio">{{ __('BackEnd/supervisors.Bio') }}</label>
                        <textarea type="text" name="bio" class="form-control">{{ old('bio') }}</textarea>
                        @error('bio')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="form-group">
                        <label for="permissions">{{ __('BackEnd/supervisors.permissions') }}</label>
                        <select name="permissions[]" class="form-control select-multiple-tags" multiple="multiple">
                            @foreach ($permissions as $permission )
                            <option value="{{ $permission->id }}" {{ in_array($permission->id,old('permissions[]',[]))  ? 'selected': '' }}>{{ $permission->display_name() }}</option>
                            @endforeach
                         </select>
                        @error('permissions')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                </div>
            </div>

            <div class="row pt-4">
                <div class="col-12">
                    <label for="user_image">{{ __('BackEnd/user.User_Image') }}</label>
                    <br>
                    <div class="file-loading">
                        <input type="file" name="user_image" id="user-image" class="file-input-overview" >
                        <span class="form-text text-muted">{{ __('BackEnd/user.Image_width') }}</span>
                        @error('user_image')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                </div>
            </div>


            <div class="form-group pt-4">
                <button type="submit" class="btn btn-primary">{{ __('BackEnd/supervisors.submit') }}</button>
            </div>
             </form>
        </div>
    </div>



@endsection
@section('script')
    <script src="{{ asset('backend/vendor/select2/js/select2.full.min.js') }}"></script>
    <script>
        $(function () {
            $('.select-multiple-tags').select2({
                minimumResultsForSearch: Infinity,
                tags: true,
                closeOnSelect:false
            });

            $('#user-image').fileinput({
                theme: "fas",
                maxFileCount: 1,
                allowedFileTypes: ['image'],
                showCancel: true,
                showRemove: false,
                showUpload: false,
                overwriteInitial: false,
            });
        });
    </script>
@endsection

