<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    // Disable created_at/updated_at columns
    public $timestamps = false;


    protected $table = 'web_user';

    protected $fillable = [
        'id_address', 'id_image', 'first_name', 'last_name', 'password', 'email', 'phone_number'
    ];


    // Primary key information
    protected $primaryKey = 'id_user';
    public $incrementing = true;


    // Relation to Address
    public function getAddress()
    {
        return Address::where('id_address', '=', $this->id_address)->first();
    }

    // Relation to Image
    // Never returns null, user might not have image, but he always has record in Image table
    public function getImage()
    {
        return Image::where('id_image', '=', $this->id_image)->first();
    }


    // Might return null if user has no image
    public function getImagePath()
    {
        $image = $this->getImage();

        return $image->image_path;
    }

    // Returns true if user has role 'admin'
    public function isAdmin()
    {
        $adminRole = WebRole::where('name', '=', 'admin')->first();

        // Check if user is admin
        $isAdmin = UserRole::where('id_user', '=', $this->id_user)
            ->where('id_role', '=', $adminRole->id_role)
            ->exists();

        return $isAdmin;
    }
}
