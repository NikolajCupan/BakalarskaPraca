<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Models\Category;
use App\Models\City;
use App\Models\Product;
use App\Models\Purchase;
use App\Models\Review;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MainController extends Controller
{
    /*
     * Note:
     * user, basket and imagePath is present in the views using AppServiceProvider
     */

    // Welcome page
    public function index()
    {
        $categories = Category::all();

        return view('main.index', [
            'categories' => $categories
        ]);
    }

    // Contact page
    public function contact()
    {
        return view('main.contact');
    }

    // About us page
    public function about()
    {
        return view('main.about');
    }

    // Terms and conditions page
    public function terms()
    {
        return view('main.terms');
    }

    // Page for testing html
    public function test()
    {
        $purchase = Purchase::first();

        return view('test', [
            'purchase' => $purchase,
        ]);
    }
}
