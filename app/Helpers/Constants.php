<?php

namespace App\Helpers;

class Constants
{
    // Maximum number of pieces of some product that customer can have in the basket
    const MAX_PRODUCT_PIECES = 999;
    const MAX_REVIEW_COMMENT_CHARACTERS = 999;

    // In EUR
    const DELIVERY_FEE = 15.99;


    public static function getFormattedDeliveryFee()
    {
        return number_format(self::DELIVERY_FEE, 2, '.', ' ');
    }
}
