@extends('web.index')
@section('title','Chi tiết sản phẩm')
@section('meta')
    <meta property="og:url" content="{{route('detail-product',$productDetails->slug)}}"/>
    <meta property="og:type" content="website"/>
    <meta property="og:title" content="{{@$productDetails->name}}"/>
    <meta property="og:description" content="{{@$productDetails->describe}}"/>
    <meta property="og:image" content="{{asset(@$productDetails->src)}}"/>
@endsection
@section('style_page')
    <link rel="stylesheet" href="{{ asset('assets/web/css/product.css') }}">
@stop
{{--content of page--}}
@section('content')
    <div class="policy_desktop">
        <div class="position-relative header-sp-desktop">
            <img src="{{asset('assets/images/product/banner-desktop.webp')}}" alt="" class="w-100 img-banner-sp">
            <div class="title-banner-sp">{{__('product.title')}}</div>
            <img src="{{asset('assets/images/line-sp.webp')}}" alt="" class="img-line-sp">
        </div>
        <div class="position-relative header-sp-mobile">
            <img src="{{asset('assets/images/banner-sp-mobile.webp')}}" alt="" class="w-100 img-banner-sp">
            <div class="title-banner-sp">{{__('product.title')}}</div>
        </div>
        <div class="container box-big-content">
            <div class="line-header-product">
                <span>{{__('product.home')}} > </span>
                <span style="margin-left: 4px"> {{__('product.sub_home')}} > </span>
                <span style="color: #D23C36;margin-left: 4px"> {{$productDetails->category->name ?? ''}}</span>
            </div>
            <div class="box-content-product">
                <div class="content-left" data-aos="fade-up">
                    <span class="title-product background-title">{{$productDetails->category->name ?? ''}}</span>
                    <a href="{{route('category')}}" class="close-product-mobile">
                        <img src="{{asset('assets/images/close.webp')}}" alt="" class="btn-close-sp">
                    </a>
                    <div class="box-border-sp">
                        <img src="{{$productDetails->src}}" class="product-details-img">
                    </div>
                    <div class="box-content-detai-sp">
                        <div class="content-detai-sp">
                            {!! $productDetails->contents ?? '' !!}
                        </div>
                    </div>
                </div>
                <div class="content-right" data-aos="fade-up">
                    <div class="header-content-product">
                        <img src="{{asset('assets/images/box-tab.webp')}}" alt="" class="w-100">
                        <span class="title-product">{{__('product.video')}}</span>
                        <a href="{{route('category')}}" class="close-product">
                            <img src="{{asset('assets/images/close.webp')}}" alt="" class="btn-close-sp">
                        </a>
                    </div>
                    <div class="swiper mySwiper">
                        <div class="swiper-wrapper">
                            @foreach($videoProducts as $videoProduct)
                                <div class="swiper-slide">
                                    <div class="col-video">
                                        <div class="video-image">
                                            <img src="{{$videoProduct->src}}" alt="Image" class="product-details-video"/>
                                        </div>
                                        <div class="video-text">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <p class="d-flex align-items-center">{{__('product.video_see_more')}} ...</p>
                                                <a href="{{$videoProduct->link ?? '#'}}" class="video-btn">{{__('product.video_see_now')}}</a>
                                            </div>
                                            <p class="title-channel_name">{{$videoProduct->channel_name ?? ''}}</p>
                                            <p class="content-describes">{{$videoProduct->describes}}</p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="swiper-pagination-video"></div>
                    </div>

                </div>
            </div>
        </div>
        <img src="{{asset('assets/images/line-product.webp')}}" alt="" class="w-100 line-sp-bottom">
    </div>
@stop

@section('script_page')
    <script>
        var swiper = new Swiper(".mySwiper", {
            slidesPerView: "auto",
            autoplay: {
                delay: 3000,
            },
            pagination: {
                el: ".swiper-pagination-video",
            },
        });

    </script>
    <link rel="stylesheet" href="https://cdn.rawgit.com/michalsnik/aos/2.0.1/dist/aos.css" />
    <script src="https://cdn.rawgit.com/michalsnik/aos/2.0.1/dist/aos.js"></script>
    <script>
        AOS.init({
            duration: 1000,
            once: true
        });
    </script>
@stop
