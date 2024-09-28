<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeliveryAgence extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'address',
        'phoneNumber',
        'image' ,
        'opening_hours',
        'closing_hours',
    ];
}
