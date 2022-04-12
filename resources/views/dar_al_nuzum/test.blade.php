<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="userId" content="{{ auth()->check() ? auth()->id() : '' }}">
    <meta name="google-site-verification" content="TnunRtMf8FvxqLPZTojf5-82qJaWhe-J5ahWbd69v3c" />

    <title>{{ config('app.name', 'Laravel') }}</title>
    <meta name="description" content="">
    <link rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Poppins:200,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900">

    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

    <link rel="stylesheet" href="{{ asset('DAR-ALNUZUM1/app.css') }}">
    <link rel="stylesheet" href="{{ asset('DAR-ALNUZUM1/wizard.css') }}">

    @if (App::getLocale() == 'en')
    <link href="{{ URL::asset('DAR-ALNUZUM1/ltr.css') }}" rel="stylesheet">
    @else
    <link href="{{ URL::asset('DAR-ALNUZUM1/rtl.css') }}" rel="stylesheet">
    @endif



</head>
<body>


    <div class="row">

        <div class="content-wrapper">
            <div class="page-title">
            </div>
            <div class="row">
                <div class="col-xl-12 mb-30">
                    <div class="card card-statistics h-100">
                        <form class="row mb-30" action="{{ route('dar.test.post') }}" method="post">
                            @csrf
                            <div class="card-body">
                                <h5 class="card-title">Partners</h5>

                                <div class="repeater">
                                    <div data-repeater-list="List_Classes">
                                        <div data-repeater-item>
                                            <div class="row">
                                                <div class="col-lg-2">
                                                        {{-- <label for="passport_number">Passport Number</label> --}}
                                                        <input class="form-control" name="passport_number" type="number" placeholder="Passport Number" />
                                                </div>

                                                <div class="col-lg-2">
                                                        {{-- <label for="expiry_date_passport">Expiry Date Passport</label> --}}
                                                        <input class="form-control" name="expiry_date_passport" type="date" placeholder="Expiry Date Passport"/>
                                                </div>

                                                <div class="col-lg-2">
                                                        {{-- <label for="id_number">ID Number</label> --}}
                                                        <input class="form-control" name="id_number" type="number" placeholder="ID Number"/>
                                                </div>

                                                <div class="col-lg-2">
                                                        {{-- <label for="expiry_date">Expiry Date</label> --}}
                                                        <input class="form-control" name="expiry_date" type="date" value="+(704) 279-1249"/>
                                                </div>

                                                <div class="col-lg-2">
                                                            {{-- <label for="emirates_id">Visa Attachement</label> --}}
                                                            <input type="file" name="emirates_id" class="form-control" placeholder="Visa attachment">
                                                </div>

                                                <div class="col-lg-2">
                                                        {{-- <label for="">Remove Row Partner</label> --}}
                                                        <input class="btn btn-danger btn-block" data-repeater-delete type="button" value="Delete"/>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-20">
                                        <div class="col-12">
                                            <input class="button" data-repeater-create type="button" value="Add new"/>
                                        </div>
                                    </div>

                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">
                                            close
                                        </button>
                                        <button type="submit"
                                            class="btn btn-success">
                                            Save Partner
                                        </button>
                                    </div>

                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


<!-- jquery -->
<script src="{{ URL::asset('DAR-ALNUZUM1/js/jquery-3.3.1.min.js') }}"></script>
<!-- plugins-jquery -->
<script src="{{ URL::asset('DAR-ALNUZUM1/js/plugins-jquery.js') }}"></script>
<!-- plugin_path -->
<script type="text/javascript">var plugin_path = '{{ asset('assets/js') }}/';</script>

<!-- chart -->
<script src="{{ URL::asset('DAR-ALNUZUM1/js/chart-init.js') }}"></script>
<!-- calendar -->
<script src="{{ URL::asset('DAR-ALNUZUM1/js/calendar.init.js') }}"></script>
<!-- charts sparkline -->
<script src="{{ URL::asset('DAR-ALNUZUM1/js/sparkline.init.js') }}"></script>
<!-- charts morris -->
<script src="{{ URL::asset('DAR-ALNUZUM1/js/morris.init.js') }}"></script>
<!-- datepicker -->
<script src="{{ URL::asset('DAR-ALNUZUM1/js/datepicker.js') }}"></script>
<!-- sweetalert2 -->
<script src="{{ URL::asset('DAR-ALNUZUM1/js/sweetalert2.js') }}"></script>
<!-- toastr -->
@yield('js')
<script src="{{ URL::asset('DAR-ALNUZUM1/js/toastr.js') }}"></script>
<!-- validation -->
<script src="{{ URL::asset('DAR-ALNUZUM1/js/validation.js') }}"></script>
<!-- lobilist -->
<script src="{{ URL::asset('DAR-ALNUZUM1/js/lobilist.js') }}"></script>
<!-- custom -->
<script src="{{ URL::asset('DAR-ALNUZUM1/js/custom.js') }}"></script>

<script>
    $(document).ready(function() {
        $('#datatable').DataTable();
    } );
</script>



@if (App::getLocale() == 'en')
    <script src="{{ URL::asset('DAR-ALNUZUM1/js/bootstrap-datatables/en/jquery.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('DAR-ALNUZUM1/js/bootstrap-datatables/en/dataTables.bootstrap4.min.js') }}"></script>
@else
    <script src="{{ URL::asset('DAR-ALNUZUM1/js/bootstrap-datatables/ar/jquery.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('DAR-ALNUZUM1/js/bootstrap-datatables/ar/dataTables.bootstrap4.min.js') }}"></script>
@endif

</body>
</html>
