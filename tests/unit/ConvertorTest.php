<?php

use PHPUnit\Framework\TestCase;
use EndpointApiConvertor\Convertors\Convertor;

class ConvertorTest extends TestCase
{
    public function testConvertoHasToTrue()
    {
    	$emess = NULL;
    	$fileDir = __DIR__ . '/../../public/csv/file.csv';
        try {
        	$convertor = new Convertor( $fileDir );
			$convertor->convertArrayToCsv( [] );   
        } catch (Throwable $e) { $emess = $e->getMessage(); }
        $this->assertEquals( $emess, 'There is no result.' );
    }
}

?>