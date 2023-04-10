<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\City;
use App\Models\Image;
use App\Models\WarehouseProduct;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $image = Image::factory()->create();
        $warehouseProduct = WarehouseProduct::factory()->create();
        // Get random Category
        $category = Category::inRandomOrder()->first();

        return [
            'id_warehouse_product' => $warehouseProduct->id_warehouse_product,
            'id_category' => $category->id_category,
            'id_image' => $image->id_image,
            'description' => $this->faker->paragraph,
            'date_sale_start' => $this->faker->date
        ];
    }
}
