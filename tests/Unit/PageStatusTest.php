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

    private function getUser() : User
    {
        /** @var User $user */
        $user = User::factory()->create();
        TestingHelper::giveRoleToUser($user, 'accountManager');
        TestingHelper::giveBasketToUser($user);

        return $user;
    }

    private function testPage($user, $page, $expectedStatus)
    {
        $response = $this->actingAs($user)->get($page);
        $response->assertStatus($expectedStatus);
    }

    public function test_accountManager()
    {
        $user = $this->getUser();

        $this->testPage($user, '/contact', 200);
        $this->testPage($user, '/admin', 200);
        $this->testPage($user, '/admin/purchase', 403);
        $this->testPage($user, '/admin/user', 200);
    }

    /*
    public function test_productManager()
    {
        $user = User::factory()->create();
        RecordCreatorHelper::giveRoleToUser($user, 'productManager');

        $this->testPage($user, '/', 200);
    }

    public function test_purchaseManager()
    {
        $user = User::factory()->create();
        RecordCreatorHelper::giveRoleToUser($user, 'purchaseManager');

        //$this->testPage($user, '/', 200);
    }

    public function test_customer()
    {
        $user = User::factory()->create();
        RecordCreatorHelper::giveRoleToUser($user, 'customer');

        //$this->testPage($user, '/', 200);
    }
    */
}
