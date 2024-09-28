<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DepotCenter extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'address',
        'capacity',
        'image',
        'total_quantity_available',
        'opening_hours',
        'closing_hours',
        'phoneNumber',
        'manager_name',        
    ];
}
