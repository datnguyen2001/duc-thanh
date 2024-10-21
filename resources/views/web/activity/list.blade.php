@extends('web.index')
@section('title','Hoạt Động')
@section('meta')
    <meta property="og:url" content="{{route('activity')}}"/>
    <meta property="og:type" content="website"/>
    <meta property="og:title" content="{{@$meta->title}}"/>
    <meta property="og:description" content="{{@$meta->description}}"/>
    <meta property="og:image" content="{{asset(@$meta->image)}}"/>
@endsection
@section('style_page')
    <link rel="stylesheet" href="{{ asset('assets/web/css/activity.css') }}">
    <style>
        .box-iframe-video {
            top: 0;
            left: 50%;
            transform: translateX(-50%);
        }

        .box-iframe-video blockquote {
            max-height: 575px;
            border-radius: 8px;
        }

        .frame {
            max-height: 615px;
        }
        .listImageData{
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 20px;
            margin: 0 auto;
        }
.product-image-hd a{
    display: flex;
    flex-direction: column;
    justify-content: center;
    width: 100%;
    margin-top: 0!important;
    height: 100%;
}
        .image-hd{
            height: 370px;
        }
        .activity-page .list-product .product-detail{
            width: 80%;
            margin: 0 auto;
        }
        .activity-page .list-product{
            margin-bottom: 20px;
        }


        @media (max-width: 1400px) {
            .activity-video .list-video-product .frame {
                width: 100%;
            }
        }
        @media (max-width: 1300px) {
            .image-hd{
                height: 340px;
            }
        }

        @media (max-width: 1200px) {
            .box-iframe-video blockquote {
                min-width: unset !important;
                width: 100% !important;
                max-height: 565px;
            }

            .box-iframe-video {
                width: 90%;
            }
            .image-hd{
                height: 300px;
            }
        }

        @media (max-width: 992px) {
            .box-iframe-video blockquote {
                max-height: 575px;
            }
            .image-hd {
                height: 210px;
            }
            .product-image-hd {
                padding: 20px;
            }
            }

        @media (max-width: 768px) {
            .box-iframe-video blockquote {
                width: 88% !important;
            }
            .listImageData{
                grid-template-columns: 1fr;
            }
            .image-hd {
                height: 270px;
            }
        }

        @if ($banner)
             /* Desktop background */
        .activity-page .activity-banner {
            background: url('{{ asset($banner->src) }}') no-repeat center center;
        }

        /* Mobile background */
        @media (max-width: 768px) {
            .activity-page .activity-banner {
                background: url('{{ asset($banner->src_mobile) }}') no-repeat center center;
                background-size: cover;
            }
        }

        @else
        .activity-page .activity-banner {
            background: url("/assets/images/activity/background.webp") no-repeat center center;
        }

        @media (max-width: 768px) {
            .activity-page .activity-banner {
                background: url("/assets/images/activity/background-mobile.webp") no-repeat center center;
                background-size: cover;
            }
        }
        @endif
    </style>
@stop
{{--content of page--}}
@section('content')
    <div class="activity-page">
        <div class="activity-banner">
            @include('web.activity.partials.banner')
        </div>
        <div class="activity-image">
            <div class="container" style="padding-top: 215px" id="image-field">
                <a href="{{route('home')}}">
                    <span class="home">{{__('activity.home')}} > </span></a>
                <span class="activity">{{__('activity.sub_home')}}</span>
                <div class="list-image">
                    <h5 class="sub-title">{{__('activity.image')}}</h5>
                    <h1>
                        {{__('activity.image_title')}}
                    </h1>
                    <div class="listImageData">
                        @foreach($listData as $images)
                            <div class="list-product ">
                                <div class="product-image product-image-hd">
                                    <a>
                                        <img src="{{asset($images->src)}}" alt="Image" class="image-hd"/>
                                    </a>
                                </div>
                                <div class="product-text">
                                    <p class="product-detail">{{$images->describes}}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>


        </div>
        <div class="activity-background-footer-container">
            <img src="{{asset('assets/images/activity/background-4.png')}}" alt="Background"
                 class="activity-background-footer"/>
        </div>

    </div>

@stop
@section('script_page')

@stop