<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
<<<<<<< HEAD
=======

>>>>>>> origin/hedil
    protected $fillable = [
        'publication_id', 
        'content',        
        'status',        
        'likes',          
<<<<<<< HEAD
        'is_edited',
=======
        'is_edited',      
>>>>>>> origin/hedil
    ];

    public function publication()
    {
        return $this->belongsTo(Publication::class);
    }
<<<<<<< HEAD

    public function user()
    {
        return $this->belongsTo(User::class); 
    }
    
=======
>>>>>>> origin/hedil
}
