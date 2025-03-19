<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Support\Facades\DB;

class LandingController extends Controller
{
    public function index()
    {
        // Počet dostupných aut
        $carsCount = Car::where('availability', true)->count();
        
        // Počet unikátních značek (bez duplicit)
        $brandsCount = Car::select('brand')
            ->distinct()
            ->pluck('brand')
            ->unique()
            ->count();

        return view('landing', compact('carsCount', 'brandsCount'));
    }
} 