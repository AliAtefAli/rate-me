<!DOCTYPE html>
<html lang="zxx" class="no-js">

<head>
    <!-- Mobile Specific Meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon-->
    <link rel="shortcut icon" href="{{ asset('assets/site/img/shape/fl-shape-1.png') }}">
    <!-- Author Meta -->
    <meta name="author" content="">
    <!-- Meta Description -->
    <meta name="description" content="">
    <!-- Meta Keyword -->
    <meta name="keywords" content="">
    <!-- meta character set -->
    <meta charset="UTF-8">
    <!-- Site Title -->
    <title>Quemny</title>

    <link href="https://fonts.googleapis.com/css?family=Poppins:400,300,500,600,700" rel="stylesheet">

    <!-- CSS ============================================= -->

    <link rel="stylesheet" href="{{ asset('assets/site/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/site/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/site/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/site/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/site/css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/site/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/site/css/responsive.css') }}">

    @yield('style')

</head>

<body>

<!-- Preloader -->


<!-- Start header section -->
@include('site.layouts.partials.header')
<!-- Start header section -->

@yield('content')

<!-- Start footer section -->
@include('site.layouts.partials.footer')
<!-- End footer section -->

<div class="scroll-top">
    <i class="ti-angle-up"></i>
</div>

<!-- JS ============================================= -->
<script src="{{ asset('assets/site/js/vendor/jquery-2.2.4.min.js') }}"></script>
<script src="{{ asset('assets/site/js/vendor/popper.min.js') }}"></script>
<script src="{{ asset('assets/site/js/jquery.easing.1.3.js') }}"></script>
<script src="{{ asset('assets/site/js/vendor/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/site/js/jquery.parallax-scroll.js') }}"></script>
<script src="{{ asset('assets/site/js/dopeNav.js') }}"></script>
<script src="{{ asset('assets/site/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('assets/site/js/jquery.stellar.min.js') }}"></script>
<script src="{{ asset('assets/site/js/jquery.counterup.min.js') }}"></script>
<script src="{{ asset('assets/site/js/waypoints.min.js') }}"></script>
<script src="{{ asset('assets/site/js/main.js') }}"></script>
@yield('script')
</body>

</html>
