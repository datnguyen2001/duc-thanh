@extends('web.index')
@section('title','Sản phẩm')

@section('style_page')
    <link rel="stylesheet" href="{{ asset('assets/web/css/category.css') }}">
@stop
{{--content of page--}}
@section('content')
    <div class="contact-page">
        <div class="contact-banner">
            <div class="container">
                <div class="contact-title">
                    <h1>
                        Khám phá các sản phẩm<br>
                        của Đức Thanh
                    </h1>
                    <img src="{{asset('assets/images/contact/underlined.png')}}" alt="Underlined" />
                </div>
            </div>
        </div>
    </div>

@stop
@section('script_page')

@stop
