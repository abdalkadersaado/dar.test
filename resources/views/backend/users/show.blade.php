@extends('layouts.admin')

@section('content')



    <div class="card shadow mb-4">

        <div class="card-header py-3 d-flex">
            <h6 class="m-0 font-weight-bold text-primary">{{ __('BackEnd/user.User') }} ({{ $user->name }})</h6>
            <div class="ml-auto">
                <a href="{{ route('admin.users.index') }}" class="btn btn-primary">
                    <span class="icon text-white-50">
                        <i class="fa fa-home"></i>
                    </span>
                    <span class="text">{{ __('BackEnd/user.users') }}</span>
                </a>
            </div>
        </div>
            <div class="container ">
                <div class="row card shadow mb-4">
                    <div class="col-lg-6 ">
                        <!-- <h6></h6> -->
                        <h2>Profile</h2>
                    </div>
                </div>
            </div>
        <div class="container">

                <div class="row">
                     @if ($user->user_image != '')
                                <img src="{{ asset('assets/users/' . $user->user_image) }}" class="img-fluid">
                            @else
                                <img src="{{ asset('assets/users/default.png') }}" class="img-fluid">
                            @endif
                </div>
                <br>
                <div class="row ">
                    <div class="col-3">

                        <span>{{ __('BackEnd/user.name') }} :</span>
                        <span>{{ $user->name }} ({{ $user->username }})</span>
                    </div>
                    <div class="col-3">

                        <span>{{ __('BackEnd/user.username') }} :</span>
                        <span>{{ $user->username }}</span>
                    </div>
                    <div class="col-3">
                        <th>{{ __('BackEnd/user.email') }}:</th>
                        <td>{{ $user->email }}</td>

                    </div>
                    <div class="col-3">
                        <span>{{ __('BackEnd/user.mobile') }} :  </span>
                        <span>{{ $user->mobile }}</span>
                    </div>
                    <div class="col-3">
                        <span>{{ __('BackEnd/user.status') }} :  </span>
                        <span>{{ $user->status() }}</span>
                    </div>
                    <br><br>
                    <div class="col-3">
                          <span>{{ __('BackEnd/user.created_at') }} : </span>
                        <span>{{ $user->created_at->format('d-m-Y h:i a') }}</span>
                    </div>

                </div>
                <hr>
                <br>
                 <div class="row card shadow mb-4">
                <div class="col-12">
                         <form action="{{ route('admin.update_assign_auditor',$user->id) }}" method="post" >
                        @csrf

                        <label for="assign_editor">Assign Auditor</label>
                        <select name="assign_editor" class="form-control">
                            <option value="">---</option>
                            @foreach ($editors as $editor )
                                <option value="{{ $editor->id }}" {{ old('assign_editor',$user->assign_editor) == $editor->id ? 'selected' : '' }} >{{ $editor->name }}</option>
                                {{-- <option value="{{ $editor->id }}" {{ old('category_id') == $editor->id ? 'selected': '' }}>{{ $editor->name }}</option> --}}
                            @endforeach

                        </select>
                        @error('assign_editor')<span class="text-danger">{{ $message }}</span>@enderror

                            <div class="form-group pt-4">
                                <button type="submit" class="btn btn-primary">{{ __('BackEnd/user.Update') }}</button>
                            </div>
                        <hr>
                             <label for="category_id">Category</label>
                            <select name="category_id" class="form-control">
                                <option value=""> --- </option>
                                @foreach ($categories as $cat )
                                <option value="{{ $cat->id }}" {{ old('category_id',$user->category_id) == $cat->id ? 'selected': '' }}>{{ $cat->name() }}</option>
                                @endforeach
                            </select>
                            @error('category_id')<span class="text-danger">{{ $message }}</span>@enderror
                            <div class="form-group pt-4">
                                <button type="submit" class="btn btn-primary">{{ __('BackEnd/user.Update') }}</button>
                            </div>
                            </form>

                </div>
            </div>

                <hr>
                <br>
                <div class="row ">
                <div class="col-6 card shadow mb-4">
                     <h4 class="main">Company Information:</h4>
                </div>

            </div>

                <div class="row card shadow mb-4">

                    <div class="col-3">
                        <p class="supo">Company Name <span>{{ $user->company_name }}</span></p>
                    </div>
                    <div class="col-3">
                        <p class="supo">Trade License Number: <span>{{ $user->license_number }}</span></p>
                    </div>
                    <div class="col-3">
                        <p class="supo">Trade License Attachment: <span>{{ $user->Commercial_Register }}</span></p>
                    </div>
                    <div class="col-3">
                        <p class="supo">MOA Attachment: <span>{{ $user->MOA }}</span></p>
                    </div>
                    <div class="col-6">
                    <div>
                          <a class="btn btn-outline-success btn-sm btn_submit"
                        href="{{ url('view-trade-license') }}/{{ $user->id }}/{{ $user->Commercial_Register }}"
                        target="_blank"
                        ><i class="fas fa-eye"></i>&nbsp;
                        Show Trade License
                    </a>
                     <a class="btn btn-outline-success btn-sm btn_submit"
                        href="{{ url('view-MOA') }}/{{ $user->id }}/{{ $user->MOA }}"
                        target="_blank"
                        ><i class="fas fa-eye"></i>&nbsp;
                        Show MOA
                    </a>
                    <br><br>
                    </div>
                    </div>
            </div>
            <hr>

            <div class="row ">
                <div class="col-6 card shadow mb-4">
                     <h4 class="main">Contract Details:</h4>
                </div>

            </div>
            <div class="row card shadow mb-4">

                 <div class="col-6">
                    <p class="supo">Contract Approval Date: <span>{{ $user->date_contract }}</span></p>
                </div>
                 <div class="col-6">
                    <p class="supo">Contract Attachment: <span>{{ $user->contract_pdf }}</span></p>
                </div>
                <div class="col-8">
                    <a class="btn btn-outline-success btn-sm btn_submit"
                                href="{{ url('view-contract') }}/{{ $user->id }}/{{ $user->contract_pdf }}"
                                target="_blank"
                                ><i class="fas fa-eye"></i>&nbsp;
                                Show  Contract
                    </a>
                    <br><br>
                </div>

            </div>
            <hr>

             <div class="row ">
                <div class="col-6 card shadow mb-4">
                     <h4 class="main">About the Owners:</h4>
                </div>
            </div>

            <div class="row card shadow mb-4">
                    <div class="col-4">
                        <p class="supo">Passport Number: <span>{{ $user->passport_number }}</span></p>
                    </div>
                    <div class="col-4">
                        <p class="supo">Expiry Date: <span>{{ $user->expiry_date_passport }}</span></p>
                    </div>
                    <div class="col-4">
                        <p class="supo">ID Number: <span>{{ $user->id_number }}</span></p>
                    </div>
                    <div class="col-4">
                        <p class="supo">Expiry Date: <span>{{ $user->expiry_date }}</span></p>
                    </div>
                    <div class="col-4">
                        <p class="supo">Visa attachement: <span>{{ $user->emirates_id }}</span></p>
                    </div>
                    <div class="col-4">
                        <a class="btn btn-outline-success btn-sm btn_submit"
                            href="{{ url('view-visa') }}/{{ $user->id }}/{{ $user->emirates_id }}"
                            target="_blank"
                            ><i class="fas fa-eye"></i>&nbsp;
                            Show File Visa
                        </a>
                        <br> <br>
                    </div>
            </div>
            <hr>
            <br>
            <div class="row card shadow mb-4">
                <div class="col-6 card shadow mb-4">
                    <span>Status Order :  </span>
                        <span>
                            @if($user->status_order == 1)
                            <span>Under Processing</span>
                            @elseif ($user->status_order == 2 )
                                <span>Accepted</span>
                            @else
                            <td>No Found any File Uploaded from User Yet</td>
                            @endif
                        </span>
                </div>
                <div class="col-6 card shadow mb-4">
                        <span> Change Status Order</span>
                        <br>
                        <span>
                             @if($user->status_order == 1)
                                <form action="{{ route('admin.order.accepted',$user->id) }}" method="post">
                                    @csrf
                                    <button type="submit" class="btn btn-outline-success btn-sm btn_submit"> Tanslate to Accepted</button>
                                    <br> <br>
                                </form>
                            @else
                                <form action="{{ route('admin.order.under_processing',$user->id) }}" method="post">
                                    @csrf
                                    <button type="submit" class="btn btn-outline-success ">Translate to under processing</button>
                                    <br> <br>
                                </form>
                            @endif
                        </span>
                </div>
            </div>
            <hr>
            <br>
            <div class="row ">
                <div class="col-6 card shadow mb-4">
                    <h4 class="main">Requirments Financial Report:</h4>
                </div>
            </div>
            <br>
            <div class="row  shadow">
                <div class="col-6 ">
                    @if ($financial_file === null)
                        <div class="row">

                                <div class="col-3 ">
                                    <img src="" width="60">
                                </div>
                        </div>

                    @else
                        @forelse ($financial_file as $f_file)

                        <div class="row card shadow mb-4">

                            <div class="col-12">
                                <p>Uploaded from : {{ $f_file->user->name  }}</p>
                            </div>
                            <div class="col-12">
                            <p>  Created At : {{ $f_file->created_at->format('M d Y h:i a') }} </p>
                            </div>

                            <div class="col-12">
                                <p>Name File :{{ $f_file->financial  }}</p>

                            </div>

                            <div class="col-6 card shadow">
                                <a class="btn btn-outline-success btn-sm"
                                    href="{{ url('View_file') }}/{{ $f_file->upload_to }}/{{ $f_file->financial }}"
                                    target="_blank"
                                    ><i class="fas fa-eye"></i>&nbsp;
                                    Show File
                                </a>
                                <a class="btn btn-outline-warning btn-sm"
                                        href="{{ url('download') }}/{{ $f_file->upload_to  }}/{{ $f_file->financial }}">
                                        <i class="fas fa-download"></i>&nbsp;
                                        Download File
                                </a>
                                <a class="btn btn-outline-info btn-sm"
                                    href="{{ route('users.show_financial_report',$f_file->id) }}">
                                    <i class="fas fa-comment"></i>&nbsp;
                                    Open Comments
                                </a>

                                <button href="javascript:void(0)"
                                    onclick="if (confirm('Are you sure to delete this file?') ) { document.getElementById('user-delete-{{ $f_file->id }}').submit(); } else { return false; }"
                                    class="btn btn-outline-danger btn-sm "><i class="fa fa-trash"></i>
                                    Delete
                                </button>
                                <br>
                                <form action="{{ route('users.delete_file', $f_file->id) }}" method="post" id="user-delete-{{ $f_file->id }}" style="display: none;">
                                            @csrf
                                            @method('DELETE')
                                </form>
                            </div>
                        </div>

                        @empty
                                <br>
                                <h5>No Financial Report found</h5>
                        @endforelse
                    @endif
                </div>

                <div class="col-6  ">
                    <div class="row card shadow mb-4">
                    <div class="col-6 ">
                        <form action="{{ route('users.financial.store',$user->id) }}"  method="Post" autocomplete="off" enctype="multipart/form-data">
                            @csrf
                            <div class="row ">
                                <div class="col-12 ">
                                    <br>
                                    <label for="financial_report1" class="supo"><b>Upload Requirments  as PDF</b> </label>
                                    <br><br>
                                    <input type="file" name="financial_report1" class="form-control">
                                    @error('financial_report1')<span class="text-danger">{{ $message }}</span>@enderror
                                </div>

                            </div>
                            <br>
                            <div class="row">
                                <div class="col-6">
                                    <button type="submit" name="update_information" class="btn btn-primary">Upload File</button>
                                    <br>
                                </div>
                            </div>
                            <br>
                        </form>
                    </div>
                </div>
                </div>

            </div>

                <div class="row card shadow mb-4 align-items-center">

                    <div class="">
                        @if ($financial_file_final === null)
                            <div class="">
                                {{-- <h5 >No Financial Report found</h5> --}}
                            </div>
                        @else
                        <br>
                            <h4 class="name-tit ">Financial Report</h4>
                            <hr>
                            <div class="col-md-12">
                                    <p class="supo"> Name Financial Report: <span>{{ $financial_file_final->financial  }}</span> </p>
                                <a class="btn btn-outline-success btn-sm"
                                    href="{{ url('View_file') }}/{{ $financial_file_final->upload_to }}/{{ $financial_file_final->financial }}"
                                    target="_blank"
                                    ><i class="fas fa-eye"></i>&nbsp;
                                    Show File Financial Report
                                </a>
                                <br>
                                <br>
                                <a class="btn btn-outline-info btn-sm"
                                        href="{{ url('download') }}/{{ $financial_file_final->upload_to  }}/{{ $financial_file_final->financial }}">
                                        <i class="fas fa-download"></i>&nbsp;
                                        Download File Financial Report
                                </a>
                                <br>
                                <br>
                                <a class="btn btn-outline-warning btn-sm"
                                    href="{{ route('users.show_financial_report',$financial_file_final->id) }}">
                                    <i class="fas fa-comment"></i>&nbsp;
                                    Comments on Financial Report
                                </a>
                                <button href="javascript:void(0)"
                                    onclick="if (confirm('Are you sure to delete this file?') ) { document.getElementById('user-delete-{{ $financial_file_final->id }}').submit(); } else { return false; }"
                                    class="btn btn-outline-danger btn-sm "><i class="fa fa-trash"></i>
                                    Delete
                                </button>
                                <form action="{{ route('users.delete_file', $financial_file_final->id) }}" method="post" id="user-delete-{{ $financial_file_final->id }}" style="display: none;">
                                            @csrf
                                            @method('DELETE')
                                </form>
                            </div>
                            <br>
                        @endif
                    </div>
                </div>

    </div>
</div>


@endsection

