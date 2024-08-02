<div class="home-product">
    <h5>{{__('home.product')}}</h5>
    <h1>
        {{__('home.product_title_1')}} <br>
        {{__('home.product_title_2')}}
    </h1>
    <div class="list-product-desktop mt-4">
        <div class="d-flex flex-wrap" style="row-gap: 30px">
            @foreach($categories as $category)
                <div class="col-3" data-aos="fade-up">
                    <a href="{{route('category-product', [$category->slug])}}">
                        <div class="product-img-wrapper">
                            <img src="{{ asset('assets/images/home/product/back-'. $category->index .'.png') }}" alt="Background" class="background-image">
                            <img src="{{ $category->src }}" alt="Product" class="product-img-x">
                        </div>
                        <span class="product-title">{{$category->names ?? ''}}</span>
                    </a>
                </div>
            @endforeach
            <div class="col-3" data-aos="fade-up">
                <a href="{{route('category')}}">
                    <div class="product-img-wrapper">
                        <img src="{{ asset('assets/images/home/product/back-8.png') }}" alt="Background" class="background-image">
                        <img src="{{ asset('assets/images/home/product/product-8.png') }}" alt="See More" class="product-img-x" style="top: 36%; left: 36%; width: 30%">
                    </div>
                    <span class="product-title">{{__('home.product_see_all')}}</span>
                </a>
            </div>
        </div>
    </div>
    <div class="swiper-wrapper-container">
        <div class="swiper-container list-product-mobile">
            <div class="swiper-wrapper">
                @foreach($categories as $category)
                    <div class="swiper-slide">
                        <a href="{{route('category-product', [$category->slug])}}">
                            <div class="product-img-wrapper">
                                <img src="{{ asset('assets/images/home/product/back-'. $category->index .'.png') }}" alt="Background" class="background-image">
                                <img src="{{ $category->src }}" alt="Product" class="product-img-x">
                            </div>
                            <span class="product-title">{{$category->names ?? ''}}</span>
                        </a>
                    </div>
                @endforeach
                <div class="swiper-slide">
                    <a href="{{route('category')}}">
                        <div class="product-img-wrapper">
                            <img src="{{ asset('assets/images/home/product/back-8.png') }}" alt="Background" class="background-image">
                            <img src="{{ asset('assets/images/home/product/product-8.png') }}" alt="See More" class="product-img-x" style="top: 36%; left: 36%; width: 30%">
                        </div>
                        <span class="product-title">{{__('home.product_see_all')}}</span>
                    </a>
                </div>
            </div>
            <!-- Add Pagination -->
            <div class="swiper-pagination"></div>
        </div>
    </div>


</div>
<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
<script>
    var swiper = new Swiper('.swiper-container', {
        slidesPerView: 3,
        spaceBetween: 30,
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
        breakpoints: {
            992: {
                slidesPerView: 3,
                spaceBetween: 20,
            },
            768: {
                slidesPerView: 2,
                spaceBetween: 15,
            },
            425: {
                slidesPerView: 1,
                spaceBetween: 10,
            },
            325: {
                slidesPerView: 1,
                spaceBetween: 10,
            }
        }
    });
</script>
