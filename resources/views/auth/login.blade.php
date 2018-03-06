@extends('layouts.app')
{{--@section('title'){{$page->title}}@endsection--}}
@section('title'){{"Login"}}@endsection

@section('content')
    <section class="register">
        <div class="container">
                <nav aria-label="breadcrumb" role="navigation">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">User Profile</li>
                  </ol>
                </nav>
                <div class="row">
                    <div class="col-md-10 col-sm-11 margin-auto">
                        <div class="box-content box-p0">
                            <div class="box-C-head clearfix">
                                <h2>Login</h2>
                            </div>
                            <div class="box-C-warpper pa--0">
                                
                                    <div class="f-part-top">
                                       @if (count($errors) > 0)
                                        <div class="alert alert-danger">
                                            <strong>{{'Error'}}!</strong>{{' Wrong data entry'}}<br>
                                            <ul class="list-unstyled">
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                    @if (session('status'))
                                        <div class="alert alert-success">
                                            {{ session('status') }}
                                        </div>
                                    @endif
                                        <div class="row">
                                            <form id="signUp" method="POST" action="{{url(app()->getLocale().'/login')}}">
                                            {{ csrf_field() }}
                                                <div class="col-sm-8">
                                                    
                                                    <div class="form-group">
                                                        <div class="row">
                                                            <label class="col-sm-4 control-label">Email</label>
                                                            <div class="col-sm-8">
                                                                <input type="email" class="form-control" name="email" value="" placeholder="Email">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="form-group">
                                                        <div class="row">
                                                            <label class="col-sm-4 control-label">Password</label>
                                                            <div class="col-sm-8">
                                                                <input type="password" class="form-control" name="password" value="" placeholder="Password" id="password">
                                                            </div>
                                                        </div>
                                                    </div>
                                                   
                                                </div>
                                        </div>
                                    </div>
                                    <div class="f-part-bottom">
                                        <div class="row">
                                            <div class="col-sm-9">
                                                 <div class="agreement">
                                                    <label>
                                                        <input type="checkbox"
                                                               name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                                    </label>
                                                    
                                                </div>
                                            </div>
                                          
                                            <div class="col-sm-3">
                                                <button type="submit" class="btn btn-submit">Login</button>
                                            </div>
                                        </div>
                                        <div class="member">
                                                    <span>Not a member? </span>
                                                    <a href="{{url(app()->getLocale().'/register')}}"> Register now</a>
                                                </div>
                                                <div class="member">
                                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                                        Forgot Your Password?
                                                    </a>
                                                </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>
@endsection
@section('js')
    <script src='https://www.google.com/recaptcha/api.js'></script>
    <script src="{{url('front_end_assets/build/js/intlTelInput.js')}}"></script>
    <script>
        $("#phone").intlTelInput({
            utilsScript: "{{url('/front_end_assets/build/js/utils.js')}}"
        });
    </script>
@endsection