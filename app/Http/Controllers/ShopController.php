<?php

namespace App\Http\Controllers;

use App\Helpers\Constants;
use App\Helpers\Helper;
use App\Helpers\PaginationHelper;
use App\Models\Category;
use App\Models\Product;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

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

        $paginatedProducts = PaginationHelper::paginate($productsFromCategory, Constants::PRODUCTS_PER_PAGE);

        // user, basket and imagePath is sent to view using AppServiceProvider
        return view('shop.category', [
            'categories' => $categories,
            'activeCategory' => $category,
            'productsFromCategory' => $paginatedProducts
        ]);
    }

    // Show single product page
    public function showProduct($id_product)
    {
        $product = Product::where('id_product', '=', $id_product)
                          ->first();
        $reviews = $product->getReviews();
        $percentageRatings = $product->getPercentageRatings();
        $absoluteRatings = $product->getAbsoluteRatings();

        // user, basket and imagePath is sent to view using AppServiceProvider
        return view('shop.product', [
            'product' => $product,
            'reviews' => $reviews,
            'percentageRatings' => $percentageRatings,
            'absoluteRatings' => $absoluteRatings
        ]);
    }

    // Show products according to what user searched page
    public function showSearchedProducts(Request $request)
    {
        // Search input might be empty
        // If no input was entered, show nothing
        $paginatedProducts = null;
        $productsCount = 0;

        if (!is_null($request->term))
        {
            // Only active products are shown
            $products =  Product::join('warehouse_product', 'product.id_warehouse_product', '=', 'warehouse_product.id_warehouse_product')
                                ->where('warehouse_product.product', 'LIKE', '%' . $request->term . '%')
                                ->where(function($query) {
                                        $query->whereNull('product.date_sale_end')
                                              ->orWhere('product.date_sale_end', '>', Carbon::now());
                                })->get();

            // Paginated products do not contain all the products, hence it is needed
            // to save count of all products in additional variable
            $productsCount = count($products);

            // Many products can satisfy searched input, thus pagination is used
            // Appends must be used in order to preserve searched input between pages
            $paginatedProducts = PaginationHelper::paginate($products, Constants::PRODUCTS_PER_PAGE)
                ->appends(['term' => $request->term]);
        }

        // Categories have to be sent to the view as well because of the left menu
        $categories = Category::all();

        // user, basket and imagePath is sent to view using AppServiceProvider
        return view('shop.search', [
            'products' => $paginatedProducts,
            'categories' => $categories,
            'searchedTerm' => $request->term,
            'productsCount' => $productsCount
        ]);
    }
}
