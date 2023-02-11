<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    // Disable created_at/updated_at columns
    public $timestamps = false;


    protected $table = 'image';

    protected $fillable = [
        'image_path'
    ];


    // Primary key information
    protected $primaryKey = 'id_image';
    public $incrementing = true;
}
