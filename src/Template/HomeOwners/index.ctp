<?php $this->assign('title', 'Home Owners'); ?>

<h2 class="ui center aligned sub header">Inspect a home</h2>

<div id="map"></div>

<div class="ui horizontal divider">
    Or
</div>

<a class="ui fluid primary button" id="new-home-button" href="home-owners/add">Register new home</a>

<script>
    var homes = <?= json_encode($homeOwners) ?>;
    var markers = [];
    var map;

    function initMap() {
        map = new google.maps.Map(document.getElementById('map'), {
            zoom: 13,
            center: {lat: 51.513, lng: -0.10}
        });
        window.setTimeout(drop, 500);
    }

    function drop() {
        clearMarkers();
        for (var i = 0; i < homes.length; i++) {
            addMarkerWithTimeout(homes[i], i * 200);
        }
    }

    function addMarkerWithTimeout(home, timeout) {
        window.setTimeout(function() {
            console.log(home.geolocation.latitude);
            var marker = new google.maps.Marker({
                position: {lat: parseFloat(home.geolocation.latitude), lng: parseFloat(home.geolocation.longitude)},
                map: map,
                animation: google.maps.Animation.DROP
            });
            markers.push(marker);
            marker.addListener('click', function () {
                if (home.envelope_id) {
                    window.location.href = "/operations/" + home.operation_id + "/home-owners/" + home.id + "/assessment";
                } else {
                    window.location.href = "/operations/" + home.operation_id + "/home-owners/" + home.id + "/sign";
                }
            });
        }, timeout);
    }

    function clearMarkers() {
        for (var i = 0; i < markers.length; i++) {
            markers[i].setMap(null);
        }
        markers = [];
    }

    console.log("Finished running");
</script>

<script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAtsjdDBoq978ylpNVywFtgrZq-ELN2EBA&callback=initMap">
</script>