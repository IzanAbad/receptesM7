<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable=[
        'text',
        'author_id',
        'recipe_id'
    ];

    public function author(){

        return $this->belongsTo(User::class, 'author_id', 'id');
    }


    public function recipe(){
        return $this->belongsTo(Recipe::class);
    }
}
