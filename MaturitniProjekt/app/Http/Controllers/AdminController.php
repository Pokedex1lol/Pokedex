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
        return view('admin.index');
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

    public function cars()
    {
        // Logic to fetch cars for admin view
        $cars = Car::all();
        return view('admin.cars', ['cars' => $cars]);
    }
}