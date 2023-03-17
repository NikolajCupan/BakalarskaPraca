<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Models\Purchase;
use App\Models\PurchaseStatus;
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

    // Single purchase information page
    public function showPurchase($id_purchase)
    {
        Helper::allow(['purchaseManager']);

        $purchase = Purchase::where('id_purchase', '=', $id_purchase)
                            ->first();
        $purchaseStatuses = PurchaseStatus::all();

        // Might return null if user no longer has an account
        $user = $purchase->getBasket()->getUser();

        return view('admin.purchase.show', [
            'purchase' => $purchase,
            'purchaseStatuses' => $purchaseStatuses,
            'user' => $user
        ]);
    }

    // Cancel purchase
    public function cancelPurchase(Request $request)
    {
        Helper::allow(['purchaseManager']);

        $purchase = Purchase::where('id_purchase', '=', $request->purchaseId)
                            ->first();

        // PurchaseManager should not be able to update purchase status to cancelled if it already has that status, but it is checked
        if ($purchase->hasStatus('cancelled'))
        {
            return redirect('admin/purchase')->with('errorMessage', 'Objednavka uz bola zrusena');
        }

        // First, set purchase's status to 'cancelled'
        $cancelledStatus = PurchaseStatus::where('status', '=', 'cancelled')
                                         ->first();
        $purchase->id_status = $cancelledStatus->id_status;
        $purchase->save();

        // Return all products from the purchase back to the warehouse
        $basketProducts = $purchase->getBasket()->getBasketProducts();

        foreach ($basketProducts as $basketProduct)
        {
            $warehouseProduct = $basketProduct->getProduct()->getWarehouseProduct();
            $warehouseProduct->quantity += $basketProduct->quantity;
            $warehouseProduct->save();
        }

        return redirect('admin/purchase')->with('message', 'Objednavka bola uspesne zrusena');
    }

    // Modify status of purchase (cannot be modified to cancelled status this way)
    public function modifyPurchaseStatus(Request $request)
    {
        Helper::allow(['purchaseManager']);

        $purchase = Purchase::where('id_purchase', '=', $request->purchaseId)
                            ->first();

        // PurchaseManager should not be able to modify purchase status to cancelled using this form,
        // and also should not be able to modify purchase that already has status cancelled, but it is checked
        if ($purchase->hasStatus('cancelled') || $request->flexRadioStatus == "cancelled")
        {
            return redirect('admin/purchase')->with('errorMessage', 'Neplatna zmena statusu objednavky');
        }

        // Getting here means status of the purchase can be changed
        $purchaseStatus = PurchaseStatus::where('status', '=', $request->flexRadioStatus)
                                        ->first();
        $purchase->id_status = $purchaseStatus->id_status;
        $purchase->save();

        return redirect('admin/purchase')->with('message', 'Status objednavky bol uspesne zmeneny');
    }

    // Modify payment date of purchase (cancelled purchase cannot be modified)
    public function modifyPurchasePaymentDate(Request $request)
    {
        Helper::allow(['purchaseManager']);

        $purchase = Purchase::where('id_purchase', '=', $request->purchaseId)
                            ->first();

        // PurchaseManager should not be able to modify payment date of purchase if its status is set to cancelled, but it is checked
        if ($purchase->hasStatus('cancelled'))
        {
            return redirect('admin/purchase')->with('errorMessage', 'Neplatna zmena datumu platby za objednavku');
        }

        // Getting here means purchase's payment date can be changed
        // The $request->newPaymentDate might be null
        $newPaymentDate = $request->newPaymentDate ? date('Y-m-d H:i:s', strtotime($request->newPaymentDate)) : null;

        $purchase->payment_date = $newPaymentDate;
        $purchase->save();

        return redirect('admin/purchase')->with('message', 'Datum platby za objednavku bol uspesne nastaveny');
    }
}
