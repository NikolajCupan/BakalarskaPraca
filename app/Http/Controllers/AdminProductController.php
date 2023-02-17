<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Models\WarehouseProduct;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AdminProductController extends Controller
{
    // Warehouse active products page
    public function warehouseActive()
    {
        Helper::allow('productManager');

        $warehouseActiveProducts = Helper::activeProducts();
        return view('admin.product.warehouse.active', [
            'warehouseActiveProducts' => $warehouseActiveProducts
        ]);
    }

    // Warehouse inactive products page
    public function warehouseInactive()
    {
        Helper::allow('productManager');

        $warehouseInactiveProducts = Helper::inactiveProducts();
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
                                            ->get();
        // [0] is used because get is used instead of first
        // element must be in array for foreach loop when showing data in table
        $products = $warehouseProduct[0]->getProducts();

        // Elements are wrapped to array because foreach loop
        // is used to display elements in table
        return view('admin.product.warehouse.edit', [
            'warehouseProduct' => $warehouseProduct,
            'products' => $products
        ]);
    }

    // Create warehouse product page
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
            'product' => ['required', 'max:50', Rule::unique('warehouse_product', 'product')->ignore($request->warehouseProductId, 'id_warehouse_product')],
            'quantity' => ['required', 'numeric', 'between:0,100000']
        ]);

        // Getting here means all values are valid and warehouse product can be updated
        $warehouseProduct = WarehouseProduct::where('id_warehouse_product', '=', $request->warehouseProductId)
                                            ->first();

        $warehouseProduct->product = $request->product;
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

        if (!$warehouseProduct->canBeDeleted())
        {
            return redirect('/admin/product');
        }

        $warehouseProduct->delete();

        return redirect('/admin/product')->with('message', 'Produktu na sklade bol uspesne zmazany');
    }

    // Shop active products page
    public function shopActive()
    {
        Helper::allow('productManager');

        return view('admin.product.shop.active');
    }

    // Shop inactive products page
    public function shopInactive()
    {
        Helper::allow('productManager');

        return view('admin.product.shop.inactive');
    }

    // Create shop product page
    public function shopCreate()
    {
        Helper::allow('productManager');

        return view('admin.product.shop.create');
    }
}
