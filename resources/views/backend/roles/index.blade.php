@extends('layouts.admin')
@section('content')

    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex">
            <h6 class="m-0 font-weight-bold text-primary">Posts Categories</h6>
            <div class="ml-auto">
                <a href="{{ route('admin.roles.create') }}" class="btn btn-primary">
                    <span class="icon text-white-50">
                        <i class="fa fa-plus"></i>
                    </span>
                    <span class="text">Add new role</span>
                </a>
            </div>
        </div>

        @include('backend.roles.filter.filter')

        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th>{{ __('BackEnd/roles.Name') }}</th>
                    <th>{{ __('BackEnd/roles.Display_Name') }}</th>
                    <th>{{ __('BackEnd/roles.Allowed_Route') }}</th>
                    <th>{{ __('BackEnd/roles.Created_at') }}</th>
                    <th class="text-center" style="width: 30px;">{{ __('BackEnd/roles.Actions') }}</th>
                </tr>
                </thead>
                <tbody>
                @forelse($roles as $role)
                    <tr>
                        <td>{{ $role->name }}</td>
                        <td>{{ $role->display_name() }}</td>
                        <td>{{ $role->allowed_route}}</td>
                        <td>{{ $role->created_at->format('d-m-Y h:i a') }}</td>
                        <td>
                            <div class="btn-group">
                                <a href="{{ route('admin.roles.edit', $role->id) }}" class="btn btn-primary"><i class="fa fa-edit"></i></a>
                                <a href="javascript:void(0)" onclick="if (confirm('Are you sure to delete this role?') ) { document.getElementById('role-delete-{{ $role->id }}').submit(); } else { return false; }" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                                <form action="{{ route('admin.roles.destroy', $role->id) }}" method="post" id="role-delete-{{ $role->id }}" style="display: none;">
                                    @csrf
                                    @method('DELETE')
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center">{{ __('BackEnd/roles.No_Roles_found') }}</td>
                    </tr>
                @endforelse
                </tbody>
                <tfoot>
                <tr>
                    <th colspan="5">
                        <div class="float-right">
                            {!! $roles->links() !!}
                        </div>
                    </th>
                </tr>
                </tfoot>
            </table>
        </div>
    </div>


@endsection
