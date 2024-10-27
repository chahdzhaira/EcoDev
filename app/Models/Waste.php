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
        'depot_id', //depot_center_id
        'distribution_id', 

    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function depot()
    {
        return $this->belongsTo(DepotCenter::class, 'depot_id');
    }
    

    // public function depotCenter()
    // {
    //     return $this->belongsTo(DepotCenter::class);
    // }
    public function distribution()
    {
        return $this->belongsTo(Distribution::class); 
    }
    public function isDistributed()
    {
        return $this->distribution()->where('status', '!=', 'pending')->exists();
    }
    
    // Waste.php
    public function distributions()
    {
        return $this->hasMany(Distribution::class);
    }
    

}
