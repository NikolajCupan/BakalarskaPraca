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
}
