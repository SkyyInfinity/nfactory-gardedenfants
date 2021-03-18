$(document).ready(function () {
    var userLoc;
    var map;
    // Gestion Formulaire
    $.ajax({
        type: 'GET',
        url: './Public/assets/ajax/getUserloc.php',
        success: function (response) {
            userLoc = response.userLoc;
            map = new mapboxgl.Map({
                container: 'map', // container ID
                style: 'mapbox://styles/mapbox/streets-v11', // style URL
                center: [userLoc.lon, userLoc.lat], // starting position [lng, lat]
                zoom: 13 // starting zoom
            });
        }, error: function (response) {
            console.log(response);
        }
    })
    $.ajax({
        type: 'GET',
        url: './Public/assets/ajax/getUserloc.php',
        success: function (response) {
            var marker1 = new mapboxgl.Marker()
                .setLngLat([userLoc.lon, userLoc.lat])
                .addTo(map);
            map.setLayoutProperty('country-label', 'text-field', [
                'get',
                'name_fr'
            ]);
        }, error: function (response) {
            console.log(response);
        }
    })
    mapboxgl.accessToken = 'pk.eyJ1IjoibGVnaWxhbWFscyIsImEiOiJja21kNzNwZW4yaXJjMnFuNmtua2FpNWFoIn0.Tj_VsoXaE3EC1vM88riKzw';

});

