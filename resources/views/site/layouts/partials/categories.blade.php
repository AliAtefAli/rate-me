<section class="blog-section" id="blog-section">
    <div class="container blog-wrap section-gap-full">
        <div class="section-title">
            <h2 class="text-center">Our Categories</h2>
            <p class="text-center">Discover The Services We Provide</p>
        </div>
        <div class="row justify-content-center">
            @foreach($categories as $category)
            <div class="col-lg-4 col-md-6">
                <a href="{{ route('categories.show', $category) }}">
                    <div class="single-blog">
                        <div class="overlay overlay-bg"></div>
                        <img class="img-fluid" src="{{ asset('assets/uploads/categories/' . $category->image) }}" alt="">
                        <div class="blog-post-details">
                            <ul>
                                <li>
                                    <h3 class="text-white" href="#">{{ $category->name }}</h3>
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
