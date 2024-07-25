@extends('web.index')
@section('title','Liên Hệ')

@section('style_page')
    <link rel="stylesheet" href="{{ asset('assets/web/css/contact.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/web/css/product.css') }}">
@stop
{{--content of page--}}
@section('content')
    <div class="contact-page">
        <div class="position-relative header-sp-desktop">
            <img src="{{asset('assets/images/contact/banner-desktop.webp')}}" alt="" class="w-100 img-banner-sp">
            <div class="title-banner-sp">Liên hệ với Đức Thanh để được hỗ trợ</div>
            <img src="{{asset('assets/images/line-sp.webp')}}" alt="" class="img-line-sp">
        </div>
        <div class="position-relative header-sp-mobile">
            <img src="{{asset('assets/images/contact/banner-mobile.webp')}}" alt="" class="w-100 img-banner-sp">
            <div class="title-banner-sp">Liên hệ với Đức Thanh để được hỗ trợ</div>
        </div>
        <div class="home-contact">
            <div class="container">
                <div class="title-link">
                    <span class="home">Trang chủ > </span>
                    <span class="contact">Liên hệ</span>
                </div>
                @include('web.home.partials.contact')
            </div>
        </div>

    </div>

@stop
@section('script_page')
    <script src="{{asset('assets/web/js/contact.js')}}"></script>
@stop
