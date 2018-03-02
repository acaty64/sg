<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\PdfToText\Pdf;

class PDFController extends Controller
{

	public function index($carpeta)
	{
		$search_path = public_path("pdf/" . $carpeta);
		$busqueda = collect(scandir($search_path));
		$archivos = $busqueda->filter(function($item)
		    {
		        if (substr($item, -4) == '.pdf') {
		            return true;
		        }
		    });
		return [
			'success'=>true,
			'data'=>$archivos
		];		
	}


	public function searchTextInPDF(Request $request)
	{
		$carpeta = $request->carpeta;
		$texto = $request->texto;
		$search_path = public_path("pdf/" . $carpeta);
		$busqueda = collect(scandir($search_path));
		$archivos = $busqueda->filter(function($item)
		    {
		        if (substr($item, -4) == '.pdf') {
		            return true;
		        }
		    });

		// Borra los archivos de la carpeta txt
		////$check = array_map('unlink', glob("txt/*.txt"));

		// Crea los archivos .txt
		$array_files = [];
		foreach ($archivos as $key => $value) {
			$file_out = $this->PDFtoTxt($carpeta, $value);
			array_push($array_files, $file_out);
		};

		$rpta = [];
		// Busca el texto en los archivos
		foreach ($array_files as $key => $value) {
			$file_look = public_path("/pdf/" . $carpeta . "/txt/" . $value . ".txt");
			$arch_txt = file_get_contents($file_look);
			$pos = strpos($arch_txt, $texto);
			if ($pos !== false) {
			    array_push($rpta, $value . ".pdf");
			}
		}
		return [
			'success'=>true,
			'data'=>$rpta
		];
		//return $rpta;
		//echo 'total_files = '.count($array_files);
	}

	/** Transform PDF file to temp.txt
	*/
	protected function PDFtoTxt($path, $file_in)
	{
    	$path_in = "/pdf/".$path."/";
    	$arch_in = public_path($path_in . $file_in);

		$name_file = substr($file_in, 0, strlen($file_in)-4 );
    	$path_out = $path_in . "txt/";
    	$file_out = $name_file;
   		$arch_out = public_path($path_out . $file_out). ".txt";

		$data = Pdf::getText($arch_in);
		
		if(file_exists($arch_out)){
			unlink($arch_out);
		}
		
		$archivo = fopen($arch_out,'a');

		fwrite($archivo, $data);

		return $file_out;

	}

}