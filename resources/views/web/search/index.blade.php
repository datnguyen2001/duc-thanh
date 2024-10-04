@extends('web.index')
@section('title','Tìm kiếm')

@section('style_page')
    <link rel="stylesheet" href="{{ asset('assets/web/css/product.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/web/css/category.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/web/css/search.css') }}">
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
            .search-activity .list-video-product .frame {
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
                width: 90%!important;
            }
            .search-activity .list-video-product .frame {
                width: 92%;
            }
        }
        @media (max-width: 768px) {
            .box-iframe-video blockquote{
                width: 88%!important;
            }
        }
    </style>
@stop
{{--content of page--}}
@section('content')
    <div class="position-relative header-sp-desktop">
        @if($banner)
            <img src="{{$banner->src}}" alt="" class="w-100 img-banner-sp">
        @else
            <img src="{{asset('assets/images/product/banner-desktop.webp')}}" alt="" class="w-100 img-banner-sp">
        @endif
        <div class="title-banner-sp">{{__('category.title')}}</div>
        <img src="{{asset('assets/images/line-sp.webp')}}" alt="" class="img-line-sp">
    </div>
    <div class="position-relative header-sp-mobile">
        @if($banner)
            <img src="{{$banner->src_mobile}}" alt="" class="w-100 img-banner-sp">
        @else
            <img src="{{asset('assets/images/banner-sp-mobile.webp')}}" alt="" class="w-100 img-banner-sp">
        @endif
        <div class="title-banner-sp">{{__('category.title')}}</div>
    </div>
    <div class="search-product" style="margin-top: 30px;">
        @include('web.search.partials.product')
    </div>
    <div class="search-activity">
        @include('web.search.partials.activity')
    </div>
    <div class="activity-background-footer-container">
        <img src="{{asset('assets/images/activity/background-4.png')}}" alt="Background" class="activity-background-footer"/>
    </div>
@stop

@section('script_page')

@stop
