@extends('web.index')
@section('title','Sản phẩm')
@section('meta')
    <meta property="og:url" content="{{route('category-product',$categorySlug->slug)}}"/>
    <meta property="og:type" content="website"/>
    <meta property="og:title" content="{{@$categorySlug->name}}"/>
    <meta property="og:description" content=""/>
    <meta property="og:image" content="{{asset(@$categorySlug->src)}}"/>
@endsection
@section('style_page')
    <link rel="stylesheet" href="{{ asset('assets/web/css/category.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/web/css/product.css') }}">
@stop
{{--content of page--}}
@section('content')
    <div class="position-relative header-sp-desktop">
        @if($banner)
            <img src="{{$banner->src}}" alt="" class="w-100 img-banner-sp">
        @else
            <img src="{{asset('assets/images/product/banner-desktop.webp')}}" alt="" class="w-100 img-banner-sp">
        @endif
        <div class="title-banner-sp">{{__('category_product.title')}}</div>
        <img src="{{asset('assets/images/line-sp.webp')}}" alt="" class="img-line-sp">
    </div>
    <div class="position-relative header-sp-mobile">
        @if($banner)
            <img src="{{$banner->src_mobile}}" alt="" class="w-100 img-banner-sp">
        @else
            <img src="{{asset('assets/images/banner-sp-mobile.webp')}}" alt="" class="w-100 img-banner-sp">
        @endif
        <div class="title-banner-sp">{{__('category_product.title')}}</div>
    </div>
    <div class="category-page">
        <div class="container">
            <div class="title-link">
                <a href="{{route('home')}}">
                    <span class="home">{{__('category_product.home')}} > </span></a>
                <span class="product">{{__('category_product.sub_home')}}</span>
            </div>
        </div>
        @include('web.category-product.partials.details')
    </div>

@stop
@section('script_page')
@stop
