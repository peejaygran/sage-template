<script>

defer("google", function(){

        var map_location = `{{ $locations['location'] }},{{ $locations['state'] }}, Australia`;

        function initMap(map_location, element = false) {
            var geocoder = new google.maps.Geocoder();

            if (!element) {
                element = document.getElementById('local_map');
            }
            map = new google.maps.Map(element, {
                center: {
                    lat: 0,
                    lng: 0
                },
                zoom: 14,
                styles: [
            {
                "featureType": "all",
                "elementType": "labels.text",
                "stylers": [
                    {
                        "color": "#878787"
                    }
                ]
            },
            {
                "featureType": "all",
                "elementType": "labels.text.stroke",
                "stylers": [
                    {
                        "visibility": "off"
                    }
                ]
            },
            {
                "featureType": "landscape",
                "elementType": "all",
                "stylers": [
                    {
                        "color": "#f9f5ed"
                    }
                ]
            },
            {
                "featureType": "road.highway",
                "elementType": "all",
                "stylers": [
                    {
                        "color": "#f5f5f5"
                    }
                ]
            },
            {
                "featureType": "road.highway",
                "elementType": "geometry.stroke",
                "stylers": [
                    {
                        "color": "#c9c9c9"
                    }
                ]
            },
            {
                "featureType": "water",
                "elementType": "all",
                "stylers": [
                    {
                        "color": "#aee0f4"
                    }
                ]
            }
            ]
            });

            geocoder.geocode({
                'address': map_location
            }, function (results, status) {
                if (status === 'OK') {
                    map.setCenter(results[0].geometry.location);
                    console.log(results);
                } else {
                    console.log('Geocode was not successful for the following reason: ' + status);
                }
            });


        }

        initMap(map_location,  document.querySelector('#location-page-map')  );



})

</script>