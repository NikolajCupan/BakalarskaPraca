<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    // Disable created_at/updated_at columns
    public $timestamps = false;


    protected $table = 'category';

    protected $fillable = [
        'category'
    ];


    // Primary key information
    protected $primaryKey = 'id_category';
    public $incrementing = true;


    // Dashes are replaces with spaces, first letter is uppercase
    public function getDisplayName()
    {
        $displayName = str_replace("-", " ", $this->category);
        return ucFirst($displayName);
    }

    // Function returns count of products from category that are currently being sold
    public function getSellingProductsCount()
    {
        return $this->getSellingProducts()->count();
    }

    // Function returns array of products from category that are currently being sold
    public function getSellingProducts()
    {
        return Product::where('id_category', '=', $this->id_category)
                      ->where(function ($mainQuery) {
                          $mainQuery->whereNull('date_sale_end')
                                    ->orWhere('date_sale_end', '>', Carbon::now());
        })->get();
    }
}
