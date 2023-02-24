<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Models\Category;
use App\Models\Product;
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
        $productsFromCategory = $category->getSellingProducts();

        // user and imagePath is sent to view using AppServiceProvider
        return view('shop.category', [
            'categories' => $categories,
            'activeCategory' => $category,
            'productsFromCategory' => $productsFromCategory
        ]);
    }

    // Show single product page
    public function showProduct($id_product)
    {
        $product = Product::where('id_product', '=', $id_product)
                          ->first();

        // user and imagePath is sent to view using AppServiceProvider
        return view('shop.product', [
            'product' => $product
        ]);
    }
}
