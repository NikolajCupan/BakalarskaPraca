<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    // Disable created_at/updated_at columns
    public $timestamps = false;


    protected $table = 'review';

    protected $fillable = [
        'id_user', 'id_product', 'rating', 'comment'
    ];


    // Relation to WebUser
    public function getAuthor()
    {
        return User::where('id_user', '=', $this->id_user)
                   ->first();
    }
}
