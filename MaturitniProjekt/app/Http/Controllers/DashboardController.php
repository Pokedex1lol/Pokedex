<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $query = Car::query();

        // Filtr podle značky
        if ($request->filled('brand')) {
            $query->where('brand', $request->brand);
        }

        // Filtr podle roku výroby
        if ($request->filled('year')) {
            $query->where('year', $request->year);
        }

        // Filtr podle typu převodovky
        if ($request->filled('transmission')) {
            $query->where('transmission', $request->transmission);
        }

        // Filtr podle ceny
        if ($request->filled('min_price')) {
            $query->where('price_per_day', '>=', $request->min_price);
        }
        if ($request->filled('max_price')) {
            $query->where('price_per_day', '<=', $request->max_price);
        }

        // Filtr podle výkonu
        if ($request->filled('min_power')) {
            $query->where('power', '>=', $request->min_power);
        }
        if ($request->filled('max_power')) {
            $query->where('power', '<=', $request->max_power);
        }

        // Získání unikátních hodnot pro filtry
        $brands = Car::distinct()->pluck('brand');
        $years = Car::distinct()->orderBy('year', 'desc')->pluck('year');
        $transmissions = Car::distinct()->pluck('transmission');
        $min_db_price = Car::min('price_per_day');
        $max_db_price = Car::max('price_per_day');
        $min_db_power = Car::min('power');
        $max_db_power = Car::max('power');

        // Stránkování - 9 aut na stránku
        $cars = $query->paginate(9);

        $canReserve = false;
        $verificationNeeded = false;

        if (auth()->check()) {
            if (auth()->user()->hasVerifiedEmail()) {
                $canReserve = true;
            } else {
                $verificationNeeded = true;
            }
        }

        return view('dashboard', [
            'cars' => $cars,
            'brands' => $brands,
            'years' => $years,
            'transmissions' => $transmissions,
            'min_db_price' => $min_db_price,
            'max_db_price' => $max_db_price,
            'min_db_power' => $min_db_power,
            'max_db_power' => $max_db_power,
            'filters' => $request->all(),
            'canReserve' => $canReserve,
            'verificationNeeded' => $verificationNeeded
        ]);
    }
}
