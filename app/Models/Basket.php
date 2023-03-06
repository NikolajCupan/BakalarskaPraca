<?php

namespace App\Models;

use App\Helpers\Constants;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Basket extends Model
{
    use HasFactory;

    // Disable created_at/updated_at columns
    public $timestamps = false;


    protected $table = 'basket';

    protected $fillable = ['id_user', 'date_basket_start', 'date_basket_end'];


    // Primary key information
    protected $primaryKey = 'id_basket';
    public $incrementing = true;


    // Relation to BasketProduct
    public function getBasketProducts()
    {
        return BasketProduct::where('id_basket', '=', $this->id_basket)->get();
    }


    // Function returns number of unique products in user's basket
    public function getVariousProductsCount()
    {
        return $this->getBasketProducts()->count();
    }

    // Function returns total price of the products in the basket taking quantity into account
    // There are two possible situations:
    //      1. Basket is still active => the newest price is taken
    //      2. Basket was already closed => price as of the date of the order
    public function getTotalPrice()
    {
        $basketProducts = $this->getBasketProducts();
        $totalPrice = 0;

        foreach ($basketProducts as $basketProduct)
        {
            $price = is_null($this->date_basket_end)
                             ? $basketProduct->getNewestPrice()->price
                             : $basketProduct->getPriceOfDate($this->date_basket_end)->price;

            $totalPrice += ($price * $basketProduct->quantity);
        }

        return number_format($totalPrice, 2, '.', ' ');
    }

    public function getTotalPriceWithFee()
    {
        // Numbers might be returned as string, thus they need to be formatted
        $totalPrice = floatval(str_replace(' ', '', $this->getTotalPrice()));
        $deliveryFee = floatval(str_replace(' ', '', Constants::DELIVERY_FEE));
        $sum = $totalPrice + $deliveryFee;

        return number_format($sum, 2, '.', ' ');
    }

    // Function returns true of false according to state of the basket
    // It checks if there is enough quantity of each product in the warehouse
    // and if all the products are still being sold
    public function isOrderable()
    {
        $basketProducts = $this->getBasketProducts();

        foreach ($basketProducts as $basketProduct)
        {
            if (!$basketProduct->isOrderable())
            {
                return false;
            }
        }

        return true;
    }

    // Functions is used when new purchase is created
    // Quantity of purchased products is subtracted from related warehouse products
    public function removeProductsFromWarehouse()
    {
        $basketProducts = $this->getBasketProducts();

        foreach ($basketProducts as $basketProduct)
        {
            $warehouseProduct = $basketProduct->getProduct()->getWarehouseProduct();
            $warehouseProduct->quantity -= $basketProduct->quantity;
            $warehouseProduct->save();
        }
    }
}
