<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Price extends Model
{
    use HasFactory;

    // Disable created_at/updated_at columns
    public $timestamps = false;


    protected $table = 'price';

    protected $fillable = [
        'id_product', 'date_price_start', 'date_price_end', 'price'
    ];


    // Primary key information
    protected $primaryKey = 'id_price';
    public $incrementing = true;
}
