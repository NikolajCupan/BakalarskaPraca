<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Models\WarehouseProduct;
use Illuminate\Http\Request;

class AdminProductController extends Controller
{
    // Warehouse management page
    public function warehouseIndex()
    {
        Helper::allow('productManager');

        $warehouseProducts = WarehouseProduct::all();
        return view('admin.product.warehouse.index', [
            'warehouseProducts' => $warehouseProducts
        ]);
    }

    // Create warehouse product page
    public function warehouseCreate()
    {
        Helper::allow('productManager');

        return view('admin.product.warehouse.create');
    }

    // Create warehouse product page
    public function warehouseStore(Request $request)
    {
        Helper::allow('productManager');

        $request->validate([
            'product' => ['required', 'max:50'],
            'quantity' => ['required', 'numeric', 'digits_between:1,15', 'between:0,100000']
        ]);

        WarehouseProduct::create([
            'product' => $request->product,
            'quantity' => $request->quantity
        ]);

        return redirect('/admin/product/warehouse/index')->with('message', 'Pridanie produktu na sklad bolo uspesne');
    }

    // Edit warehouse product page
    public function warehouseEdit($id_warehouse_product)
    {
        Helper::allow('productManager');

        $warehouseProduct = WarehouseProduct::where('id_warehouse_product', '=', $id_warehouse_product)
                                            ->first();

        return view('admin.product.warehouse.edit', [
            'warehouseProduct' => $warehouseProduct
        ]);
    }

    // Shop management page
    public function shopIndex()
    {
        Helper::allow('productManager');

        return view('admin.product.shop.index');
    }
}
