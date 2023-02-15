<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Models\Category;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    // Show products from category
    public function showCategory($category)
    {
        // As class Category and its attribute category have same name, it needs to be renamed first
        $categoryName = $category;
        $category = Category::where('category', '=', $categoryName)->first();

        $categories = Category::all();
        Helper::addDisplayNames($categories);

        // user and imagePath is sent to view using AppServiceProvider
        return view('shop.category', [
            'categories' => $categories,
            'activeCategory' => $category
        ]);
    }
}
