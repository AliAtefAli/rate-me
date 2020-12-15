@extends('site.layouts.master')

@section('style')
    <link rel="stylesheet" href="{{ asset('assets/site/css/rate.css') }}">
@endsection
@section('content')

    <!-- Start page-top-banner section -->
    <section class="page-top-banner section-gap-full relative" data-stellar-background-ratio="0.5">
        <div class="overlay overlay-bg"></div>
        <div class="container">
            <div class="row section-gap-half">
                <div class="col-lg-12 text-center">
                    <h1>{{ $category->name }}</h1>
                </div>
            </div>
        </div>
    </section>
    <!-- End about-top-banner section -->

    <!-- Start blog-lists section -->
    <section class="blog-lists-section section-gap-full">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="blog-lists">
                        @foreach($category->stores as $store)
                            <div class="single-blog-post">
                                <div class="post-thumb relative">
                                    <div class="overlay overlay-bg"></div>
                                    <img class="img-fluid" src="{{ asset('assets/uploads/stores/' . $store->image ) }}"
                                         height="50" alt="">
                                </div>
                                <div class="post-details">
                                    <a href="{{ route('stores.show', $store) }}" class="d-flex">
                                        <h1>{{ $store->name }}</h1>
                                        <div class=ml-auto>
                                            <form action="">
                                                <div class="feedback">
                                                    <div class="rating">
                                                        <input type="radio" name="rating" id="rating-5">
                                                        <label for="rating-5"></label>
                                                        <input type="radio" name="rating" id="rating-4">
                                                        <label for="rating-4"></label>
                                                        <input type="radio" name="rating" id="rating-3">
                                                        <label for="rating-3"></label>
                                                        <input type="radio" name="rating" id="rating-2">
                                                        <label for="rating-2"></label>
                                                        <input type="radio" name="rating" id="rating-1">
                                                        <label for="rating-1"></label>
                                                    </div>
                                                </div>

                                                <input type="submit" value="rate">
                                            </form>
                                        </div>
                                    </a>

                                    <div class="user-details d-flex">
                                        <div class="user-img">
                                            <img src="{{ asset('assets/site/img/avatar1.jpg') }}" alt="">
                                        </div>

                                        <div class="details">
                                            <a href="#">
                                                <h4>Phil Martinez</h4>
                                            </a>
                                            <p>Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consectetur
                                                adipisicing elit. Fugit, itaque?</p>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End blog-lists section -->

@endsection
