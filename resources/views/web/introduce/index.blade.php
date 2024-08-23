@extends('web.index')
@section('title','Giới thiệu về Đức Thanh')
@section('meta')
    <meta property="og:url" content="{{route('introduce')}}"/>
    <meta property="og:type" content="website"/>
    <meta property="og:title" content="{{@$meta->title}}"/>
    <meta property="og:description" content="{{@$meta->description}}"/>
    <meta property="og:image" content="{{asset(@$meta->image)}}"/>
@endsection
@section('style_page')
    <link rel="stylesheet" href="{{ asset('assets/web/css/introduce.css') }}">
@stop
{{--content of page--}}
@section('content')
    <div class="introduce_desktop">
        <div class="position-relative">
            @if($banner)
                <img src="{{$banner->src}}" alt="" class="w-100 img-banner-introduce">
            @else
                <img src="{{asset('assets/images/banner-introduce.webp')}}" alt="" class="w-100 img-banner-introduce">
            @endif
            <div class="box-title-banner">
                <div class="title-banner-introduce">{{__('about.title')}}</div>
            </div>
        </div>
        <img src="{{asset('assets/images/line_introduce1.webp')}}" alt="" class="w-100 line-introduce1">
        <div class="container line-header-introduce">
            <span>{{__('about.about')}} > </span>
            <span style="color: #D23C36;margin-left: 4px">{{__('about.introduce')}}</span>
        </div>
        <div class="box-big-content-introduce">
            @foreach ($data as $key => $item)
                @php
                    $contentClass = '';
                    $titleClass = '';
                    $iconClass = '';
                    $boxClass = '';

                    switch ($key % 4) {
                        case 0:
                            $contentClass = 'content-big1';
                            $titleClass = 'title1';
                            $iconClass = 'icon-introduce1';
                            $boxClass = 'box1';
                            break;
                        case 1:
                            $contentClass = 'content-big2';
                            $titleClass = 'title2';
                            $iconClass = 'icon-introduce2';
                            $boxClass = 'box2';
                            break;
                        case 2:
                            $contentClass = 'content-big3';
                            $titleClass = 'title3';
                            $iconClass = 'icon-introduce1';
                            $boxClass = 'box1';
                            break;
                        case 3:
                            $contentClass = 'content-big4';
                            $titleClass = 'title4';
                            $iconClass = 'icon-introduce2 icon-introduce4';
                            $boxClass = 'box2';
                            break;
                    }
                @endphp

                <div class="{{ $contentClass }}" data-aos="fade-up">
                    <div class="{{ $boxClass }}">
                        <img src="{{ asset('assets/images/box-introduce' . ($key % 2 + 1) . '.webp') }}" alt="" class="icon-content{{ $key % 2 + 1 }}">
                        <div class="content{{ $key % 2 + 1 }}">
                            {!! $item->contents !!}
                        </div>
                        <div class="{{ $titleClass }}">
                            {{ $item->names }}
                        </div>
                    </div>
                    <img src="{{ asset($item->src) }}" alt="" class="{{ $iconClass }}">
                </div>

                @if ($key % 4 == 1)
                    <img src="{{ asset('assets/images/line_introduce1.webp') }}" alt="" class="w-100 line-introduce2">
                @endif
            @endforeach

        </div>
    </div>

    <div class="introduce_mobile">
        <div class="position-relative">
            @if($banner)
                <img src="{{$banner->src_mobile}}" alt="" class="w-100 img-banner-introduce">
            @else
                <img src="{{asset('assets/images/banner-introduce2.webp')}}" alt="" class="w-100 img-banner-introduce">
            @endif
            <div class="box-title-banner-mobile">
                <div class="title-banner-introduce-mobile">{{__('about.title')}}</div>
            </div>
        </div>
        <img src="{{asset('assets/images/line-introduce2.webp')}}" alt="" class="w-100 line-introduce-mobile">
        <div class="container line-header-introduce-mobile">
            <span>{{__('about.about')}} > </span>
            <span style="color: #D23C36;margin-left: 4px">{{__('about.introduce')}}</span>
        </div>
        <div class="box-big-content-introduce-mobile">
            @foreach ($data as $index => $item)
                @php
                    $contentMobileClass = '';
                    $textMobileClass = '';
                    switch ($index % 4) {
                        case 0:
                            $contentMobileClass = 'content-big-mobile1';
                            $textMobileClass = 'content-mobile1';
                            break;
                        case 1:
                            $contentMobileClass = 'content-big-mobile2';
                            $textMobileClass = 'content-mobile2';
                            break;
                        case 2:
                            $contentMobileClass = 'content-big-mobile3';
                            $textMobileClass = 'content-mobile3';
                            break;
                        case 3:
                            $contentMobileClass = 'content-big-mobile2 content-big-mobile4';
                            $textMobileClass = 'content-mobile4';
                            break;
                    }
                @endphp
                <div class="{{ $contentMobileClass }}">
                    <img src="{{ asset('assets/images/icon-introduce' . ($index % 2 + 1) . '.png') }}" alt="" class="icon-introduce-mobile{{ $index % 2 + 1 }}">
                    <div class="box-mobile1">
                        <img src="{{ asset('assets/images/box-introduce-mobile' . ($index % 2 + 1) . '.webp') }}" alt="" class="icon-content-mobile1 w-100">
                        <div class="content-mobile1 {{$textMobileClass}}">
                            {!! $item->contents !!}
                        </div>
                        <div class="title-mobile{{ $index % 2 + 1 }}">
                            {{ $item->names }}
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>

@stop
@section('script_page')

@stop
