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
<div class="earth3dmap-com"><iframe id="iframemap" src="https://maps.google.com/maps?q=<?php echo $obj->city ?>&amp;ie=UTF8&amp;iwloc=&amp;output=embed" width="100%" height="500" frameborder="0" scrolling="no"></iframe><div style="color: #333; font-size: 14px; font-family: Arial, Helvetica, sans-serif; text-align: right; padding: 10px;">Map by <a style="color: #333; text-decoration: underline; font-size: 14px; font-family: Arial, Helvetica, sans-serif; text-align: right;" href="http://earth3dmap.com/?from=embed" target="_blank" >Earth3DMap.com</a></div>
