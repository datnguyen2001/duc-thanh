@extends('web.index')
@section('title','Hoạt Động')

@section('style_page')
    <link rel="stylesheet" href="{{ asset('assets/web/css/activity.css') }}">
@stop
{{--content of page--}}
@section('content')
    <div class="activity-page">
        <div class="activity-banner">
            @include('web.activity.partials.banner')
        </div>
        <div class="activity-image">
            @include('web.activity.partials.image')
        </div>

    </div>

@stop
@section('script_page')

@stop
