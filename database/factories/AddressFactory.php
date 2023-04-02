<?php

namespace Database\Factories;

use App\Models\Address;
use App\Models\City;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;

class AddressFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        // Get random City
        $city = City::inRandomOrder()->first();

        // Return instance of Address
        return [
            'id_city' => $city->id_city,
            'street' => $this->faker->word,
            'house_number' => $this->faker->numberBetween(0, 1000)
        ];
    }
}
