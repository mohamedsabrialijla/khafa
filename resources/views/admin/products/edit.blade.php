@extends('admin.layout.admin')
@section('title'){{"Edit products"}}@endsection
@section('page-style')
   
    <link rel="stylesheet" href="{{url('/admin_assets/plugins/select2/select2.min.css')}}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{url('/admin_assets/plugins/iCheck/all.css')}}">
    <style type="text/css">
        #agreement  {
            margin-top: 10px;
        }
    </style>
@endsection
@section('content-header')
    <h1>Edit products</h1>
    <ol class="breadcrumb">
        <li><a href="{{url(app()->getLocale().'/admin/home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{url(app()->getLocale().'/admin/products')}}"><i class="fa fa-th"></i> products</a></li>
        <li class="active">Edit Restaurant</li>
    </ol>
@endsection
@section('content')
    <div class="row">
        <!-- left column -->
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Edit {{$products->translate(app()->getLocale())->name}} </h3>
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
                      action="{{url(app()->getLocale().'/admin/products/'.$products->id)}}"
                      enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="box-body">

                    <div class="form-group">
                            <label class="col-sm-2 control-label">{{"Select Company: "}}</label>
                            <div class="col-sm-10">
                                <select name="company_id" required class="select2 form-control">
                                    <option value="">{{"Select Company"}}</option>
                                    @foreach($company as $com)
                                        <option @if($com->id == $products->company_id) selected="selected" @endif value="{{$com->id}}">
                                        @foreach($locales as $locale)
                                        {{$com->translate($locale->lang)->name}}
                                        @endforeach
                                        </option>
                                    @endforeach
                                </select>
                                <small>{{"* required"}}</small>
                            </div>
                        </div>
                        

                        @foreach($locales as $locale)
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Name_{{$locale->lang}}</label>
                                <div class="col-sm-10">
                                    <input type="text" name="name_{{$locale->lang}}"
                                           value="{{$products->translate($locale->lang)->name}}" required
                                           class="form-control"
                                           placeholder="Name_{{$locale->lang}}">
                                           <small>{{"* required"}}</small>
                                </div>
                            </div>
                        @endforeach

                        @foreach($locales as $locale)
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Description_{{$locale->lang}}</label>
                                <div class="col-sm-10">
                                    <input type="text" name="description_{{$locale->lang}}"
                                           value="{{$products->translate($locale->lang)->description}}" required
                                           class="form-control"
                                           placeholder="Description_{{$locale->lang}}">
                                           <small>{{"* required"}}</small>
                                </div>
                            </div>
                        @endforeach

                        <div class="form-group">
                            <label class="col-sm-2 control-label">Price</label>
                            <div class="col-sm-10">
                                <input type="text" name="price"
                                       value="{{$products->price}}" required
                                       class="form-control"
                                       placeholder="Price">
                                       <small>{{"* required"}}</small>
                            </div>
                        </div>


                        <div class="form-group">
                            <label class="col-sm-2 control-label">Quentity</label>
                            <div class="col-sm-10">
                                <input type="text" name="quentity"
                                       value="{{$products->quentity}}" required
                                       class="form-control"
                                       placeholder="Quentity">
                                       <small>{{"* required"}}</small>
                            </div>
                        </div>

                        <div class="row text-center">
                            <div class="col-sm-6 col-md-offset-3">
                                <div class="fileinput-new thumbnail"
                                     onclick="document.getElementById('thumb_image2').click()"
                                     style="cursor:pointer">
                                    <img src="{{isset($products) && $products->image ? url($products->image)  : '/front_end_assets/image/image-icon.png'}}"
                                         id="thumbImage2" style="max-height: 256px !important;">
                                </div>
                                <label class="control-label">{{"Defaulte Image : "}}</label>
                                <div class="btn fileinput-exists btn-azure"
                                     onclick="document.getElementById('thumb_image2').click()">
                                    <i class="fa fa-pencil"></i>{{" Change Image"}}
                                </div>
                                <input type="file" class="form-control" name="image" id="thumb_image2" value="{{$products->image}}"
                                       style="display:none">
                            </div>
                        </div>

                     
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Show Product </label>
                            
                            <div class="col-sm-2">
                                <div class="agreement">
                                <h5 class="col-sm-9 control-label">Slider </h5>
                                    <input type="checkbox" id="agreement"
                                           {{($products->slider == '1')?'checked':''}} name="slider" class="icheckbox_flat-green" 
                                           value="1">
                                </div>
                            </div>
                            
                            <div class="col-sm-2">
                                <div class="agreement">
                                <h5 class="col-sm-9 control-label">Home Page </h5>
                                    <input type="checkbox" id="agreement"
                                           {{($products->home_page == '1')?'checked':''}} name="homepage" class="icheckbox_flat-green " 
                                           value="1">
                                </div>
                            </div>

                            <div class="col-sm-6">
                                
                            </div>

                        </div>

                        </br>

                      
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
