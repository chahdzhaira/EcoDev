<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $fillable = [
        'publication_id', 
        'content',        
        'status',        
        'likes',          
        'is_edited',
    ];

    public function publication()
    {
        return $this->belongsTo(Publication::class);
    }
}
