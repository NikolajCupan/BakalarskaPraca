<?php

namespace Tests\Unit;

use App\Helpers\TestingHelper;
use App\Models\Address;
use App\Models\User;
use App\Models\UserRole;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class PageStatusTest extends TestCase
{
    use DatabaseTransactions;

    // User might be null => not logged in
    private function testPage($user, $page, $expectedStatus)
    {
        $response = is_null($user) ? $this->get($page) : $this->actingAs($user)->get($page);
        $response->assertStatus($expectedStatus);
    }

    // All of those should return status 200 for any type of user,
    // even when not logged in
    private function testGeneralPages($user)
    {
        $this->testPage($user, '/', 200);
        $this->testPage($user, '/contact', 200);
        $this->testPage($user, '/about', 200);
        $this->testPage($user, '/shop/reproduktory', 200);
        $this->testPage($user, '/shop/sluchadla', 200);
    }



    // Testing methods
    public function test_accountManager()
    {
        $user = TestingHelper::getUserWithRole('accountManager');
        $this->testGeneralPages($user);

        // Status codes depend on the user
        $this->testPage($user, '/admin', 200);
        $this->testPage($user, '/admin/user', 200);
        $this->testPage($user, '/admin/product', 403);
        $this->testPage($user, '/admin/purchase', 403);
    }

    public function test_productManager()
    {
        $user = TestingHelper::getUserWithRole('productManager');
        $this->testGeneralPages($user);

        // Status codes depend on the user
        $this->testPage($user, '/admin', 200);
        $this->testPage($user, '/admin/user', 403);
        $this->testPage($user, '/admin/product', 200);
        $this->testPage($user, '/admin/purchase', 403);
    }

    public function test_purchaseManager()
    {
        $user = TestingHelper::getUserWithRole('purchaseManager');
        $this->testGeneralPages($user);

        // Status codes depend on the user
        $this->testPage($user, '/admin', 200);
        $this->testPage($user, '/admin/user', 403);
        $this->testPage($user, '/admin/product', 403);
        $this->testPage($user, '/admin/purchase', 200);
    }

    public function test_reviewManager()
    {
        $user = TestingHelper::getUserWithRole('reviewManager');
        $this->testGeneralPages($user);

        // Status codes depend on the user
        $this->testPage($user, '/admin', 403);
        $this->testPage($user, '/admin/user', 403);
        $this->testPage($user, '/admin/product', 403);
        $this->testPage($user, '/admin/purchase', 403);
    }

    public function test_customer()
    {
        $user = TestingHelper::getUserWithRole('customer');
        $this->testGeneralPages($user);

        // Status codes depend on the user
        $this->testPage($user, '/admin', 403);
        $this->testPage($user, '/admin/user', 403);
        $this->testPage($user, '/admin/product', 403);
        $this->testPage($user, '/admin/purchase', 403);

        // Logged user should not be able to access the following pages
        $this->testPage($user, '/login', 302);
        $this->testPage($user, '/register', 302);
    }

    // User that is not logged in
    public function test_anonymousCustomer()
    {
        // Null is passed, because no user is logged in
        $this->testGeneralPages(null);

        // Not logged-in user should be able to access the following pages
        $this->testPage(null, '/login', 200);
        $this->testPage(null, '/register', 200);

        // Not logged-in user should not be able to access the following pages
        $this->testPage(null, '/user/select', 302);
        $this->testPage(null, '/user/edit', 302);
        $this->testPage(null, '/user/photo', 302);
        $this->testPage(null, '/user/password', 302);
        $this->testPage(null, '/user/delete', 302);
    }
}
