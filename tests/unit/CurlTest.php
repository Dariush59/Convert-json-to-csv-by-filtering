<?php

use PHPUnit\Framework\TestCase;
use EndpointApiConvertor\Curls\Curl;

class CurlTest extends TestCase
{
    public function testCurlResponseToTrue()
    {
        $url = 'http://www.mocky.io/v2/58ff37f2110000070cf5ff16';
        $curl = new Curl( $url );
        $this->assertArrayHasKey('product_availabilities', $curl->getDecodeJson());
    }
}

?>