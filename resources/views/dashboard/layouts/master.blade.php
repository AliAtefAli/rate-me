<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <title>شعائر</title>
    @yield('before-style')
    <link rel="shortcut icon" href="{{ asset('assets/dashboard/img/logo.png') }}"/>
    <link rel="stylesheet" href="{{ asset('assets/dashboard/css/font-awesome-5all.css') }}"/>
    <link rel="stylesheet" href="{{ asset('assets/dashboard/css/bootstrap.min.css') }}"/>
    <link rel="stylesheet" href="{{ asset('assets/dashboard/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/dashboard/css/owl.carousel.css') }}"/>
    <link rel="stylesheet" href="{{ asset('assets/dashboard/css/animate.css') }}"/>
    <link rel="stylesheet" href="{{ asset('assets/dashboard/css/style.css') }}"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @yield('style')

</head>

<body>
<div id="preloader">
    <div id="loader"></div>
</div>
<!-- header -->
@include('dashboard.layouts.partials.header')
<!-- end header -->
<div class="home-page">
    @include('dashboard.layouts.partials.aside')
    @yield('content')
</div>

<script src="{{ asset('assets/dashboard/js/jquery-3.2.1.min.js') }}"></script>
<script src="{{ asset('assets/dashboard/js/popper.min.js') }}"></script>
<script src="{{ asset('assets/dashboard/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/dashboard/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/dashboard/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/dashboard/js/scripts.js') }}"></script>

@yield('script')

</body>

</html>
