<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Waste extends Model
{
    use HasFactory;

    protected $table = 'wastes';

    protected $fillable = [
        'image',
        'quantity',
        'collection_date',
        'collection_location',
        'user_id',
        'category',  // Enum field
        'depot_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function depot()
    {
        return $this->belongsTo(DepotCenter::class, 'depot_id');
    }
}
