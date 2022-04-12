<div class="card-body">
    <form action="{{ route('admin.post_categories.index') }}" method="get">
    <div class="row">
        <div class="col-2">
            <div class="form-group">
                <input type="text" name="keyword" value="{{ old('keyword',request('keyword')) }}" class="form-control" placeholder="{{ __('BackEnd/contact_us.search_here') }}">
            </div>
        </div>
        <div class="col-2">
            <div class="form-group">
                <select name="status" class="form-control">
                    <option value="">Status --- </option>
                    <option value="1" {{ old('status',request('status')) == '1' ? 'selected': '' }}>Active</option>
                    <option value="0" {{ old('status',request('status')) == '0' ? 'selected': '' }}>Inactive</option>
                </select>
                 @error('status')<span class="text-danger">{{ $message }}</span>@enderror
            </div>
        </div>
        <div class="col-2">
            <div class="form-group">
                <select name="sort_by" class="form-control">
                    <option value="">Sort By --- </option>
                    <option value="id" {{ old('sort_by',request('sort_by')) == 'id' ? 'selected': '' }}>ID</option>
                    <option value="name" {{ old('sort_by',request('sort_by')) == 'created_at' ? 'selected': '' }}>name</option>
                    <option value="created_at" {{ old('sort_by',request('sort_by')) == 'created_at' ? 'selected': '' }}>created_at</option>
                </select>
                 @error('sort_by')<span class="text-danger">{{ $message }}</span>@enderror
            </div>
        </div>
        <div class="col-2">
            <div class="form-group">
                <select name="order_by" class="form-control">
                <option value="">Order By --- </option>
                <option value="asc" {{ old('order_by',request('order_by')) == 'asc' ? 'selected': '' }}>asc</option>
                <option value="desc" {{ old('order_by',request('order_by')) == 'desc' ? 'selected': '' }}>desc</option>
                 </select>
                @error('order_by')<span class="text-danger">{{ $message }}</span>@enderror

            </div>
        </div>
        <div class="col-1">
            <div class="form-group">
                 <select name="limit_by" class="form-control">
                <option value=""> --- </option>
                <option value="10" {{ old('limit_by',request('limit_by')) == '10' ? 'selected': '' }}>10</option>
                <option value="20" {{ old('limit_by',request('limit_by')) == '20' ? 'selected': '' }}>20</option>
                <option value="50" {{ old('limit_by',request('limit_by')) == '50' ? 'selected': '' }}>50</option>
                <option value="100" {{ old('limit_by',request('limit_by')) == '100' ? 'selected': '' }}>100</option>
                 </select>
                 @error('limit_by')<span class="text-danger">{{ $message }}</span>@enderror
            </div>
        </div>
        <div class="col-2"></div>
        <div class="col-1">
            <div class="form-group">
                <button type="submit" class="btn btn-link">Search</button>
            </div>
        </div>
    </div>
    </form>
</div>
