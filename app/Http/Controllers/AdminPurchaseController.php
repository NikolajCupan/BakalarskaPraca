<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Models\BasketProduct;
use App\Models\Purchase;
use App\Models\PurchaseStatus;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

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
            'activeCategory' => $purchaseStatus,
            'title' => $request->title
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

        $purchase = Purchase::where('id_purchase', '=', $request->cancelledPurchaseId)
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

        $purchase = Purchase::where('id_purchase', '=', $request->modifiedPurchaseId)
                            ->first();

        // PurchaseManager should not be able to modify payment date of purchase if its status is set to cancelled, but it is checked
        if ($purchase->hasStatus('cancelled'))
        {
            return redirect('admin/purchase')->with('errorMessage', 'Neplatna zmena datumu platby za objednavku');
        }

        // Payment date cannot happen before purchase date
        $newPaymentDate = $request->newPaymentDate ? date('Y-m-d H:i:s', strtotime($request->newPaymentDate)) : null;
        // Compare only when $newPaymentDate is not null
        if (!is_null($newPaymentDate) && $newPaymentDate < $purchase->purchase_date)
        {
            return back()->with('errorMessage', 'Datum platby za objednavku nemoze byt mensi ako datum objednavky');
        }

        // Getting here means purchase's payment date can be changed
        // The $request->newPaymentDate might be null
        $purchase->payment_date = $newPaymentDate;
        $purchase->save();

        return redirect('admin/purchase')->with('message', 'Datum platby za objednavku bol uspesne nastaveny');
    }

    // Reclaim product from a purchase
    public function productReclaim(Request $request)
    {
        Helper::allow(['purchaseManager']);

        $request->validate([
            'quantityValue' => 'required|min:1'
        ]);

        $purchase = Purchase::where('id_purchase', '=', $request->reclaimedPurchaseId)
                            ->first();

        // PurchaseManager should not be able to reclaim product of purchase if its status is not set to confirmed, but it is checked
        if (!$purchase->hasStatus('confirmed'))
        {
            return redirect('admin/purchase')->with('errorMessage', 'Neplatna zmena datumu platby za objednavku');
        }

        $basketProduct = BasketProduct::where('id_basket', '=', $purchase->id_basket)
                                      ->where('id_product', '=', $request->reclaimedProductId)
                                      ->first();

        // Check if reclaimed quantity is larger than basket product quantity
        if ($request->quantityValue > $basketProduct->quantity)
        {
            return back()->with('errorMessage', 'Pocet reklamovanych produktov nemoze byt vacsi ako pocet zakupenych produktov');
        }

        // Decrement quantity of basket product
        // Because of composite primary key Query Builder must be used instead of Eloquent
        $newQuantity = $basketProduct->quantity - $request->quantityValue;
        DB::table('basket_product')
                ->where('id_basket', $purchase->id_basket)
                ->where('id_product', $request->reclaimedProductId)
                ->update([
                    'quantity' => $newQuantity
        ]);

        if ($newQuantity == 0)
        {
            // Basket product with 0 quantity will not be stored in the purchase anymore
            // Because of composite primary key Query Builder must be used instead of Eloquent
            DB::table('basket_product')
                    ->where('id_basket', $purchase->id_basket)
                    ->where('id_product', $request->reclaimedProductId)
                    ->delete();
        }

        if ($request->has('checkboxReturnToWarehouse'))
        {
            // Return products back to warehouse only if checkbox was checked
            $warehouseProduct = $basketProduct->getProduct()->getWarehouseProduct();
            $warehouseProduct->quantity += $request->quantityValue;
            $warehouseProduct->save();
        }

        // Note:
        //      Theoretically all products from purchase can be reclaimed,
        //      thus purchase would be left with no products afterwards,
        //      if it is the case, set purchase status to cancelled
        if ($purchase->getBasket()->getVariousProductsCount() == 0)
        {
            $cancelledStatus = PurchaseStatus::where('status', '=', 'cancelled')
                                             ->first();
            $purchase->id_status = $cancelledStatus->id_status;
            $purchase->save();
        }

        return redirect('admin/purchase')->with('message', 'Reklamacia produktu bola uspesna');
    }

    // Deletes purchase from database
    public function destroyPurchase(Request $request)
    {
        Helper::allow(['purchaseManager']);

        $purchase = Purchase::where('id_purchase', '=', $request->purchaseId)
                            ->first();

        // PurchaseManager should not be able to delete purchase if its status is not cancelled
        // or if there are products in it, it is checked
        if (!$purchase->hasStatus('cancelled') || $purchase->getBasket()->getVariousProductsCount() > 0)
        {
            return redirect('admin/purchase')->with('errorMessage', 'Objednavku sa nepodarilo zmazat');
        }

        // Note:
        //      Address and Basket are deleted using trigger
        //      BasketProducts are not deleted because Basket must be empty
        $purchase->delete();

        return redirect('admin/purchase')->with('message', 'Zmazanie objednavky bolo uspesne');
    }
}
