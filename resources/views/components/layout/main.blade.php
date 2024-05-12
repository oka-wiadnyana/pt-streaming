<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title>Agroxa - Responsive Bootstrap 4 Admin Dashboard</title>
    <meta content="Admin Dashboard" name="description" />
    <meta content="Themesbrand" name="author" />
    <link rel="shortcut icon" href="{{ asset('template_assets') }}/images/favicon.ico">

    <link rel="stylesheet" href="{{ asset('template_assets') }}/morris/morris.css">

    <link href="{{ asset('template_assets') }}/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="{{ asset('template_assets') }}/css/icons.css" rel="stylesheet" type="text/css">
    <link href="{{ asset('template_assets') }}/css/style.css" rel="stylesheet" type="text/css">
    <link href="{{ asset('template_assets') }}/datatables.net-bs4/css/dataTables.bootstrap4.css" rel="stylesheet">
    <x-partials.tinymce-config />
    @stack('link')
</head>

<body>

    <!-- Navigation Bar-->
    <x-layout.header />
    <!-- End Navigation Bar-->

    <!-- page wrapper start -->
    <div class="wrapper">
        {{ $slot }}

    </div>
    <!-- page wrapper end -->

    <!-- Footer -->
    <x-layout.footer />
    <!-- End Footer -->


    <!-- jQuery  -->
    <script src="{{ asset('template_assets') }}/js/jquery.min.js"></script>
    <script src="{{ asset('template_assets') }}/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="{{ asset('template_assets') }}/datatable/datatable-basic.init.js"></script>

    <script src="{{ asset('template_assets') }}/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('template_assets') }}/js/jquery.slimscroll.js"></script>
    <script src="{{ asset('template_assets') }}/js/waves.min.js"></script>

    <script src="{{ asset('template_assets') }}/plugins/jquery-sparkline/jquery.sparkline.min.js"></script>

    <!-- Peity JS -->
    <script src="{{ asset('template_assets') }}/plugins/peity/jquery.peity.min.js"></script>

    <script src="{{ asset('template_assets') }}/plugins/morris/morris.min.js"></script>
    <script src="{{ asset('template_assets') }}/plugins/raphael/raphael-min.js"></script>

    <script src="{{ asset('template_assets') }}/pages/dashboard.js"></script>

    <!-- App js -->
    <script src="{{ asset('template_assets') }}/js/app.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @include('sweetalert::alert')
    @stack('script')
</body>

</html>
