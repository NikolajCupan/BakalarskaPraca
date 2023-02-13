<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
}
