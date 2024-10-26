<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RecyclingCenter extends Model
{
    use HasFactory;
    protected $fillable = [
        'image',
        'name',
        'address',
        'phoneNumber',
        'email',
        'manager_name',
        'opening_hours',
        'closing_hours',
        'latitude',  // Assurez-vous que ces colonnes existent dans votre table
        'longitude',
    ];
    public function distributions()
    {
        return $this->hasMany(Distribution::class); 
    }
    protected $casts = [
        'reviews' => 'array', // Convertir les avis en tableau
    ];

    // Ajouter une méthode pour récupérer les avis ou retourner un tableau vide
    public function getReviewsAttribute($value)
    {
        return $value ?? []; // Retourne un tableau vide si aucun avis n'est présent
    }
}
