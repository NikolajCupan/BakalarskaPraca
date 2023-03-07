<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Models\Purchase;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;

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

    public function pdfPurchase(Request $request)
    {
        $user = Auth::user();
        $purchase = Purchase::where('id_purchase', '=', $request->purchaseId)
                            ->first();

        // Allow only owner of the purchase and users with role 'purchaseManager'
        if (!$purchase->isOwnedByUser($user) && !$user->hasRole(['purchaseManager']))
        {
            return redirect('/');
        }

        $pdf = PDF::loadView('pdf.purchase', [
            'purchase' => $purchase,
            'user' => $user
        ]);
        return $pdf->stream();
    }
}
