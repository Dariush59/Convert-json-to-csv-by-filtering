<?php

namespace EndpointApiConvertor;

use Exception;
use EndpointApiConvertor\Curls\Curl;
use EndpointApiConvertor\Convertors\Convertor;
use EndpointApiConvertor\Filters\Filter;


class EndpointApiToJson
{
	public function start( string $url, string $startTime, string $endTime, string $fileDir ) : void
	{
		try{
			// $resources 			=json_decode(file_get_contents('test.json'));
			$curl 				= new Curl( $url );
			$resources 			= $curl->getDecodeJson();

			$filter 			= new Filter( $startTime, $endTime );
			$filteredProducts	= $filter->getFilteredProducts( $resources );

			$convertor 			= new Convertor( $fileDir );
			$status 			= $convertor->convertArrayToCsv( $filteredProducts  );

			header('Location: ./public/csv/file.csv');

		}
		catch(Throwable $e){
			echo '<h3 style="color: red; text-align: center">' . $e->getMessage() . '</h3>';
		}
		
		
	}
	
}



?>