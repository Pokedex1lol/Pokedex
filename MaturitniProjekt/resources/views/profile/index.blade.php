<!DOCTYPE html>
<html lang="cs">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Můj profil</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
        /* Globální styl */
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #1D1D1D, #3A3A3A);
            color: #E9E9E9;
            margin: 0;
            padding: 0;
            animation: fadeIn 1.5s ease;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Navbar */
        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px 30px;
            background-color: #292929;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.5);
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 1000;
        }

        .navbar .logo {
            font-size: 1.5rem;
            text-transform: uppercase;
            font-weight: bold;
        }

        .navbar a {
            color: #E9E9E9;
            text-decoration: none;
            font-weight: bold;
            transition: color 0.3s ease;
        }

        .navbar a:hover {
            color: #E44146;
        }

        .nav-links {
            display: flex;
            gap: 20px;
            list-style: none;
            margin: 0;
            padding: 0;
        }

        .nav-link {
            font-size: 18px;
        }

        /* Dropdown Menu */
        .relative {
            position: relative;
        }

        .account-button {
            background-color: transparent;
            color: #E9E9E9;
            font-weight: bold;
            border: none;
            cursor: pointer;
            font-size: 18px;
            padding: 10px 15px;
        }

        .dropdown-menu {
            display: none;
            position: absolute;
            top: 100%;
            right: 0;
            background-color: #2C2C2C;
            border: 1px solid #444;
            border-radius: 5px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
            width: 200px;
            /* Fixní šířka dropdown menu */
            text-align: left;
            overflow: hidden;
        }

        .relative:hover .dropdown-menu {
            display: block;
        }

        .dropdown-link,
        .logout-button {
            display: block;
            color: #E9E9E9;
            text-decoration: none;
            padding: 10px 15px;
            transition: background-color 0.3s ease;
        }

        .dropdown-link:hover,
        .logout-button:hover {
            background-color: #444;
        }

        .logout-button {
            background: none;
            border: none;
            text-align: left;
            cursor: pointer;
            width: 100%;
        }

        /* Kontejner */
        .container {
            max-width: 800px;
            margin: 6rem auto 3rem;
            /* Posun obsahu dolů kvůli navbaru */
            background-color: #2C2C2C;
            padding: 2rem;
            border-radius: 8px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.5);
            animation: slideIn 1s ease;
        }

        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateX(-30px);
            }

            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        h1 {
            text-align: center;
            margin-bottom: 1.5rem;
            color: #E44146;
            font-size: 2rem;
        }

        h2 {
            margin-top: 1.5rem;
            color: #E9E9E9;
        }

        /* Rezervace karta */
        .reservation-card {
            display: flex;
            align-items: center;
            background-color: #444;
            margin: 1rem 0;
            padding: 1rem;
            border-radius: 5px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.4);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .reservation-card:hover {
            transform: scale(1.03);
            box-shadow: 0 6px 8px rgba(0, 0, 0, 0.6);
        }

        .reservation-card img {
            width: 120px;
            height: 80px;
            object-fit: cover;
            border-radius: 5px;
            margin-right: 1rem;
        }

        .reservation-details {
            flex: 1;
        }

        .reservation-details p {
            margin: 0;
            font-size: 0.9rem;
        }

        .reservation-details .price {
            color: #FFD700;
            font-weight: bold;
            font-size: 1rem;
            margin-top: 0.3rem;
        }

        .btn {
            display: inline-block;
            padding: 0.5rem 1rem;
            background-color: #E44146;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
            transition: all 0.3s ease;
        }

        .btn:hover {
            background-color: #BF353A;
            transform: scale(1.05);
        }

        .btn-container {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            gap: 1rem;
            margin-top: 2rem;
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar">
        <div class="logo">
            <a href="{{ route('landing') }}">Půjčovna JDM</a>
        </div>
        <ul class="nav-links">
            <li><a href="{{ route('landing') }}" class="nav-link">Domů</a></li>
            <li><a href="{{ route('dashboard') }}" class="nav-link">Auta</a></li>
            <li><a href="{{ route('contact') }}" class="nav-link">Kontakt</a></li>
        </ul>
        <div class="relative">
            <button class="account-button">Můj účet</button>
            <div class="dropdown-menu">
                <!-- Odkaz na profil uživatele -->
                <a href="{{ route('profile.index') }}" class="dropdown-link">Profil</a>
                <!-- Odhlášení -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="dropdown-link logout-button">Odhlásit se</button>
                </form>
            </div>
        </div>
    </nav>


    <!-- Hlavní obsah -->
    <div class="container">
        <h1>Vítejte, {{ auth()->user()->name }}!</h1>

        <!-- Odkaz na úpravu profilu -->
        <div class="btn-container">
            <a href="{{ route('profile.edit') }}" class="btn">Upravit profil</a>
        </div>

        <!-- Seznam rezervací -->
        <h2>Moje rezervace</h2>
        @if ($reservations->isEmpty())
            <p>Nemáte žádné rezervace.</p>
        @else
            @foreach ($reservations as $reservation)
                <div class="reservation-card">
                    <img src="{{ asset($reservation->car->image_url) }}" alt="{{ $reservation->car->name }}">
                    <div class="reservation-details">
                        <p><strong>{{ $reservation->car->name }}</strong></p>
                        <p>Datum: {{ $reservation->start_date }} - {{ $reservation->end_date }}</p>
                        <p class="price">Cena za den: {{ $reservation->car->price_per_day }} Kč</p>
                    </div>
                    <form method="POST" action="{{ route('reservations.destroy', $reservation->id) }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn">Zrušit rezervaci</button>
                    </form>
                </div>
            @endforeach
        @endif

        <!-- Navigační tlačítka -->
        <div class="btn-container">
            <a href="{{ route('dashboard') }}" class="btn">Zpět na dashboard</a>
            <a href="{{ route('landing') }}" class="btn">Zpět na hlavní stránku</a>
        </div>
    </div>
</body>

</html>