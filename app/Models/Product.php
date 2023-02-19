<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    // Disable created_at/updated_at columns
    public $timestamps = false;


    protected $table = 'product';

    protected $fillable = [
        'id_warehouse_product', 'id_category', 'id_image', 'description', 'date_sale_start', 'date_sale_end'
    ];


    // Primary key information
    protected $primaryKey = 'id_product';
    public $incrementing = true;


    // Relation to Category
    public function getCategory()
    {
        return Category::where('id_category', '=', $this->id_category)
                       ->first();
    }

    // Relation to Warehouse product
    public function getWarehouseProduct()
    {
        return WarehouseProduct::where('id_warehouse_product', '=', $this->id_warehouse_product)
                               ->first();
    }

    // Relation to Price
    // Function returns current price or if it is not sold anymore
    // returns the latest price
    public function getNewestPrice()
    {
        if (is_null($this->date_sale_end))
        {
            // Product is not sold anymore
            return Price::where('id_product', '=', $this->id_product)
                        ->latest('date_price_end')
                        ->first();
        }
        else
        {
            // Product is still being sold
            return Price::where('id_product', '=', $this->id_product)
                        ->whereNull('date_price_end')
                        ->first();
        }
    }

    public function isSaleOver()
    {
        if (is_null($this->date_sale_end))
        {
            return false;
        }

        return true;
    }
}
