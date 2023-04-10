<?php

namespace Database\Factories;

use App\Models\Address;
use App\Models\Image;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $image = Image::factory()->create();
        $address = Address::factory()->create();

        // Return instance of User
        return [
            'id_address' => $address->id_address,
            'id_image' => $image->id_image,
            'first_name' => $this->faker->firstName,
            'last_name' => $this->faker->lastName,
            'password' => Str::random(100),
            'email' => $this->faker->email,
            'phone_number' => rand(1, 100000)
        ];
    }
}
