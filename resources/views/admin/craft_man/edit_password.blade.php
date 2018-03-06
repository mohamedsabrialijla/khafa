@extends('admin.layout.admin')
@section('title'){{"Edit Driver"}}@endsection
@section('page-style')@endsection
@section('content-header')
    <h1>Edit Driver </h1>
    <ol class="breadcrumb">
        <li><a href="{{url(app()->getLocale().'/admin/home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
        
        <li><a href="{{url(app()->getLocale().'/admin/driver_man')}}"><i class="fa fa-th"></i>Drivers</a></li> 
        <li class="active">Edit Driver</li>
    </ol>
@endsection


@section('content')
    <div class="row">
        <!-- left column -->
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Edit Driver</h3>
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

                @if(Session::get('success'))
                    <div class="alert alert-success">
                        {{trans(Session::get('success'))}}
                    </div>               
                @endif
                
                <form class="form-horizontal" method="post" action="{{url(app()->getLocale().'/admin/driver_man/'.$users->id)}}"
                      enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="box-body">
                        <div class="form-group">
                            <div class="col-md-2" style="float: left;text-align: right">
                                <label>Name</label>
                            </div>
                            <div class="col-sm-10">
                                <input type="text" name="name" class="form-control" required value="{{$users->name}}"
                                       placeholder="name">
                                <small>{{"* required"}}</small>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-2" style="float: left;text-align: right">
                                <label>Email</label>
                            </div>
                            <div class="col-sm-10">
                                <input type="email" name="email" class="form-control" required value="{{$users->email}}"
                                       placeholder="email">
                                <small>{{"* required"}}</small>
                            </div>
                        </div>


                        <div class="form-group">
                            <div class="col-md-2" style="float: left;text-align: right">
                                <label>Mobile</label>
                            </div>
                            <div class="col-sm-10">
                                <input type="text" name="mobile" class="form-control" required value="{{$users->mobile}}"
                                       placeholder="mobile">
                                <small>{{"* required"}}</small>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-2" style="float: left;text-align: right">
                                <label>Image User Profile</label>
                            </div>
                        </div>
                        
                        <div class="row text-center">
                            <div class="col-sm-6 col-md-offset-3">
                                <div class="fileinput-new thumbnail"
                                     onclick="document.getElementById('thumb_image').click()"
                                     style="cursor:pointer">
                                    <img src="{{isset($users) && $users->profile_image ? url(''.$users->profile_image)  : '/front_end_assets/image/image-icon.png'}}"
                                         id="thumbImage" style="max-height: 256px !important;">
                                </div>
                                <label class="control-label">{{"Defaulte Image : "}}</label>
                                <div class="btn fileinput-exists btn-azure"
                                     onclick="document.getElementById('thumb_image').click()">
                                    <i class="fa fa-pencil"></i>{{" change image"}}
                                </div>
                                <input type="file" class="form-control" name="profile_image" value=""
                                       id="thumb_image"
                                       style="display:none">
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
