<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SpecialService extends Model
{
    use HasFactory;

    // Définir les champs pouvant être remplis
    protected $fillable = [
        'name',               
        'additional_cost',    
        'expiration_date',   
        'delivery_agence_id', 
        'description',        // Ajout du champ description
        'status',            
    ];

    public function deliveryAgence()
    {
        return $this->belongsTo(DeliveryAgence::class);
    }
}