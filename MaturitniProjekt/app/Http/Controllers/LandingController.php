<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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

        // Získání 3 nejrychlejších aut
        $fastestCars = Car::orderBy('max_speed', 'desc')
                         ->take(3)
                         ->get(['name', 'max_speed']);

        return view('landing', compact('carsCount', 'brandsCount', 'fastestCars'));
    }
} 