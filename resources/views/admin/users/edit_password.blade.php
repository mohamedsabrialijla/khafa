@extends('admin.layout.admin')
@section('title'){{"تعديل بيانات"}}@endsection
@section('page-style')
@endsection
@section('content-header')
    <h1>تعديل كلمة المرور</h1>
    <ol class="breadcrumb">
        <li><a href="{{url(app()->getLocale().'/admin/home')}}"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
       @if($users->is_student == 1)
        <li><a href="{{url(app()->getLocale().'/admin/users_student')}}"><i class="fa fa-th"></i> طلاب</a></li>
         @else
         <li><a href="{{url(app()->getLocale().'/admin/users')}}"><i class="fa fa-th"></i>موكلين </a></li>
         @endif

        <li class="active">تعديل كلمة المرور</li>
    </ol>
@endsection
@section('content')
    <div class="row">
        <!-- left column -->
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">تعديل كلمة المرور</h3>
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
                
                <form class="form-horizontal" method="post" action="{{url(app()->getLocale().'/admin/users')}}/{{$users->id}}/{{'edit_password'}}"
                      enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="box-body">
                        <div class="form-group">
                            <div class="col-md-2" style="float: left;text-align: right">
                                <label>اسم المستخدم</label>
                            </div>
                            <div class="col-sm-10">
                                <input type="text" disabled="disabled" name="name" class="form-control" required value="{{$users->name}}"
                                       placeholder="اسم المستخدم">
                                <small>{{"* مطلوب"}}</small>
                            </div>
                        </div>

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
    <script>
    </script>
@endsection
