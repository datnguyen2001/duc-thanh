@extends('web.index')
@section('title','Trang chủ')

@section('style_page')
@stop
{{--content of page--}}
@section('content')
    @include('web.home.partials.banner')
    <section>
        @include('web.home.partials.about')
    </section>
    <div class="container" style="padding-bottom: 50px;">
        <section>
            @include('web.home.partials.product')
        </section>
    </div>
    <section>
        @include('web.home.partials.activity')
    </section>
    <section>
        <div class="home-contact" style="margin-top: -100px;">
            <div class="container" style="padding-top: 175px;">
                <h5 class="title">Liên hệ</h5>
                <h1>
                    Liên hệ với Đức Thanh <br>
                    để được hỗ trợ
                </h1>
                <img src="{{asset('assets/images/home/underlined.png')}}" alt="Activity" style="padding-bottom: 50px"/>
                @include('web.home.partials.contact')
            </div>
        </div>

    </section>
@stop
@section('script_page')
@stop
