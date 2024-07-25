@extends('web.index')
@section('title','Giới thiệu về Đức Thanh')

@section('style_page')
    <link rel="stylesheet" href="{{ asset('assets/web/css/introduce.css') }}">
@stop
{{--content of page--}}
@section('content')
    <div class="introduce_desktop">
        <div class="position-relative">
            <img src="{{asset('assets/images/banner-introduce.webp')}}" alt="" class="w-100 img-banner-introduce">
            <div class="box-title-banner">
                <div class="title-banner-introduce">Chính sách bảo mật</div>
            </div>
        </div>
        <img src="{{asset('assets/images/line_introduce1.webp')}}" alt="" class="w-100 line-introduce1">
        <div class="container line-header-introduce">
            <span>Về Đức Thanh > </span>
            <span style="color: #D23C36;margin-left: 4px">Giới thiệu về Đức Thanh</span>
        </div>
        <div class="box-big-content-introduce">
            <div class="content-big1">
                <img src="{{asset('assets/images/icon-introduce1.png')}}" alt="" class="icon-introduce1">
                <div class="box1">
                    <img src="{{asset('assets/images/box-introduce1.webp')}}" alt="" class="icon-content1">
                    <div class="content1">
                        Bắt đầu từ năm 1996, Công ty TNHH Thiết bị giáo dục Đức Thanh đã chính thức xuất
                        hiện trên thị trường thông qua sự ra đời của Cơ sở sản xuất phấn Đức Thanh.
                        Ngày nay, thương hiệu Đức Thanh đã khẳng định được chỗ đứng vững chắc trên thị
                        trường văn phòng phẩm và đồ dùng học sinh Việt Nam và xuất khẩu đến một số
                        quốc gia trên thế giới.
                    </div>
                    <div class="title1">
                        1996 Thành lập Cơ sở sản xuất phấn Đức Thanh
                    </div>
                </div>

            </div>

            <div class="content-big2">
                <div class="box2">
                    <img src="{{asset('assets/images/box-introduce2.webp')}}" alt="" class="icon-content2">
                    <div class="content2">
                        Bắt đầu từ năm 1996, Công ty TNHH Thiết bị giáo dục Đức Thanh đã chính thức xuất
                        hiện trên thị trường thông qua sự ra đời của Cơ sở sản xuất phấn Đức Thanh.
                        Ngày nay, thương hiệu Đức Thanh đã khẳng định được chỗ đứng vững chắc trên thị
                        trường văn phòng phẩm và đồ dùng học sinh Việt Nam và xuất khẩu đến một số
                        quốc gia trên thế giới.
                    </div>
                    <div class="title2">
                        1996 Thành lập Cơ sở sản xuất phấn Đức Thanh
                    </div>
                </div>
                <img src="{{asset('assets/images/icon-introduce2.png')}}" alt="" class="icon-introduce2">
            </div>

            <img src="{{asset('assets/images/line_introduce1.webp')}}" alt="" class="w-100 line-introduce2">

            <div class="content-big3">
                <img src="{{asset('assets/images/icon-introduce1.png')}}" alt="" class="icon-introduce1">
                <div class="box1">
                    <img src="{{asset('assets/images/box-introduce1.webp')}}" alt="" class="icon-content1">
                    <div class="content1">
                        Bắt đầu từ năm 1996, Công ty TNHH Thiết bị giáo dục Đức Thanh đã chính thức xuất
                        hiện trên thị trường thông qua sự ra đời của Cơ sở sản xuất phấn Đức Thanh.
                        Ngày nay, thương hiệu Đức Thanh đã khẳng định được chỗ đứng vững chắc trên thị
                        trường văn phòng phẩm và đồ dùng học sinh Việt Nam và xuất khẩu đến một số
                        quốc gia trên thế giới.
                    </div>
                    <div class="title3">
                        Nhà máy 5.000m2, 300 con người,
                        đồng hành cùng khách hàng
                    </div>
                </div>

            </div>

            <div class="content-big4">
                <div class="box2">
                    <img src="{{asset('assets/images/box-introduce2.webp')}}" alt="" class="icon-content2">
                    <div class="content2">
                        Bắt đầu từ năm 1996, Công ty TNHH Thiết bị giáo dục Đức Thanh đã chính thức xuất
                        hiện trên thị trường thông qua sự ra đời của Cơ sở sản xuất phấn Đức Thanh.
                        Ngày nay, thương hiệu Đức Thanh đã khẳng định được chỗ đứng vững chắc trên thị
                        trường văn phòng phẩm và đồ dùng học sinh Việt Nam và xuất khẩu đến một số
                        quốc gia trên thế giới.
                    </div>
                    <div class="title4">
                        Cảm ơn khách hàng!
                        Đức Thanh
                    </div>
                </div>
                <img src="{{asset('assets/images/icon-introduce2.png')}}" alt="" class="icon-introduce2">
            </div>

        </div>
    </div>

    <div class="introduce_mobile">
        <div class="position-relative">
            <img src="{{asset('assets/images/banner-introduce2.webp')}}" alt="" class="w-100 img-banner-introduce">
            <div class="box-title-banner-mobile">
                <div class="title-banner-introduce-mobile">Chính sách bảo mật</div>
            </div>
        </div>
        <img src="{{asset('assets/images/line-introduce2.webp')}}" alt="" class="w-100 line-introduce-mobile">
        <div class="container line-header-introduce-mobile">
            <span>Về Đức Thanh > </span>
            <span style="color: #D23C36;margin-left: 4px">Giới thiệu về Đức Thanh</span>
        </div>
        <div class="box-big-content-introduce-mobile">

            <div class="content-big-mobile1">
                <img src="{{asset('assets/images/icon-introduce1.png')}}" alt="" class="icon-introduce-mobile1">
                <div class="box-mobile1">
                    <img src="{{asset('assets/images/box-introduce-mobile1.webp')}}" alt="" class="icon-content-mobile1 w-100">
                    <div class="content-mobile1">
                        Bắt đầu từ năm 1996, Công ty TNHH Thiết bị giáo dục Đức Thanh đã chính thức xuất
                        hiện trên thị trường thông qua sự ra đời của Cơ sở sản xuất phấn Đức Thanh.
                        Ngày nay, thương hiệu Đức Thanh đã khẳng định được chỗ đứng vững chắc trên thị
                        trường văn phòng phẩm và đồ dùng học sinh Việt Nam và xuất khẩu đến một số
                        quốc gia trên thế giới.
                    </div>
                    <div class="title-mobile1">
                        1996 Thành lập Cơ sở sản xuất phấn Đức Thanh
                    </div>
                </div>

            </div>

            <div class="content-big-mobile2">
                <img src="{{asset('assets/images/icon-introduce2.png')}}" alt="" class="icon-introduce-mobile2">
                <div class="box-mobile1">
                    <img src="{{asset('assets/images/box-introduce-mobile2.webp')}}" alt="" class="icon-content-mobile1 w-100">
                    <div class="content-mobile1">
                        Với những mục tiêu và kế hoạch kinh doanh
                        vững bền, Các sản phẩm của Đức Thanh đã
                        được Quý Khách hàng, thầy cô giáo, học sinh,
                        sinh viên yêu mến và tin dùng. Những sản
                        phẩm tiêu biểu như Phấn Nét Hoa, Bút Phấn,
                        Phấn màu mỹ thuật, Bút sáp màu, Sáp nặn,
                        thuộc với người tiêu dùng. Thời gian tới, Công
                        các loại Bảng… đã trở nên vô cùng quen
                        ty TNHH Thiết bị giáo dục Đức Thanh sẽ tiếp
                        tục đưa ra các sản phẩm mới, với thiết kế,
                        hợp với người tiêu dùng trên thị trường Việt.
                    </div>
                    <div class="title-mobile2">
                        Thế giới văn phòng
                        phẩm đa dạng và
                        chất lượng
                    </div>
                </div>

            </div>

            <img src="{{asset('assets/images/line-introduce2.webp')}}" alt="" class="w-100 line-introduce-mobile2">

            <div class="content-big-mobile3">
                <img src="{{asset('assets/images/icon-introduce2.png')}}" alt="" class="icon-introduce-mobile1">
                <div class="box-mobile1">
                    <img src="{{asset('assets/images/box-introduce-mobile1.webp')}}" alt="" class="icon-content-mobile1 w-100">
                    <div class="content-mobile1 content-mobile3">
                        Công ty TNHH Thiết bị giáo dục Đức Thanh
                        đang sản xuất kinh doanh tại nhà máy sản
                        lao động. Đức Thanh hiện đang liên tục đầu
                        xuất có diện tích 5.000m2 với quy mô 300
                        tư máy móc, nhập khẩu các dây chuyền công
                        nghệ sản xuất hiện đại để đáp ứng yêu cầu
                        ngày càng cao của Quý Khách hàng.
                    </div>
                    <div class="title-mobile1" style="color: #D23C36">
                        Nhà máy 5.000m2,
                        300 con người,
                        đồng hành cùng
                        khách hàng
                    </div>
                </div>

            </div>

            <div class="content-big-mobile2 content-big-mobile4">
                <img src="{{asset('assets/images/icon-introduce2.png')}}" alt="" class="icon-introduce-mobile2">
                <div class="box-mobile1">
                    <img src="{{asset('assets/images/box-introduce-mobile2.webp')}}" alt="" class="icon-content-mobile1 w-100">
                    <div class="content-mobile1">
                        Với những mục tiêu và kế hoạch kinh doanh
                        vững bền, Các sản phẩm của Đức Thanh đã
                        được Quý Khách hàng, thầy cô giáo, học sinh,
                        sinh viên yêu mến và tin dùng. Những sản
                        phẩm tiêu biểu như Phấn Nét Hoa, Bút Phấn,
                        Phấn màu mỹ thuật, Bút sáp màu, Sáp nặn,
                        thuộc với người tiêu dùng. Thời gian tới, Công
                        các loại Bảng… đã trở nên vô cùng quen
                        ty TNHH Thiết bị giáo dục Đức Thanh sẽ tiếp
                        tục đưa ra các sản phẩm mới, với thiết kế,
                        hợp với người tiêu dùng trên thị trường Việt.
                    </div>
                    <div class="title-mobile2">
                        Thế giới văn phòng
                        phẩm đa dạng và
                        chất lượng
                    </div>
                </div>

            </div>

        </div>
    </div>

@stop
@section('script_page')

@stop
