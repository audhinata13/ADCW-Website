<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>{{ $title }}</title>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="{{ asset('assets') }}/modules/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('assets') }}/modules/fontawesome/css/all.min.css">

    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('assets') }}/modules/jqvmap/dist/jqvmap.min.css">
    <link rel="stylesheet" href="{{ asset('assets') }}/modules/weather-icon/css/weather-icons.min.css">
    <link rel="stylesheet" href="{{ asset('assets') }}/modules/weather-icon/css/weather-icons-wind.min.css">
    <link rel="stylesheet" href="{{ asset('assets') }}/modules/summernote/summernote-bs4.css">

    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('assets') }}/css/style.css">
    <link rel="stylesheet" href="{{ asset('assets') }}/css/components.css">

    <link rel="stylesheet" href="{{ asset('assets') }}/modules/izitoast/css/iziToast.min.css">
    <script src="{{ asset('assets') }}/modules/izitoast/js/iziToast.min.js"></script>

    <link rel="stylesheet" href="{{ asset('assets/css/dataTables.bootstrap4.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}">
    @stack('styles')
    @vite(['resources/js/app.js'])
</head>

<body>
    <div id="app">
        <div class="main-wrapper main-wrapper-1">
            <div class="navbar-bg"></div>
            <x-Navbar />
            <x-Sidebar />

            <!-- Main Content -->
            <div class="main-content">
                {{ $slot }}
            </div>
            <x-Footer />
        </div>
    </div>

    <x-Toast />
    <!-- General JS Scripts -->
    <script src="{{ asset('assets') }}/modules/jquery.min.js"></script>
    <script src="{{ asset('assets') }}/modules/popper.js"></script>
    <script src="{{ asset('assets') }}/modules/tooltip.js"></script>
    <script src="{{ asset('assets') }}/modules/bootstrap/js/bootstrap.min.js"></script>
    <script src="{{ asset('assets') }}/modules/nicescroll/jquery.nicescroll.min.js"></script>
    <script src="{{ asset('assets') }}/modules/moment.min.js"></script>
    <script src="{{ asset('assets') }}/js/stisla.js"></script>

    <!-- JS Libraies -->
    <script src="{{ asset('assets') }}/modules/simple-weather/jquery.simpleWeather.min.js"></script>
    <script src="{{ asset('assets') }}/modules/chart.min.js"></script>
    <script src="{{ asset('assets') }}/modules/jqvmap/dist/jquery.vmap.min.js"></script>
    <script src="{{ asset('assets') }}/modules/jqvmap/dist/maps/jquery.vmap.world.js"></script>
    <script src="{{ asset('assets') }}/modules/summernote/summernote-bs4.js"></script>
    <script src="{{ asset('assets') }}/modules/chocolat/dist/js/jquery.chocolat.min.js"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('assets') }}/js/page/index-0.js"></script>

    <!-- Template JS File -->
    <script src="{{ asset('assets') }}/js/scripts.js"></script>
    <script src="{{ asset('assets') }}/js/custom.js"></script>
    <script src="{{ asset('assets/js/dataTables.js') }}"></script>
    <script src="{{ asset('assets/js/dataTables.bootstrap4.js') }}"></script>
    <script src="{{ asset('assets/sweetalert2/sweetalert2.all.min.js') }}"></script>
    <script>
        $('#dataTable').DataTable();
    </script>
    @stack('scripts')
</body>

</html>
