@extends('user.user')

@section('content')
    <!-- Include Leaflet CSS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
        integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY="
        crossorigin=""/>
    
    <!-- Include Leaflet Geocoder CSS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.css" />
    
    <!-- Include Leaflet Locate Control CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/leaflet.locatecontrol@0.79.0/dist/L.Control.Locate.min.css" />
    
    <!-- Include Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" />
    
    <section class="section profile">
        <div class="container">
            <div class="row">
                <!-- Profile Card -->
                <div class="col-xl-4">
                    <div class="card mt-4" style="padding-top: 20px;">
                        <div class="card-body profile-card d-flex flex-column align-items-center">
                            <img src="{{ asset('assets/img/profile-img.jpg') }}" alt="Profile"
                                class="rounded-circle img-thumbnail" style="width: 150px;">
                            <h2 class="mt-3">{{ $user->name }}</h2>
                        </div>
                    </div>
                </div>

                <!-- Profile Details -->
                <div class="col-xl-8">
                    <div class="card mt-4" style="padding-top: 20px;">
                        <div class="card-body">
                            <!-- Tabs Navigation -->
                            <ul class="nav nav-tabs nav-justified">
                                <li class="nav-item">
                                    <button class="nav-link active" data-bs-toggle="tab"
                                        data-bs-target="#profile-overview">Overview</button>
                                </li>
                                <li class="nav-item">
                                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit
                                        Profile</button>
                                </li>
                                <li class="nav-item">
                                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-location">Set
                                        Location</button>
                                </li>
                            </ul>

                            <!-- Tabs Content -->
                            <div class="tab-content mt-3">
                                <!-- Overview Tab -->
                                <div class="tab-pane fade show active" id="profile-overview">
                                    <h5 class="card-title">Profile Details</h5>
                                    <ul class="list-group">
                                        <li class="list-group-item"><strong>Email:</strong> {{ $user->email }}</li>
                                        <li class="list-group-item"><strong>Phone:</strong>
                                            {{ $user->phone_number ?? 'Not Set' }}</li>
                                        <li class="list-group-item"><strong>Address:</strong>
                                            {{ $user->address ?? 'Not Set' }}</li>
                                        <li class="list-group-item"><strong>Location:</strong>
                                            @if($user->latitude && $user->longitude)
                                                <a href="https://www.openstreetmap.org/?mlat={{ $user->latitude }}&mlon={{ $user->longitude }}&zoom=15" target="_blank">
                                                    View on Map
                                                </a>
                                            @else
                                                Not Set
                                            @endif
                                        </li>
                                    </ul>
                                </div>

                                <!-- Edit Profile Tab -->
                                <div class="tab-pane fade" id="profile-edit">
                                    <form action="{{ route('user.profile.update') }}" method="POST">
                                        @csrf
                                        <div class="mb-3">
                                            <label for="phone_number" class="form-label">Phone</label>
                                            <input name="phone_number" type="text" class="form-control" id="phone_number"
                                                value="{{ $user->phone_number }}">
                                        </div>
                                        <div class="mb-3">
                                            <label for="address" class="form-label">Address</label>
                                            <input name="address" type="text" class="form-control" id="address"
                                                value="{{ $user->address }}">
                                        </div>
                                        <div class="mb-3">
                                            <label for="email" class="form-label">Email</label>
                                            <input name="email" type="email" class="form-control" id="email"
                                                value="{{ $user->email }}">
                                        </div>
                                        <button type="submit" class="btn btn-primary w-100">Save Changes</button>
                                    </form>
                                </div>

                                <!-- Location Tab -->
                                <div class="tab-pane fade" id="profile-location">
                                    <h5 class="card-title">Set Your Location</h5>
                                    <p class="text-muted mb-3">Click on the map to set your location or use the search bar.</p>
                                    
                                    <form action="{{ route('user.location.update') }}" method="POST">
                                        @csrf
                                        <div class="mb-3">
                                            <button type="button" id="get-location-btn" class="btn btn-secondary mb-3">
                                                <i class="bi bi-geo-alt"></i> Use My Current Location
                                            </button>
                                            <div id="map" style="height: 400px; width: 100%;"></div>
                                        </div>
                                        
                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <label for="latitude" class="form-label">Latitude</label>
                                                <input name="latitude" type="text" class="form-control" id="latitude" 
                                                    value="{{ $user->latitude }}" readonly>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="longitude" class="form-label">Longitude</label>
                                                <input name="longitude" type="text" class="form-control" id="longitude"
                                                    value="{{ $user->longitude }}" readonly>
                                            </div>
                                        </div>
                                        
                                        <button type="submit" class="btn btn-primary w-100">Save Location</button>
                                    </form>
                                </div>
                            </div><!-- End Tabs Content -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Include Leaflet JS -->
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
        integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo="
        crossorigin=""></script>
    
    <!-- Include Leaflet Geocoder JS -->
    <script src="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.js"></script>
    
    <!-- Include Leaflet Locate Control JS -->
    <script src="https://cdn.jsdelivr.net/npm/leaflet.locatecontrol@0.79.0/dist/L.Control.Locate.min.js"></script>
    
    <!-- Leaflet Map Scripts -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Only initialize map when location tab is shown
            const tabEl = document.querySelector('button[data-bs-target="#profile-location"]');
            if (tabEl) {
                tabEl.addEventListener('shown.bs.tab', initMap);
            }
            
            // If location tab is active by default, initialize map
            if (document.querySelector('#profile-location.active')) {
                initMap();
            }
            
            // Set up the Get Current Location button click handler
            const locationBtn = document.getElementById('get-location-btn');
            if (locationBtn) {
                locationBtn.addEventListener('click', getCurrentLocation);
            }
        });
        
        let map;
        let marker;
        let locationCircle;
        
        function initMap() {
            // Don't initialize twice
            if (map) return;
            
            // Default coordinates (Indonesia)
            const defaultLat = {{ $user->latitude ?? -6.2088 }};
            const defaultLng = {{ $user->longitude ?? 106.8456 }};
            
            // Initialize map
            map = L.map('map').setView([defaultLat, defaultLng], 13);
            
            // Add OpenStreetMap tile layer
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
            }).addTo(map);
            
            // Add search control
            const geocoder = L.Control.geocoder({
                defaultMarkGeocode: false
            }).on('markgeocode', function(e) {
                const bbox = e.geocode.bbox;
                const poly = L.polygon([
                    bbox.getSouthEast(),
                    bbox.getNorthEast(),
                    bbox.getNorthWest(),
                    bbox.getSouthWest()
                ]);
                
                map.fitBounds(poly.getBounds());
                placeMarker(e.geocode.center);
            }).addTo(map);
            
            // Add locate control
            L.control.locate({
                position: 'topright',
                strings: {
                    title: "Show my location"
                },
                locateOptions: {
                    enableHighAccuracy: true
                }
            }).addTo(map);
            
            // Add marker if user already has location
            if (defaultLat != -6.2088 || defaultLng != 106.8456) {
                marker = L.marker([defaultLat, defaultLng], {
                    draggable: true
                }).addTo(map);
                
                // Update coordinates when marker is dragged
                marker.on('dragend', function(event) {
                    const latlng = marker.getLatLng();
                    document.getElementById('latitude').value = latlng.lat.toFixed(6);
                    document.getElementById('longitude').value = latlng.lng.toFixed(6);
                });
            }
            
            // Click on map to set marker
            map.on('click', function(e) {
                placeMarker(e.latlng);
            });
            
            // Improve map rendering
            setTimeout(function() {
                map.invalidateSize();
            }, 0);
        }
        
        function getCurrentLocation() {
            // Check if geolocation is available
            if (navigator.geolocation) {
                // Show loading state
                const locationBtn = document.getElementById('get-location-btn');
                if (locationBtn) {
                    locationBtn.innerHTML = '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Getting location...';
                    locationBtn.disabled = true;
                }
                
                // Get current position
                navigator.geolocation.getCurrentPosition(function(position) {
                    // Success callback
                    const lat = position.coords.latitude;
                    const lng = position.coords.longitude;
                    const accuracy = position.coords.accuracy;
                    
                    // Center map on the location
                    map.setView([lat, lng], 16);
                    
                    // Place marker
                    placeMarker(L.latLng(lat, lng));
                    
                    // Add a circle showing the accuracy radius
                    if (locationCircle) {
                        map.removeLayer(locationCircle);
                    }
                    
                    locationCircle = L.circle([lat, lng], {
                        radius: accuracy,
                        color: '#4285F4',
                        fillColor: '#4285F4',
                        fillOpacity: 0.15
                    }).addTo(map);
                    
                    // Reset button
                    if (locationBtn) {
                        locationBtn.innerHTML = '<i class="bi bi-geo-alt"></i> Use My Current Location';
                        locationBtn.disabled = false;
                    }
                }, function(error) {
                    // Error callback
                    let errorMessage = "";
                    switch(error.code) {
                        case error.PERMISSION_DENIED:
                            errorMessage = "Location permission denied. Please enable location access in your browser settings.";
                            break;
                        case error.POSITION_UNAVAILABLE:
                            errorMessage = "Location information is unavailable.";
                            break;
                        case error.TIMEOUT:
                            errorMessage = "Location request timed out.";
                            break;
                        case error.UNKNOWN_ERROR:
                            errorMessage = "An unknown error occurred.";
                            break;
                    }
                    
                    alert(errorMessage);
                    
                    // Reset button
                    if (locationBtn) {
                        locationBtn.innerHTML = '<i class="bi bi-geo-alt"></i> Use My Current Location';
                        locationBtn.disabled = false;
                    }
                }, {
                    // Options
                    enableHighAccuracy: true,
                    timeout: 10000,
                    maximumAge: 0
                });
            } else {
                alert("Geolocation is not supported by this browser.");
            }
        }
        
        function placeMarker(latlng) {
            // Remove existing marker if any
            if (marker) {
                map.removeLayer(marker);
            }
            
            // Add new marker
            marker = L.marker(latlng, {
                draggable: true
            }).addTo(map);
            
            // Update form fields
            document.getElementById('latitude').value = latlng.lat.toFixed(6);
            document.getElementById('longitude').value = latlng.lng.toFixed(6);
            
            // Update coordinates when marker is dragged
            marker.on('dragend', function(event) {
                const latlng = marker.getLatLng();
                document.getElementById('latitude').value = latlng.lat.toFixed(6);
                document.getElementById('longitude').value = latlng.lng.toFixed(6);
            });
        }
    </script>
@endsection