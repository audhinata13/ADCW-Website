<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>{{ $title ?? 'Login' }}</title>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="{{ asset('assets') }}/modules/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('assets') }}/modules/fontawesome/css/all.min.css">

    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('assets') }}/modules/bootstrap-social/bootstrap-social.css">

    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('assets') }}/css/style.css">
    <link rel="stylesheet" href="{{ asset('assets') }}/css/components.css">
    <link rel="stylesheet" href="{{ asset('assets') }}/modules/izitoast/css/iziToast.min.css">
    <!-- JS Libraies -->
    <script src="{{ asset('assets') }}/modules/izitoast/js/iziToast.min.js"></script>
    <style>
        .btn-black {
            background-color: #000;
            color: #fff;
        }

        .btn-black:hover {
            background-color: #000 !important;
            color: #fff;
        }
    </style>
    @stack('styles')
    @vite(['resources/js/app.js'])
</head>

<body>
    <div>
        @yield('content')
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
    <script src="{{ asset('assets') }}/js/scripts.js"></script>
    <script src="{{ asset('assets') }}/js/custom.js"></script>
    @stack('scrips')
</body>

</html>
