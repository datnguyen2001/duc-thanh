@extends('web.index')
@section('title','Tìm kiếm')

@section('style_page')
    <link rel="stylesheet" href="{{ asset('assets/web/css/product.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/web/css/category.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/web/css/search.css') }}">
@stop
{{--content of page--}}
@section('content')
    <div class="position-relative header-sp-desktop">
        <img src="{{asset('assets/images/product/banner-desktop.webp')}}" alt="" class="w-100 img-banner-sp">
        <div class="title-banner-sp">{{__('category.title')}}</div>
        <img src="{{asset('assets/images/line-sp.webp')}}" alt="" class="img-line-sp">
    </div>
    <div class="position-relative header-sp-mobile">
        <img src="{{asset('assets/images/banner-sp-mobile.webp')}}" alt="" class="w-100 img-banner-sp">
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
