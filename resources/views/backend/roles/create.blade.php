@extends('layouts.admin')
@section('style')
    <link rel="stylesheet" href="{{ asset('backend/vendor/select2/css/select2.min.css') }}">
@endsection
@section('content')

    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex">
            <h6 class="m-0 font-weight-bold text-primary">Create Role</h6>
            <div class="ml-auto">
                <a href="{{ route('admin.roles.index') }}" class="btn btn-primary">
                    <span class="icon text-white-50">
                        <i class="fa fa-home"></i>
                    </span>
                    <span class="text">Categories</span>
                </a>
            </div>
        </div>
        <div class="card-body">

            <form action="{{ route('admin.roles.store') }}" method="post">
                @csrf
            <div class="row">
               <div class="col-3">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" value="{{ old('name') }}" class="form-control">
                        @error('name')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <label for="display_name">Display Name</label>
                        <input type="text" name="display_name" value="{{ old('display_name') }}" class="form-control">
                        @error('display_name')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                </div>

                <div class="col-3">
                     <div class="form-group">
                        <label for="display_name_en">Display Name (English)</label>
                        <input type="text" name="display_name_en" value="{{ old('display_name_en') }}" class="form-control">
                        @error('display_name_en')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                </div>

                 <div class="col-3">
                     <div class="form-group">
                        <label for="allowed_route">Allowed route</label>
                        <select name="allowed_route" class="form-control">
                            <option value="">---</option>
                            <option value="admin" {{ old('allowed_route') == 'admin' ? 'selected' : '' }}>admin</option>
                        </select>
                        @error('allowed_route')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                </div>
            </div>
              <div class="row">
                <div class="col-12">
                    <div class="form-group">
                        <label for="permissions">{{ __('BackEnd/roles.permissions') }}</label>
                        <select name="permissions[]" class="form-control select-multiple-tags" multiple="multiple">
                            @foreach ($permissions as $permission )
                            <option value="{{ $permission->id }}" {{ in_array($permission->id,old('permissions[]',[]))  ? 'selected': '' }}>{{ $permission->display_name() }}</option>
                            @endforeach
                         </select>
                        @error('permissions')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                </div>
            </div>

            <div class="form-group pt-4">
                <button type="submit" class="btn btn-primary">{{ __('BackEnd/roles.save') }}</button>
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
        });
    </script>
@endsection
