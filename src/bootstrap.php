<?php

require_once __DIR__ . '/../vendor/autoload.php';

require_once __DIR__ . '/setting.php';
require_once __DIR__ . '/../variables.php';


/* 
* Geting following variables from root/variables.php. 
* $url, $startTime, $endTime, $fileDir
*/
$endpointApiToJson = new EndpointApiConvertor\EndpointApiToJson();
$endpointApiToJson->start($url, $startTime, $endTime, $fileDir);

?>
