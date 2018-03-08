<?php 

namespace EndpointApiConvertor\Filters;

use Exception;

class Filter 
{
	
	protected $startTimestamp = '';

	protected $endTimestamp	= '';

	protected $filteredProducts = [];


	function __construct( string $startTime, string $endTime )
	{
		$this->startTimestamp 	= strtotime($startTime);
		$this->endTimestamp 	= strtotime($endTime);
	}


	public function getFilteredProducts( array $resources ) : array
	{
		try{
			if ( !isset( $resources['product_availabilities'] )) 
				throw new Exception( 'Product availabilities request has some issues.' );
			

			foreach ( $resources['product_availabilities'] as $products ) {
				$list = [];
				$placesAvailableStatus = false;
				foreach ( $products as $key => $product ) {	
					if ( $key === 'places_available' && $product >= 1 && $product <= 30 ) 
						$placesAvailableStatus = true;

					$activityStartDatetimeStatus = $this->getActivityStartDatetimeStatus( $key, $product );
					$list[$key] = $product;
				}

				if ( $placesAvailableStatus && $activityStartDatetimeStatus ) 
					$filteredProducts[] = $list;
			}

			return $filteredProducts;
		
		} 
		catch( Throwable $e ){
			throw new Exception( $e->getMessage() );
		}
		
	}
	

	private function getActivityStartDatetimeStatus( string $key, $product ) : bool
	{
		$status = false;
		if ( $key === 'activity_start_datetime' ) 
		{
			$timestamp = strtotime( $product );
			if ( $timestamp >= $this->startTimestamp && $timestamp <= $this->endTimestamp ) 
				$status = true;
		}

		return $status;
	}

}



?>