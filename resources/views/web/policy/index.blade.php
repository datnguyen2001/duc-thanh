@extends('web.index')
@section('title','Chính sách bảo mật')

@section('style_page')
    <link rel="stylesheet" href="{{ asset('assets/web/css/policy.css') }}">
@stop
{{--content of page--}}
@section('content')
    <div class="policy_desktop">
        <div class="position-relative">
            <img src="{{asset('assets/images/banner_policy.webp')}}" alt="" class="w-100 img-banner-policy">
            <div class="box-title-banner">
                <div class="title-banner-policy">Chính sách bảo mật</div>
                <img src="{{asset('assets/images/line.webp')}}" alt="">
            </div>
        </div>
        <div class="container">
            <div class="line-header-policy">
                <span>Về Đức Thanh > </span>
                <span style="color: #D23C36;margin-left: 4px">Chính sách bảo mật</span>
            </div>
            <p class="title-policy">Chính sách bảo mật thông tin</p>
            <div class="box-content-policy">
                <img src="{{asset('assets/images/content_policy.webp')}}" alt="" class="w-100 img-content-policy">
                <div class="box-content-child-policy">
                    @foreach($data as $val)
                    <div>
                        <p class="title-child-policy">{{$val->name}}</p>
                        <div class="content-child-policy">{!! $val->content !!}</div>
                    </div>
                   @endforeach
                </div>
            </div>
        </div>
    </div>

    <div class="policy_mobile">
        <div class="position-relative">
            <img src="{{asset('assets/images/banner_policy_mobile.webp')}}" alt="" class="w-100 img-banner-policy_mobile">
            <div class="title-banner-policy-mobile">Chính sách bảo mật</div>
        </div>
        <div class="container">
            <div class="position-relative" style="overflow: hidden;">
                <div class="line-header-policy-mobile">
                    <span>Về Đức Thanh > </span>
                    <span style="color: #D23C36;margin-left: 4px">Chính sách bảo mật</span>
                </div>
                <p class="title-policy-mobile">Chính sách bảo mật thông tin</p>
                <img src="{{asset('assets/images/content-mobile.webp')}}" alt="" class="img-content-policy-mobile w-100">
                @foreach($dataMobile as $item)
                <div class="box-content-child-policy-mobile">
                    <p class="title-child-policy">{{$item->name}}</p>
                    <div class="content-child-policy">{!! $item->content !!} </div>
                </div>
                    @endforeach
            </div>
            <div class="d-flex justify-content-center">
                {{ $dataMobile->appends(request()->all())->links('web.partials.pagination') }}
            </div>

        </div>
    </div>

@stop
@section('script_page')

@stop
