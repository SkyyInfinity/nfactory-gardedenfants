$(document).ready(function () {
    var userLoc;
    var map;
    // Gestion Formulaire
    $.ajax({
        type: 'GET',
        url: './Public/ajax/getUserloc.php',
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
        url: './Public/ajax/getProLocs.php',
        success: function (response) {
            console.log(response.ProPos)
            var i = 0;
            response.ProPos.forEach(element => {
                coordinates = element.features[0].geometry.coordinates;
                var marker = new mapboxgl.Marker()
                    .setLngLat([coordinates[0],coordinates[1]])
                    .addTo(map);
                map.setLayoutProperty('country-label', 'text-field', [
                    'get',
                    'name_fr'
                ]);
                i++;
            });

        }, error: function (response) {
            console.log(response);
        }
    })
    mapboxgl.accessToken = 'pk.eyJ1IjoibGVnaWxhbWFscyIsImEiOiJja21kNzNwZW4yaXJjMnFuNmtua2FpNWFoIn0.Tj_VsoXaE3EC1vM88riKzw';

});

