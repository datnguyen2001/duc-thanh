<div class="list-image">
    <div class="container">
        <h5 class="sub-title">{{__('activity.image')}}</h5>
        @if(count($image) > 0)
            <div class="swiper-container-image">
                <div class="list-product swiper-wrapper">
                    @foreach($image as $images)
                        <div class="swiper-slide">
                            <div class="product-image">
                                {{--                                <img src="{{asset('assets/images/activity/frame-img.png')}}" alt="Frame" class="frame"/>--}}
                                <img src="{{asset($images->src)}}" alt="Image" class="image"/>
                            </div>
                            <div class="product-text">
                                <a >
                                    <h5 class="product-title">{{$images->names}}</h5>
                                </a>
                                <p class="product-detail">{{$images->describes}}</p>
{{--                                <span><a >{{__('activity.image_details')}} -></a></span>--}}
                            </div>
                        </div>
                    @endforeach
                </div>
                <!-- Add Navigation -->
                <div class="swiper-button-next"><img src="{{asset('assets/images/activity/next-btn.png')}}" alt="Next"/>
                </div>
                <div class="swiper-button-prev"><img src="{{asset('assets/images/activity/prev-btn.png')}}" alt="Prev"/>
                </div>
            </div>
        @else
            <div class="text-center" style="margin-top: 20px;">
                <p>{{__('activity.no_image_found')}}</p>
            </div>
        @endif
    </div>
</div>

<div class="list-video">
    <div class="container">
        <h5 class="sub-title">{{__('activity.video')}}</h5>
        @if(count($video) > 0)
            <div class="swiper-container-video">
                <div class="list-video-product swiper-wrapper">
                    @foreach($video as $videos)
                        <div class="swiper-slide">
                            <div class="video-image-search">
                                <div class="position-relative">
                                    <img src="{{asset('assets/images/activity/frame-video.png')}}" alt="Frame"
                                         class="frame"/>
                                    <div class="position-absolute box-iframe-video">
                                        {!! $videos->src !!}
                                    </div>
                                </div>
                            </div>
                            <div class="video-text">
                                <div class="d-flex justify-content-between">
                                    <p class="d-flex align-items-center">{{__('activity.video_see_more')}} ...</p>
                                    <a href="{{$videos->link}}" target="_blank"
                                       class="video-btn">{{__('activity.video_see_now')}}</a>
                                </div>
                                <p class="title-channel_name">{{$videos->channel_name}}</p>
                                <p class="content-describes">{{$videos->describes}}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
                <!-- Add Navigation -->
                <div class="swiper-button-next"><img src="{{asset('assets/images/activity/next-btn.png')}}" alt="Next"/>
                </div>
                <div class="swiper-button-prev" style="position: absolute; left: 0">
                    <img src="{{asset('assets/images/activity/prev-btn.png')}}" alt="Prev"/>
                </div>
            </div>
        @else
            <div class="text-center" style="margin-top: 20px;">
                <p>{{__('activity.no_video_found')}}</p>
            </div>
        @endif
    </div>
</div>

<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var swiper = new Swiper('.swiper-container-video', {
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
                    slidesPerView: 2,
                    spaceBetween: 10,
                },
                300: {
                    slidesPerView: 1,
                    spaceBetween: 10,
                },
            },
        });
    });

    document.addEventListener('DOMContentLoaded', function () {
        var swiper = new Swiper('.swiper-container-image', {
            slidesPerView: 1,
            spaceBetween: 30,
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            breakpoints: {
                992: {
                    slidesPerView: 2,
                    spaceBetween: 15,
                },
                768: {
                    slidesPerView: 1,
                    spaceBetween: 10,
                },
            },
        });
    });
</script>
