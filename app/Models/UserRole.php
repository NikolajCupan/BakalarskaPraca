<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserRole extends Model
{
    use HasFactory;

    // Disable created_at/updated_at columns
    public $timestamps = false;


    protected $table = 'user_role';

    protected $fillable = [
        'id_user', 'id_role'
    ];


    // Relation to WebRole
    public function getWebRole()
    {
        return WebRole::where('id_role', '=', $this->id_role)
                      ->first();
    }
}
