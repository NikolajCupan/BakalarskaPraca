<?php

namespace App\Http\Controllers;

use App\Helpers\Constants;
use App\Helpers\Helper;
use App\Models\BasketProduct;
use App\Models\Product;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class UserShopController extends Controller
{
    // Cart page
    public function cart()
    {
        return view('user.shop.cart');
    }

    // User's order history page
    public function orderHistory()
    {
        return view('user.shop.orderHistory');
    }

    // Add shop product to logged user's cart
    public function addToCart(Request $request)
    {
        // Validate quantity
        $validation = Validator::make($request->all(), [
            'quantityValue' => ['numeric', 'min:1', 'max:' . Constants::MAX_PRODUCT_PIECES]
        ]);

        if ($validation->fails())
        {
            return back()->with('errorMessage', 'Produkt sa nepodarilo pridat do kosika');
        }

        // Getting hear means validation was successful
        $user = Auth::user();
        $basket = $user->getCurrentBasket();

        // Check if user already has product in his basket
        $basketProduct = BasketProduct::where('id_basket', '=', $basket->id_basket)
                                      ->where('id_product', '=', $request->productId)
                                      ->first();

        if (is_null($basketProduct))
        {
            // User does not have the product in his basket yet
            $basketProduct = BasketProduct::create([
                'id_basket' => $basket->id_basket,
                'id_product' => $request->productId,
                'quantity' => $request->quantityValue
            ]);
        }
        else
        {
            // User already has the product in his basket
            $currentQuantity = $basketProduct->quantity;
            $newQuantity = ($currentQuantity + $request->quantityValue > Constants::MAX_PRODUCT_PIECES)
                            ? Constants::MAX_PRODUCT_PIECES : ($currentQuantity + $request->quantityValue);

            // Because of composite primary key Query Builder must be used instead of Eloquent
            DB::table('basket_product')
                  ->where('id_basket', $basket->id_basket)
                  ->where('id_product', $request->productId)
                  ->update([
                     'quantity' => $newQuantity
            ]);
        }

        return back()->with('message', 'Produkt bol uspesne pridany do kosika');
    }

    // Delete review on product from user
    public function destroyReview(Request $request)
    {
        $loggedUser = Auth::user();

        if (is_null($loggedUser))
        {
            return back()->with('errorMessage', 'Vymazanie recenzie bolo neuspesne');
        }

        $review = Review::where('id_user', '=', $request->authorId)
                        ->where('id_product', '=', $request->productId)
                        ->first();

        if (!Helper::hasRightsToModifyReview($loggedUser, $review))
        {
            return back()->with('errorMessage', 'Vymazanie recenzie bolo neuspesne');
        }

        return back()->with('message', 'Recenzia bola uspesna zmazana');
    }

    // AJAX call to get edit user's review of product
    public function editReview(Request $request)
    {
        $review = Review::where('id_user', '=', $request->authorId)
                         ->where('id_product', '=', $request->productId)
                         ->first();
        $loggedUser = Auth::user();

        if (!Helper::hasRightsToModifyReview($loggedUser, $review))
        {
            return response()->json(['success' => false]);
        }

        // Because of composite primary key Query Builder must be used instead of Eloquent
        DB::table('review')
            ->where('id_user', $request->authorId)
            ->where('id_product', $request->productId)
            ->update([
                'comment' => $request->text,
                'rating' => $request->rating
        ]);

        return response()->json(['success' => true]);
    }
}
