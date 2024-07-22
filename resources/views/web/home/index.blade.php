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
    <div class="container">
        <section>
            @include('web.home.partials.product')
        </section>
    </div>
    <section>
        @include('web.home.partials.activity')
    </section>
    <section>
        @include('web.home.partials.contact')
    </section>
@stop
@section('script_page')
@stop
