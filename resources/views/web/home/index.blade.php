@extends('web.index')
@section('title','Trang chủ')
@section('meta')
    <meta property="og:url" content="{{route('home')}}"/>
    <meta property="og:type" content="website"/>
    <meta property="og:title" content="{{@$meta->title}}"/>
    <meta property="og:description" content="{{@$meta->description}}"/>
    <meta property="og:image" content="{{asset(@$meta->image)}}"/>
@endsection
@section('style_page')
    <style>
        .box-iframe-video{
            top: 20px;
            left: 50%;
            transform: translateX(-40%);
        }
        .box-iframe-video blockquote{
            max-height: 525px;
            border-radius: 8px;
            min-width: 270px!important;
        }
        .frame{
            max-height: 615px;
        }
        @media (max-width: 1400px) {
            .activity-video .list-video-product .frame {
                width: 100%;
            }
        }
        @media (max-width: 1200px) {
            .box-iframe-video blockquote{
                min-width: unset!important;
                width: 100%!important;
            }
            .box-iframe-video{
                width: 90%;
            }
        }
        @media (max-width: 992px) {
            .box-iframe-video blockquote{
                max-height: 540px;
            }
            .home-activity-product .frame-2 {
                height: auto!important;
            }
            .box-iframe-video {
                width: 50%;
                top: 15px;
            }
            .home-activity-product .frame-2 {
                width: 83%;
            }
        }
        @media (max-width: 768px) {
            .box-iframe-video blockquote{
                width: 100%!important;
            }
            .home-activity-product .frame-2 {
                width: 100%;
            }
            .box-iframe-video {
                width: 75%;
            }
            .box-iframe-video blockquote {
                max-height: 460px;
            }
        }
        @media (max-width: 400px) {
            .box-iframe-video blockquote {
                max-height: 420px;
            }
        }
    </style>
@stop
{{--content of page--}}
@section('content')
    @include('web.home.partials.banner')
    <section>
        @include('web.home.partials.about')
    </section>
    <div class="home_product container">
        <section>
            @include('web.home.partials.product')
        </section>
    </div>
    <section>
        @include('web.home.partials.activity')
    </section>
    <section>
        <div class="home-contact" style="margin-top: -100px;">
            <div class="container" style="padding-top: 175px;">
                <h5 class="title">{{__('home.contact')}}</h5>
                <h1>
                    {{__('home.contact_title_1')}} <br>
                    {{__('home.contact_title_2')}}
                </h1>
                <img src="{{asset('assets/images/home/underlined.png')}}" alt="Activity" style="padding-bottom: 50px"/>
                @include('web.home.partials.contact')
            </div>
        </div>

    </section>
@stop
@section('script_page')
    <script src="{{asset('assets/web/js/contact.js')}}"></script>
@stop
