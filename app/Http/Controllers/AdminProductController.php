<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Models\Category;
use App\Models\Image;
use App\Models\Price;
use App\Models\Product;
use App\Models\WarehouseProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Intervention\Image\ImageManagerStatic;
use Ramsey\Collection\Collection;

class AdminProductController extends Controller
{
    // Warehouse active products page
    public function warehouseActive()
    {
        Helper::allow('productManager');

        $warehouseActiveProducts = Helper::warehouseActiveProducts();

        return view('admin.product.warehouse.active', [
            'warehouseActiveProducts' => $warehouseActiveProducts
        ]);
    }

    // Warehouse inactive products page
    public function warehouseInactive()
    {
        Helper::allow('productManager');

        $warehouseInactiveProducts = Helper::warehouseInactiveProducts();
        return view('admin.product.warehouse.inactive', [
            'warehouseInactiveProducts' => $warehouseInactiveProducts
        ]);
    }

    // Create warehouse product page
    public function warehouseCreate()
    {
        Helper::allow('productManager');

        return view('admin.product.warehouse.create');
    }

    // Edit warehouse product page
    public function warehouseEdit($id_warehouse_product)
    {
        Helper::allow('productManager');

        $warehouseProduct = WarehouseProduct::where('id_warehouse_product', '=', $id_warehouse_product)
                                            ->first();
        $products = $warehouseProduct->getProducts();

        return view('admin.product.warehouse.edit', [
            'warehouseProduct' => $warehouseProduct,
            'products' => $products
        ]);
    }

    // Store new warehouse product
    public function warehouseStore(Request $request)
    {
        Helper::allow('productManager');

        $request->validate([
            'product' => ['required', 'max:50', Rule::unique('warehouse_product', 'product')],
            'quantity' => ['required', 'numeric', 'between:0,100000']
        ]);

        WarehouseProduct::create([
            'product' => $request->product,
            'quantity' => $request->quantity
        ]);

        return redirect('/admin/product')->with('message', 'Pridanie produktu na sklad bolo uspesne');
    }

    // Update warehouse product
    public function warehouseUpdate(Request $request)
    {
        Helper::allow('productManager');

        $request->validate([
            'quantity' => ['required', 'numeric', 'between:0,100000']
        ]);

        // Getting here means all values are valid and warehouse product can be updated
        $warehouseProduct = WarehouseProduct::where('id_warehouse_product', '=', $request->warehouseProductId)
                                            ->first();

        $warehouseProduct->quantity = $request->quantity;
        $warehouseProduct->save();

        return redirect('/admin/product')->with('message', 'Editacia produktu na sklade bola uspesna');
    }

    // Delete warehouse product
    public function warehouseDestroy(Request $request)
    {
        Helper::allow('productManager');

        $warehouseProduct = WarehouseProduct::where('id_warehouse_product', '=', $request->warehouseProductId)
                                            ->first();

        // Administrator should not be able to post form to delete warehouse product that cannot be deleted, but it is checked
        if (!$warehouseProduct->canBeDeleted())
        {
            return redirect('/admin/product');
        }

        $warehouseProduct->delete();

        return redirect('/admin/product')->with('message', 'Produkt na sklade bol uspesne zmazany');
    }

    // Shop active products page
    public function shopActive()
    {
        Helper::allow('productManager');

        $shopActiveProducts = Helper::shopActiveProducts();

        return view('admin.product.shop.active', [
            'shopActiveProducts' => $shopActiveProducts
        ]);
    }

    // Shop inactive products page
    public function shopInactive()
    {
        Helper::allow('productManager');

        $shopInactiveProducts = Helper::shopInactiveProducts();

        return view('admin.product.shop.inactive', [
            'shopInactiveProducts' => $shopInactiveProducts
        ]);
    }

    // Create shop product page
    public function shopSalable()
    {
        Helper::allow('productManager');

        $inStock = Helper::warehouseSalableInStock();
        $outOfStock = Helper::warehouseSalableOutOfStock();

        return view('admin.product.shop.salable', [
            'inStock' => $inStock,
            'outOfStock' => $outOfStock
        ]);
    }

    // Create shop product page
    public function shopCreate($id_warehouse_product)
    {
        Helper::allow('productManager');

        $warehouseProduct = WarehouseProduct::where('id_warehouse_product', '=', $id_warehouse_product)
                                            ->first();

        // Administrator should not be able to access form for product that is already being sold, but it is checked
        if ($warehouseProduct->isSold())
        {
            return redirect('/admin/product/');
        }

        $categories = Category::all();

        return view('admin.product.shop.create', [
            'warehouseProduct' => $warehouseProduct,
            'categories' => $categories
        ]);
    }

    // Show single shop product page
    public function shopShow($id_product)
    {
        Helper::allow('productManager');

        $product = Product::where('id_product', '=', $id_product)
                          ->first();
        $warehouseProduct = $product->getWarehouseProduct();
        $prices = $product->getPrices();
        $categories = Category::all();

        return view('admin.product.shop.show', [
            'product' => $product,
            'warehouseProduct' => $warehouseProduct,
            'prices' => $prices,
            'categories' => $categories
        ]);
    }

