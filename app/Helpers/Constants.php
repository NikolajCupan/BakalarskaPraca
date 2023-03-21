<?php

namespace App\Helpers;

class Constants
{
    // Maximum number of pieces of some product that customer can have in the basket
    const MAX_PRODUCT_PIECES = 999;
    const MAX_REVIEW_COMMENT_CHARACTERS = 999;
    const DELIVERY_FEE = 15;
    const PRODUCTS_PER_PAGE = 12;


    public static function getFormattedDeliveryFee()
    {
        return number_format(self::DELIVERY_FEE, 2, '.', ' ');
    }

    // Constants related to company
    const COMPANY_NAME = "FRI";
    const COMPANY_STREET = "Univerzitna";
    const COMPANY_HOUSE_NUMBER = "8215/1";
    const COMPANY_POSTAL_CODE = "010 26";
    const COMPANY_PHONE_NUMBER = "0905 111 222";
    const COMPANY_EMAIL = "zvukovatechnika@gmail.com";
    const COMPANY_CITY = "Zilina";
    const COMPANY_ICO = "12345678";
    const COMPANY_DIC = "9876543210";
    const COMPANY_IC_DPH = "SK0123456789";
    const COMPANY_IBAN = "SK68 0200 0000 0000 1234 5678";
    const CONSTANT_SYMBOL_PURCHASE = "0008";
}
