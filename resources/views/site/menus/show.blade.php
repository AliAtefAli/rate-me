@extends('site.layouts.master')

@section('content')
    <section class="blog-section" id="blog-section">
        <div class="container blog-wrap section-gap-full">
            <div class="section-title">
                <h2 class="text-center">Menu</h2>
            </div>
            <div class="row justify-content-center">
                @foreach($store->menus as $menu)
                    <div class="col-lg-4 col-md-6">
                        <a href="">
                            <div class="single-blog">
                                <div class="overlay overlay-bg"></div>
                                <img class="img-fluid" src="{{ asset('assets/uploads/menus/' . $menu->image) }}" alt="">
                                <div class="blog-post-details">
                                    <ul>
                                        <li>
                                            <h3 class="text-white" href="#">{{ $menu->name }}</h3>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

@endsection
