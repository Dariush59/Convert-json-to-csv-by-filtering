<?php 

namespace EndpointApiConvertor\Convertors;

use Exception;

class Convertor {

    public function convertArrayToCsv(array $request, $fileDir) : void
    {
        try{
            if (!is_array($request)) {
                throw new Exception( 'The request has some issues.' );
            }

            // $fileDir = __DIR__ . '/../../../public/csv/file.csv';
            $delimiter = ';';

			$file = fopen($fileDir, 'w');
			$condition = true;
			foreach ($request as $fields) {
				if ($condition) {
					fputcsv($file, array_keys($fields), $delimiter);
					$condition = false;
				}
				fputcsv($file, $fields, $delimiter);
			}
        }
        catch(Throwable $e) {
            throw new Exception( $e->getMessage() );
        }
        finally {
            if (file_exists($fileDir) && isset($file))
                fclose($file);
        }
    } 
}

?>