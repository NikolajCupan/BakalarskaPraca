<?php

namespace Tests\Feature;

use App\Helpers\TestingHelper;
use App\Models\Product;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ShoppingTest extends TestCase
{
    use DatabaseTransactions;

    // Test creates new product and user, and then tries to add
    // the product to user's basket
    public function test_addProductToBasket()
    {
        $product = TestingHelper::getProductWithPrice();
        $user = TestingHelper::getUserWithRole('customer');

        // Change product's quantity
        $warehouseProduct = $product->getWarehouseProduct();
        $warehouseProduct->quantity = 100;
        $warehouseProduct->save();

        // Try to add product to basket
        $response = $this->actingAs($user)->post('/user/addToBasket', [
            'productId' => $product->id_product,
            'quantityValue' => 100
        ]);

        $response->assertStatus(302);
        $response->assertSessionHas('message', 'Produkt bol uspesne pridany do kosika');

        // Ensure product was successfully added to user's basket
        $this->assertDatabaseHas('basket_product', [
            'id_basket' => $user->getCurrentBasket()->id_basket,
            'id_product' => $product->id_product,
            'quantity' => 100
        ]);
    }

    // Test creates new product and user, ends sale of the product
    // and then tries to add the product to user's basket
    public function test_addInactiveProductToBasket()
    {
        $product = TestingHelper::getProductWithPrice();
        $user = TestingHelper::getUserWithRole('productManager');

        // End sale of the product
        $response = $this->actingAs($user)->post('/admin/product/shop/endSale', [
            'productId' => $product->id_product
        ]);

        // Test if end of sale was successful
        $response->assertStatus(302);
        $response->assertSessionHas('message', 'Predaj produktu bol uspesne ukonceny');
        $this->assertNotNull(Product::where('id_product', '=', $product->id_product)->first()->date_sale_end);

        // Try to add inactive product to user's basket
        $response = $this->actingAs($user)->post('/user/addToBasket', [
            'productId' => $product->id_product,
            'quantityValue' => 100
        ]);

        $response->assertStatus(302);
        $response->assertSessionHas('errorMessage', 'Predaj produktu bol ukonceny');

        // Ensure product was not added to user's basket
        $this->assertDatabaseMissing('basket_product', [
            'id_basket' => $user->getCurrentBasket()->id_basket,
            'id_product' => $product->id_product
        ]);
    }
}
