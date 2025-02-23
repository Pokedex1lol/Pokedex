<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Reservation extends Model
{
    use HasFactory;

    /**
     * Povolené sloupce pro hromadné přiřazení
     */
    protected $fillable = ['start_date', 'end_date', 'car_id', 'user_id'];


    /**
     * Vztah k modelu Car
     * Rezervace patří konkrétnímu autu.
     */
    public function car(): BelongsTo
    {
        return $this->belongsTo(Car::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
