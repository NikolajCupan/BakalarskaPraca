<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Models\Purchase;
use App\Models\User;
use Illuminate\Http\Request;

class AdminPurchaseController
{
    // Table with purchases with some purchase status page
    public function showPurchases(Request $request)
    {
        Helper::allow(['purchaseManager']);

        $purchaseStatus = $request->category;

        // According to category value either all purchases or purchases of selected category are returned
        $purchases = null;
        if ($purchaseStatus == "all")
        {
            $purchases = Purchase::all();
        }
        else
        {
            $purchases = Purchase::whereIn('id_status', function($mainQuery) use ($purchaseStatus) {
                $mainQuery->select('id_status')
                    ->from('purchase_status')
                    ->where('status', '=', $purchaseStatus);
            })->get();
        }

        return view('admin.purchase.purchases', [
            'purchases' => $purchases,
            'activeCategory' => $purchaseStatus
        ]);
    }
}
