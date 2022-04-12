@extends('layouts.admin')
@section('content')

    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex">
            <h6 class="m-0 font-weight-bold text-primary">{{__('BackEnd/user.status_order') }}</h6>

        </div>

        <div class="card-body">
    <form action="{{ route('admin.change-status') }}" method="get">

        <div class="row">

        <div class="col-2">
           <div class="form-group">
                <input type="text" name="keyword" value="{{ old('keyword',request('keyword')) }}" class="form-control" autocomplete="off" placeholder="{{ __('BackEnd/contact_us.search_here') }}">
            </div>
        </div>

        <div class="col-2">
            <div class="form-group">
                <select name="status_order" class="form-control">
                    <option value=""> Choose Status Order </option>
                    <option value="1" {{ old('status_order',request('status_order')) == '1' ? 'selected': '' }}>Under Processing</option>
                    <option value="2" {{ old('status_order',request('status_order')) == '2' ? 'selected': '' }}>Accepted</option>
                </select>
                 @error('status')<span class="text-danger">{{ $message }}</span>@enderror
            </div>
        </div>
        <div class="col-2">
           <div class="form-group">
                <select name="sort_by" class="form-control">
                    <option value="">Sort By</option>
                    <option value="id" {{ old('sort_by',request('sort_by')) == 'id' ? 'selected': '' }}>{{ __('BackEnd/user.id') }}</option>
                    <option value="name" {{ old('sort_by',request('sort_by')) == 'name' ? 'selected': '' }}>{{ __('BackEnd/user.name') }}</option>
                    <option value="created_at" {{ old('sort_by',request('sort_by')) == 'created_at' ? 'selected': '' }}>{{ __('BackEnd/user.created_at') }}</option>
                </select>
                 @error('sort_by')<span class="text-danger">{{ $message }}</span>@enderror
            </div>
        </div>
        <div class="col-2">
            <div class="form-group">
                <select name="order_by" class="form-control">
                <option value=""> Order By </option>
                <option value="asc" {{ old('order_by',request('order_by')) == 'asc' ? 'selected': '' }}>{{ __('BackEnd/user.asc') }}</option>
                <option value="desc" {{ old('order_by',request('order_by')) == 'desc' ? 'selected': '' }}>{{ __('BackEnd/user.desc') }}</option>
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
                <button type="submit" class="btn btn-link">{{ __('BackEnd/user.search') }}</button>
                </div>
        </div>
    </div>
    </form>
</div>


        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th>{{ __('BackEnd/user.image') }}</th>
                    <th>{{ __('BackEnd/user.name') }}</th>
                    <th>{{ __('BackEnd/user.email') }} & {{ __('backend/user.mobile') }}</th>

                    <th>{{ __('BackEnd/user.status_order') }}</th>
                    <th class="text-center" style="width: 30px;">{{ __('BackEnd/user.actions') }}</th>
                </tr>
                </thead>
                <tbody>
                @forelse($users as $user)
                    <tr>
                        <td>
                            @if ($user->user_image != '')
                                <img src="{{ asset('assets/users/' . $user->user_image) }}" width="60">
                            @else
                                <img src="{{ asset('assets/users/default.png') }}" width="60">
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('admin.users.show', $user->id) }}">{{ $user->name }}</a>
                            <p class="text-gray-400"><b>{{ $user->username }}</b></p>
                        </td>
                        <td>
                            {{ $user->email }}
                            <p class="text-gray-400"><b>{{ $user->mobile }}</b></p>
                        </td>
                        @if($user->status_order == 1)
                            <td>Under Processing</td>
                         @elseif ($user->status_order == 2 )
                            <td>Accepted</td>
                        @else
                        <td>null</td>
                        @endif
                        <td>

                            <div class="col-12">
                                 @if($user->status_order == 1)
                                    <form action="{{ route('admin.order.accepted',$user->id) }}" method="post">
                                        @csrf
                                        <button type="submit" class="btn btn-outline-success btn-sm "> Tanslate to Accepted</button>
                                    </form>
                                @else
                                    <form action="{{ route('admin.order.under_processing',$user->id) }}" method="post">
                                        @csrf
                                        <button type="submit" class="btn btn-outline-success btn-sm  ">Translate to under processing</button>
                                    </form>
                                @endif
                                <a href="{{ route('admin.users.show',$user->id) }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"> <i class="fa fa-eye"></i></a>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center">{{ __('BackEnd/user.no_users_found') }}</td>
                    </tr>
                @endforelse
                </tbody>
                <tfoot>
                <tr>
                    <th colspan="6">
                        <div class="float-right">
                            {!! $users->links() !!}
                        </div>
                    </th>
                </tr>
                </tfoot>
            </table>
        </div>
    </div>

@endsection
