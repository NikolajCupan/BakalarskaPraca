<?php

namespace App\Http\Controllers;

use App\Models\BasketProduct;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
            'quantityValue' => ['numeric', 'min:1', 'max:999']
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
            $basketProduct->delete();
        }
        return back();
    }
}
