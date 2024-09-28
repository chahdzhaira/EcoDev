<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalesCenter extends Model
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
