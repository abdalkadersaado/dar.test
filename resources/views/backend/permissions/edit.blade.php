@extends('layouts.admin')

@section('content')

    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex">
            <h6 class="m-0 font-weight-bold text-primary">Edit permission ({{ $permission->display_name() }})</h6>
            <div class="ml-auto">
                <a href="{{ route('admin.permissions.index') }}" class="btn btn-primary">
                    <span class="icon text-white-50">
                        <i class="fa fa-home"></i>
                    </span>
                    <span class="text">permissions</span>
                </a>
            </div>
        </div>
        <div class="card-body">

            <form action="{{ route('admin.permissions.update',$permission->id) }}" method="post">
            @csrf
            @method('PATCH')

            <div class="row">
               <div class="col-2">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" value="{{ old('name',$permission->name) }}" class="form-control">
                        @error('name')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                </div>
                <div class="col-2">
                    <div class="form-group">
                        <label for="display_name">Display Name</label>
                        <input type="text" name="display_name" value="{{ old('display_name',$permission->display_name) }}" class="form-control">
                        @error('display_name')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                </div>

                <div class="col-2">
                     <div class="form-group">
                        <label for="display_name_en">Display Name (English)</label>
                        <input type="text" name="display_name_en" value="{{ old('display_name_en',$permission->display_name_en) }}" class="form-control">
                        @error('display_name_en')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                </div>

                 <div class="col-2">
                    <div class="form-group">
                        <label for="description">Description</label>
                        <input type="text" name="description" value="{{ old('description',$permission->description) }}" class="form-control">
                        @error('description')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                </div>

                <div class="col-2">
                     <div class="form-group">
                        <label for="description_en">Description (English)</label>
                        <input type="text" name="description_en" value="{{ old('description_en',$permission->description_en) }}" class="form-control">
                        @error('description_en')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                </div>
                 <div class="col-2">
                     <div class="form-group">
                        <label for="route">route</label>
                        <input type="text" name="route" value="{{ old('route',$permission->route) }}" class="form-control">
                        @error('route')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-3">
                     <div class="form-group">
                        <label for="module">Module</label>
                        <input type="text" name="module" value="{{ old('module',$permission->module) }}" class="form-control">
                        @error('module')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                </div>

                 <div class="col-3">
                     <div class="form-group">
                        <label for="as">As</label>
                        <input type="text" name="as" value="{{ old('as',$permission->as) }}" class="form-control">
                        @error('as')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                </div>

                <div class="col-3">
                     <div class="form-group">
                        <label for="icon">icon</label>
                        <input type="text" name="icon" value="{{ old('icon',$permission->icon) }}" class="form-control">
                        @error('icon')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                </div>
                <div class="col-3">
                     <div class="form-group">
                        <label for="sidebar_link">sidebar_link</label>
                        <select name="sidebar_link" class="form-control">
                            <option value="1" {{ old('sidebar_link',$permission->sidebar_link) == '1' ? 'selected': '' }}>Yes</option>
                            <option value="0" {{ old('sidebar_link',$permission->sidebar_link) == '0' ? 'selected': '' }}>No</option>
                        </select>
                        @error('sidebar_link')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-3">
                     <div class="form-group">
                        <label for="parent">parent</label>
                        <select name="parent" class="form-control">
                            <option value="0">---</option>
                            @foreach ($main_permissions as $main_perm )
                            <option value="{{ $main_perm->id }}" {{ old('parent',$permission->parent) == $main_perm->id ? 'selected':'' }}>{{ $main_perm->display_name() }}</option>
                            @endforeach
                        </select>
                        @error('parent')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                </div>
                <div class="col-3">
                     <div class="form-group">
                        <label for="parent_show">parent show</label>
                        <select name="parent_show" class="form-control">
                            <option value="0">---</option>
                            @foreach ($main_permissions as $main_perm )
                            <option value="{{ $main_perm->id }}" {{ old('parent_show',$permission->parent_show) == $main_perm->id ? 'selected':'' }}>{{ $main_perm->display_name() }}</option>
                            @endforeach
                        </select>
                        @error('parent_show')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                </div>
                <div class="col-3">
                     <div class="form-group">
                        <label for="parent_original">parent original</label>
                        <select name="parent_original" class="form-control">
                            <option value="0">---</option>
                            @foreach ($main_permissions as $main_perm )
                            <option value="{{ $main_perm->id }}" {{ old('parent_original',$permission->parent_original) == $main_perm->id ? 'selected':'' }}>{{ $main_perm->display_name() }}</option>
                            @endforeach
                        </select>
                        @error('parent_original')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                </div>
                <div class="col-3">
                     <div class="form-group">
                        <label for="appear">appear</label>
                        <select name="appear" class="form-control">
                            <option value="0" {{ old('appear',$permission->appear) == '0' ? 'selected':'' }}>No</option>
                            <option value="1" {{ old('appear',$permission->appear) == '1' ? 'selected':'' }}>yes</option>
                        </select>
                        @error('appear')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-3">
                     <div class="form-group">
                        <label for="ordering">ordering</label>
                        <input type="text" name="ordering" value="{{ old('ordering',$permission->ordering) }}" class="form-control">
                        @error('ordering')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                </div>
            </div>


            <div class="form-group pt-4">
                <button type="submit" class="btn btn-primary">{{ __('BackEnd/permissions.update') }}</button>
            </div>
            </form>
        </div>
    </div>

@endsection
