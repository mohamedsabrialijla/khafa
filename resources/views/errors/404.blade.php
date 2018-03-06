@extends('layouts.app')
@section('title'){{"404"}}@endsection
@section('key-words'){{$setting->key_words}}@endsection
@section('description'){{strip_tags($setting->description)}}@endsection
@section('nav-container')
    <div class="container">
        <div class="content-header">
            <h1 class="wow bounceInLeft all-mob">{{"404 Not Found"}}</h1>
        </div>
    </div>
@endsection
@section('header-class'){{'courses-header'}}@endsection
@section('content')
    <section class="error-404-sec">
        <div class="container">
            <ol class="breadcrumb">
                <li><a href="{{url('/')}}">Home</a></li>
                <li>404 Not Found</li>
            </ol>
            <hr class="hr">
            <!-- Start Grid System -->
            <div class="row">
                {{-- <div class="col-md-6 left-img">
                    <img src="https://3ek5k1tux0822q3g83e30fye-wpengine.netdna-ssl.com/wp-content/themes/eduma/images/image-404.jpg"
                         alt="404-page">
                </div> --}}
                <div class="col-md-6 text-center box-right-404">
                    <h2>
                        404
                        <span class="err-color">Error!</span>
                    </h2>
                    <p>
                        Sorry, we can't find the page you are looking for.
                        Please go to <a href="#">Home.</a>
                    </p>
                </div>
            </div>
            <!-- End Grid System -->
        </div>
    </section>
@endsection
