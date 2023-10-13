<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Responsive Admin &amp; Dashboard Template based on Bootstrap 5">
    <meta name="author" content="AdminKit">
    <meta name="keywords"
        content="adminkit, bootstrap, bootstrap 5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">
    <link rel="shortcut icon" href="img/logo.png" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="shortcut icon" href="img/icons/icon-48x48.png" />

    <link rel="canonical" href="https://demo-basic.adminkit.io/ui-buttons.html" />
    <title>{{ $title }}</title>

    <!-- Layout styles -->
    <link href="{{ url('assets/css/app.css') }}" rel="stylesheet">

    <link rel="shortcut icon" href="/img/logo.png" type="image/x-icon">
    <!-- End layout styles -->
    <link rel="stylesheet" href="{{ url('assets/plugins/select2/select2.min.css') }}">
    <link rel="stylesheet"
        href="{{ url('assets/plugins/select2-bootstrap-theme-master/dist/select2-bootstrap.css') }}">
    <link rel="stylesheet" href="{{ url('assets/plugins/sweetalert/sweetalert.css') }}">
    <link rel="stylesheet"
        href="{{ url('assets/plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css') }}">
    <link rel="stylesheet" href="{{ url('assets/plugins/sweetalert/sweetalert.css') }}">
    <link rel="stylesheet" href="{{ url('assets/css/o-style.css') . getDateLink() }}">
    <link rel="stylesheet" href="{{ url('assets/css/custom-pondok.css') . getDateLink() }}">
    <link href="//fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
    <link href="//cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="//cdn.datatables.net/buttons/2.1.0/css/buttons.dataTables.min.css">
    <link rel="stylesheet" href="//cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="shortcut icon" href="{{ url('assets/images/favicon.ico') }}" type="image/">

    <style>
        /* .active {
            color: #555555 !important;
        } */
        /* .isilink {
            color: #fff !important;
        } */
        .input-group>.select2-container--bootstrap4 {
            width: auto !important;
            flex: 1 1 auto !important;
        }

        .input-group>.select2-container--bootstrap4 .select2-selection--single {
            height: 100% !important;
            line-height: inherit !important;
        }

        .aktif {
            color: #39AB9B !important;
        }
    </style>
</head>

<body>
    <div class="wrapper">
        @include('layouts/sidebar')

        <div class="main" >

            @include('layouts/main-header')
            <main class="content"  style="background-image: url('/img/masjidweb.png'); background-size:cover; background-position: 90% 90%;" >
                <br><br>
                @include('layouts/content-wrapper')
            </main>
            <footer class="footer">
                @include('layouts/footer')
            </footer>

        </div>
    </div>
    <!-- jQuery -->
    <script src="{{ url('assets/plugins/jquery/jquery.min.js') }}"></script>
    <!-- plugins:js -->
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="{{ url('assets/js/off-canvas.js') }}"></script>
    <script src="{{ url('assets/js/hoverable-collapse.js') }}"></script>
    <script src="{{ url('assets/js/misc.js') }}"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <!-- <script src="{{ url('assets/js/dashboard.js') }}"></script> -->
    <!-- <script src="{{ url('assets/js/todolist.js') }}"></script> -->
    <script src="//code.jquery.com/jquery.js"></script>
    <!-- DataTables -->
    <script src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>
    
    <script src="{{ url('assets/plugins/jquery-validation/jquery.validate.min.js') }}"></script>
    <script src="{{ url('assets/plugins/p-loading-master/dist/js/p-loading.min.js') }}"></script>
    <script src="{{ url('assets/js/o-script.js') . getDateLink() }}"></script>

    <!-- <script src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.html5.min.js"></script> -->
    <script src="https://cdn.datatables.net/buttons/2.0.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.print.min.js"></script>
    <!-- select2 -->

    <script src="{{ url('assets/plugins/moment/moment.min.js') }}"></script>
    <script src="{{ url('assets/plugins/select2/select2.min.js') }}"></script>
    <script src="{{ url('assets/plugins/sweetalert/sweetalert.min.js') }}"></script>
    <script src="{{ url('assets/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js') }}">
    </script>
    <!-- <script type="text/javascript" src="//cdn.datatables.net/buttons/1.3.1/js/dataTables.buttons.min.js"></script> -->
    <script type="text/javascript" src="//cdn.datatables.net/buttons/2.0.1/js/dataTables.buttons.min.js"></script>
    <!-- <script type="text/javascript" src="//cdn.datatables.net/buttons/1.3.1/js/buttons.html5.min.js"></script> -->
    <script type="text/javascript" src="//cdn.datatables.net/buttons/2.0.1/js/buttons.html5.min.js"></script>
    <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>

    <script src="{{ url('assets/js/app.js') }}"></script>
    <!-- End custom js for this page -->
    @yield('javascripts')
    <script type="text/javascript">
        $(function() {
            CekKonfirmasi('{{ Session::get('error') }}', '{{ Session::get('success') }}')
        })
    </script>
    <!-- App scripts -->
    @stack('scripts')
</body>

</html>
