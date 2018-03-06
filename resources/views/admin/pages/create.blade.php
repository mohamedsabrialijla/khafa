@extends('admin.layout.admin')
@section('title'){{"Create Page"}}@endsection
@section('page-style')
    <link rel="stylesheet" type="text/css" href="{{url('/admin_assets/datepicker/jquery.datetimepicker.css')}}"/>
    <!-- Select2 -->
    <link rel="stylesheet" href="{{url('/admin_assets/plugins/select2/select2.min.css')}}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{url('/admin_assets/plugins/iCheck/all.css')}}">
@endsection
@section('content-header')
    <h1>Create Page</h1>
    <ol class="breadcrumb">
        <li><a href="{{url(app()->getLocale().'/admin/home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{url(app()->getLocale().'/admin/pages')}}"><i class="fa fa-th"></i> Pages</a></li>
        <li class="active">Create Page</li>
    </ol>
@endsection
@section('content')
    <div class="row">
        <!-- left column -->
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Create New Page</h3>
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
                      action="{{url(app()->getLocale().'/admin/pages')}}"
                      enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="box-body">
                        @foreach($locales as $locale)
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Title {{$locale->lang}}</label>
                                <div class="col-sm-10">
                                    <input type="text" name="title_{{$locale->lang}}" required class="form-control"
                                           placeholder="title {{$locale->lang}}">
                                    <small>{{"*required"}}</small>
                                </div>
                            </div>
                        @endforeach
                        @foreach($locales as $locale)
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Description {{$locale->lang}}</label>
                                <div class="col-sm-10">
                                    <textarea id="editor_{{$locale->id}}"
                                              name="description_{{$locale->lang}}"
                                              cols="30" rows="10"
                                              required class="editor1 form-control"
                                              placeholder="description {{$locale->lang}}" required></textarea>
                                    <small>{{"*required"}}</small>
                                </div>
                            </div>
                        @endforeach
                            @foreach($locales as $locale)
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Key Words {{$locale->lang}}</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="key_words_{{$locale->lang}}" required class="form-control"
                                               placeholder="key words {{$locale->lang}}">
                                        <small>{{"*required"}}</small>
                                    </div>
                                </div>
                            @endforeach
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Image: </label>
                            <div class="col-sm-10">
                                <input type="file" name="image" class="form-control">
                            </div>
                        </div>
                        <div class="box-footer">
                            <a href="{{request()->headers->get('referer')}}" class="btn btn-default">Cancel</a>
                            <button type="submit" class="btn btn-primary pull-right">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!--/.col (left) -->
    </div>
@endsection

@section('js-plugins')
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
