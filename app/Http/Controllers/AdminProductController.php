<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use Illuminate\Http\Request;

class AdminProductController extends Controller
{
    // Warehouse management page
    public function warehouse()
    {
        Helper::allow('productManager');

        return view('admin.product.warehouse');
    }

    // Shop management page
    public function shop()
    {
        Helper::allow('productManager');

        return view('admin.product.shop');
    }
}
