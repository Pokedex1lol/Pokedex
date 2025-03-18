<!DOCTYPE html>
<html lang="cs">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Půjčovna JDM - Dashboard</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <script>
        // Toggle visibility of the dropdown menu
        document.addEventListener('DOMContentLoaded', function() {
            const accountButton = document.querySelector('.account-button');
            const dropdownMenu = document.querySelector('.dropdown-menu');

            accountButton.addEventListener('click', function(event) {
                event.preventDefault();
                dropdownMenu.classList.toggle('hidden');
            });

            // Close the dropdown if clicking outside of it
            document.addEventListener('click', function(event) {
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
            width: 99vw;
        }
    </style>
</head>

<body>
    @extends('layouts.app')

    @section('content')

    <!-- Container -->
    <div class="container">
        <h1>Vítejte, vyberte si auto k rezervaci!</h1>
        <div class="car-grid">
            @foreach ($cars as $car)
            <div class="car-card">
                <img src="{{ asset($car->image_url) }}" alt="{{ $car->name }}">
                <h2>{{ $car->name }}</h2>
                <p>
                    <i class="fas fa-tachometer-alt"></i> Výkon kW: {{ $car->power }}
                </p>
                <p>
                    <i class="fas fa-car"></i> Dostupnost nyní: {{ $car->availability ? 'Ano' : 'Ne' }}
                </p>
                <p>
                    <i class="fas fa-calendar-alt"></i> Rok výroby: {{ $car->year }}
                </p>
                <p>
                    <i class="fas fa-info-circle"></i> {{ \Illuminate\Support\Str::limit($car->description, 80) }}
                </p>
                <p>
                    <i class="fas fa-tag"></i> Cena: {{ $car->price_per_day }} Kč / den
                </p>
                <a href="{{ route('reservations.show', ['id' => $car->id]) }}" class="reserve-button">Rezervovat</a>
            </div>
            @endforeach
        </div>
    </div>
    @endsection
</body>

</html>