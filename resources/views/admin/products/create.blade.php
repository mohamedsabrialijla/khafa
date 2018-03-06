@extends('admin.layout.admin')
@section('title'){{"Create New Product"}}@endsection
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
    <h1>Create New Product</h1>
    <ol class="breadcrumb">
        <li><a href="{{url(app()->getLocale().'/admin/home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{url(app()->getLocale().'/admin/products')}}"><i class="fa fa-th"></i> Products</a></li>
        <li class="active">Create Product</li>
    </ol>
@endsection
@section('content')
    <div class="row">
        <!-- left column -->
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Create New Product</h3>
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
                <form class="form-horizontal" method="post" action="{{url(app()->getLocale().'/admin/products')}}"
                      enctype="multipart/form-data" >
                    {{csrf_field()}}
                     <div class="box-body">


                     <div class="form-group">
                            <label class="col-sm-2 control-label">{{"Select Company: "}}</label>
                            <div class="col-sm-10">
                                <select name="company_id" required class="select2 form-control">
                                    <option value="">{{"Select Company"}}</option>
                                    @foreach($company as $com)
                                        <option value="{{$com->id}}">
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
                                           value="" required
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
                                    <textarea name="description_{{$locale->lang}}"
                                           value="" required
                                           class="form-control"
                                           placeholder="Description_{{$locale->lang}}"></textarea>
                                           <small>{{"* required"}}</small>
                                </div>
                            </div>
                        @endforeach

                        <div class="form-group">
                            <label class="col-sm-2 control-label">Price</label>
                            <div class="col-sm-10">
                                <input type="text" name="price"
                                       value="" required
                                       class="form-control"
                                       placeholder="Price">
                                       <small>{{"* required"}}</small>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label">Discount</label>
                            <div class="col-sm-10">
                                <input type="text" name="discount"
                                       value="" required
                                       class="form-control"
                                       placeholder="Discount">
                            </div>
                        </div>



                        <div class="form-group">
                            <label class="col-sm-2 control-label">Quentity</label>
                            <div class="col-sm-10">
                                <input type="text" name="quentity"
                                       value="" required
                                       class="form-control"
                                       placeholder="Quentity">
                                       <small>{{"* required"}}</small>
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
                                <label class="control-label">{{"Image Defaulte : "}}</label>
                                <div class="btn fileinput-exists btn-azure"
                                     onclick="document.getElementById('thumb_image').click()">
                                    <i class="fa fa-pencil"></i>{{" Change Image"}}
                                </div>
                                <input type="file" class="form-control" name="image" value="{{old('image')}}"
                                       id="thumb_image"
                                       style="display:none">
                            </div>
                        </div>

                     
                        <div class="form-group" style="margin-top: 30px;">
                            <label class="col-sm-2 control-label">Show Product </label>
                            
                            <div class="col-sm-2">
                                <div class="agreement">
                                <h5 class="col-sm-9 control-label" style="margin-top: 0px">Slider </h5>
                                    <input type="checkbox" id="agreement"
                                            name="slider" class="icheckbox_flat-green" 
                                           value="1">
                                </div>
                            </div>
                            
                            <div class="col-sm-2">
                                <div class="agreement">
                                <h5 class="col-sm-9 control-label" style="margin-top: 0px">Home Page </h5>
                                    <input type="checkbox" id="agreement"
                                            name="homepage" class="icheckbox_flat-green " 
                                           value="1">
                                </div>
                            </div>

                            <div class="col-sm-6">
                                
                            </div>

                        </div>

                        </br>

                      
                    </div>
                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary pull-right">Submit</button>
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

        function readURL(input, target) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    target.attr('src', e.target.result);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }

         $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
            checkboxClass: 'icheckbox_flat-green'
        });

        $('#thumb_image').on('change', function (e) {
            readURL(this, $('#thumbImage'));
        });

        $('#thumb_image2').on('change', function (e) {
            readURL(this, $('#thumbImage2'));
        });

        $.datetimepicker.setLocale('en');
        $('#start_date').datetimepicker({
            datepicker: true,
            timepicker: false,
            dayOfWeekStart: 6,
            format: 'Y-m-d'
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
        $('#start_time').datetimepicker({
            timepicker: true,
//            dayOfWeekStart: 6,
//            format: 'Y-m-d H:i'
//            timepicker: true,
            datepicker: false,
            format: 'H:i',
            step: 15
        });
        $('#end_time').datetimepicker({
            timepicker: true,
//            dayOfWeekStart: 6,
//            format: 'Y-m-d H:i'
//            timepicker: true,
            datepicker: false,
            format: 'H:i',
            step: 15
        });

        //iCheck for checkbox and radio inputs
        //Flat red color scheme for iCheck
        $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
            checkboxClass: 'icheckbox_flat-green'
        });

       

   function changeType(id) {
        //alert(id);
       

            if (id == 2) {
                $('#res').removeClass('hidden');
                $('#caf').addClass('hidden');
                $('#cin').addClass('hidden');

                $('#res_id').prop('required',true);
            }

            if (id == 3) {
                $('#res').addClass('hidden');
                $('#caf').removeClass('hidden');
                $('#cin').addClass('hidden');

                $('#caf_id').prop('required',true);
            }

            if (id == 4) {
                $('#res').addClass('hidden');
                $('#caf').addClass('hidden');
                $('#cin').removeClass('hidden');

                $('#cin_id').prop('required',true);
            }
            
        }


         $('#thumb_image').on('change', function (e) {
            readURL(this, $('#thumbImage'));
        });



