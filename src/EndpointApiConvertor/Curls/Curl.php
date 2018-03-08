<?php

namespace EndpointApiConvertor\Curls;

use Exception;

class Curl
{
	protected $url = '';

	function __construct ( string $url )
	{
		if (!isset( $url ) && empty( $url )) 
			throw new Exception( 'Please set the API url.' );
		
		$this->url = $url;
	}

	
	public function getDecodeJson() : array
	{
		try {
			$ch = curl_init();
			curl_setopt( $ch, CURLOPT_URL, $this->url );
			curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );

			return ( array ) json_decode( curl_exec( $ch ));

		}
		catch( Throwable $e ) {
            throw new Exception( $e->getMessage() );
        }
	}
}

?>