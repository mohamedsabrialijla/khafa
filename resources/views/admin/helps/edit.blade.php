@extends('admin.layout.admin')
@section('title'){{"Edit| Questions"}}@endsection
@section('page-style')
    <link rel="stylesheet" type="text/css" href="{{url('/admin_assets/datepicker/jquery.datetimepicker.css')}}"/>
    <link rel="stylesheet"
          href="{{url('/front_end_assets/bootstrap-datepicker-1.6.4-dist/css/bootstrap-datepicker.min.css')}}">
    <!-- Select2 -->
    <link rel="stylesheet" href="{{url('/admin_assets/plugins/select2/select2.min.css')}}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{url('/admin_assets/plugins/iCheck/all.css')}}">
@endsection
@section('content-header')
    <h1>Edit| Questions</h1>
    <ol class="breadcrumb">
        <li><a href="{{url(app()->getLocale().'/admin/home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{url(app()->getLocale().'/admin/helps')}}"><i class="fa fa-th"></i> Questions</a></li>
        <li class="active">Edit| Questions</li>
    </ol>
@endsection
@section('content')
    <div class="row">
        <!-- left column -->
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header with-border">
{{--                     <h3 class="box-title">اضافة قضية</h3>
 --}}                </div>
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
                
                <form class="form-horizontal" method="post" action="{{url(app()->getLocale().'/admin/helps')}}/{{$helps->id}}"
                      enctype="multipart/form-data">
                    {{csrf_field()}}
                     
                    <div class="box-body">
                       
                       @foreach($locales as $locale)
                        <div class="form-group">
                            <div class="col-md-2" style="float: left;text-align: right">
                                <label>Question_{{$locale->lang}}</label>
                            </div>
                            <div class="col-sm-10">
                                <input type="text" name="question_{{$locale->lang}}" value="{{$helps->translate($locale->lang)->question}}" class="form-control" required
                                       placeholder="question_{{$locale->lang}}">
                                <small>{{"* required"}}</small>
                            </div>
                        </div>
                        @endforeach

                        @foreach($locales as $locale)
                        <div class="form-group">
                            <div class="col-md-2" style="float: left;text-align: right">
                                <label>Answer_{{$locale->lang}}</label>
                            </div>
                            <div class="col-sm-10">
                                <textarea name="answer_{{$locale->lang}}" class="form-control" required 
                                       placeholder="answer_{{$locale->lang}}">{{$helps->translate($locale->lang)->answer}}</textarea>
                                <small>{{"* required"}}</small>
                            </div>
                        </div>
                        @endforeach

                     
                    </div> 


                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary pull-right">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('js-plugins')
    <!-- Select2 -->
    <script src="{{url('/admin_assets/plugins/select2/select2.full.min.js')}}"></script>
    <!-- date-time-picker -->
    <script src="{{url('/admin_assets/datepicker/build/jquery.datetimepicker.full.js')}}"></script>
    <script src="{{url('/front_end_assets/bootstrap-datepicker-1.6.4-dist/js/bootstrap-datepicker.min.js')}}"></script>
    <!-- iCheck -->
    <script src="{{url('/admin_assets/plugins/iCheck/icheck.min.js')}}"></script>
    <!-- CK Editor -->
    {{--<script src="{{url('/admin_assets/plugins/ckeditor/ckeditor.js')}}"></script>--}}
    <script src="https://cdn.ckeditor.com/4.7.3/full-all/ckeditor.js"></script>
@endsection
@section('page-script')
    <script>

     $(function () {
            //Initialize Select2 Elements
            $(".select2").select2();
        });
        function delete_attatchment(id,iss_id, e) {
            e.preventDefault();
            console.log(id);
            console.log(iss_id);
            var url = '{{url("/en/admin/attatchments/")}}/' + id;
                    var csrf_token = '{{csrf_token()}}';
                    $.ajax({
                        type: 'delete',
                        headers: {'X-CSRF-TOKEN': csrf_token},
                        url: url,
                        data: {_method:'delete'},
                        success: function (response) {
                            console.log(response);
                            if (response === 'success') {
                                $('#material-' + id).hide(1000);
                                //swal("القضية حذفت!", {icon: "success"});
                            } else {
                               // swal('Error', {icon: "error"});
                            }
                        },
                        error: function (e) {
                           // swal('exception', {icon: "error"});
                        }
                    });
          
        }


       
        $.datetimepicker.setLocale('ar');
        $('#issues_date').datetimepicker({
            datepicker: true,
            timepicker: true,
            dayOfWeekStart: 6,
            format: 'Y-m-d H:i'
//            timepicker: true,
//            format: 'H:i',
//            step: 15
        });
         $.datetimepicker.setLocale('ar');
        $('#issues_date_next').datetimepicker({
            datepicker: true,
            timepicker: true,
            dayOfWeekStart: 6,
            format: 'Y-m-d H:i'
//            timepicker: true,
//            format: 'H:i',
//            step: 15
        });
        $('#sandbox-container input').datepicker({
            format: "yyyy-mm-dd",
            todayBtn: "linked",
            clearBtn: true,
            multidate: true
        });
       
       

        $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
            checkboxClass: 'icheckbox_flat-green'
        });

       

      
    </script>
@endsection
