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


    function trim(myString) {
        return myString.replace(/ /gi, "%20");
    }

    const apiGeo = "https://api-adresse.data.gouv.fr/search/?q=";
    const geoFormat = "&type=housenumber&autocomplete=1";
  
    let geo = $("#geo");
  
    geo.keyup(function () {
      let geourl = apiGeo + trim(geo.val()) + geoFormat;

      fetch(geourl, {method: 'get'}).then(response => response.json()).then(results =>{
        $('#geoselectadresse').find('option').remove();
        $('#geolist').find('tr').remove();
  
        let geolabel = [];
        let geolong = [];
        let geolatt = [];
        let geocodepostal = [];
  
        for(let i = 0 ; i < results['features'].length ; i++) {
          $('#geolist').append('<tr class="geolisting" id="geoAdd'+[i]+'"><td><i class="fas fa-map-marker-alt"></i>'+results['features'][i]['properties']['label']+'</td><tr>');
          
          geolabel.push(results['features'][i]['properties']['label']);
          geolong.push(results['features'][i]['geometry']['coordinates'][0]);
          geolatt.push(results['features'][i]['geometry']['coordinates'][1]);
          geocodepostal.push(results['features'][i]['properties']['postcode']);
  
          $("#geoAdd"+[i]).on("click", function (e) {
            e.preventDefault();
            var stuff ={'key1':geolabel[i],'key2':geocodepostal[i],'key3':geolong[i],'key4':geolatt[i]};
            $.ajax({
                type: "POST",
                url: "",
                data : stuff,
        
                beforeSend: function (){
                // console.log("Requete en cours")
                },
        
                success: function (response){
                geo.val(geolabel[i]);

                map = new mapboxgl.Map({
                    container: 'map', // container ID
                    style: 'mapbox://styles/mapbox/streets-v11', // style URL
                    center: [geolong[i], geolatt[i]], // starting position [lng, lat]
                    zoom: 13 // starting zoom
                });
                var marker = new mapboxgl.Marker()
                .setLngLat([geolong[i], geolatt[i]])
                .addTo(map);
    
                mapboxgl.accessToken = 'pk.eyJ1IjoibGVnaWxhbWFscyIsImEiOiJja21kNzNwZW4yaXJjMnFuNmtua2FpNWFoIn0.Tj_VsoXaE3EC1vM88riKzw';
                }
            });
          });

        };
    });
  });
});