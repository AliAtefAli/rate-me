@extends('site.layouts.master')

@section('content')
    <!-- Start page-top-banner section -->
    <section class="section-gap-full relative" data-stellar-background-ratio="0.5">
        <div class="overlay overlay-bg"></div>
        <div class="container">
            <div class="row section-gap-half">
                <div class="col-lg-12 text-center">
                    <h1>{{ $store->name }}</h1>
                </div>
            </div>
        </div>
    </section>
    <!-- End about-top-banner section -->

    <!-- Start product-detials section -->
    <section class="product-detials-section section-gap-full">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 details-left">
                    <img class="img-fluid" src="{{ asset('assets/uploads/stores/' . $store->image) }}" alt="">
                </div>
                <div class="col-lg-4 details-right">
                    <ul>
                        <li><span>Category: </span>{{ $store->category->name }}</li>
                        <li><span>Delivery type: </span>{{ $store->delivert_type }}</li>
                        <li><span>Location: </span>{{ $store->location }}</li>
                        <li><span>Call: </span><a href="tel:{{ $store->phone }}">{{ $store->phone }}</a></li>
                        <li><span>Website: </span><a href="{{ $store->store_site }}">{{ $store->store_site }}</a></li>
                        <li><span>Menu: </span><a href="{{ route('store.menu', $store) }}">Menu</a></li>
                    </ul>
                    <p>{!! $store->description !!}</p>
                </div>
            </div>
        </div>
    </section>
    <!-- End product-detials section -->
@endsection
