<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\PdfToText\Pdf;

class PDFController extends Controller
{
    public function viewActa($carpeta, $acta)
    {
        //$tipo = $request->tipo;
        $tipo = $carpeta;
        //$filename = $request->acta;
        $filename = $acta;
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