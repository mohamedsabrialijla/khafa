@extends('admin.layout.admin')
@section('title'){{"Edit Craft_users"}}@endsection
@section('page-style')@endsection
@section('content-header')
    <h1>Edit Craft_users </h1>
    <ol class="breadcrumb">
        <li><a href="{{url(app()->getLocale().'/admin/home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
        
        <li><a href="{{url(app()->getLocale().'/admin/users')}}"><i class="fa fa-th"></i>Craft_users</a></li> 
        <li class="active"> Edit Craft_users</li>
    </ol>
@endsection

@section('js-plugins')
<script type="text/javascript"
 src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjOp2BjQx-ruFkTnb4mB_2m3eFtcCyPbU&sensor=false&libraries=places"></script>
@endsection

@section('content')
    <div class="row">
        <!-- left column -->
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Edit Craft_users</h3>
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
                
                <form class="form-horizontal" method="post" action="{{url(app()->getLocale().'/admin/users/'.$users->id)}}"
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
                                <label class="control-label">{{"صورة وهمية : "}}</label>
                                <div class="btn fileinput-exists btn-azure"
                                     onclick="document.getElementById('thumb_image').click()">
                                    <i class="fa fa-pencil"></i>{{" تغيير الصورة"}}
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


                                            /* script */
                                            function initialize() {
                                                var latlng = new google.maps.LatLng('{{$users->latitude}}', '{{$users->logitude}}');
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
//       console.log('location = ' + address);
//       console.log('lat = ' + lat);
//       console.log('lng = ' + lng);
        }

        google.maps.event.addDomListener(window, 'load', initialize);
    </script>
@endsection
