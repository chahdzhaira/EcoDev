<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Participation extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',               
        'email',              
        'phone',              
        'registration_date',  
        'event_id',           
    ];

    public function event()
    {
        return $this->belongsTo(Event::class);
    }
}
