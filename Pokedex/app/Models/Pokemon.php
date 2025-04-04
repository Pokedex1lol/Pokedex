<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pokemon extends Model
{
    use HasFactory;

    protected $connection = 'mongodb';
    
    protected $fillable = [
        'name',
        'type',
        'level',
        'hp',
        'attack',
        'defense',
        'speed',
        'image',
        'description'
    ];

    public function getImageUrlAttribute()
    {
        if ($this->image) {
            return asset('images/pokemons/' . $this->image);
        }
        return asset('images/pokemons/default.png');
    }
}
