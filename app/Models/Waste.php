<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Waste extends Model
{
    use HasFactory;

    protected $fillable = [
        'image',
        'quantity',
        'category',
        'depot_center_id', 
        'distribution_id', 

    ];

    public function depotCenter()
    {
        return $this->belongsTo(DepotCenter::class);
    }
    public function distribution()
    {
        return $this->belongsTo(Distribution::class); 
    }
    public function isDistributed()
    {
        return $this->distribution()->where('status', '!=', 'pending')->exists();
    }
    
}
