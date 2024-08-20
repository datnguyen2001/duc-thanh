@extends('web.index')
@section('title','Trang chủ')
@section('meta')
    <meta property="og:url" content="{{route('home')}}"/>
    <meta property="og:type" content="website"/>
    <meta property="og:title" content="{{@$meta->title}}"/>
    <meta property="og:description" content="{{@$meta->description}}"/>
    <meta property="og:image" content="{{asset(@$meta->image)}}"/>
@endsection
@section('style_page')
@stop
{{--content of page--}}
@section('content')
    @include('web.home.partials.banner')
    <section>
        @include('web.home.partials.about')
    </section>
    <div class="home_product container">
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
                <h5 class="title">{{__('home.contact')}}</h5>
                <h1>
                    {{__('home.contact_title_1')}} <br>
                    {{__('home.contact_title_2')}}
                </h1>
                <img src="{{asset('assets/images/home/underlined.png')}}" alt="Activity" style="padding-bottom: 50px"/>
                @include('web.home.partials.contact')
            </div>
        </div>

    </section>
@stop
@section('script_page')
    <script src="{{asset('assets/web/js/contact.js')}}"></script>
@stop
