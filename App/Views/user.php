<?php $title = 'Compte'; ?>
<h2>Bienvenue <?php echo $_SESSION['user']->name . ' ' . $_SESSION['user']->surname;?></h2>

<p>Votre profil est complété à 0%</p>

<h2>Vos garderies favorites</h2>

<h2>Vos nounous favorites</h2>

<h2>Etablisements à proximité</h2>
<?php 
function getUserIpAddr(){
    if(!empty($_SERVER['HTTP_CLIENT_IP'])){
        //ip from share internet
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    }elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
        //ip pass from proxy
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }else{
        $ip = '176.57.242.121';
    }
    return $ip;
}

    $json = file_get_contents('http://ip-api.com/json/'.getUserIpAddr().'?fields=continent,continentCode,country,countryCode,region,regionName,city,district,zip,lat,lon,timezone,offset,query');
    $obj = json_decode($json);
    debug($obj);
?>
<script src='https://api.mapbox.com/mapbox-gl-js/v2.1.1/mapbox-gl.js'></script>
<link href='https://api.mapbox.com/mapbox-gl-js/v2.1.1/mapbox-gl.css' rel='stylesheet' />
<div id='map' style='width: 100%; height: 600px;'></div>
<script>
mapboxgl.accessToken = 'pk.eyJ1IjoibGVnaWxhbWFscyIsImEiOiJja21kNzNwZW4yaXJjMnFuNmtua2FpNWFoIn0.Tj_VsoXaE3EC1vM88riKzw';

var map = new mapboxgl.Map({
container: 'map', // container ID
style: 'mapbox://styles/mapbox/streets-v11', // style URL
center: [<?php echo $obj->lon?>,<?php echo $obj->lat ?>], // starting position [lng, lat]
zoom: 9 // starting zoom
});

var marker1 = new mapboxgl.Marker()
.setLngLat([2.35222,48.8566])
.addTo(map);
map.setLayoutProperty('country-label', 'text-field', [
'get',
'name_fr' 
]);

</script>

