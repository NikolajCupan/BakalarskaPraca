<?php

namespace App\Models;

use App\Helpers\Helper;
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
    public function getPrices()
    {
        return Price::where('id_product', '=', $this->id_product)
                    ->get();
    }

    // Relation to Price
    // Function returns current price or if it is not sold anymore
    // returns the latest price
    public function getNewestPrice()
    {
        if (is_null($this->date_sale_end))
        {
            // Product is still being sold
            return Price::where('id_product', '=', $this->id_product)
                        ->whereNull('date_price_end')
                        ->first();
        }
        else
        {
            // Product is not sold anymore
            return Price::where('id_product', '=', $this->id_product)
                        ->latest('date_price_end')
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

    // Relation to Image
    // Function returns path only if image on the path exists
    public function getImagePathIfExists()
    {
        $image = Image::where('id_image', '=', $this->id_image)
                      ->first();

        $imagePath = null;
        if (Helper::imageExists($image->image_path, 'products'))
        {
            $imagePath = $image->image_path;
        }

        return $imagePath;
    }

    // Function returns true of product is on stock
    public function isAvailable()
    {
        if ($this->getWarehouseProduct()->quantity > 0)
        {
            return true;
        }

        return false;
    }

    // There are 11 possible star ratings that can be shown
    // Function returns number from interval <0, 10> according to how many half-stars will be shown
    public function getHalfStarsCount()
    {
        $averageRating = Review::where('id_product', '=', $this->id_product)
                               ->avg('rating');
        return round($averageRating * 2);
    }

    // Function returns number of review of the product
    public function getReviewCount()
    {
        return Review::where('id_product', '=', $this->id_product)
                     ->count();
    }
}
