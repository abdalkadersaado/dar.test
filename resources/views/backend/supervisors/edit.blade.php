@extends('layouts.admin')
@section('style')
    <link rel="stylesheet" href="{{ asset('backend/vendor/select2/css/select2.min.css') }}">
@endsection
@section('content')

    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex">
            <h6 class="m-0 font-weight-bold text-primary">Edit supervisor ({{ $user->name }})</h6>
            <div class="ml-auto">
                <a href="{{ route('admin.supervisors.index') }}" class="btn btn-primary">
                    <span class="icon text-white-50">
                        <i class="fa fa-home"></i>
                    </span>
                    <span class="text">Users</span>
                </a>
            </div>
        </div>
        <div class="card-body">


            <form action="{{ route('admin.supervisors.update',$user->id ) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="row">
                <div class="col-3">
                    <div class="form-group">
                       <label for="name">{{ __('BackEnd/user.name') }}</label>
                       <input type="text" name="name" value="{{ old('name',$user->name) }}" class="form-control">
                        @error('name')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <label for="username">{{ __('BackEnd/user.username') }}</label>
                       <input type="text" name="username" value="{{ old('username',$user->username) }}" class="form-control">
                        @error('username')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                          <label for="email">{{ __('BackEnd/user.email') }}</label>
                       <input type="text" name="email" value="{{ old('email',$user->email) }}" class="form-control">
                        @error('email')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                         <label for="mobile">{{ __('BackEnd/user.mobile') }}</label>
                       <input type="text" name="mobile" value="{{ old('mobile',$user->mobile) }}" class="form-control">
                        @error('mobile')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                </div>

            </div>

           <div class="row">
                <div class="col-3">
                    <div class="form-group">
                         <label for="password">{{ __('BackEnd/supervisors.Password') }}</label>
                        <input type="password" name="password"  class="form-control">
                        @error('password')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <label for="status">{{ __('BackEnd/user.status') }}</label>
                       <select name="status" class="form-control">
                            <option value=""> --- </option>
                            <option value="1" {{ old('status',$user->status ) == '1' ? 'selected': '' }}>{{ __('BackEnd/user.active') }}</option>
                            <option value="0" {{ old('status',$user->status ) == '0' ? 'selected': '' }}>{{ __('BackEnd/user.inactive') }}</option>
                     </select>
                        @error('status')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="receive_email">{{ __('BackEnd/supervisors.Receive_email') }}</label>
                        <select name="receive_email" class="form-control">
                            <option value=""> --- </option>
                            <option value="1" {{ old('receive_email',$user->receive_email) == '1' ? 'selected': '' }}>{{ __('BackEnd/user.yes') }}</option>
                            <option value="0" {{ old('receive_email ',$user->receive_email) == '0' ? 'selected': '' }}>{{ __('BackEnd/user.no') }}</option>
                         </select>
                        @error('receive_email')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="form-group">
                        <label for="bio">{{ __('BackEnd/supervisors.Bio') }}</label>
                        <textarea type="text" name="bio" class="form-control">{{ old('bio',$user->bio) }}</textarea>
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
                            <option value="{{ $permission->id }}" {{ in_array($permission->id , old('permissions[]',$userPermissions)) ? 'selected' : '' }} >{{ $permission->display_name() }}</option>
                            @endforeach
                         </select>
                        @error('permissions')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                </div>
            </div>


            <div class="row pt-4">
                @if ($user->user_image != '')
                    <div class="col-12 text-center">
                        <div id="imgArea">
                            <img src="{{ asset('assets/users/' . $user->user_image) }}" width="200" height="200">
                            <button class="btn btn-danger removeImage">Remove Image</button>
                        </div>
                    </div>
                @endif
                <div class="col-12">
                    <label for="User Image">{{ __('BackEnd/supervisors.user_image') }}</label>
                    <br>
                    <div class="file-loading">
                        <input type="file" name="user_image" id="user-image" class="file-input-overview">
                        <span class="form-text text-muted">{{ __('BackEnd/supervisor.Image_width') }}</span>
                        @error('user_image')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                </div>
            </div>

            <div class="form-group pt-4">
                <button type="submit" class="btn btn-primary">{{ __('BackEnd/supervisor.update') }}</button>
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

            $('.removeImage').click(function () {
                $.post('{{ route('admin.supervisors.remove_image') }}', { user_id: '{{ $user->id }}', _token: '{{ csrf_token() }}' }, function (data) {
                    if (data == 'true') {
                        window.location.href = window.location;
                    }
                })

            });
        });
    </script>
@endsection
