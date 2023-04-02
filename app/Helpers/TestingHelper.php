<?php

namespace App\Helpers;

use App\Models\Basket;
use App\Models\UserRole;
use App\Models\WebRole;
use Illuminate\Support\Carbon;

class TestingHelper
{
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
        Basket::create([
            'id_user' => $user->id_user,
            'date_basket_start' => Carbon::now()
        ]);
    }
}
