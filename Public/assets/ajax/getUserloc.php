<?php
require('../../inc/functions.php');
$errors = array();
$success = false;
// $json = file_get_contents('http://ip-api.com/json/157.25.64.2?fields=continent,continentCode,country,countryCode,region,regionName,city,district,zip,lat,lon,timezone,offset,query');
$json = file_get_contents('http://ip-api.com/json/'. getUserIpAddr() .'?fields=continent,continentCode,country,countryCode,region,regionName,city,district,zip,lat,lon,timezone,offset,query');
$obj = json_decode($json);
if(count($errors) == 0) {
    $success = true;
}

$data = array(
    'errors' => $errors,
    'success' => $success,
    'userLoc' => $obj
);

showJson($data);

