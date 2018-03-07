<?php

require_once __DIR__ . '/../vendor/autoload.php';

require_once __DIR__ . '/setting.php';
require_once __DIR__ . '/../variables.php';

// require_once __DIR__ . '/EndpointApiConvertor/EndpointApiToJson.php';

$endpointApiToJson = new EndpointApiConvertor\EndpointApiToJson();
$endpointApiToJson->start($url, $startTime, $endTime, $fileDir);

?>
