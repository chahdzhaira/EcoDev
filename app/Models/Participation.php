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
        'user_id',
         
    ];
// Définir la relation avec User
public function user()
{
    return $this->belongsTo(User::class, 'user_id');
}
    public function event()
    {
        return $this->belongsTo(Event::class);
    }
}