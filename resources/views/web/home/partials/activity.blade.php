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
        <span><a href="{{route('activity')}}">{{__('home.activity_more')}} -></a></span>
    </div>
</div>
<div class="container" style="margin-top: -200px;">
    <div class="home-activity-product">
        <div class="acts-image col-lg-8 col-12">
            <div class="frame-container">
                <img src="{{asset('assets/images/home/frame1.png')}}" alt="Frame1" class="frame-1">
                <img src="{{$imageProduct->src}}" alt="Image Activity" class="home-activity-img">
            </div>
            <h5>{{__('home.activity_image')}}</h5>
        </div>
        <div class="acts-video col-lg-4 col-12">
            <div class="frame-container">
                <img src="{{asset('assets/images/home/frame2.png')}}" alt="Frame2" class="frame-2">
                <img src="{{$videoProduct->src}}" alt="Tiktok Activity" class="home-activity-video">
            </div>
            <h5>{{__('home.activity_video')}}</h5>
        </div>
    </div>
</div>

