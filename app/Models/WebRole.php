<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WebRole extends Model
{
    use HasFactory;

    // Disable created_at/updated_at columns
    public $timestamps = false;


    protected $table = 'web_role';

    protected $fillable = [
        'name'
    ];


    // Primary key information
    protected $primaryKey = 'id_role';
    public $incrementing = true;


    public function getSlovakRoleName()
    {
        switch ($this->name)
        {
            case "customer":
                return "zakaznik";
            case "accountManager":
                return "manazer uctov";
            case "productManager":
                return "manazer produktov";
            case "purchaseManager":
                return "manazer objednavok";
            case "reviewManager":
                return "manazer recenzii";
        }

        return "neznama rola";
    }
}