/* script Map */
function initialize() {
    var latlng = new google.maps.LatLng(31.5016951, 34.46684449999998);
    var map = new google.maps.Map(document.getElementById('map'), {
        center: latlng,
        zoom: 10
    });
    var marker = new google.maps.Marker({
        map: map,
        position: latlng,
        draggable: true,
        anchorPoint: new google.maps.Point(0, -29)
    });
    var input = document.getElementById('searchInput');
    map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);
    var geocoder = new google.maps.Geocoder();
    var autocomplete = new google.maps.places.Autocomplete(input);
    autocomplete.bindTo('bounds', map);
    var infowindow = new google.maps.InfoWindow();
    autocomplete.addListener('place_changed', function () {
        infowindow.close();
        marker.setVisible(false);
        var place = autocomplete.getPlace();
        if (!place.geometry) {
            window.alert("Autocomplete's returned place contains no geometry");
            return;
        }

        // If the place has a geometry, then present it on a map.
        if (place.geometry.viewport) {
            map.fitBounds(place.geometry.viewport);
        } else {
            map.setCenter(place.geometry.location);
            map.setZoom(17);
        }

        marker.setPosition(place.geometry.location);
        marker.setVisible(true);

        bindDataToForm(place.formatted_address, place.geometry.location.lat(), place.geometry.location.lng());
        infowindow.setContent(place.formatted_address);
        infowindow.open(map, marker);

    });
    // this function will work on marker move event into map
    google.maps.event.addListener(marker, 'dragend', function () {
        geocoder.geocode({'latLng': marker.getPosition()}, function (results, status) {
            if (status == google.maps.GeocoderStatus.OK) {
                if (results[0]) {
                    bindDataToForm(results[0].formatted_address, marker.getPosition().lat(), marker.getPosition().lng());
                    infowindow.setContent(results[0].formatted_address);
                    infowindow.open(map, marker);
                }
            }
        });
    });
}

function bindDataToForm(address, lat, lng) {
    document.getElementById('location').value = address;
    document.getElementById('lat').value = lat;
    document.getElementById('lng').value = lng;
//                                                console.log('location = ' + address);
//                                                console.log('lat = ' + lat);
//                                                console.log('lng = ' + lng);
}

google.maps.event.addDomListener(window, 'load', initialize);
                                        </script>
@endsection
