@extends('web.index')
@section('title','Hoạt Động')
@section('meta')
    <meta property="og:url" content="{{route('activity')}}"/>
    <meta property="og:type" content="website"/>
    <meta property="og:title" content="{{@$meta->title}}"/>
    <meta property="og:description" content="{{@$meta->description}}"/>
    <meta property="og:image" content="{{asset(@$meta->image)}}"/>
@endsection
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
        <div class="activity-video">
            @include('web.activity.partials.video')
        </div>
        <div class="activity-background-footer-container">
            <img src="{{asset('assets/images/activity/background-4.png')}}" alt="Background" class="activity-background-footer"/>
        </div>

    </div>

@stop
@section('script_page')

@stop
