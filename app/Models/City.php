<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class City extends Model
{
    use HasFactory;

    // Disable created_at/updated_at columns
    public $timestamps = false;


    protected $table = 'city';

    protected $fillable = [
        'postal_code', 'city'
    ];


    // Primary key information
    protected $primaryKey = 'id_city';
    public $incrementing = true;
}
