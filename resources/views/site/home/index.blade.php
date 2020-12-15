@extends('site.layouts.master')


@section('content')

    <!-- Start banner section -->
    @include('site.layouts.partials.panner')
    <!-- End banner section -->

    <!-- Start categories section -->
    @include('site.layouts.partials.categories')
    <!-- End categories section -->

    <!-- Start Offers section -->
    @include('site.layouts.partials.offers')
    <!-- End offers section -->

    <!-- Start about section -->
    @include('site.layouts.partials.about-us')
    <!-- End about section -->

    <!-- Start contact section -->
    @include('site.layouts.partials.contact-us')
    <!-- End contact section -->

@endsection
