<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    use HasFactory;

    // Disable created_at/updated_at columns
    public $timestamps = false;


    protected $table = 'purchase';

    protected $fillable = [
        'id_basket', 'id_address', 'id_status', 'order_date'
    ];


    // Primary key information
    protected $primaryKey = 'id_purchase';
    public $incrementing = true;
}
