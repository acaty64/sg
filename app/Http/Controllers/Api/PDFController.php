<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\PdfFile;
use Illuminate\Http\Request;
use Spatie\PdfToText\Pdf;

class PDFController extends Controller
{
	/*
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
	*/

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
			$file_out = PdfFile::PDFtoTxt($carpeta, $value)->data;
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

    public function viewActa(Request $request)
    {
        $tipo = $request->tipo;
        $filename = $request->acta;
        $file_pdf = 'pdf/'.$tipo.'/'.$filename;
        $arch_pdf = asset('pdf\\'.$tipo.'\\').$filename;
        if(!file_exists($file_pdf)){
            $arch_pdf = asset('pdf\\000000.pdf');
        }
        return view('users.pdfactas')
            ->with('arch_pdf',$arch_pdf)
            ->with('tipo',$tipo);
    }

}