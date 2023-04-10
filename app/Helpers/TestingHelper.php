<?php

namespace App\Helpers;

use App\Models\Basket;
use App\Models\Price;
use App\Models\Product;
use App\Models\User;
use App\Models\UserRole;
use App\Models\WebRole;
use Illuminate\Support\Carbon;

class TestingHelper
{
    // Returns instance of model User with selected role
    public static function getUserWithRole($roleName) : User
    {
        /** @var User $user */
        $user = User::factory()->create();
        TestingHelper::giveRoleToUser($user, $roleName);
        TestingHelper::giveBasketToUser($user);

        return $user;
    }

    public static function giveRoleToUser($user, $roleName)
    {
        $role = WebRole::where('name', '=', $roleName)->first();

        UserRole::create([
            'id_role' => $role->id_role,
            'id_user' => $user->id_user,
        ]);
    }

    public static function giveBasketToUser($user)
    {
        Basket::factory()->create([
            'id_user' => $user->id_user
        ]);
    }

    // Parameters must be send to factory of Price
    public static function getProductWithPrice()
    {
        $product = Product::factory()->create();
        $price = Price::factory()->create([
            'id_product' => $product->id_product,
            'date_price_start' => $product->date_sale_start
        ]);

        return $product;
    }
}
