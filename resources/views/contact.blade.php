@extends('layouts.app')
@section('title'){{"Contact Us"}}@endsection
@section('key-words'){{$setting->key_words}}@endsection
@section('description'){{strip_tags($setting->description)}}@endsection
@section('nav-container')
    <div class="container">
        <div class="content-header">
            <h1 class="wow bounceInLeft all-mob">{{"Contact Us"}}</h1>
        </div>
    </div>
@endsection
@section('header-class'){{'courses-header'}}@endsection
@section('css')
    <script type="text/javascript"
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjOp2BjQx-ruFkTnb4mB_2m3eFtcCyPbU&sensor=false&libraries=places"></script>
    <link href="{{asset('/assets/global/plugins/select2/css/select2.min.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('/assets/global/plugins/select2/css/select2-bootstrap.min.css')}}" rel="stylesheet"
          type="text/css"/>
    <style type="text/css">
        .input-controls {
            margin-top: 10px;
            border: 1px solid transparent;
            border-radius: 2px 0 0 2px;
            box-sizing: border-box;
            -moz-box-sizing: border-box;
            height: 32px;
            outline: none;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
        }

        #searchInput {
            background-color: #fff;
            font-family: Roboto;
            font-size: 15px;
            font-weight: 300;
            margin-left: 12px;
            padding: 0 11px 0 13px;
            text-overflow: ellipsis;
            width: 50%;
        }

        #searchInput:focus {
            border-color: #4d90fe;
        }
    </style>
@endsection
@section('content')
    <section class="contact-sec">
        <div class="container">
            <ol class="breadcrumb">
                <li><a href="{{url('/')}}">Home</a></li>
                <li>Contact</li>
            </ol>
            <hr class="hr">
            <!-- Start Grid System -->

            <div class="row">
                <div class="col-md-6">
                    <div class="title-contact">
                        <h3 class="title">Contact Info</h3>
                        <p class="sub-title">Welcome to our Website. We are glad to have you around.</p>
                        <div class="line-contact"></div>
                    </div>
                    <hr>
                    <div class="left-box">
                        <!-- Start Sub Grid -->
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="left-box-info">
                                    <div class="one">
                                        <i class="fa fa-phone"></i>
                                    </div>
                                    <div class="two">
                                        <h3>Phone</h3>
                                        <p>{{$setting->phone}}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="left-box-info">
                                    <div class="one">
                                        <i class="fa fa-envelope"></i>
                                    </div>
                                    <div class="two">
                                        <h3>Email</h3>
                                        <p>{{$setting->info_email}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="left-box-info">
                                    <div class="one">
                                        <i class="fa fa-mobile"></i>
                                    </div>
                                    <div class="two">
                                        <h3>Mobile</h3>
                                        <p>{{$setting->mobile}}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="left-box-info">
                                    <div class="one">
                                        <i class="fa fa-map-marker"></i>
                                    </div>
                                    <div class="two">
                                        <h3>Address</h3>
                                        <p>{{$setting->address}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Sub Grid -->
                        <hr>
                        <!-- Start Sub Grid -->
                        {{--<div class="row">--}}
                            {{--<div class="col-md-12">--}}
                                {{--<div class="left-box-info">--}}
                                    {{--<div class="one">--}}
                                        {{--<i class="fa fa-map-marker"></i>--}}
                                    {{--</div>--}}
                                    {{--<div class="two">--}}
                                        {{--<h3>Address</h3>--}}
                                        {{--<p>PO Box 97845 Baker st. 567, Los Angeles, California, US.</p>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        {{--<hr>--}}
                        <!-- End Sub Grid -->
                        <!-- Start Social Media  -->
                        <ul class="ist-unstyled list-inline contact-social">
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                            <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
                        </ul>
                        <!-- End Social Media -->
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="title-contact">
                        <h3 class="title">Send A Message</h3>
                        <p class="sub-title">Your email address will not be published. Required fields are marked.</p>
                        <div class="line-contact"></div>
                        <hr>
                    </div>
                    <div class="form-contact">
                        <form>
                            <div class="row">
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="" value="" placeholder="Name *">
                                </div>
                                <div class="col-md-6">
                                    <input type="email" class="form-control" name="" value="" placeholder="Email *">
                                </div>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="" value="" placeholder="Phone *">
                                </div>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="" value="" placeholder="Subject *">
                                </div>
                                <div class="col-md-12">
                                    <textarea name="name" class="form-control" placeholder="Message *"></textarea>
                                </div>
                                <div class="col-md-12 button-contact">
                                    <button type="button" name="button" class="btn btn-danger">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="title-contact">
                        <h3 class="title">Location on map</h3>
                        <div class="line-contact"></div>
                        <div>
                            <input id="searchInput" class="input-controls" type="hidden"
                                   placeholder="Enter a location">
                            <div class="map" id="map" style="width: 100%; height: 400px;"></div>
                            <div class="form_area">
                                <input type="hidden" name="location" id="location">
                                <input type="hidden" name="lat" id="lat">
                                <input type="hidden" name="lng" id="lng">
                            </div>
                            <script>
                                /* script */
                                function initialize() {
                                    var latlng = new google.maps.LatLng(21.3890824, 39.85791180000001);
                                    var map = new google.maps.Map(document.getElementById('map'), {
                                        center: latlng,
                                        zoom: 16
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
                        </div>
                    </div>
                </div>
                <hr>
            </div>
        </div>
    </section>
@endsection
