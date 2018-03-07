<?php

namespace EndpointApiConvertor;

use Exception;
use EndpointApiConvertor\Curls\Curl;
use EndpointApiConvertor\Convertors\Convertor;


class EndpointApiToJson
{
	public function start($url, $startTime, $endTime, $fileDir)
	{
		try{
			// $resources =json_decode(file_get_contents('test.json'));
			$curl = new Curl($url);
			$resources =$curl->getDecodeJson();
			$filteredProducts = [];
			$startTimestamp = strtotime($startTime);
			$endTimestamp = strtotime($endTime); 

			if (!isset($resources->product_availabilities)) {
				throw new Exception( 'Product availabilities request has some issues.' );
			}

			foreach ($resources->product_availabilities as $products) {
				$list = [];
				$placesAvailableStatus = false;
				$activityStartDatetimeStatus = false;
				foreach ($products as $key => $product) {	
					if ($key === 'places_available' && $product >= 1 && $product <= 30) {
						$placesAvailableStatus = true;
					}
					if ($key === 'activity_start_datetime') {
						$timestamp = strtotime($product);
						if ($timestamp >= $startTimestamp && $timestamp <= $endTimestamp ) {
							$activityStartDatetimeStatus = true;
						}
					}
					$list[$key] = $product;
				}

				if ($placesAvailableStatus && $activityStartDatetimeStatus) {
					$filteredProducts[] = $list;
				}	
			}

			$convertor = new Convertor();
			$status = $convertor->convertArrayToCsv($filteredProducts, $fileDir);
			
			header('Location: ./public/csv/file.csv');
		} 
		catch(Throwable $e){
			echo '<h3 style="color:red; text-align: center">' . $e->getMessage() . '</h3>';
		}
		
	}
	
}



?>