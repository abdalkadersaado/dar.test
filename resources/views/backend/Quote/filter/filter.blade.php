<div class="card-body">

    <form action="{{ route('admin.contact_us.index') }}" method="get">


    <div class="row">
        <div class="col-2">
            <div class="form-group">
                <input type="text" name="keyword" value="{{ old('keyword',request('keyword')) }}" class="form-control" autocomplete="off" placeholder="{{ __('BackEnd/contact_us.search_here') }}">
            </div>
        </div>
        <div class="col-2">
            <div class="form-group">
                <select name="status" class="form-control">
                    <option value=""> --- </option>
                    <option value="1" {{ old('status',request('status')) == '1' ? 'selected': '' }}>{{ __('backend/contact_us.active') }}</option>
                    <option value="0" {{ old('status',request('status')) == '0' ? 'selected': '' }}>{{ __('backend/contact_us.inactive') }}</option>
                </select>
                 @error('status')<span class="text-danger">{{ $message }}</span>@enderror
            </div>
        </div>
        <div class="col-2">
            <div class="form-group">
                <select name="sort_by" class="form-control">
                    <option value=""> --- </option>
                    <option value="id" {{ old('sort_by',request('sort_by')) == 'id' ? 'selected': '' }}>{{ __('BackEnd/contact_us.id') }}</option>
                    <option value="name" {{ old('sort_by',request('sort_by')) == 'created_at' ? 'selected': '' }}>{{ __('BackEnd/contact_us.name') }}</option>
                    <option value="created_at" {{ old('sort_by',request('sort_by')) == 'created_at' ? 'selected': '' }}>{{ __('BackEnd/contact_us.created_at') }}</option>
                </select>
                 @error('sort_by')<span class="text-danger">{{ $message }}</span>@enderror
            </div>
        </div>
        <div class="col-2">
            <div class="form-group">
                <select name="order_by" class="form-control">
                <option value=""> --- </option>
                <option value="asc" {{ old('order_by',request('order_by')) == 'asc' ? 'selected': '' }}>{{ __('BackEnd/contact_us.ascending') }}</option>
                <option value="desc" {{ old('order_by',request('order_by')) == 'desc' ? 'selected': '' }}>{{ __('BackEnd/contact_us.descending') }}</option>
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
                <button type="submit" class="btn btn-link">{{ __('BackEnd/contact_us.search') }}</button>
            </div>
        </div>
    </div>
     </form>
</div>
