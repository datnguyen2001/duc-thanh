@extends('web.index')
@section('title','Sản phẩm')

@section('style_page')
    <link rel="stylesheet" href="{{ asset('assets/web/css/category.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/web/css/product.css') }}">
@stop
{{--content of page--}}
@section('content')
    <div class="position-relative header-sp-desktop">
        <img src="{{asset('assets/images/product/banner-desktop.webp')}}" alt="" class="w-100 img-banner-sp">
        <div class="title-banner-sp">Khám phá các sản phẩm
            của Đức Thanh</div>
        <img src="{{asset('assets/images/line-sp.webp')}}" alt="" class="img-line-sp">
    </div>
    <div class="position-relative header-sp-mobile">
        <img src="{{asset('assets/images/banner-sp-mobile.webp')}}" alt="" class="w-100 img-banner-sp">
        <div class="title-banner-sp">Khám phá các sản phẩm
            của Đức Thanh</div>
    </div>
    <div class="category-page">
        <div class="container">
            <div class="title-link">
                <span class="home">Trang chủ > </span>
                <span class="product">Sản phẩm</span>
            </div>
        </div>
        @include('web.category.partials.details')
    </div>

@stop
@section('script_page')
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var swiper = new Swiper(".list-product-swiper", {
                slidesPerView: 1,
                autoplay: {
                    delay: 3000,
                },
                pagination: {
                    el: ".swiper-pagination-video",
                },
                breakpoints: {
                    767: {
                        slidesPerView: 1,
                    },
                    768: {
                        slidesPerView: 2,
                    },
                    992: {
                        slidesPerView: 2,
                    },
                    993: {
                        slidesPerView: 3,
                    }
                }
            });
        });
    </script>
@stop
