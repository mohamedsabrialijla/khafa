@extends('admin.layout.admin')
@section('title'){{"اضافة طالب جديد"}}@endsection
@section('page-style')
   
@endsection
@section('content-header')
    <h1>اضافة طالب جديد</h1>
    <ol class="breadcrumb">
        <li><a href="{{url(app()->getLocale().'/admin/home')}}"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
        <li><a href="{{url(app()->getLocale().'/admin/users')}}"><i class="fa fa-th"></i> طلاب</a></li>
        <li class="active">اضافة طالب جديد</li>
    </ol>
@endsection
@section('content')
    <div class="row">
        <!-- left column -->
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">اضافة طالب</h3>
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
                
                <form class="form-horizontal" method="post" action="{{url(app()->getLocale().'/admin/users_student')}}"
                      enctype="multipart/form-data" id="users_register">
                    {{csrf_field()}}
                    <input type="hidden" name="is_student" value="1">
                    <div class="box-body">
                        <div class="form-group">
                            <div class="col-md-2" style="float: left;text-align: right">
                                <label>اسم الطالب</label>
                            </div>
                            <div class="col-sm-10">
                                <input type="text" name="name" class="form-control" required value="{{old('name')}}"
                                       placeholder="اسم الطالب">
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

                        <div class="form-group">
                            <div class="col-md-2" style="float: left;text-align: right">
                                <label>رقم الهوية</label>
                            </div>
                            <div class="col-sm-10">
                                <input type="text" name="id_person" class="form-control" required value="{{old('id_person'   )}}"
                                       placeholder="رقم الهوية">
                                <small>{{"* مطلوب"}}</small>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-2" style="float: left;text-align: right">
                                <label>الرقم الجامعي</label>
                            </div>
                            <div class="col-sm-10">
                                <input type="text" name="univesity_id" class="form-control" required value="{{old('univesity_id')}}"
                                       placeholder="الرقم الجامعي">
                                <small>{{"* مطلوب"}}</small>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-2" style="float: left;text-align: right">
                                <label>المدينة</label>
                            </div>
                            <div class="col-sm-10">
                                <input type="text" name="city" class="form-control" required value="{{old('city')}}"
                                       placeholder="المدينة">
                                <small>{{"* مطلوب"}}</small>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-2" style="float: left;text-align: right">
                                <label>العنوان</label>
                            </div>
                            <div class="col-sm-10">
                                <input type="text" name="adress" class="form-control" required value="{{old('adress')}}"
                                       placeholder="العنوان">
                                <small>{{"* مطلوب"}}</small>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-2" style="float: left;text-align: right">
                                <label>صورة الهوية الجامعية</label>
                            </div>
                        </div>
                        <div class="row text-center">
                            <div class="col-sm-6 col-md-offset-3">
                                <div class="fileinput-new thumbnail"
                                     onclick="document.getElementById('thumb_image').click()"
                                     style="cursor:pointer">
                                    <img src="{{url('front_end_assets/image/image-icon.png')}}"
                                         id="thumbImage" style="max-height: 256px !important;">
                                </div>
                                <label class="control-label">{{"صورة وهمية : "}}</label>
                                <div class="btn fileinput-exists btn-azure"
                                     onclick="document.getElementById('thumb_image').click()">
                                    <i class="fa fa-pencil"></i>{{" تغيير الصورة"}}
                                </div>
                                <input type="file" class="form-control" name="university_attatchment" value="{{old('university_attatchment')}}"
                                       id="thumb_image"
                                       style="display:none">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-2" style="float: left;text-align: right">
                                <label>صورة الهوية الشخصية</label>
                            </div>
                        </div>
                        <div class="row text-center">
                            <div class="col-sm-6 col-md-offset-3">
                                <div class="fileinput-new thumbnail"
                                     onclick="document.getElementById('thumb_image2').click()"
                                     style="cursor:pointer">
                                    <img src="{{url('front_end_assets/image/image-icon.png')}}"
                                         id="thumbImage2" style="max-height: 256px !important;">
                                </div>
                                <label class="control-label">{{"صورة وهمية : "}}</label>
                                <div class="btn fileinput-exists btn-azure"
                                     onclick="document.getElementById('thumb_image2').click()">
                                    <i class="fa fa-pencil"></i>{{" تغيير الصورة"}}
                                </div>
                                <input type="file" class="form-control" name="person_attatchment" id="thumb_image2" value="{{old('person_attatchment')}}"
                                       style="display:none">
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
   <script type="text/javascript">
       function readURL(input, target) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    target.attr('src', e.target.result);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }

        $('#thumb_image').on('change', function (e) {
            readURL(this, $('#thumbImage'));
        });

        $('#thumb_image2').on('change', function (e) {
            readURL(this, $('#thumbImage2'));
        });
   </script>
@endsection
