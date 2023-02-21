<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WarehouseProduct extends Model
{
    use HasFactory;

    // Disable created_at/updated_at columns
    public $timestamps = false;


    protected $table = 'warehouse_product';

    protected $fillable = [
        'product', 'quantity'
    ];


    // Primary key information
    protected $primaryKey = 'id_warehouse_product';
    public $incrementing = true;


    // Relation to Product
    // Might return null if warehouse product was never being sold
    public function getProducts()
    {
        return Product::where('id_warehouse_product', '=', $this->id_warehouse_product)
                      ->orderBy('date_sale_start', 'desc')
                      ->get();
    }

    // Warehouse product is active when it is being sold or its capacity is more than 0
    public function isActive()
    {
        // First check if quantity is over 0
        if ($this->quantity > 0)
        {
            return true;
        }

        // Getting here means quantity is equal to 0, however it can still be active if it is being sold
        return $this->isSold();
    }

    public function isSold()
    {
        return Product::where('id_warehouse_product', '=', $this->id_warehouse_product)
                      ->where(function ($mainQuery) {
                          $mainQuery->whereNull('date_sale_end')
                                    ->orWhere('date_sale_end', '>', Carbon::now());
        })->exists();
    }

    // If product was never being sold, it can be deleted
    public function canBeDeleted()
    {
        return !Product::where('id_warehouse_product', '=', $this->id_warehouse_product)
                       ->exists();
    }
}
