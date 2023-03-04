<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BasketProduct extends Model
{
    use HasFactory;

    // Disable created_at/updated_at columns
    public $timestamps = false;


    protected $table = 'basket_product';

    protected $fillable = [
        'id_basket', 'id_product', 'quantity'
    ];


    // Function returns current price or if it is not sold anymore
    // returns the latest price
    public function getNewestPrice()
    {
        $product = Product::where('id_product', '=', $this->id_product)
                          ->first();
        return $product->getNewestPrice();
    }

    // Relation to Product
    public function getProduct()
    {
        return Product::where('id_product', '=', $this->id_product)
                      ->first();
    }

    public function getTotalPrice()
    {
        return number_format(($this->getNewestPrice()->price * $this->quantity), 2, '.', ' ');
    }

    // True => Enough quantity in the warehouse, still being sold
    public function isOrderable()
    {
        $product = $this->getProduct();
        $warehouseQuantity = $product->getWarehouseProduct()->quantity;

        if ($this->quantity > $warehouseQuantity || $product->isSaleOver())
        {
            return false;
        }

        return true;
    }
}
