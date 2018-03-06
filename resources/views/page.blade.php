@extends('layouts.app')
@section('title'){{$page->title}}@endsection
@section('key-words'){{$page->key_words}}@endsection
@section('description'){{strip_tags($page->description)}}@endsection
@section('nav-container')
    <div class="container">
        <div class="content-header">
            <h1 class="wow bounceInLeft all-mob">{{$page->title}}</h1>
        </div>
    </div>
@endsection
@section('header-class'){{'courses-header'}}@endsection
@section('content')
    <section class="all-course about-us">
        <div class="container">
            <ol class="breadcrumb">
                <li><a href="{{url(app()->getLocale().'/')}}" title="Home">Home</a></li>
                <li>{{$page->title}}</li>
            </ol>
            {{--<hr class="hr">--}}
            @if(!is_null($page->image))
                <div class="col-md-4 col-md-offset-4">
                    <img style="margin: auto;display: block;" src="{{$page->image}}" alt="{{$page->title}}">
                </div>
                <div class="clearfix"></div>
            @endif
            <div class="row text-center">
                <div class="col-sm-8 col-sm-offset-2">
                    <h2 class="title">Terms & Conditions</h2>
                    <div class="terms-content text-left">
                        {!! $page->description !!}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
