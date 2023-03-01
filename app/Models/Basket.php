<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Basket extends Model
{
    use HasFactory;

    // Disable created_at/updated_at columns
    public $timestamps = false;


    protected $table = 'basket';

    protected $fillable = [
        'id_user', 'date_basket_start', 'date_basket_end'
    ];


    // Primary key information
    protected $primaryKey = 'id_basket';
    public $incrementing = true;


    // Relation to BasketProduct
    public function getBasketProducts()
    {
        return BasketProduct::where('id_basket', '=', $this->id_basket)
                            ->get();
    }


    // Function returns number of unique products in user's basket
    public function getVariousProductsCount()
    {
        return $this->getBasketProducts()->count();
    }

    // Function returns total price of the products in the basket taking quantity into account
    // There are two possible situations:
    //      1. Basket is still active => the newest price is taken
    //      2. Basket was already closed => price according to date of purcahse is taken
    public function getTotalPrice()
    {
        $basketProducts = $this->getBasketProducts();

        if (is_null($this->date_basket_end))
        {
            $totalPrice = 0;
            foreach ($basketProducts as $basketProduct)
            {
                $totalPrice += ($basketProduct->getNewestPrice()->price * $basketProduct->quantity);
            }

            return number_format($totalPrice, 2, '.', ' ');
        }
        else
        {
            return "implement me";
        }
    }
}
