<?php

namespace App\Models;

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
}
