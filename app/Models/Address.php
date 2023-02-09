<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    // Disable created_at/updated_at columns
    public $timestamps = false;


    protected $table = 'address';

    protected $fillable = [
        'postal_code', 'street', 'house_number'
    ];


    // Primary key information
    protected $primaryKey = 'id_address';
    public $incrementing = true;
}
