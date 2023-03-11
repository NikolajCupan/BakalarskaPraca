<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Models\WebRole;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class AdminController extends Controller
{
    // Select page
    public static function admin()
    {
        Helper::allow(['accountManager', 'productManager', 'reviewManager', 'purchaseManager']);

        return view('admin.adminSelect');
    }

    // Users management page
    public static function user()
    {
        Helper::allow(['accountManager']);

        return view('admin.user.index');
    }

    // Products management page
    public static function product()
    {
        Helper::allow(['productManager']);

        return view('admin.product.index');
    }

    // Purchases management page
    public static function purchase()
    {
        Helper::allow(['purchaseManager']);

        return view('admin.purchase.index');
    }
}
