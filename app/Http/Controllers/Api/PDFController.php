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
		$texto = strtoupper($request->texto);
		$search_path = public_path("pdf/" . $carpeta);
		$busqueda = collect(scandir($search_path));
		$archivos = $busqueda->filter(function($item) {
		        if (substr($item, -4) == '.pdf') {
		            return true;
		        }
		    });

		// Busca el texto en los archivos txt
		$rpta = [];
		foreach ($archivos as $key => $value) {
			$file_look = public_path("/pdf/" . $carpeta . "/txt/" . substr($value, 0, -4) . ".txt");
			$arch_txt = file_get_contents($file_look);
			$pos = strpos($arch_txt, $texto);
			if ($pos !== false) {
			    array_push($rpta, $value);
			}
		}

		return [
			'success'=>true,
			'data'=>$rpta
		];
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