<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Models\Listing;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(5)->create();

        Listing::factory(5)->create();

        /*
        Listing::create([
            'title' => 'First Title',
            'tags' => 'tag, mag',
            'company' => 'Some Company',
            'location' => 'Slovakia',
            'email' => 'myemail@gmail.com',
            'website' => 'facebook',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla finibus diam id congue mollis. Suspendisse nulla augue, lacinia in malesuada non, condimentum dapibus nibh. Maecenas ut condimentum sapien. Aliquam erat volutpat. Suspendisse lobortis ut sem ac blandit. Vivamus vitae quam eros. In eleifend libero in lectus molestie congue. Nam nec ante magna.'
        ]);

        Listing::create([
            'title' => 'Second Title',
            'tags' => 'second, tag',
            'company' => 'Other Company',
            'location' => 'Poland',
            'email' => 'hisemail@gmail.com',
            'website' => 'instagram',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla finibus diam id congue mollis. Suspendisse nulla augue, lacinia in malesuada non, condimentum dapibus nibh. Maecenas ut condimentum sapien. Aliquam erat volutpat. Suspendisse lobortis ut sem ac blandit. Vivamus vitae quam eros. In eleifend libero in lectus molestie congue. Nam nec ante magna.'
        ]);
        */
    }
}
