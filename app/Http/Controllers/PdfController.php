<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Factura;

class PdfController extends Controller
{
    
    public function generar(Factura $factura){
           
        $factura->load('cita.vehiculo.user', 'detalles.repuesto');

        $pdf = PDF::loadView('pdf.factura', compact('factura'));

        return $pdf->download('factura'.$factura->id.'.pdf');
    }
}
