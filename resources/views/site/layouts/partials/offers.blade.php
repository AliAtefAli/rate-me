<section class="blog-section" id="blog-section">
    <div class="container blog-wrap section-gap-full">
        <div class="section-title">
            <h2 class="text-center">Our Offers</h2>
            <p class="text-center">Discover The Services We Provide</p>
        </div>
        <div class="row justify-content-center">
            @foreach($offers as $offer)
                <div class="col-lg-4 col-md-6">
                    <a href="{{ route('offer.show', $offer) }}">
                        <div class="single-blog">
                            <div class="overlay overlay-bg"></div>
                            <img class="img-fluid" src="{{ asset('assets/uploads/offers/' . $offer->image) }}" alt="">
                            <div class="blog-post-details">
                                <ul>
                                    <li>
                                        <h3 class="text-white" href="#">{{ $offer->name }}</h3>
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


{{--<section class="blog-section" id="blog-section">--}}
{{--    <div class="container blog-wrap section-gap-full">--}}
{{--        <div class="section-title">--}}
{{--            <h2 class="text-center">Menu</h2>--}}
{{--        </div>--}}
{{--        <div class="row justify-content-center">--}}
{{--            @foreach($store->menus as $menu)--}}
{{--                <div class="col-lg-4 col-md-6">--}}
{{--                    <a href="">--}}
{{--                        <div class="single-blog">--}}
{{--                            <div class="overlay overlay-bg"></div>--}}
{{--                            <img class="img-fluid" src="{{ asset('assets/uploads/menus/' . $menu->image) }}" alt="">--}}
{{--                            <div class="blog-post-details">--}}
{{--                                <ul>--}}
{{--                                    <li>--}}
{{--                                        <h3 class="text-white" href="#">{{ $menu->name }}</h3>--}}
{{--                                    </li>--}}
{{--                                </ul>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </a>--}}
{{--                </div>--}}
{{--            @endforeach--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</section>--}}

{{--<section class="blog-lists-section section-gap-full">--}}
{{--    <div class="container">--}}
{{--        <div class="row">--}}
{{--            <div class="col-lg-12">--}}
{{--                <div class="blog-lists">--}}
{{--                    @foreach($store->menu as $store)--}}
{{--                        <div class="single-blog-post">--}}
{{--                            <div class="post-thumb relative">--}}
{{--                                <div class="overlay overlay-bg"></div>--}}
{{--                                <img class="img-fluid" src="{{ asset('assets/uploads/stores/' . $store->image ) }}"--}}
{{--                                     height="50" alt="">--}}
{{--                            </div>--}}
{{--                            <div class="post-details">--}}
{{--                                <a href="{{ route('stores.show', $store) }}" class="d-flex">--}}
{{--                                    <h1>{{ $store->name }}</h1>--}}
{{--                                    <div class=ml-auto>--}}
{{--                                        <form action="">--}}
{{--                                            <div class="feedback">--}}
{{--                                                <div class="rating">--}}
{{--                                                    <input type="radio" name="rating" id="rating-5">--}}
{{--                                                    <label for="rating-5"></label>--}}
{{--                                                    <input type="radio" name="rating" id="rating-4">--}}
{{--                                                    <label for="rating-4"></label>--}}
{{--                                                    <input type="radio" name="rating" id="rating-3">--}}
{{--                                                    <label for="rating-3"></label>--}}
{{--                                                    <input type="radio" name="rating" id="rating-2">--}}
{{--                                                    <label for="rating-2"></label>--}}
{{--                                                    <input type="radio" name="rating" id="rating-1">--}}
{{--                                                    <label for="rating-1"></label>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}

{{--                                            <input type="submit" value="rate">--}}
{{--                                        </form>--}}
{{--                                    </div>--}}
{{--                                </a>--}}

{{--                                <div class="user-details d-flex">--}}
{{--                                    <div class="user-img">--}}
{{--                                        <img src="{{ asset('assets/site/img/avatar1.jpg') }}" alt="">--}}
{{--                                    </div>--}}

{{--                                    <div class="details">--}}
{{--                                        <a href="#">--}}
{{--                                            <h4>Phil Martinez</h4>--}}
{{--                                        </a>--}}
{{--                                        <p>Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consectetur--}}
{{--                                            adipisicing elit. Fugit, itaque?</p>--}}
{{--                                    </div>--}}
{{--                                </div>--}}

{{--                            </div>--}}
{{--                        </div>--}}
{{--                    @endforeach--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</section>--}}
