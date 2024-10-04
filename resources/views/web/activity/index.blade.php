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
        .box-iframe-video{
            top: 0;
            left: 50%;
            transform: translateX(-50%);
        }
        .box-iframe-video blockquote{
            max-height: 575px;
            border-radius: 8px;
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
                max-height: 565px;
            }
            .box-iframe-video{
                width: 90%;
            }
        }
        @media (max-width: 992px) {
            .box-iframe-video blockquote{
                max-height: 575px;
            }
        }
        @media (max-width: 768px) {
            .box-iframe-video blockquote{
                width: 88%!important;
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
            @include('web.activity.partials.image')
        </div>
        <div class="activity-video">
            @include('web.activity.partials.video')
        </div>
        <div class="activity-background-footer-container">
            <img src="{{asset('assets/images/activity/background-4.png')}}" alt="Background" class="activity-background-footer"/>
        </div>

    </div>

@stop
@section('script_page')

@stop
