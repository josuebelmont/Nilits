<?php

namespace App\Http\Controllers;

//use Barryvdh\DomPDF\PDF as PDF;
use Barryvdh\DomPDF\Facade\Pdf as PDF;

use Illuminate\Http\Request;

class PDFController extends Controller
{
    //

    public function oficioAsignacion()
{
    $data = []; // Tus datos aquí
    $pdf = PDF::loadView('pdf.oficio_asignacion');

    return $pdf->download('oficio_asignacion.pdf');
}

public function constanciaTutoria()
{
    $data = []; // Tus datos aquí
    $pdf = PDF::loadView('pdf.constancia_tutoria');
    return $pdf->download('constancia_tutoria.pdf');
}
}
