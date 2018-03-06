@extends('admin.layout.admin')
@section('title'){{$page->title}}@endsection
@section('page-style')
    {{--<link rel="stylesheet" type="text/css" href="{{url('/admin_assets/datepicker/jquery.datetimepicker.css')}}"/>--}}
    <!-- Select2 -->
    <link rel="stylesheet" href="{{url('/admin_assets/plugins/select2/select2.min.css')}}">
    <!-- iCheck -->
    {{--<link rel="stylesheet" href="{{url('/admin_assets/plugins/iCheck/all.css')}}">--}}
@endsection
@section('content-header')
    <h1>{{$page->title}}</h1>
    <ol class="breadcrumb">
        <li><a href="{{url(app()->getLocale().'/admin/home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{url(app()->getLocale().'/admin/pages')}}"><i class="fa fa-th"></i> Pages</a></li>
        <li class="active">{{"Edit Page"}}</li>
    </ol>
@endsection
@section('content')
    <div class="row">
        <!-- left column -->
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Edit Page</h3>
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
                <form class="form-horizontal" method="post"
                      action="{{url(app()->getLocale().'/admin/pages/'.$page->id)}}"
                      enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="box-body">
                        @foreach($locales as $locale)
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Title {{$locale->name}}</label>
                                <div class="col-sm-10">
                                    <input type="text" name="title_{{$locale->lang}}"
                                           value="{{$page->translate($locale->lang)->title}}" required
                                           class="form-control"
                                           placeholder="title {{$locale->name}}">
                                    <small>{{"*required"}}</small>
                                </div>
                            </div>
                        @endforeach
                        @foreach($locales as $locale)
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Description {{$locale->name}}</label>
                                <div class="col-sm-10">
                                    <textarea id="editor_{{$locale->id}}"
                                              name="description_{{$locale->lang}}"
                                              cols="30" rows="10"
                                              required class="editor1 form-control"
                                              placeholder="description {{$locale->name}}"
                                              required>{{$page->translate($locale->lang)->description}}</textarea>
                                    <small>{{"*required"}}</small>
                                </div>
                            </div>
                        @endforeach
                        @foreach($locales as $locale)
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Key Words {{$locale->name}}</label>
                                <div class="col-sm-10">
                                    <input type="text" name="key_words_{{$locale->lang}}"
                                           value="{{$page->translate($locale->lang)->key_words}}" required
                                           class="form-control"
                                           placeholder="key words {{$locale->name}}">
                                    <small>{{"*required"}}</small>
                                </div>
                            </div>
                        @endforeach
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Image: </label>
                            <div class="col-md-4">
                                <div class="fileinput-new thumbnail"
                                     onclick="document.getElementById('image').click()" style="cursor:pointer">
                                    <img src="{{$page->image}}" id="Image"></div>
                                <div class="btn fileinput-exists btn-azure"
                                     onclick="document.getElementById('image').click()"><i
                                            class="fa fa-pencil"></i>{{' Select Image'}}
                                </div>
                                <input type="file" class="form-control" name="image" id="image"
                                       style="display:none">
                            </div>
                        </div>
                    <div class="box-footer">
                        <a href="{{request()->headers->get('referer')}}"
                           class="btn btn-default">Cancel</a>
                        <button type="submit" class="btn btn-primary pull-right">Update</button>
                    </div>
                </form>
            </div>
        </div>
        <!--/.col (left) -->
    </div>
@endsection

@section('js-plugins')
    <!-- Select2 -->
    {{--<script src="{{url('/admin_assets/plugins/select2/select2.full.min.js')}}"></script>--}}
    <!-- date-time-picker -->
    {{--    <script src="{{url('/admin_assets/datepicker/build/jquery.datetimepicker.full.js')}}"></script>--}}
    <!-- iCheck -->
    {{--    <script src="{{url('/admin_assets/plugins/iCheck/icheck.min.js')}}"></script>--}}
    <!-- CK Editor -->
    {{--<script src="{{url('/admin_assets/plugins/ckeditor/ckeditor.js')}}"></script>--}}
    <script src="https://cdn.ckeditor.com/4.7.3/full-all/ckeditor.js"></script>
@endsection
@section('page-script')
    <script>
        $(function () {
            @foreach($locales as $locale)
            CKEDITOR.replace('editor_{{$locale->id}}');
            @endforeach
        });

        function readURL(input, target) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    target.attr('src', e.target.result);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
        $('#image').on('change', function (e) {
            readURL(this, $('#Image'));
        });
    </script>
@endsection
