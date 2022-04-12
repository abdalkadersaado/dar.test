@extends('layouts.admin')
@section('content')

    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex">
            <h6 class="m-0 font-weight-bold text-primary">{{ $message->name }}</h6>
            <div class="ml-auto">
                <a href="{{ route('admin.Quote.index') }}" class="btn btn-primary">
                    <span class="icon text-white-50">
                        <i class="fa fa-home"></i>
                    </span>
                    <span class="text">Quotes</span>
                </a>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table table-hover">
                <tbody>
                    <tr>
                        <th>Name</th>
                        <td>{{ $message->name }}</td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td>{{ $message->email }}</td>
                    </tr>
                    <tr>
                        <th>mobile</th>
                        <td>{!! $message->mobile !!}</td>
                    </tr>
                     <tr>
                        <th>company Name</th>
                        <td>{!! $message->company_name !!}</td>
                    </tr>
                     <tr>
                        <th>Service's Name</th>
                        <td> {{ $message->service->name()  }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

@endsection
