$(document).ready(function () {

    $('#geolocMe').on('click', function() {
        // si l'objet navigator est disponible
        if(navigator.geolocation) {
            console.debug('geolocalisation en cours...'); 
            navigator.geolocation.getCurrentPosition(getPosition, getError); 
        } else {
            console.log("La géolocalisation n'est pas disponible avec votre navigateur.");
        }
        function getPosition(position) { 
            var coord = position.coords;

            map = new mapboxgl.Map({
                container: 'map', // container ID
                style: 'mapbox://styles/mapbox/streets-v11', // style URL
                center: [coord.longitude, coord.latitude], // starting position [lng, lat]
                zoom: 13 // starting zoom
            });
            var marker = new mapboxgl.Marker()
            .setLngLat([coord.longitude, coord.latitude])
            .addTo(map);

            mapboxgl.accessToken = 'pk.eyJ1IjoibGVnaWxhbWFscyIsImEiOiJja21kNzNwZW4yaXJjMnFuNmtua2FpNWFoIn0.Tj_VsoXaE3EC1vM88riKzw';
        }
        
        function getError(error) {
            switch(error.code) { 
            case error.PERMISSION_DENIED: 
            console.log("User denied the request for Geolocation.");
            break;
            default: 
            console.log("Votre géolocalisation est impossible...");
            }
        };
    });
});