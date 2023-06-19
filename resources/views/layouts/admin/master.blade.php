<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>task</title>
    <!--  fontawosome cdn -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
        integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Bootstrap Css -->
    <link href="{{ URL::asset('assets/admin/assets/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet"
        type="text/css" />
    <!-- Icons Css -->
    <link href="{{ URL::asset('assets/admin/assets/css/icons.css') }}" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{ URL::asset('assets/admin/assets/css/app.min.css') }}" id="app-style" rel="stylesheet"
        type="text/css" />
</head>

<body data-sidebar="dark">

    <!-- Begin page -->
    <div id="layout-wrapper">

        @include('layouts.admin.partial.topbar')

        @include('layouts.admin.partial.leftside_menu')
        <!-- page content -->
        <div class="main-content">
            <div class="page-content">
                <div class="container-fluid">
                    @yield('page_content')
                </div>
            </div>
        </div>
    </div>
    @include('layouts.admin.partial.footer')

    <!-- END wrapper -->
    @include('layouts.vendor-scripts')

    {{-- <script>
        var resizefunc = [];
    </script> --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script type="text/javascript">
        var url = "{{ route('lang.change') }}";
        $('.lang-change').change(function() {
            let lang_code = $(this).val();
            window.location.href = url + "?lang=" + lang_code;
        });
    </script>
    <script src="{{ asset('assets/admin/assets/libs/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/admin/assets/libs/datatables.net-select-bs4/js/select.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/admin/assets/libs/metismenu/metisMenu.min.js') }}"></script>
    <script src="{{ asset('assets/admin/assets/libs/simplebar/simplebar.min.js') }}"></script>
    <script src="{{ asset('assets/admin/assets/libs/node-waves/waves.min.js') }}"></script>
    <script src="{{ asset('assets/admin/assets/libs/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ asset('assets/admin/assets/js/pages/dashboard.init.js') }}"></script>
    {{-- <script src="{{ asset('assets/admin/assets/js/app.js') }}"></script> --}}
    <script src="{{ asset('assets/admin/assets/libs/parsleyjs/parsley.min.js') }}"></script>
    <script src="{{ asset('assets/admin/assets/js/pages/form-validation.init.js') }}"></script>
    {{-- custom js --}}
    <script src="{{ asset('assets/admin/assets/custom/custom.js') }}"></script>
</body>

</html>
