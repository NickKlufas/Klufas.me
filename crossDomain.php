<?php

//set POST variables
extract($_POST);

$url = 'http://sampleserver1.arcgisonline.com/ArcGIS/rest/services/Geometry/GeometryServer/project?f=json&inSR=4326&outSR=102113&geometries={%20%22geometryType%22:%22esriGeometryPoint%22,%20%22geometries%22:[{%22x%22:' . $_POST['mercatorX_lon'] . ',%22y%22:' . $_POST['mercatorY_lat'] . '}]%20}';

//open connection
$ch = curl_init();

//set the url, number of POST vars, POST data
curl_setopt($ch,CURLOPT_URL,$url);
curl_setopt($ch, CURLOPT_HEADER, false);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);


//execute post
$result = curl_exec($ch);
$status = curl_getinfo($ch);

//close connection
curl_close($ch);

echo $result;
?>