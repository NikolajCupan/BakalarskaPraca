<?php

namespace Tests\Feature;

use App\Helpers\TestingHelper;
use App\Models\Basket;
use App\Models\BasketProduct;
use App\Models\Product;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PurchaseTest extends TestCase
{
    use DatabaseTransactions;
    public function test_createPurchase()
    {
        $user = TestingHelper::getUserWithRole('customer');
        $basket = $user->getCurrentBasket();

        // Create 5 products
        $products = [];
        for ($i = 0; $i < 5; $i++)
        {
            $product = TestingHelper::getProductWithPrice();

            // Change product's quantity
            $warehouseProduct = $product->getWarehouseProduct();
            $warehouseProduct->quantity = 100;
            $warehouseProduct->save();

            // Add product to array
            $products[$i] = $product;
        }

        // Add products to user's basket
        for ($i = 0; $i < 5; $i++)
        {
            $this->actingAs($user)->post('/user/addToBasket', ['productId' => $products[$i]->id_product, 'quantityValue' => 100]);
        }

        // Test user has 5 products in his basket
        $productsCount = BasketProduct::where('id_basket', '=', $user->getCurrentBasket()->id_basket)->count();
        $this->assertEquals(5, $productsCount);

        // Create purchase
        $response = $this->actingAs($user)->post('/user/purchase/makePurchase', [
            'firstName' => $user->first_name,
            'lastName' => $user->last_name,
            'email' => $user->email,
            'phoneNumber' => $user->phone_number,
            'city' => $user->getAddress()->getCity()->city,
            'postalCode' => $user->getAddress()->getCity()->postal_code,
            'street' => $user->getAddress()->street,
            'houseNumber' => $user->getAddress()->house_number
        ]);

        // Test purchase was created
        $response->assertStatus(302);
        $this->assertDatabaseHas('purchase', [
            'id_basket' => $basket->id_basket
        ]);

        // Test user was given a new basket
        $exists = Basket::where('id_user', '=', $user->id_user)
                        ->where('id_basket', '!=', $basket->id_basket)
                        ->whereNull('date_basket_end')
                        ->exists();
        $this->assertTrue($exists);

        // Test old basket's date_basket_end attribute is not null
        $oldBasket = Basket::where('id_user', '=', $user->id_user)
                           ->where('id_basket', '=', $basket->id_basket)
                           ->first();
        $this->assertNotNull($oldBasket->date_basket_end);
    }
}
