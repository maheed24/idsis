<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Barryvdh\DomPDF\Facade\Pdf;

class PDFCertController extends Controller
{
    public function generatePdf(){
        // $pdf = App::make('dompdf.wrapper');
        // $pdf->loadHTML('<h1>Hello World </h1>');
        $pdf = Pdf::loadView('certificate-pdf')->setPaper('legal');
        return $pdf->stream();
    }
}
