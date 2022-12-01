<script>
    function initMap(map_location, element = false, zoom = false) {
        // debugger;
        var geocoder = new google.maps.Geocoder();

        if (!element) {
            element = document.getElementById('local_map');
        }

        if (!zoom) {
            zoom = 14
        }

        map = new google.maps.Map(element, {
            center: {
                lat: 0,
                lng: 0
            },
            zoom: zoom,
            styles: [{
                    "featureType": "landscape.natural",
                    "elementType": "geometry.fill",
                    "stylers": [{
                            "visibility": "on"
                        },
                        {
                            "color": "#e0efef"
                        }
                    ]
                },
                {
                    "featureType": "poi",
                    "elementType": "geometry.fill",
                    "stylers": [{
                            "visibility": "on"
                        },
                        {
                            "hue": "#1900ff"
                        },
                        {
                            "color": "#c0e8e8"
                        }
                    ]
                },
                {
                    "featureType": "road",
                    "elementType": "geometry",
                    "stylers": [{
                            "lightness": 100
                        },
                        {
                            "visibility": "simplified"
                        }
                    ]
                },
                {
                    "featureType": "road",
                    "elementType": "labels",
                    "stylers": [{
                        "visibility": "off"
                    }]
                },
                {
                    "featureType": "transit.line",
                    "elementType": "geometry",
                    "stylers": [{
                            "visibility": "on"
                        },
                        {
                            "lightness": 700
                        }
                    ]
                },
                {
                    "featureType": "water",
                    "elementType": "all",
                    "stylers": [{
                        "color": "#7dcdcd"
                    }]
                }
            ]
        });

        geocoder.geocode({
            'address': map_location
        }, function(results, status) {
            if (status === 'OK') {
                map.setCenter(results[0].geometry.location);
                console.log(results);
            } else {
                console.log('Geocode was not successful for the following reason: ' + status);
            }
        });


    }


    $(document).ready(function() {
        let scrolled = false;
        debugger;
        $(window).on('scroll click', function() {

            if (document.querySelector('.template-location') != null || document.querySelector(
                    '.template-profile') != null) {

                if (scrolled == false) {
                    scrolled = true;

                    setTimeout(function() {
                        if (google !== "undefined") {
                            if (document.querySelector('.template-location') != null) {
                                initMap(map_location, document.getElementById('local_map'));
                            }
                            if (document.querySelector('.template-profile') != null) {
                                initMap(map_location, document.getElementById('local_map'), 18);
                            }
                        }
                    }, 500);
                }
            }

        });
    });
</script>
