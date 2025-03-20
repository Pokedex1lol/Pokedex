<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Reservation;
use App\Models\Car;

class AdminController extends Controller
{
    public function index()
    {
        $cars_count = Car::count();
        $users_count = User::count();
        $reservations_count = Reservation::count(); // Celkový počet všech rezervací
        $active_reservations_count = Reservation::where('status', 'completed')->count(); // Počet dokončených rezervací

        return view('admin.index', compact(
            'cars_count',
            'users_count',
            'reservations_count',
            'active_reservations_count'
        ));
    }

    public function users()
    {
        // Reuse ProfileController logic if needed, fetch users for admin view
        $users = User::with('reservations')->get();

        return view('admin.users', [
            'users' => $users,
        ]);
    }

    public function reservations()
    {
        // Logic to fetch reservations for admin view
        $reservations = Reservation::with('car', 'user')->get();
        return view('admin.reservations', ['reservations' => $reservations]);
    }

    public function cars(Request $request)
    {
        $query = Car::query();

        // Filtr podle značky
        if ($request->filled('znacka')) {
            $query->where('znacka', $request->znacka);
        }

        // Filtr podle minimální ceny
        if ($request->filled('min_price')) {
            $query->where('price_per_day', '>=', $request->min_price);
        }

        // Filtr podle maximální ceny
        if ($request->filled('max_price')) {
            $query->where('price_per_day', '<=', $request->max_price);
        }

        // Filtr podle roku výroby
        if ($request->filled('rok')) {
            $query->where('rok', $request->rok);
        }

        // Filtr podle typu převodovky
        if ($request->filled('prevodovka')) {
            $query->where('prevodovka', $request->prevodovka);
        }

        // Získání unikátních hodnot pro filtry
        $znacky = Car::distinct()->pluck('znacka');
        $roky = Car::distinct()->orderBy('rok', 'desc')->pluck('rok');
        $prevodovky = Car::distinct()->pluck('prevodovka');
        $min_db_price = Car::min('price_per_day');
        $max_db_price = Car::max('price_per_day');

        $cars = $query->get();

        return view('admin.cars', [
            'cars' => $cars,
            'znacky' => $znacky,
            'roky' => $roky,
            'prevodovky' => $prevodovky,
            'min_db_price' => $min_db_price,
            'max_db_price' => $max_db_price,
            'filters' => $request->all()
        ]);
    }
}