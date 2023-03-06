<?php

namespace App\Helpers;

use App\Models\City;
use Illuminate\Http\Request;

class ValidationHelper
{
    // Common validation for user information
    // If city/postal_code combination is not found, function returns false
    public static function validateCommon(Request $parRequest)
    {
        // If entered, remove spaces
        $normalizedPostalCode = $parRequest->postalCode ? Helper::removeSpaces($parRequest->postalCode) : null;

        $parRequest->validate([
            'firstName' => ['required', 'max:30'],
            'lastName' => ['required', 'max:30'],

            'phoneNumber' => ['nullable', 'numeric', 'digits_between:1,15'],
            $normalizedPostalCode => ['nullable', 'digits:5'],
            'city' => ['nullable', 'max:30'],
            'street' => ['nullable', 'max:15'],
            'houseNumber' => ['nullable', 'numeric', 'between:0,1000000']
        ]);

        // Check only if entered
        if (!is_null($parRequest->postalCode) || !is_null($parRequest->city))
        {
            // Find if there is a row in the table city
            $foundCity = City::where('city', '=', $parRequest->city)
                ->where('postal_code', '=', $normalizedPostalCode)
                ->first();

            // If combination was not found, return false
            if (!$foundCity)
            {
                return false;
            }
        }

        return true;
    }
}
