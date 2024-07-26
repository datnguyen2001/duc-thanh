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
            <div class="title-banner-sp">Khám phá các sản phẩm
                của Đức Thanh</div>
            <img src="{{asset('assets/images/line-sp.webp')}}" alt="" class="img-line-sp">
        </div>
        <div class="position-relative header-sp-mobile">
            <img src="{{asset('assets/images/banner-sp-mobile.webp')}}" alt="" class="w-100 img-banner-sp">
            <div class="title-banner-sp">Khám phá các sản phẩm
                của Đức Thanh</div>
        </div>
        <div class="container box-big-content">
            <div class="line-header-product">
                <span>Trang chủ > </span>
                <span style="margin-left: 4px"> Sản phẩm > </span>
                <span style="color: #D23C36;margin-left: 4px"> {{$productDetails->category->name ?? ''}}</span>
            </div>
            <div class="box-content-product">
                <div class="content-left">
                    <span class="title-product background-title">{{$productDetails->category->name ?? ''}}</span>
                    <a href="" class="close-product-mobile">
                        <img src="{{asset('assets/images/close.webp')}}" alt="" class="btn-close-sp">
                    </a>
                    <div class="box-border-sp">
                        <img src="{{$productDetails->src}}" class="w-100" style="object-fit: cover">
                    </div>
                    <div class="content-detai-sp">
                        {!! $productDetails->contents ?? '' !!}
                    </div>
                </div>
                <div class="content-right">
                    <div class="header-content-product">
                        <img src="{{asset('assets/images/box-tab.webp')}}" alt="" class="w-100">
                        <span class="title-product">Video sản phẩm</span>
                        <a href="" class="close-product">
                            <img src="{{asset('assets/images/close.webp')}}" alt="" class="btn-close-sp">
                        </a>
                    </div>
                    <div class="swiper mySwiper">
                        <div class="swiper-wrapper">
                            @foreach($videoProducts as $videoProduct)
                                <div class="swiper-slide">
                                    <div class="col-video">
                                        <div class="video-image">
                                            <img src="{{$videoProduct->src}}" alt="Image" class="w-100" style="object-fit: cover"/>
                                        </div>
                                        <div class="video-text">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <p class="d-flex align-items-center">Xem thêm các video ...</p>
                                                <a href="{{$videoProduct->link ?? '#'}}" class="video-btn">Xem ngay</a>
                                            </div>
                                            <p>{{$videoProduct->channel_name ?? ''}}</p>
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
@stop
