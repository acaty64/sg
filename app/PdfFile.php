<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\PdfToText\Pdf;

class PdfFile extends Model
{

	/** Transform PDF file to temp.txt
	*/
	public static function PDFtoTxt($path_end, $file_in)
	{
    	//$path_in = "/pdf/".$path."/";
    	$path_in = "/pdf/tmp/";
    	$arch_in = public_path($path_in . $file_in);

		$fileName = substr($file_in, 0, strlen($file_in)-4);

    	$path_out = $path_in . "txt/";
   		$arch_out = public_path($path_out . $fileName). ".txt";

		$data = Pdf::getText($arch_in);
		
		if(file_exists($arch_out)){
			unlink($arch_out);
		}
		
		$archivo = fopen($arch_out,'a');

		fwrite($archivo, $data);

		fclose($archivo);
		
		if (filesize($arch_out) > 0){		
			return [
				'success' 	=> true,
				'data' 		=> $fileName
			];
		} else {
			/* Borrar archivos temporales */
			unlink($arch_in);
			unlink($arch_out);
			return [
				'success' 	=> false,
				'data' 		=> 'El archivo PDF no tiene la resolución requerida.'
			];
		}

	}
}
