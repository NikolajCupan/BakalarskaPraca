<?php

namespace Tests\Feature;

use App\Helpers\TestingHelper;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Tests\TestCase;

class UserTest extends TestCase
{
    use DatabaseTransactions;
    use WithFaker;

    public function test_editProfile()
    {
        $user = TestingHelper::getUserWithRole('customer');
        $response = $this->actingAs($user)->post('/user/edit', [
            'firstName' => 'NewFirstName',
            'lastName' => 'NewLastName',
            'email' => $this->faker->email,
            'phoneNumber' => rand(1, 100000)
        ]);

        $response->assertStatus(302);
        $response->assertSessionHas('message', 'Zmena profilovych udajov bola uspesna');

        // Ensure profile information was successfully edited
        $this->assertDatabaseHas('web_user', [
            'first_name' => 'NewFirstName',
            'last_name' => 'NewLastName'
        ]);
    }

    public function test_editPassword()
    {
        $user = TestingHelper::getUserWithRole('customer');

        // Forcefully change password to 'password' so its value is known
        $user->password = bcrypt('password');
        $user->save();

        $response = $this->actingAs($user)->post('/user/password', [
            'oldPassword' => 'password',
            'newPassword' => 'newpass',
            'newPassword_confirmation' => 'newpass'
        ]);

        $response->assertStatus(302);
        $response->assertSessionHas('message', 'Zmena hesla bola uspesna');

        // Ensure password was changed successfully
        $this->assertTrue(Hash::check('newpass', $user->password));
    }

    public function test_deleteAccount()
    {
        $user = TestingHelper::getUserWithRole('customer');
        $image = $user->getImage();
        $address = $user->getAddress();

        // Forcefully change password to 'password' so its value is known
        $user->password = bcrypt('password');
        $user->save();

        // Assert all entities exist
        $this->assertDatabaseHas('web_user', [
            'id_user' => $user->id_user
        ]);
        $this->assertDatabaseHas('image', [
            'id_image' => $image->id_image
        ]);
        $this->assertDatabaseHas('address', [
            'id_address' => $address->id_address
        ]);

        // Delete account
        $response = $this->actingAs($user)->post('/user/delete', [
            'email' => $user->email,
            'password' => 'password',
            'confirmDelete' => true
        ]);

        $response->assertSessionHas('message', 'Zmazanie uctu bolo uspesne');
        // Assert all entities got deleted
        // Image and Address are deleted using database trigger
        $this->assertDatabaseMissing('web_user', [
            'id_user' => $user->id_user
        ]);
        $this->assertDatabaseMissing('image', [
           'id_image' => $image->id_image
        ]);
        $this->assertDatabaseMissing('address', [
            'id_address' => $address->id_address
        ]);
    }
}
