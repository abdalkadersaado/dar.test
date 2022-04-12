@extends('layouts.admin')
@section('content')

    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex">
            <h6 class="m-0 font-weight-bold text-primary">{{ __('BackEnd/user.Edit_user') }} ({{ $user->name }})</h6>
            <div class="ml-auto">
                <a href="{{ route('admin.users.index') }}" class="btn btn-primary">
                    <span class="icon text-white-50">
                        <i class="fa fa-home"></i>
                    </span>
                    <span class="text">{{ __('BackEnd/user.users') }}</span>
                </a>
            </div>
        </div>
        <div class="card-body">

            <form action="{{ route('admin.users.update',$user->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PATCH')

            <div class="row">
                <div class="col-3">
                    <div class="form-group">
                        <label for="name">{{ __('BackEnd/user.name') }}</label>
                        <input type="text" name="name" value="{{ old('name',$user->name) }}" class="form-control">
                        @error('name')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <label for="username">{{ __('BackEnd/user.username') }}</label>
                        <input type="text" name="username" value="{{ old('name',$user->username) }}" class="form-control">
                        @error('username')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <label for="email">{{ __('BackEnd/user.email') }}</label>
                        <input type="text" name="email" value="{{ old('email',$user->email) }}" class="form-control">
                        @error('email')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                         <label for="mobile">{{ __('BackEnd/user.mobile') }}</label>
                        <input type="text" name="mobile" value="{{ old('mobile',$user->mobile) }}" class="form-control">
                        @error('mobile')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                </div>

            </div>

            <div class="row">
                <div class="col-3">
                    <div class="form-group">
                        <label for="password">{{ __('BackEnd/user.password') }}</label>
                        <input type="text" name="password"  class="form-control">

                        @error('password')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <label for="statsus">{{ __('BackEnd/user.status') }}</label>
                        <select name="status" class="form-control">
                            <option value=""> --- </option>
                            <option value="1" {{ old('status',$user->status) == '1' ? 'selected': '' }}>{{ __('BackEnd/user.active') }}</option>
                            <option value="0" {{ old('status ',$user->status) == '0' ? 'selected': '' }}>{{ __('BackEnd/user.inactive') }}</option>
                     </select>
                        @error('status')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="receive_email">{{ __('BackEnd/user.Receive_Email') }}</label>
                        <select name="receive_email" class="form-control">
                            <option value=""> --- </option>
                            <option value="1" {{ old('receive_email', $user->receive_email) == '1' ? 'selected': '' }}>{{ __('BackEnd/user.yes') }}</option>
                            <option value="0" {{ old('receive_email ', $user->receive_email) == '0' ? 'selected': '' }}>{{ __('BackEnd/user.no') }}</option>
                         </select>
                        @error('receive_email')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="form-group">
                        <label for="bio">{{ __('BackEnd/user.Bio') }}</label>
                        <textarea name="bio" rows="5" class="form-control">{{ old('bio',$user->bio) }}</textarea>
                        @error('bio')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                </div>
            </div>

            <div class="row pt-4">
                @if ($user->user_image != '')
                    <div class="col-12">
                        <div id="imgArea">
                            <img src="{{ asset('assets/users/' . $user->user_image) }}" width="200" height="200">
                            <br>
                            <button class="btn btn-danger removeImage">{{ __('BackEnd/user.Remove_Image') }}</button>
                        </div>
                    </div>
                @endif

                <div class="col-12">
                    <label for="user_image">{{ __('BackEnd/user.User_Image') }}</label>
                    <br>
                    <div class="file-loading">
                        <input type="file" name="user_image" id="user-image" class="file-input-overview">
                        <span class="form-text text-muted">{{ __('BackEnd/user.Image_width') }}</span>
                        @error('user_image')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                </div>
            </div>

            <br>
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="client_top">Change Client's Status to Top Client</label>
                        <select name="client_top" class="form-control">
                            <option value=""> --- </option>
                            <option value="0" {{ old('client_top',request('client_top',$user->client_top)) == '0' ? 'selected': '' }}>Normal Client</option>
                            <option value="1" {{ old('client_top',request('client_top',$user->client_top)) == '1' ? 'selected': '' }}>As a Top client</option>
                        </select>
                        @error('client_top')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="sequential_order">Ordering Top Clients on Home Page</label>
                        <select name="sequential_order" class="form-control">
                            <option value=""> --- </option>
                            <option value="1" {{ old('sequential_order',request('sequential_order',$user->sequential_order)) == '1' ? 'selected': '' }}>1</option>
                            <option value="2" {{ old('sequential_order',request('sequential_order',$user->sequential_order)) == '2' ? 'selected': '' }}>2</option>
                            <option value="3" {{ old('sequential_order',request('sequential_order',$user->sequential_order)) == '3' ? 'selected': '' }}>3</option>
                            <option value="4" {{ old('sequential_order',request('sequential_order',$user->sequential_order)) == '4' ? 'selected': '' }}>4</option>
                            <option value="5" {{ old('sequential_order',request('sequential_order',$user->sequential_order)) == '5' ? 'selected': '' }}>5</option>
                            <option value="6" {{ old('sequential_order',request('sequential_order',$user->sequential_order)) == '6' ? 'selected': '' }}>6</option>
                            <option value="7" {{ old('sequential_order',request('sequential_order',$user->sequential_order)) == '7' ? 'selected': '' }}>7</option>
                            <option value="8" {{ old('sequential_order',request('sequential_order',$user->sequential_order)) == '8' ? 'selected': '' }}>8</option>
                            <option value="9" {{ old('sequential_order',request('sequential_order',$user->sequential_order)) == '9' ? 'selected': '' }}>9</option>
                            <option value="10" {{ old('sequential_order',request('sequential_order',$user->sequential_order)) == '10' ? 'selected': '' }}>10</option>
                            <option value="11" {{ old('sequential_order',request('sequential_order',$user->sequential_order)) == '11' ? 'selected': '' }}>11</option>
                            <option value="12" {{ old('sequential_order',request('sequential_order',$user->sequential_order)) == '12' ? 'selected': '' }}>12</option>

                        </select>
                        @error('sequential_order')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                </div>
            </div>

             <div class="row">
                <div class="col-12">
                    <div class="form-group">
                        <label for="status_order">Change status Order</label>
                        <select name="status_order" class="form-control">
                            <option value="">---</option>
                            <option value="1" {{ old('status_order',$user->status_order) == '1' ? 'selected': '' }}>{{ __('BackEnd/user.under_processing') }}</option>
                            <option value="2" {{ old('status_order ',$user->status_order) == '2' ? 'selected': '' }}>{{ __('BackEnd/user.accepted') }}</option>
                        </select>
                        @error('status_order')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                </div>
            </div>

            <br>
             <div class="row">
                <div class="col-12">
                    <div class="form-group">
                        <label for="assign_editor">Assign Editor</label>
                        <select name="assign_editor" class="form-control">
                            <option value="">---</option>
                            @foreach ($editors as $editor )
                                <option value="{{ $editor->id }}" {{ old('assign_editor',$user->assign_editor) == $editor->id ? 'selected' : '' }} >{{ $editor->name }}</option>
                                {{-- <option value="{{ $editor->id }}" {{ old('category_id') == $editor->id ? 'selected': '' }}>{{ $editor->name }}</option> --}}
                            @endforeach

                        </select>
                        @error('assign_editor')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                </div>
            </div>
            <div class="form-group pt-4">
                <button type="submit" class="btn btn-primary">{{ __('BackEnd/user.Update') }}</button>
            </div>
           </form>
        </div>
    </div>

@endsection
@section('script')
    <script>
        $(function () {
            $('#user-image').fileinput({
                theme: "fas",
                maxFileCount: 1,
                allowedFileTypes: ['image'],
                showCancel: true,
                showRemove: false,
                showUpload: false,
                overwriteInitial: false,
            });

            $('.removeImage').click(function () {
                $.post('{{ route('admin.users.remove_image') }}', { user_id: '{{ $user->id }}', _token: '{{ csrf_token() }}' }, function (data) {
                    if (data == 'true') {
                        window.location.href = window.location;
                    }
                })

            });
        });
    </script>
@endsection