    // End sale of shop product
    public function shopEndSale(Request $request)
    {
        Helper::allow('productManager');

        $product = Product::where('id_product', '=', $request->productId)
                          ->first();

        // Administrator should not be able to post form for product if its sale is already over
        if ($product->isSaleOver())
        {
            return redirect('/admin/product/');
        }

        // Change dates in Product and Price
        $now = Carbon::now()->toDateTimeString();
        $product->date_sale_end = $now;
        $product->save();

        $price = $product->getNewestPrice();
        $price->date_price_end = $now;
        $price->save();

        return redirect('/admin/product')->with('message', 'Predaj produktu bol uspesne ukonceny');
    }

    // Show image of shop product page
    public function shopImage($id_image)
    {
        Helper::allow('productManager');

        // Image path is sent, only if photo on the path exists
        $image = Image::where('id_image', '=', $id_image)
                      ->first();
        $imagePath = null;
        if (Helper::imageExists($image->image_path, 'products'))
        {
            $imagePath = $image->image_path;
        }

        return view('admin.product.shop.image', [
            'imagePath' => $imagePath
        ]);
    }

    // Update shop product
    public function shopUpdate(Request $request)
    {
        Helper::allow('productManager');

        $product = Product::where('id_product', '=', $request->shopProductId)
                          ->first();

        // Administrator should not be able to update shop product that is not sold anymore, but it is checked
        if ($product->isSaleOver())
        {
            return redirect('/admin/product/');
        }

        $request->validate([
            'price' => ['required', 'numeric', 'regex:/^\d+(\.\d{1,2})?$/', 'between:0,99999'],
            'description' => ['required', 'min:5', 'max:5000'],
            'idCategory' => 'required'
        ]);

        $image = $request->file('image');
        if (!is_null($image))
        {
            // Validate image only if uploaded
            $request->validate([
                'image' => ['max:2048', 'mimes:jpg,bmp,png',
                    'dimensions:min_width=256,min_height=256,max_width:2048,max_height:2048',
                ]
            ]);

            // Delete current image (if it exists)
            // dirname => need to go one folder up
            $dbImage = Image::where('id_image', '=', $product->id_image)
                            ->first();
            $absolutePath = dirname(app_path()) . '/storage/app/public/images/products/' . $dbImage->image_path;
            if (Helper::imageExists($dbImage->image_path, 'products'))
            {
                unlink($absolutePath);
            }

            $croppedImage = Helper::cropImage($image);

            // Save image to public folder
            $croppedImage->save(storage_path('app/public/images/products/') . $image->hashName());
            $dbImage->image_path = $image->hashName();
            $dbImage->save();
        }

        // Product information change
        $product->description = $request->description;
        $product->id_category = $request->idCategory;
        $product->save();

        // Price change
        $currentPrice = $product->getNewestPrice();

        if ($request->price != $currentPrice->price)
        {
            // Price was changed
            $now = Carbon::now()->toDateTimeString();

            // Modify current price
            $currentPrice->date_price_end = $now;
            $currentPrice->save();

            // New price
            Price::create([
                'id_product' => $product->id_product,
                'date_price_start' => $now,
                'price' => $request->price
            ]);
        }

        return redirect('/admin/product')->with('message', 'Editacia predavaneho produktu bola uspesna');
    }

    // Store new shop product
    public function shopStore(Request $request)
    {
        Helper::allow('productManager');

        $warehouseProduct = WarehouseProduct::where('id_warehouse_product', '=', $request->warehouseProductId)
                                            ->first();

        // Administrator should not be able to post form with product that is already being sold, but it is checked
        if ($warehouseProduct->isSold())
        {
            return redirect('/admin/product/');
        }

        $request->validate([
            'price' => ['required', 'numeric', 'regex:/^\d+(\.\d{1,2})?$/', 'between:0,99999'],
            'description' => ['required', 'min:5', 'max:5000'],
            'idCategory' => 'required',
            'image' => ['required', 'max:2048', 'mimes:jpg,bmp,png',
                'dimensions:min_width=256,min_height=256,max_width:2048,max_height:2048',
            ]
        ]);

        $image = $request->file('image');
        $croppedImage = Helper::cropImage($image);

        // Save image to public folder
        $croppedImage->save(storage_path('app/public/images/products/') . $image->hashName());

        $dbImage = Image::create([
            'image_path' => $image->hashName()
        ]);

        $now = Carbon::now();
        $product = Product::create([
            'id_warehouse_product' => $warehouseProduct->id_warehouse_product,
            'id_category' => $request->idCategory,
            'id_image' => $dbImage->id_image,
            'description' => $request->description,
            'date_sale_start' => $now
        ]);

        Price::create([
            'id_product' => $product->id_product,
            'date_price_start' => $now,
            'price' => $request->price
        ]);

        return redirect('/admin/product')->with('message', 'Predaj produktu bol uspesne spusteny');
    }
}
