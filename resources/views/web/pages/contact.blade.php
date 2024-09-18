@extends('web.layouts.container')


@section('content')
    <div class="section-box">
        <div class="breadcrumbs-div mb-0">
            <div class="container">
                <ul class="breadcrumb">
                    <li><a class="font-xs color-gray-1000" href="{{ route('web.index') }}">{{ __('web.home') }}</a></li>
                    <li><a class="font-xs color-gray-500" href="#">{{ __('web.pages') }}</a></li>
                    <li><a class="font-xs color-gray-500" href="{{  URL::current() }}">{{ __('web.contact') }}</a></li>
                </ul>
            </div>
        </div>
    </div>
    <section class="section-box shop-template mt-0">
        <div class="container">
            <div class="box-contact">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="contact-form">
                            <h3 class="color-brand-3 mt-60">{{ __('web.contact_us') }}</h3>
                            <p class="font-sm color-gray-700 mb-30">{{ __('web.our_team_would_love_to_hear_from_you') }}</p>
                            <form action="{{ $action }}" method="post" onsubmit="formAction(this)">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-group">
                                            <input class="form-control" type="text" name="first_name"
                                                placeholder="{{ __('web.first_name') }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-group">
                                            <input class="form-control" type="text" name="last_name"
                                                placeholder="{{ __('web.last_name') }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <input class="form-control" type="email" name="email"
                                                placeholder="{{ __('web.email') }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <input class="form-control" type="tel" name="phone"
                                                placeholder="{{ __('web.phone') }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <input class="form-control" type="text" name="subject"
                                                placeholder="{{ __('web.subject') }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <textarea class="form-control" name="message" placeholder="{{ __('web.message') }}" rows="5"> </textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <input class="btn btn-buy w-auto" type="submit"
                                                value="{{ __('web.send_message') }}">
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="map">
                            <img src="{{ asset('public/storage/contact.jpg') }}" alt="Furniture Hub"  >
                            {{-- <iframe src="https://www.google.com/maps/api/js?key=" height="550" style="border:0;"
                                allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe> --}}
                        </div>
                    </div>
                </div>
            </div>
            <div class="box-contact-address pt-80 pb-50">
                <div class="row">
                    <div class="col-lg-3 mb-30">
                        <h3 class="mb-5">{{ __('web.visit_our_stores') }}</h3>
                        <p class="font-sm color-gray-700 mb-30">{{ __('web.find_us_at_these_locations') }}</p>
                    </div>
                    <div class="col-lg-3">
                        @foreach ($branches as $key => $row)
                            <div class="mb-30">
                                <h4>{{ $row->address }}</h4>
                                <p class="font-sm color-gray-700">
                                    {{ $row->email }}<br>{{ $row->phone }}<br>{{ $row->work_time }}
                                </p>
                            </div>
                        @endforeach

                    </div>

                </div>
            </div>
        </div>
        <div class="box-contact-support pt-80 pb-50 background-gray-50">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 mb-30 text-center text-lg-start">
                        <h3 class="mb-5">{{ __('web.we_d_love_to_here_from_you') }}</h3>
                        <p class="font-sm color-gray-700">{{ __('web.chat_with_our_friendly_team') }}</p>
                    </div>
                    <div class="col-lg-3 text-center mb-30">
                        <div class="box-image mb-20"><img src="{{ url('') }}/public/assets/web/ASSETS_En/imgs/page/contact/chat.svg"
                                alt="Furniture Hub"></div>
                        <h4 class="mb-5">{{ __('web.chat_to_sales') }}</h4>
                        <p class="font-sm color-gray-700 mb-5">{{ __('web.speak_to_our_team') }}</p><a
                            class="font-sm color-gray-900"
                            href="mailto:sales@ecom.com">{{ $first_branch->email ?? ' ' }}</a>
                    </div>
                    <div class="col-lg-3 text-center mb-30">
                        <div class="box-image mb-20"><img src="{{ url('') }}/public/assets/web/ASSETS_En/imgs/page/contact/call.svg"
                                alt="Furniture Hub"></div>
                        <h4 class="mb-5">{{ __('web.call_us') }}</h4>
                        <p class="font-sm color-gray-700 mb-5">{{ $first_branch->work_time }} {{ __('web.daily') }}</p><a
                            class="font-sm color-gray-900"
                            href="tel:+2{{ $first_branch->phone ?? ' ' }}">{{ $first_branch->phone ?? ' ' }}</a>
                    </div>
                    <div class="col-lg-3 text-center mb-30">
                        <div class="box-image mb-20"><img src="{{ url('') }}/public/assets/web/ASSETS_En/imgs/page/contact/map.svg"
                                alt="Furniture Hub">
                        </div>
                        <h4 class="mb-5">{{ __('web.visit_us') }}</h4>
                        <p class="font-sm color-gray-700 mb-5">{{ __('web.visit_our_office') }}</p><span
                            class="font-sm color-gray-900">{{ $first_branch->address ?? ' ' }}<br>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('container_js')
    <script>
        $("#pac-input").focusin(function() {
            $(this).val('');
        });

        $('#latitude').val('');
        $('#longitude').val('');

        function initAutocomplete() {
            var map = new google.maps.Map(document.getElementById('map'), {
                center: {
                    lat: 24.740691,
                    lng: 46.6528521
                },
                zoom: 13,
                mapTypeId: 'roadmap'
            });

            // move pin and current location
            infoWindow = new google.maps.InfoWindow;
            geocoder = new google.maps.Geocoder();
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(function(position) {
                    var pos = {
                        lat: position.coords.latitude,
                        lng: position.coords.longitude
                    };
                    map.setCenter(pos);
                    var marker = new google.maps.Marker({
                        position: new google.maps.LatLng(pos),
                        map: map,
                        title: 'موقعك الحالي'
                    });
                    markers.push(marker);
                    marker.addListener('click', function() {
                        geocodeLatLng(geocoder, map, infoWindow, marker);
                    });
                    google.maps.event.trigger(marker, 'click');
                }, function() {
                    handleLocationError(true, infoWindow, map.getCenter());
                });
            } else {
                console.log('dsdsdsdsddsd');
                handleLocationError(false, infoWindow, map.getCenter());
            }

            var geocoder = new google.maps.Geocoder();
            google.maps.event.addListener(map, 'click', function(event) {
                SelectedLatLng = event.latLng;
                geocoder.geocode({
                    'latLng': event.latLng
                }, function(results, status) {
                    if (status == google.maps.GeocoderStatus.OK) {
                        if (results[0]) {
                            deleteMarkers();
                            addMarkerRunTime(event.latLng);
                            SelectedLocation = results[0].formatted_address;
                            console.log(results[0].formatted_address);
                            splitLatLng(String(event.latLng));
                            $("#pac-input").val(results[0].formatted_address);
                        }
                    }
                });
            });

            function geocodeLatLng(geocoder, map, infowindow, markerCurrent) {
                var latlng = {
                    lat: markerCurrent.position.lat(),
                    lng: markerCurrent.position.lng()
                };
                $('#latitude').val(markerCurrent.position.lat());
                $('#longitude').val(markerCurrent.position.lng());

                geocoder.geocode({
                    'location': latlng
                }, function(results, status) {
                    if (status === 'OK') {
                        if (results[0]) {
                            map.setZoom(8);
                            var marker = new google.maps.Marker({
                                position: latlng,
                                map: map
                            });
                            markers.push(marker);
                            infowindow.setContent(results[0].formatted_address);
                            SelectedLocation = results[0].formatted_address;
                            $("#pac-input").val(results[0].formatted_address);

                            infowindow.open(map, marker);
                        } else {
                            window.alert('No results found');
                        }
                    } else {
                        window.alert('Geocoder failed due to: ' + status);
                    }
                });
                SelectedLatLng = (markerCurrent.position.lat(), markerCurrent.position.lng());
            }

            function addMarkerRunTime(location) {
                var marker = new google.maps.Marker({
                    position: location,
                    map: map
                });
                markers.push(marker);
            }

            function setMapOnAll(map) {
                for (var i = 0; i < markers.length; i++) {
                    markers[i].setMap(map);
                }
            }

            function clearMarkers() {
                setMapOnAll(null);
            }

            function deleteMarkers() {
                clearMarkers();
                markers = [];
            }

            var input = document.getElementById('pac-input');
            $("#pac-input").val("أبحث هنا ");
            var searchBox = new google.maps.places.SearchBox(input);
            map.controls[google.maps.ControlPosition.TOP_RIGHT].push(input);

            map.addListener('bounds_changed', function() {
                searchBox.setBounds(map.getBounds());
            });

            var markers = [];
            searchBox.addListener('places_changed', function() {
                var places = searchBox.getPlaces();

                if (places.length == 0) {
                    return;
                }

                // Clear out the old markers.
                markers.forEach(function(marker) {
                    marker.setMap(null);
                });
                markers = [];

                // For each place, get the icon, name and location.
                var bounds = new google.maps.LatLngBounds();
                places.forEach(function(place) {
                    if (!place.geometry) {
                        console.log("Returned place contains no geometry");
                        return;
                    }
                    var icon = {
                        url: place.icon,
                        size: new google.maps.Size(100, 100),
                        origin: new google.maps.Point(0, 0),
                        anchor: new google.maps.Point(17, 34),
                        scaledSize: new google.maps.Size(25, 25)
                    };

                    // Create a marker for each place.
                    markers.push(new google.maps.Marker({
                        map: map,
                        icon: icon,
                        title: place.name,
                        position: place.geometry.location
                    }));


                    $('#latitude').val(place.geometry.location.lat());
                    $('#longitude').val(place.geometry.location.lng());

                    if (place.geometry.viewport) {
                        // Only geocodes have viewport.
                        bounds.union(place.geometry.viewport);
                    } else {
                        bounds.extend(place.geometry.location);
                    }
                });
                map.fitBounds(bounds);
            });
        }

        function handleLocationError(browserHasGeolocation, infoWindow, pos) {
            infoWindow.setPosition(pos);
            infoWindow.setContent(browserHasGeolocation ?
                'Error: The Geolocation service failed.' :
                'Error: Your browser doesn\'t support geolocation.');
            infoWindow.open(map);
        }

        function splitLatLng(latLng) {
            var newString = latLng.substring(0, latLng.length - 1);
            var newString2 = newString.substring(1);
            var trainindIdArray = newString2.split(',');
            var lat = trainindIdArray[0];
            var Lng = trainindIdArray[1];

            $("#latitude").val(lat);
            $("#longitude").val(Lng);
        }
    </script>
@endsection
