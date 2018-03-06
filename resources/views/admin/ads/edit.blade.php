@extends('admin.layout.admin')
@section('title'){{"Edit Advertising"}}@endsection
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
    <h1>Edit Advertising</h1>
    <ol class="breadcrumb">
        <li><a href="{{url(app()->getLocale().'/admin/home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
        @if($ads->type == 1)
        <li><a href="{{url(app()->getLocale().'/admin/ads')}}"><i class="fa fa-th"></i> Ads</a></li>
        @elseif($ads->type == 2)
        <li><a href="{{url(app()->getLocale().'/admin/splash')}}"><i class="fa fa-th"></i> Splash</a></li>
        @endif
        <li class="active">Edit Advertising</li>
    </ol>
@endsection
@section('content')
    <div class="row">
        <!-- left column -->
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Edit {{$ads->id}} </h3>
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
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                <form class="form-horizontal" method="post"
                      action="{{url(app()->getLocale().'/admin/ads/'.$ads->id)}}"
                      enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="box-body">
                                            
                
                        <div class="row text-center">
                            <div class="col-sm-6 col-md-offset-3">
                                <div class="fileinput-new thumbnail"
                                     onclick="document.getElementById('thumb_image2').click()"
                                     style="cursor:pointer">
                                    <img src="{{isset($ads) && $ads->image ? url($ads->image)  : '/front_end_assets/image/image-icon.png'}}"
                                         id="thumbImage2" style="max-height: 256px !important;">
                                </div>
                                <label class="control-label">{{"Defaulte Image : "}}</label>
                                <div class="btn fileinput-exists btn-azure"
                                     onclick="document.getElementById('thumb_image2').click()">
                                    <i class="fa fa-pencil"></i>{{" Change Image"}}
                                </div>
                                <input type="file" class="form-control" name="image" id="thumb_image2" value="{{$ads->image}}"
                                       style="display:none">
                            </div>
                        </div>

                       
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary pull-right">Update</button>
                    </div>
                    <!-- /.box-footer -->
                </form>
            </div>
        </div>
        <!--/.col (left) -->
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
