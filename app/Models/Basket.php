<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Basket extends Model
{
    use HasFactory;

    // Disable created_at/updated_at columns
    public $timestamps = false;


    protected $table = 'basket';

    protected $fillable = [
        'id_user', 'date_basket_start', 'date_basket_end'
    ];


    // Primary key information
    protected $primaryKey = 'id_basket';
    public $incrementing = true;
}
