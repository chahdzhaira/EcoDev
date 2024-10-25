<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RecycledProduct extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'image',
        'description',
        'quantity',
        'price',
        'sales_center_id'  
    ];

    public function salesCenter()
    {
        return $this->belongsTo(SalesCenter::class);
    }
}
