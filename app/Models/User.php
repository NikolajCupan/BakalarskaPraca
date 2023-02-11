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
    // Might return null (null is returned when user has no record in Image table)
    public function getImage()
    {
        return Image::where('id_image', '=', $this->id_image)->first();
    }
}
