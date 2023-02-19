<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    // Disable created_at/updated_at columns
    public $timestamps = false;


    protected $table = 'category';

    protected $fillable = [
        'category'
    ];


    // Primary key information
    protected $primaryKey = 'id_category';
    public $incrementing = true;


    // Dashes are replaces with spaces, first letter is uppercase
    public function getDisplayName()
    {
        $displayName = str_replace("-", " ", $this->category);
        return ucFirst($displayName);
    }
}
