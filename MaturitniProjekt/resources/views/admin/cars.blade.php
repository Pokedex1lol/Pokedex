<!DOCTYPE html>
<html lang="cs">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Správa Aut</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
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

        .container {
            max-width: 900px;
            margin: 6rem auto 3rem;
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

    <div class="container">
        <h1 class="text-center">Správa Aut</h1>

        <div class="d-flex justify-content-between mb-3">
            <a href="{{ route('landing') }}" class="btn">Zpět na web</a>
            <a href="{{ route('admin.cars.create') }}" class="btn">Přidat Auto</a>
        </div>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table table-striped table-dark">
            <thead class="thead-light">
                <tr>
                    <th>ID</th>
                    <th>Název</th>
                    <th>Model</th>
                    <th>Dostupnost</th>
                    <th>Výkon (kW)</th>
                    <th>Motor</th>
                    <th>Rok</th>
                    <th>Převodovka</th>
                    <th>Spotřeba</th>
                    <th>Sedadla</th>
                    <th>Akce</th>

                </tr>
            </thead>
            <tbody>
                @foreach($cars as $car)
                    <tr>
                        <td>{{ $car->id }}</td>
                        <td>{{ $car->name }}</td>
                        <td>{{ $car->model }}</td>
                        <td>{{ $car->availability ? 'Ano' : 'Ne' }}</td>
                        <td>{{ $car->power }}</td>
                        <td>{{ $car->engine }}</td>
                        <td>{{ $car->year }}</td>
                        <td>{{ $car->transmission }}</td>
                        <td>{{ $car->fuel_consumption }} l/100 km</td>
                        <td>{{ $car->seats }}</td>

                        <td>
                            <a href="{{ route('admin.cars.edit', $car->id) }}" class="btn">Upravit</a>
                            <form action="{{ route('admin.cars.destroy', $car->id) }}" method="POST"
                                style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn">Smazat</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>

</html>