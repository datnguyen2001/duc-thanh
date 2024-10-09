<div class="home-activity">
    <div class="container">
        <h5>{{__('home.activity')}}</h5>
        <h1>
            {{__('home.activity_title_1')}} <br>
            {{__('home.activity_title_2')}}
        </h1>
        <img src="{{asset('assets/images/home/underlined.png')}}" alt="Activity" style="margin-bottom: 25px"/>
        <h1 class="sub-title-activity">
            {{__('home.activity_title_3')}} <br>
            {{__('home.activity_title_4')}}
        </h1>
        <span><a href="{{route('activity')}}" class="link-hover">{{__('home.activity_more')}} -></a></span>
    </div>
</div>
<div class="container box-home-hd-video" style="margin-top: -350px;">
    <div class="home-activity-product">
        <div class="acts-image col-lg-8 col-12" data-aos="fade-up">
            <div class="frame-container">
                <a href="{{route('activity')}}">
                    <img src="{{$imageProduct->src ?? ''}}" alt="Image Activity" class="home-activity-img">
                </a>
                <img src="{{asset('assets/images/home/frame1.png')}}" alt="Frame1" class="frame-1 frame-1-desktop">
                <img src="{{asset('assets/images/home/frame1-mobile.png')}}" alt="Frame1" class="frame-1 frame-1-mobile">

            </div>
            <a href="{{route('activity') . '#image-field'}}"><h5>{{__('home.activity_image')}}</h5></a>
        </div>
        <div class="acts-video col-lg-4 col-12" data-aos="fade-up">
            <div class="frame-container">
                <div class="position-relative">
                    <img src="{{asset('assets/images/home/frame2.png')}}" alt="Frame2" class="frame-2 frame">
                    <div class="position-absolute box-iframe-video">
                        {!! $videoProduct->src !!}
                    </div>
                </div>

            </div>
            <a href="{{route('activity') . '#video-field'}}"><h5>{{__('home.activity_video')}}</h5></a>
        </div>
    </div>
</div>

<link rel="stylesheet" href="https://cdn.rawgit.com/michalsnik/aos/2.0.1/dist/aos.css" />
<script src="https://cdn.rawgit.com/michalsnik/aos/2.0.1/dist/aos.js"></script>
<script>
    AOS.init({
        duration: 1000,
        once: true
    });
</script>
