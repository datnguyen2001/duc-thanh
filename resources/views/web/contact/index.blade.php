@extends('web.index')
@section('title','Liên Hệ')
@section('meta')
    <meta property="og:url" content="{{route('contact')}}"/>
    <meta property="og:type" content="website"/>
    <meta property="og:title" content="{{@$meta->title}}"/>
    <meta property="og:description" content="{{@$meta->description}}"/>
    <meta property="og:image" content="{{asset(@$meta->image)}}"/>
@endsection
@section('style_page')
    <link rel="stylesheet" href="{{ asset('assets/web/css/contact.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/web/css/product.css') }}">
@stop
{{--content of page--}}
@section('content')
    <div class="contact-page">
        <div class="position-relative header-sp-desktop">
            @if($banner)
                <img src="{{$banner->src}}" alt="" class="w-100 img-banner-sp">
            @else
                <img src="{{asset('assets/images/contact/banner-desktop.webp')}}" alt="" class="w-100 img-banner-sp">
            @endif
            <div class="title-banner-sp">{{__('contact.title')}}</div>
            <img src="{{asset('assets/images/line-sp.webp')}}" alt="" class="img-line-sp">
        </div>
        <div class="position-relative header-sp-mobile">
            @if($banner)
                <img src="{{$banner->src_mobile}}" alt="" class="w-100 img-banner-sp">
            @else
                <img src="{{asset('assets/images/contact/banner-mobile.webp')}}" alt="" class="w-100 img-banner-sp">
            @endif
            <div class="title-banner-sp">{{__('contact.title')}}</div>
        </div>
        <div class="home-contact">
            <div class="container">
                <div class="title-link">
                    <a href="{{route('home')}}">
                        <span class="home">{{__('contact.home')}} > </span></a>
                    <span class="contact">{{__('contact.sub_home')}}</span>
                </div>
                @include('web.home.partials.contact')
            </div>
        </div>

    </div>

@stop
@section('script_page')
    <script src="{{asset('assets/web/js/contact.js')}}"></script>
@stop
