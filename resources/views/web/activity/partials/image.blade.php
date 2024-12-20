<div class="container" style="padding-top: 215px" id="image-field">
    <a href="{{route('home')}}">
        <span class="home">{{__('activity.home')}} > </span></a>
    <a href="{{route('activity')}}">
        <span class="activity">{{__('activity.sub_home')}}</span>
    </a>
    <div class="list-image">
        <h5 class="sub-title">{{__('activity.image')}}</h5>
        <h1>
            {{__('activity.image_title')}}
        </h1>
        <div class="swiper-container">
            <div class="list-product swiper-wrapper">
                @foreach($image as $images)
                <div class="swiper-slide">
                    <div class="product-image product-image-hd">
                        <a href="{{route('detail-activity',$images->id)}}">
                            <img src="{{asset($images->src)}}" alt="Image" class="image-hd"/>
                        </a>
                    </div>
                    <div class="product-text">
                        <a href="{{route('detail-activity',$images->id)}}">
                            <h5 class="product-title">{{$images->names}}</h5>
                        </a>
                        <p class="product-detail">{{$images->describes}}</p>
{{--                        <span><a  class="link-hover">{{__('activity.image_details')}} -></a></span>--}}
                    </div>
                </div>
                    @endforeach
            </div>
            <!-- Add Navigation -->
            <div class="swiper-button-next"><img src="{{asset('assets/images/activity/next-btn.png')}}" alt="Next"/></div>
            <div class="swiper-button-prev"><img src="{{asset('assets/images/activity/prev-btn.png')}}" alt="Prev"/></div>
        </div>
    </div>
</div>
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var swiper = new Swiper('.swiper-container', {
            slidesPerView: 1,
            spaceBetween: 30,
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            breakpoints: {
                992: {
                    slidesPerView: 2,
                    spaceBetween: 20,
                },
                768: {
                    slidesPerView: 1,
                    spaceBetween: 5,
                },
                300: {
                    slidesPerView: 1,
                    spaceBetween: 10,
                },
            },
        });
    });
</script>
