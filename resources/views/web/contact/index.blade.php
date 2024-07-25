@extends('web.index')
@section('title','Liên Hệ')

@section('style_page')
    <link rel="stylesheet" href="{{ asset('assets/web/css/contact.css') }}">
@stop
{{--content of page--}}
@section('content')
    <div class="contact-page">
        <div class="contact-banner">
            <div class="container">
                <div class="contact-title">
                    <h1>
                        Liên hệ với Đức Thanh<br>
                        để được hỗ trợ
                    </h1>
                    <img src="{{asset('assets/images/contact/underlined.png')}}" alt="Underlined" />
                </div>
            </div>

        </div>
        <div class="home-contact">
            <div class="container">
                @include('web.home.partials.contact')
            </div>
        </div>

    </div>

@stop
@section('script_page')
    <script src="{{asset('assets/web/js/contact.js')}}"></script>
@stop
