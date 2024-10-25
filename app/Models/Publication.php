<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Publication extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'description',
        'content' ,
        'category',
        'tags',
    ];
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
