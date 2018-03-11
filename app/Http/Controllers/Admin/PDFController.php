<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\PdfFile;
use Illuminate\Contracts\Routing\asset;
use Illuminate\Contracts\Validation\validate;
use Illuminate\Http\File;
use Illuminate\Http\Request;
use Laracasts\Flash\Flash;
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

    public function upload(Request $request)
    {
        $carpeta = $request->tipo;
        $file = $request->archivo;

        $fileName = $request->file('archivo')->getClientOriginalName(); 

        /* Correction Name File PDF */
        $error = array('°', '.', '-', '  ', ' ', '(', ')');
        $ok =    array('' , '_',  '_', '_', '_', '_', '_');
        $name_old = substr($fileName, 0, strlen($fileName)-4);
        $newNameFile = str_replace($error, $ok, $name_old) . '.pdf';

        $path_tmp = base_path() . '/public/pdf/tmp';
        $path_carpeta = base_path() . '/public/pdf/' . $carpeta .'/';

        $request->file('archivo')->move(
             $path_tmp, $newNameFile
        );

        /* Transform PDF file to .txt */
        $newFile = PdfFile::PDFtoTxt($path_tmp, $newNameFile);

        if ($newFile['success']){        
            /* Mover archivos de tmp a $path */
            $fileName = $newFile['data'];
            $path_in = base_path() . "/public/pdf/tmp/";
            $path_end = base_path() . "/public/pdf/" . $carpeta . '/';
            $arch_tmp_pdf = $path_in . $fileName . '.pdf';
            $arch_tmp_txt = $path_in .  'txt/' . $fileName . '.txt';
            $arch_out_pdf = $path_end . $fileName . '.pdf';
            $arch_out_txt = $path_end .  'txt/' . $fileName . '.txt';
            rename($arch_tmp_pdf, $arch_out_pdf);       
            rename($arch_tmp_txt, $arch_out_txt);
                    
            if(file_exists($arch_out_pdf) && file_exists($arch_out_txt)){
                Flash::success('Se ha grabado ' . $fileName . '.pdf en ' . $carpeta . ' de forma exitosa')->important();
            }else{
                Flash::error('Ups!! No se ha grabado ' . $fileName . ' en ' . $carpeta)->important();
            }
        } else {
            Flash::error($newFile['data'])->important();
        }
        
        return redirect('/files');

    }

}