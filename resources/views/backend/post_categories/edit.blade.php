@extends('layouts.admin')
@section('content')

    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex">
            <h6 class="m-0 font-weight-bold text-primary">Edit category ({{ $category->name() }})</h6>
            <div class="ml-auto">
                <a href="{{ route('admin.post_categories.index') }}" class="btn btn-primary">
                    <span class="icon text-white-50">
                        <i class="fa fa-home"></i>
                    </span>
                    <span class="text">Categories</span>
                </a>
            </div>
        </div>
        <div class="card-body">

                 <form action="{{ route('admin.post_categories.update',$category->id) }}" method="post">
                    @csrf
                    @method('PATCH')
                    <div class="row">
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" name="name" value="{{ old('name',$category->name) }}" class="form-control">
                                    @error('name')<span class="text-danger">{{ $message }}</span>@enderror
                                </div>
                            </div>

                            <div class="col-4">
                                <div class="form-group">
                                    <label for="name_en">Name English</label>
                                    <input type="text" name="name_en" value="{{ old('name_en',$category->name_en) }}" class="form-control">
                                    @error('name_en')<span class="text-danger">{{ $message }}</span>@enderror
                                </div>
                            </div>


                            <div class="col-4">
                                <div class="form-group">
                                    <label for="status">Status</label>
                                    <select name="status" class="form-control">
                                        <option value=""> --- </option>
                                        <option value="1" {{ old('status',request('status',$category->status)) == '1' ? 'selected': '' }}>Active</option>
                                        <option value="0" {{ old('status',request('status',$category->status)) == '0' ? 'selected': '' }}>Inactive</option>

                                    </select>
                                    @error('status')<span class="text-danger">{{ $message }}</span>@enderror
                                </div>
                            </div>

                            <div class="col-4">
                                <div class="form-group">
                                    <label for="description">description Arabic</label>
                                    <input type="text" name="description" value="{{ old('description',$category->description) }}" class="form-control">
                                    @error('description')<span class="text-danger">{{ $message }}</span>@enderror
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="description_en">description English</label>
                                    <input type="text" name="description_en" value="{{ old('description_en',$category->description_en) }}" class="form-control">
                                    @error('description_en')<span class="text-danger">{{ $message }}</span>@enderror
                                </div>
                            </div>
                        </div>
                             <div class="form-group pt-4">
                                <button type="submit" class="btn btn-primary">Update Category</button>
                            </div>


            </form>
        </div>
    </div>

@endsection
