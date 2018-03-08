<?php

use PHPUnit\Framework\TestCase;
use EndpointApiConvertor\Curls\Curl;
use EndpointApiConvertor\Filters\Filter;

class FilterTest extends TestCase
{
    public function testFilterHasArray()
    {
        $startTime = '2017-10-31T11:59';
		$endTime = '2017-11-30T11:59';
		$url = 'http://www.mocky.io/v2/58ff37f2110000070cf5ff16';
        $curl = new Curl( $url );
        $filter = new Filter( $startTime, $endTime );
        $this->assertArrayHasKey(
        	'places_available', $filter->getFilteredProducts( 
        		$curl->getDecodeJson())[0]
        );
    }

}


?>