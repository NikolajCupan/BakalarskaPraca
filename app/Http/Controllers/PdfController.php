<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class PdfController extends Controller
{
    public function viewPdf()
    {
        $pdf = PDF::loadView('pdf.test')->setPaper('a4', 'portrait');

        return $pdf->stream();
    }

    public function downloadPdf()
    {
        $pdf = PDF::loadView('pdf.test')->setPaper('a4', 'portrait');

        return $pdf->download('moje-pdf.pdf');
    }
}
