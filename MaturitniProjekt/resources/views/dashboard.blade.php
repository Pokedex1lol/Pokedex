<!DOCTYPE html>
<html lang="cs">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Půjčovna JDM - Dashboard</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script>
        // Toggle visibility of the dropdown menu
        document.addEventListener('DOMContentLoaded', function () {
            const accountButton = document.querySelector('.account-button');
            const dropdownMenu = document.querySelector('.dropdown-menu');

            accountButton.addEventListener('click', function (event) {
                event.preventDefault();
                dropdownMenu.classList.toggle('hidden');
            });

            // Close the dropdown if clicking outside of it
            document.addEventListener('click', function (event) {
                if (!accountButton.contains(event.target) && !dropdownMenu.contains(event.target)) {
                    dropdownMenu.classList.add('hidden');
                }
            });
        });
    </script>

    <style>
        /* Celkové nastavení pozadí a barev */
        body {
            background-color: #1D1D1D;
            color: #E9E9E9;
            font-family: Arial, sans-serif;
        }

        h1 {
            font-size: 1.75rem;
            text-align: center;
            margin-top: 2rem;
            margin-bottom: 1.5rem;
            color: #E9E9E9;
        }

        /* Karta auta */
        .car-card {
            background-color: #2C2C2C;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
            overflow: hidden;
            width: 300px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        .car-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 6px 8px rgba(0, 0, 0, 0.4);
        }

        .car-card img {
            width: 100%;
            height: 180px;
            object-fit: cover;
            margin-bottom: 1rem;
        }

        .car-card h2 {
            font-size: 1.2rem;
            color: #E44146;
            margin: 0 1rem 0.5rem;
        }

        .car-card p {
            margin: 0 1rem 0.5rem;
            font-size: 0.95rem;
        }

        /* Tlačítko */
        .reserve-button {
            display: block;
            background-color: #E44146;
            color: #fff;
            text-align: center;
            padding: 0.75rem;
            margin: 1rem;
            border-radius: 5px;
            font-weight: bold;
            text-transform: uppercase;
            text-decoration: none;
            transition: background-color 0.3s ease;
        }

        .reserve-button:hover {
            background-color: #BF353A;
        }

        /* Grid pro auta */
        .car-grid {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            gap: 2rem;
            margin-bottom: 2rem;
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

    <!-- Container -->
    <div class="container">
        <h1>Vítejte, vyberte si auto k rezervaci!</h1>
        <div class="car-grid">
            @foreach ($cars as $car)
                <div class="car-card">
                    <img src="{{ asset($car->image_url) }}" alt="{{ $car->name }}">
                    <h2>{{ $car->name }}</h2>
                    <p>{{ $car->description }}</p>
                    <p>Cena: {{ $car->price_per_day }} Kč / den</p>
                    <a href="{{ route('reservations.show', ['id' => $car->id]) }}" class="reserve-button">Rezervovat</a>
                </div>
            @endforeach
        </div>
    </div>

</body>

</html>