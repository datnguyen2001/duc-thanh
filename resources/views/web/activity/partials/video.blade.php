<div class="container" id="video-field">
    <div class="list-video">
        <h5 class="sub-title">{{__('activity.video')}}</h5>
        <h1>{{__('activity.video_title')}}</h1>
        <div class="swiper-container">
            <div class="list-video-product swiper-wrapper">
                @foreach($video as $videos)
                <div class="swiper-slide">
                    <div class="video-image">
                        <div class="position-relative">
                            <img src="{{asset('assets/images/activity/frame-video.png')}}" alt="Frame" class="frame"/>
                            <div class="position-absolute box-iframe-video">
                                {!! $videos->src !!}
                            </div>
                        </div>
                    </div>
                    <div class="video-text">
                        <div class="d-flex justify-content-between">
                            <p class="d-flex align-items-center">{{__('activity.video_see_more')}} ...</p>
                            <a href="{{$videos->link}}" target="_blank" class="video-btn">{{__('activity.video_see_now')}}</a>
                        </div>
                        <p class="title-channel_name">{{$videos->channel_name}}</p>
                        <p class="content-describes">{{$videos->describes}}</p>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="swiper-button-next next-video"><img src="{{asset('assets/images/activity/next-btn.png')}}"  alt="Next"/></div>
            <div class="swiper-button-prev prev-video" style="position: absolute; left: 0">
                <img src="{{asset('assets/images/activity/prev-btn.png')}}" alt="Prev"/>
            </div>
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
</script>
