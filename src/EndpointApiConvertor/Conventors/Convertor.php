<?php 

namespace EndpointApiConvertor\Convertors;

use Exception;

class Convertor {

    protected $fileDir = '';

    function __construct( string $fileDir )
    {
        $this->fileDir = $fileDir;
    }
    

    public function convertArrayToCsv( array $request ) : void
    {
        try{
            if (empty($request)) 
                throw new Exception( 'There is no result.' );

            // $fileDir = __DIR__ . '/../../../public/csv/file.csv';
            $delimiter = ';';
            $condition = true;

			$file = fopen( $this->fileDir, 'w' );
			foreach ( $request as $fields ) {
				
                if ( $condition ) {
					fputcsv( $file, array_keys( $fields ), $delimiter );
					$condition = false;
				}

				fputcsv( $file, $fields, $delimiter );
			}
        }
        catch( Throwable $e ) {
            throw new Exception( $e->getMessage() );
        }
        finally {
            if ( file_exists( $this->fileDir ) && isset( $file ))
                fclose( $file );
        }
    } 
}

?>