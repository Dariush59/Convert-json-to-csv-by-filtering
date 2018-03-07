<?php
class Convertor {

    public function convertArrayToCsv($request)
    {
        try{
            if (!is_array($request)) {
                throw new Exception( 'The request has some issues.' );
            }

            $delimiter = ';';
			$file= fopen('./csv/file.csv', 'w');
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
            if (file_exists('./csv/file.csv') && isset($file))
                fclose($file);
        }
    } 
}

?>