<!DOCTYPE html>
<html lang="cs">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail vozu</title>
    <!-- Flatpickr CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

    <!-- Flatpickr JS -->
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr/dist/l10n/cs.js"></script>

    <style>
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
        body {
            background-color: #1D1D1D;
            color: #E9E9E9;
            font-family: Arial, sans-serif;
        }

        .container {
            width: 80%;
            margin: 2rem auto;
            background-color: #2C2C2C;
            padding: 2rem;
            border-radius: 0.5rem;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.5);
        }

        .car-image {
            width: 100%;
            max-height: 300px;
            object-fit: cover;
            border-radius: 0.5rem;
            margin-bottom: 1rem;
        }

        /* Kalendář */
        .calendar {
            display: flex;
            flex-wrap: wrap;
            gap: 0.5rem;
            margin-bottom: 2rem;
        }

        .calendar-day {
            width: 100px;
            height: 50px;
            background-color: #28A745;
            color: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 0.5rem;
            font-weight: bold;
            transition: background-color 0.3s ease;
        }

        .calendar-day.reserved {
            background-color: #DC3545;
        }

        .calendar-day:hover {
            background-color: #218838;
        }

        /* Formulář */
        .form-container {
            display: flex;
            justify-content: center;
            margin-top: 1rem;
        }

        .form-group {
            margin-bottom: 1rem;
        }

        .form-label {
            margin-bottom: 0.5rem;
            display: block;
        }

        .form-control {
            padding: 0.5rem;
            border-radius: 0.25rem;
            border: 1px solid #444;
            background-color: #1D1D1D;
            color: #E9E9E9;
            outline: none;
            width: 100%;
        }

        .reserve-button {
            background-color: #E44146;
            color: white;
            padding: 0.5rem 1rem;
            border-radius: 0.5rem;
            font-weight: bold;
            text-transform: uppercase;
            transition: background-color 0.3s ease;
            border: none;
            cursor: pointer;
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


    <!-- Zobrazení zprávy o úspěchu -->
    @if (session('success'))
    <script>
        alert("{{ session('success') }}");
    </script>
    @endif

    <!-- Zobrazení zprávy o chybě -->

    @if ($errors->any())
    <script>
        alert("Chyba: {{ implode('\\n', $errors->all()) }}");
    </script>
    @endif



    <!-- Obsah stránky -->
    <div class="container">
        <h2>{{ $car->name }}</h2>
        <img src="{{ asset($car->image_url) }}" alt="{{ $car->name }}" class="car-image">
        <p><strong>{{ $car->description }}</strong></p>
        <p>Cena za den: <strong>{{ $car->price_per_day }} Kč</strong></p>

        <!-- Kalendář -->
        <h3>Kalendář dostupnosti</h3>
        <div class="calendar">
            @foreach ($calendar as $day)
            <div class="calendar-day {{ $day['reserved'] ? 'reserved' : '' }}">
                {{ $day['date'] }}
            </div>
            @endforeach
        </div>

        <!-- Rezervační formulář -->
        <div class="form-container">
            <form method="POST" action="{{ route('reservations.store') }}">
                @csrf
                <div class="form-group">
                    <label for="start_date" class="form-label">Datum od</label>
                    <input type="date" id="start_date" name="start_date" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="end_date" class="form-label">Datum do</label>
                    <input type="date" id="end_date" name="end_date" class="form-control" required>
                </div>
                <input type="hidden" name="car_id" value="{{ $car->id }}">
                <button type="submit" class="reserve-button">Rezervovat</button>
            </form>
        </div>
    </div>
</body>


</html>