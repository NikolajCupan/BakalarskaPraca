<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class WebUser extends Authenticatable
{
    use HasFactory;

    // Disable created_at/updated_at columns
    public $timestamps = false;


    protected $table = 'web_user';

    protected $fillable = [
        'id_address', 'id_image', 'first_name', 'last_name', 'password', 'email', 'phone_number'
    ];


    // Primary key information
    protected $primaryKey = 'id_user';
    public $incrementing = true;
}
