<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    use HasFactory;

    // Disable created_at/updated_at columns
    public $timestamps = false;


    protected $table = 'purchase';

    protected $fillable = [
        'id_basket', 'id_address', 'id_status', 'purchase_date', 'payment_date'
    ];


    // Primary key information
    protected $primaryKey = 'id_purchase';
    public $incrementing = true;


    // Relation to PurchaseStatus
    public function getStatus()
    {
        return PurchaseStatus::where('id_status', '=', $this->id_status)
                             ->first();
    }

    // Relation to Address
    public function getAddress()
    {
        return Address::where('id_address', '=', $this->id_address)
                      ->first();
    }

    // Relation to Basket
    public function getBasket()
    {
        return Basket::where('id_basket', '=', $this->id_basket)
                     ->first();
    }

    // Total price as of the date of the order
    public function getTotalPrice()
    {
        $basket = $this->getBasket();
        return $basket->getTotalPrice();
    }

    // Price of the product as of the date of the order
    public function getProductPrice($productId)
    {
        $product = Product::where('id_product', '=', $productId)
                          ->first();
        return $product->getPriceOfDate($this->purchase_date);
    }

    public function getFormattedProductPrice($productId)
    {
        $price = $this->getProductPrice($productId)->price;
        return number_format($price, 2, '.', ' ');
    }

    public function getBasketProduct($productId)
    {
        $basketId = $this->getBasket()->id_basket;
        return BasketProduct::where('id_product', '=', $productId)
                            ->where('id_basket', '=', $basketId)
                            ->first();
    }

    public function isOwnedByUser($user)
    {
        return Basket::where('id_user', '=', $user->id_user)
                     ->where('id_basket', '=', $this->id_basket)
                     ->exists();
    }

    // Function returns true if purchase has status
    public function hasStatus($status)
    {
        $dbStatus = PurchaseStatus::where('status', '=', $status)
                                  ->first();

        // If such status does not exist, false can be returned already
        if (is_null($dbStatus))
        {
            return false;
        }

        return $this->id_status == $dbStatus->id_status;
    }
}
