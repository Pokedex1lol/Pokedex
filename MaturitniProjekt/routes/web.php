<?php

use App\Http\Controllers\ProfileController;
use App\Http\Middleware\AdminMiddleware;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CarController;


// Domovská stránka
Route::get('/', function () {
    return view('home');
})->name('home');

// Přihlášení
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

// Registrace
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

// Odhlášení
Route::post('/logout', function () {
    Auth::logout();
    return redirect('/'); // Přesměrování na domovskou stránku
})->name('logout');

// Veřejné stránky
Route::get('/cars', function () {
    return view('cars'); // Ujisti se, že máš soubor 'cars.blade.php' v 'resources/views'
})->name('cars');

Route::get('/contact', function () {
    return view('contact'); // Ujisti se, že máš soubor 'contact.blade.php' v 'resources/views'
})->name('contact');

// CHYBĚJÍCÍ LANDING ROUTE
Route::get('/landing', function () {
    return view('landing'); // Ujisti se, že máš soubor 'landing.blade.php' v 'resources/views'
})->middleware(['auth'])->name('landing');

// Dashboard (chráněná route)
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Profilové routy
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index'); // Zobrazí rezervace
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::get('/profile/history', [ProfileController::class, 'history'])->name('profile.history');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Rezervace
    Route::get('/reservations', [ReservationController::class, 'index'])->name('reservations.index');
    Route::post('/reservations', [ReservationController::class, 'store'])->name('reservations.store');
    Route::get('/reservations/{id}', [ReservationController::class, 'show'])->name('reservations.show');
    Route::delete('/reservations/{id}', [ReservationController::class, 'destroy'])->name('reservations.destroy'); // Mazání rezervace
});

// Admin Panel (chráněné routy pouze pro admina)
Route::middleware(AdminMiddleware::class)->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
    Route::get('/admin/users', [AdminController::class, 'users'])->name('admin.users');
    Route::get('/admin/reservations', [AdminController::class, 'reservations'])->name('admin.reservations');
    Route::get('/admin/cars', [AdminController::class, 'cars'])->name('admin.cars');
});

// Správa aut
Route::middleware(AdminMiddleware::class)->group(function () {
    Route::get('/admin/cars', [CarController::class, 'index'])->name('admin.cars');
    Route::get('/admin/cars/create', [CarController::class, 'create'])->name('admin.cars.create');
    Route::post('/admin/cars', [CarController::class, 'store'])->name('admin.cars.store');
    Route::get('/admin/cars/{car}/edit', [CarController::class, 'edit'])->name('admin.cars.edit');
    Route::put('/admin/cars/{car}', [CarController::class, 'update'])->name('admin.cars.update');
    Route::delete('/admin/cars/{car}', [CarController::class, 'destroy'])->name('admin.cars.destroy');
});

// Správa uživatelů v admin panelu
Route::middleware([AdminMiddleware::class])->group(function () {
    Route::get('/admin/users', [UserController::class, 'index'])->name('admin.users');
    Route::get('/admin/users/{user}/edit', [UserController::class, 'edit'])->name('admin.users.edit');
    Route::put('/admin/users/{user}', [UserController::class, 'update'])->name('admin.users.update');
    Route::delete('/admin/users/{user}', [UserController::class, 'destroy'])->name('admin.users.destroy');
});

// Správa rezervací v admin panelu
Route::middleware(AdminMiddleware::class)->group(function () {
    Route::get('/admin/reservations', [ReservationController::class, 'adminIndex'])->name('admin.reservations');
    Route::get('/admin/reservations/{reservation}/edit', [ReservationController::class, 'edit'])->name('admin.reservations.edit');
    Route::put('/admin/reservations/{reservation}', [ReservationController::class, 'update'])->name('admin.reservations.update');
    Route::delete('/admin/reservations/{reservation}', [ReservationController::class, 'destroy'])->name('admin.reservations.destroy');
    Route::put('/admin/reservations/{reservation}/complete', [ReservationController::class, 'complete'])->name('admin.reservations.complete');
});


// Auth routes
require __DIR__ . '/auth.php';
