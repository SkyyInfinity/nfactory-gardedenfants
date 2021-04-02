$(document).ready(function () {
    function markerColor(type) {
        if (type == "nounou") {
            return "#f00";
        } else if(type == "nursery") {
            return "#0f0";
        }
    }
    var userLoc;
    var map;
    var marker = [];
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
            console.log(response)
            var i = 0;
            response['features'].forEach(element => {
                coordinate = element.coordinate;
                marker = new mapboxgl.Marker({
                    color: markerColor(element.type),
                    draggable: false,
                    }).setLngLat([coordinate[0],coordinate[1]])
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
// create the popup
})
