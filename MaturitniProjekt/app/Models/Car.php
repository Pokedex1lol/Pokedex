<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'price_per_day', 'image_url'];

    // Vztah s rezervacemi
    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }
}
