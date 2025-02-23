<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $cars = Car::all(); // Získá všechna auta z tabulky `cars`
        return view('dashboard', compact('cars'));
    }
}
