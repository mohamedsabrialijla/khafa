@extends('admin.layout.admin')
@section('title'){{"اضافة موكل جديد"}}@endsection
@section('page-style')
   
@endsection
@section('content-header')
    <h1>اضافة موكل جديد</h1>
    <ol class="breadcrumb">
        <li><a href="{{url(app()->getLocale().'/admin/home')}}"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
        <li><a href="{{url(app()->getLocale().'/admin/users')}}"><i class="fa fa-th"></i> موكلين</a></li>
        <li class="active">اضافة موكل جديد</li>
    </ol>
@endsection
@section('content')
    <div class="row">
        <!-- left column -->
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">اضافة موكل</h3>
                </div>
                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <strong>{{'Error'}}!</strong>{{' Wrong data entry'}}<br>
                        <ul>
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

                @if(Session::get('success'))
                    <div class="alert alert-success">
                        {{trans(Session::get('success'))}}
                    </div>               
                @endif
                
                <form class="form-horizontal" method="post" action="{{url(app()->getLocale().'/admin/users')}}"
                      enctype="multipart/form-data" id="users_register">
                    {{csrf_field()}}
                    <div class="box-body">
                        <div class="form-group">
                            <div class="col-md-2" style="float: left;text-align: right">
                                <label>اسم الموكل</label>
                            </div>
                            <div class="col-sm-10">
                                <input type="text" name="name" class="form-control" required value="{{old('name'   )}}"
                                       placeholder="اسم الموكل">
                                <small>{{"* مطلوب"}}</small>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-2" style="float: left;text-align: right">
                                <label>البريد الالكتروني</label>
                            </div>
                            <div class="col-sm-10">
                                <input type="email" name="email" class="form-control" required value="{{old('email'   )}}"
                                       placeholder="البريد الالكتروني">
                                <small>{{"* مطلوب"}}</small>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-2" style="float: left;text-align: right">
                                <label>رقم الجوال</label>
                            </div>
                            <div class="col-sm-10">
                                <input type="text" name="mobile" class="form-control" required value="{{old('mobile'   )}}"
                                       placeholder="رقم الجوال">
                                <small>{{"* مطلوب"}}</small>
                            </div>
                        </div>

                       {{--  <div class="form-group">
                            <div class="col-md-2" style="float: left;text-align: right">
                                <label>رقم الهوية</label>
                            </div>
                            <div class="col-sm-10">
                                <input type="text" name="id_person" class="form-control" required value="{{old('id_person'   )}}"
                                       placeholder="رقم الهوية">
                                <small>{{"* مطلوب"}}</small>
                            </div>
                        </div> --}}


                         <div class="form-group">
                            <div class="col-md-2" style="float: left;text-align: right">
                                <label>كلمة المرور</label>
                            </div>
                            <div class="col-sm-10">
                                <input type="password" name="password" value="" class="form-control" required
                                       placeholder="كلمة المرور">
                                <small>{{"* مطلوب"}}</small>
                            </div>
                        </div>
                         <div class="form-group">
                            <div class="col-md-2" style="float: left;text-align: right">
                                <label>تاكيد كلمة المرور</label>
                            </div>
                            <div class="col-sm-10">
                                <input type="password" name="confirm_password" value="" class="form-control" required 
                                       placeholder="تاكيد كلمة المرور">
                                <small>{{"* مطلوب"}}</small>
                            </div>
                        </div>
                        
                    </div>

                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary pull-right">حفظ</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('js-plugins')
 
@endsection
@section('page-script')
   
@endsection
