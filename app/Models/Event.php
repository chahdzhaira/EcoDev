<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'description',
        'date',
        'location',
        'organizer',
        'max_participants',
        'image_url',
    ];

  
    public function participations()
{
    return $this->hasMany(Participation::class);
}

}
