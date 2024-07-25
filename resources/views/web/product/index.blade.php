@extends('web.index')
@section('title','Chi tiết sản phẩm')

@section('style_page')
    <link rel="stylesheet" href="{{ asset('assets/web/css/product.css') }}">
@stop
{{--content of page--}}
@section('content')
    <div class="policy_desktop">
        <div class="position-relative header-sp-desktop">
            <img src="{{asset('assets/images/banner-sp.webp')}}" alt="" class="w-100 img-banner-sp">
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
                <span style="color: #D23C36;margin-left: 4px"> Bút sáp màu</span>
            </div>
            <div class="box-content-product">
                <div class="content-left">
                    <div class="header-content-product">
                        <img src="{{asset('assets/images/box-tab.webp')}}" alt="" class="w-100">
                        <span class="title-product">Bút sáp màu</span>
                    </div>
                    <a href="" class="close-product-mobile">
                        <img src="{{asset('assets/images/close.webp')}}" alt="" class="btn-close-sp">
                    </a>
                    <div class="box-border-sp">
                        <img src="{{asset('assets/images/img-sp.webp')}}" class="w-100" style="object-fit: cover">
                    </div>
                    <div class="content-detai-sp">
                        Mã sản phẩm: ĐT-BS12
                        Bút sáp 12 màu có bao bì đa dạng,nhiều nhân vật ngộ nghĩnh,đáng yêu phù hợp với các bạn nhỏ đang tập tô
                        màu. Mô tả sản phẩm:12 cây sáp với màu sắc tươi sáng,rực rỡ,màu phủ đều và đẹp,không bết và không tạo vẩn bụi
                        khi tô. Sản phẩm với giá cạnh tranh, thích hợp làm phần thưởng ý nghĩa cho các bạn nhỏ.
                        Hướng dẫn sử dụng:Lưu trữ nơi khô ráo,thoáng mát,tuyệt đối tránh xa nguồn nhiệt.Sản phẩmcócácchitiết
                        nhỏ, không thích hợp cho trẻ em dưới 03 tuổi.
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
                            @for($i=0;$i<3;$i++)
                            <div class="swiper-slide">
                                <div class="col-video">
                                    <div class="video-image">
                                        <img src="{{asset('assets/images/activity/video-product.webp')}}" alt="Image" class="w-100" style="object-fit: cover"/>
                                    </div>
                                    <div class="video-text">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <p class="d-flex align-items-center">Xem thêm các video ...</p>
                                            <a href="#" class="video-btn">Xem ngay</a>
                                        </div>
                                        <p>@tbgdducthanh</p>
                                        <p>Bộ bút sáp màu"Cô bé quàng khăn đỏ" mới ra mắt nhà Đức Thanh với màu sắc ...</p>
                                    </div>
                                </div>
                            </div>
                                @endfor
                        </div>
                        <div class="swiper-pagination-video"></div>
                    </div>

                </div>
            </div>
        </div>
        <img src="{{asset('assets/images/line-product.webp')}}" alt="" class="w-100 img-line-sp">
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
