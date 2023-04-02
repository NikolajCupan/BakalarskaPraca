<?php

namespace App\Helpers;

use App\Models\Address;
use App\Models\City;
use App\Models\UserRole;
use App\Models\WebRole;
use Illuminate\Http\Request;

class RecordCreatorHelper
{
    public static function createAddress(Request $request)
    {
        // If entered, remove spaces
        $normalizedPostalCode = $request->postalCode ? Helper::removeSpaces($request->postalCode) : null;

        $city = City::where('city', '=', $request->city)
                    ->where('postal_code', '=', $normalizedPostalCode)
                    ->first();

        $address = Address::create([
            'street' => $request->street,
            'house_number' => $request->houseNumber
        ]);

        // User might not fill city and postal code fields
        if (!is_null($city))
        {
            $address->id_city = $city->id_city;
            $address->save();
        }

        return $address;
    }
}
