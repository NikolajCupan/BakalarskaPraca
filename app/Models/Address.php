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
        'id_city', 'street', 'house_number'
    ];


    // Primary key information
    protected $primaryKey = 'id_address';
    public $incrementing = true;


    // Relation to City
    public function getCity()
    {
        return City::where('id_city', '=', $this->id_city)
                   ->first();
    }
}
