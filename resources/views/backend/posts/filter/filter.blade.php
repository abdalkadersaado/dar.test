<div class="card-body">
    <form action="{{ route('admin.posts.index') }}" method="get">
    <div class="row">
        <div class="col-2">
            <div class="form-group">
                <input type="text" name="keyword" value="{{ old('keyword',request('keyword')) }}" class="form-control" placeholder="{{ __('BackEnd/contact_us.search_here') }}">
            </div>
        </div>
        <div class="col-2">
            <div class="form-group">
            <select name="category_id" class="form-control">
                <option value=""> Choose Category--- </option>
                @foreach ($categories as $cat )
                <option value="{{ $cat->id }}" {{ old('category_id',request('category_id')) == $cat->id ? 'selected': '' }}>{{ $cat->name() }}</option>
                @endforeach
            </select>
            </div>
        </div>
        <div class="col-2">
            <div class="form-group">
             <select name="status" class="form-control">
                <option value=""> Choose Status--- </option>
                <option value="1" {{ old('status',request('status')) == '1' ? 'selected': '' }}>Active</option>
                <option value="0" {{ old('status',request('status')) == '0' ? 'selected': '' }}>Inactive</option>
            </select>

            </div>
        </div>
        <div class="col-2">
            <div class="form-group">
                <select name="sort_by" class="form-control">
                <option value=""> Sort By--- </option>
                <option value="title" {{ old('sort_by',request('sort_by')) == 'title' ? 'selected': '' }}>title</option>
                <option value="created_at" {{ old('sort_by',request('sort_by')) == 'created_at' ? 'selected': '' }}>created at</option>
            </select>
            </div>
        </div>
        <div class="col-2">
            <div class="form-group">
                <select name="order_by" class="form-control">
                <option value=""> Order By --- </option>
                <option value="asc" {{ old('order_by',request('order_by')) == 'asc' ? 'selected': '' }}>asc</option>
                <option value="desc" {{ old('order_by',request('order_by')) == 'desc' ? 'selected': '' }}>desc</option>
                 </select>
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
            </div>
        </div>
        <div class="col-1">
            <div class="form-group">
                <button type="submit" class="btn btn-link">Search</button>
            </div>
        </div>
    </div>
    </form>
</div>
