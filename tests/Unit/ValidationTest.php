<?php

namespace Tests\Unit;

use App\Helpers\TestingHelper;
use App\Models\Category;
use App\Models\WarehouseProduct;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Str;
use Tests\TestCase;
use Intervention\Image\ImageManagerStatic as Image;

class ValidationTest extends TestCase
{
    use DatabaseTransactions;
    use WithFaker;

    public function test_storeUser()
    {
        $password = Str::random(50);
        $response = $this->post('/register', [
            'firstName' => Str::random(30),
            'lastName' => Str::random(30),
            'password' => $password,
            'password_confirmation' => $password,
            'email' => Str::random(40) . '@gmail.com'
        ]);

        $response->assertSessionHasNoErrors();
    }

    public function test_storeUserLongInputs()
    {
        $password = Str::random(50);
        $response = $this->post('/register', [
            'firstName' => Str::random(31),
            'lastName' => Str::random(31),
            'password' => $password,
            'password_confirmation' => $password,
        ]);

        $response->assertSessionHasErrors(['firstName', 'lastName']);
    }

    public function test_storeWarehouseProduct()
    {
        $productManager = TestingHelper::getUserWithRole('productManager');

        // Min quantity
        $response = $this->actingAs($productManager)->post('/admin/product/warehouse/create', [
            'product' => Str::random(50),
            'quantity' => 0
        ]);
        $response->assertSessionHasNoErrors();

        // Max quantity
        $response = $this->actingAs($productManager)->post('/admin/product/warehouse/create', [
            'product' => Str::random(50),
            'quantity' => 100000
        ]);
        $response->assertSessionHasNoErrors();

        // Too low quantity
        $response = $this->actingAs($productManager)->post('/admin/product/warehouse/create', [
            'product' => Str::random(50),
            'quantity' => -1
        ]);
        $response->assertSessionHasErrors('quantity');

        // Too large quantity
        $response = $this->actingAs($productManager)->post('/admin/product/warehouse/create', [
            'product' => Str::random(50),
            'quantity' => 100001
        ]);
        $response->assertSessionHasErrors('quantity');
    }

    public function test_storeProduct()
    {
        $productManager = TestingHelper::getUserWithRole('productManager');
        $warehouseProduct = WarehouseProduct::factory()->create();
        // Get random Category
        $category = Category::inRandomOrder()->first();

        $response = $this->actingAs($productManager)->post('/admin/product/shop/create', [
            'warehouseProductId' => $warehouseProduct->id_warehouse_product,
            'price' => rand(0, 99999),
            'description' => Str::random(1000),
            'idCategory' => $category->id_category
        ]);

        $response->assertSessionHasErrors('image');

        // No other error should be present in the response
        $errors = session('errors');
        $this->assertCount(1, $errors);
    }
}
