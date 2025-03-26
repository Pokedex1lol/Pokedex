<!DOCTYPE html>
<html lang="cs">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Půjčovna JDM - Dashboard</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/14.6.3/nouislider.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/14.6.3/nouislider.min.js"></script>
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
        /* Základní nastavení */
        body {
            background-color: #1D1D1D;
            color: #E9E9E9;
            font-family: Arial, sans-serif;
        }

        .container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 2rem;
            padding-top: 70px;
        }

        /* Nadpisy a texty */
        h1 {
            font-size: 2.5rem;
            font-weight: 700;
            text-align: center;
            margin: 2rem 0;
            color: #E9E9E9;
            text-transform: uppercase;
            letter-spacing: 2px;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
        }

        /* Layout */
        .dashboard-layout {
            display: grid;
            grid-template-columns: 300px 1fr;
            gap: 2rem;
            margin-top: 2rem;
        }

        .cars-content {
            display: flex;
            flex-direction: column;
            min-height: 100%;
        }

        /* Filtrovací sekce */
        .filter-section {
            background: linear-gradient(145deg, #2C2C2C, #252525);
            border-radius: 15px;
            padding: 1.5rem;
            position: sticky;
            top: 6rem;
            height: fit-content;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }

        .filter-section h2 {
            font-size: 1.5rem;
            margin-bottom: 1.5rem;
            color: #E44146;
            font-weight: 600;
        }

        .filter-group {
            margin-bottom: 1.5rem;
        }

        /* Slider styling */
        .slider-container {
            margin: 2rem 0;
        }

        .noUi-target {
            background-color: #444;
            border: none;
            box-shadow: none;
            height: 8px;
        }

        .noUi-connect {
            background-color: #E44146;
        }

        .noUi-handle {
            background-color: #E44146;
            border: 2px solid #fff;
            box-shadow: none;
            border-radius: 50%;
            width: 20px !important;
            height: 20px !important;
            top: -7px !important;
            right: -10px !important;
        }

        .noUi-handle:before,
        .noUi-handle:after {
            display: none;
        }

        .slider-values {
            display: flex;
            justify-content: space-between;
            margin-top: 0.5rem;
            color: #888;
            font-size: 0.9rem;
        }

        /* Responzivní design pro layout */
        @media (max-width: 992px) {
            .dashboard-layout {
                grid-template-columns: 1fr;
            }

            .filter-section {
                position: relative;
                top: 0;
                margin-bottom: 2rem;
            }

            .cars-content {
                width: 100%;
            }
        }

        /* Filtrovací sekce */
        .filter-toggle-btn {
            background-color: #E44146;
            border: none;
            padding: 0.8rem 1.5rem;
            border-radius: 8px;
            color: white;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            transition: all 0.3s ease;
            width: 100%;
            justify-content: center;
            margin-bottom: 1rem;
        }

        .filter-toggle-btn:hover {
            background-color: #BF353A;
            transform: translateY(-2px);
        }

        .filter-toggle-btn i {
            font-size: 1.1rem;
        }

        /* Formulářové prvky */
        .form-select, .form-control {
            background-color: #333;
            border: 2px solid #444;
            color: #fff;
            border-radius: 8px;
            padding: 0.8rem;
            transition: all 0.3s ease;
        }

        .form-select:focus, .form-control:focus {
            background-color: #3a3a3a;
            border-color: #E44146;
            box-shadow: 0 0 0 3px rgba(228, 65, 70, 0.25);
        }

        .form-label {
            font-weight: 600;
            margin-bottom: 0.5rem;
            color: #E9E9E9;
        }

        /* Karty aut */
        .car-card {
            width: 100%;
            min-height: 550px;
            display: flex;
            flex-direction: column;
            background: linear-gradient(145deg, #2C2C2C, #252525);
            border-radius: 15px;
            overflow: hidden;
        }

        .car-img {
            width: 100%;
            height: 200px;
            object-fit: cover;
            flex-shrink: 0;
            transition: transform 0.3s ease;
        }

        .car-body {
            width: 100%;
            flex: 1;
            display: flex;
            flex-direction: column;
            padding: 15px;
        }

        .car-title {
            font-size: 1.5rem;
            font-weight: 700;
            color: #E44146;
            margin-bottom: 0.5rem;
            text-align: center;
        }

        .car-description {
            color: #888;
            font-size: 0.9rem;
            margin-bottom: 1rem;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
            text-overflow: ellipsis;
            text-align: center;
        }

        .car-info {
            flex: 1;
            width: 100%;
            display: grid;
            gap: 8px;
            margin-bottom: 1rem;
        }

        .car-info-item {
            width: 100%;
            display: flex;
            justify-content: space-between;
            padding: 4px 0;
        }

        .car-info-label {
            font-weight: 600;
            color: #888;
        }

        .car-info-value {
            color: #E9E9E9;
            font-weight: 500;
        }

        /* Tlačítka */
        .btn {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            font-size: 0.95rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
            padding: 0.8rem 1.5rem;
            border-radius: 8px;
            border: none;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
            overflow: hidden;
        }

        .btn i {
            font-size: 1.1rem;
            transition: transform 0.3s ease;
        }

        .btn:hover i {
            transform: translateX(3px);
        }

        .btn::after {
            content: '';
            position: absolute;
            width: 100%;
            height: 100%;
            top: 0;
            left: -100%;
            background: linear-gradient(
                to right,
                rgba(255, 255, 255, 0.1),
                rgba(255, 255, 255, 0.2),
                rgba(255, 255, 255, 0)
            );
            transition: left 0.3s ease;
        }

        .btn:hover::after {
            left: 100%;
        }

        .btn-primary {
            background: linear-gradient(135deg, #E44146, #BF353A);
            color: white;
            box-shadow: 0 4px 15px rgba(228, 65, 70, 0.3);
        }

        .btn-primary:hover {
            background: linear-gradient(135deg, #BF353A, #992C30);
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(228, 65, 70, 0.4);
        }

        .btn-primary:active {
            transform: translateY(0);
            box-shadow: 0 2px 10px rgba(228, 65, 70, 0.3);
        }

        .btn-secondary {
            background: linear-gradient(135deg, #444, #333);
            color: #E9E9E9;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
        }

        .btn-secondary:hover {
            background: linear-gradient(135deg, #555, #444);
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.3);
        }

        .btn-secondary:active {
            transform: translateY(0);
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
        }

        .btn-reserve {
            margin-top: auto;
            background-color: #E44146;
            color: white;
            padding: 0.8rem 1.5rem;
            border-radius: 8px;
            border: none;
            font-weight: 600;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            transition: all 0.3s ease;
            width: 100%;
        }

        .btn-reserve:hover {
            background-color: #BF353A;
            transform: translateY(-2px);
        }

        .btn-reserve:disabled {
            background-color: #666;
            cursor: not-allowed;
            transform: none;
        }

        /* Úprava tlačítek ve filtru */
        .filter-group .btn {
            margin-bottom: 0.5rem;
            width: 100%;
        }

        .filter-group .btn:last-child {
            margin-bottom: 0;
        }

        /* Grid pro karty */
        .car-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 20px;
            padding: 20px;
        }

        /* Stránkování */
        .pagination-wrapper {
            margin-top: 2rem;
            display: flex;
            justify-content: center;
            width: 100%;
            padding: 1rem;
        }

        .pagination {
            display: flex;
            justify-content: center;
            gap: 0.5rem;
            margin: 0;
            padding: 0;
        }

        .pagination .page-item {
            list-style: none;
        }

        .pagination .page-link {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 40px;
            height: 40px;
            background: linear-gradient(145deg, #2C2C2C, #252525);
            color: #E9E9E9;
            border-radius: 8px;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .pagination .page-item.active .page-link {
            background: linear-gradient(135deg, #E44146, #BF353A);
            color: white;
        }

        .pagination .page-link:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(228, 65, 70, 0.2);
        }

        /* Responzivní design */
        @media (max-width: 1200px) {
            .car-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 768px) {
            .dashboard-layout {
                grid-template-columns: 1fr;
            }

            .dashboard-layout .filter-section {
                display: none;
            }

            #mobile-filters {
                display: none;
                position: fixed;
                top: 0;
                right: 0;
                bottom: 0;
                width: 85%;
                background: #1D1D1D;
                z-index: 1001;
                padding: 15px;
                overflow-y: auto;
            }

            #mobile-filters.active {
                display: block;
            }

            #mobile-filters h2 {
                font-size: 1.2rem;
                margin-bottom: 1rem;
            }

            #mobile-filters .filter-group {
                margin-bottom: 0.8rem;
            }

            #mobile-filters .form-label {
                font-size: 0.9rem;
                margin-bottom: 0.3rem;
            }

            #mobile-filters .form-select {
                padding: 0.5rem;
                font-size: 0.9rem;
            }

            #mobile-filters .slider-container {
                margin: 1rem 0;
            }

            #mobile-filters .slider-values {
                font-size: 0.8rem;
                margin-top: 0.3rem;
            }

            #mobile-filters .btn {
                padding: 0.6rem 1rem;
                font-size: 0.9rem;
            }

            #mobile-filters .noUi-target {
                height: 6px;
            }

            #mobile-filters .noUi-handle {
                width: 16px !important;
                height: 16px !important;
                top: -5px !important;
                right: -8px !important;
            }

            .filter-overlay {
                display: none;
                position: fixed;
                top: 0;
                left: 0;
                right: 0;
                bottom: 0;
                background: rgba(0, 0, 0, 0.7);
                backdrop-filter: blur(3px);
                z-index: 1000;
            }

            .filter-overlay.active {
                display: block;
            }

            .filter-toggle {
                position: fixed;
                bottom: 20px;
                right: 20px;
                width: 50px;
                height: 50px;
                border-radius: 50%;
                background: #E44146;
                color: white;
                border: none;
                display: flex;
                align-items: center;
                justify-content: center;
                font-size: 1.2rem;
                box-shadow: 0 4px 15px rgba(228, 65, 70, 0.3);
                z-index: 1002;
                cursor: pointer;
            }

            .car-info-item:nth-child(5) {
                display: none !important;
            }

            .car-grid {
                grid-template-columns: repeat(2, 1fr);
                gap: 8px;
                padding: 8px;
            }

            .car-img {
                height: 100px;
            }

            .car-body {
                padding: 8px 10px;
            }

            .car-title {
                font-size: 0.85rem;
                margin-bottom: 2px;
            }

            .car-description {
                font-size: 0.75rem;
                margin-bottom: 3px;
                -webkit-line-clamp: 1;
                padding: 0 4px;
            }

            .car-info {
                gap: 1px;
                margin-bottom: 3px;
                padding: 0 2px;
            }

            .car-info-item {
                padding: 1px 4px;
                font-size: 0.7rem;
                margin-bottom: 0;
                line-height: 1.2;
            }

            .car-info-label {
                color: #888;
                font-size: 0.7rem;
                padding-right: 4px;
            }

            .car-info-value {
                font-size: 0.7rem;
                padding-left: 4px;
            }

            .btn-reserve {
                padding: 4px 8px;
                font-size: 0.75rem;
                margin-top: 3px;
                height: 24px;
                line-height: 1;
                display: flex;
                align-items: center;
                justify-content: center;
                margin-left: 2px;
                margin-right: 2px;
            }

            .car-card {
                min-height: unset;
            }
        }

        @media (min-width: 769px) {
            .filter-toggle,
            .filter-overlay {
                display: none !important;
            }

            .car-info-item {
                display: flex !important;
            }
        }

        /* Animace */
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .car-card {
            animation: fadeIn 0.5s ease-out;
        }

        /* Upozornění */
        .alert {
            padding: 1rem;
            border-radius: 8px;
            margin-bottom: 1rem;
            font-size: 0.9rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .alert-warning {
            background-color: #3D3000;
            color: #FFB700;
            border: 1px solid #4D3D00;
        }

        .alert i {
            font-size: 1.2rem;
        }

        .verify-link {
            color: #FFB700;
            text-decoration: underline;
            margin-left: 0.5rem;
        }

        .verify-link:hover {
            color: #FFC940;
        }
    </style>
</head>

<body>
    @extends('layouts.app')

    @section('content')
    <div class="container">
        <h1>Naše vozidla</h1>

        <div class="dashboard-layout">
            <!-- Filtry -->
            <div class="filter-section" id="mobile-filters">
                <h2><i class="fas fa-filter"></i> Filtry</h2>
                <form action="{{ route('dashboard') }}" method="GET">
                    <div class="filter-group">
                        <label for="brand" class="form-label">Značka</label>
                        <select name="brand" id="brand" class="form-select">
                            <option value="">Všechny značky</option>
                            @foreach($brands as $brand)
                                <option value="{{ $brand }}" {{ request('brand') == $brand ? 'selected' : '' }}>
                                    {{ $brand }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="filter-group">
                        <label for="year" class="form-label">Rok výroby</label>
                        <select name="year" id="year" class="form-select">
                            <option value="">Všechny roky</option>
                            @foreach($years as $year)
                                <option value="{{ $year }}" {{ request('year') == $year ? 'selected' : '' }}>
                                    {{ $year }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="filter-group">
                        <label for="transmission" class="form-label">Převodovka</label>
                        <select name="transmission" id="transmission" class="form-select">
                            <option value="">Všechny převodovky</option>
                            @foreach($transmissions as $transmission)
                                <option value="{{ $transmission }}" {{ request('transmission') == $transmission ? 'selected' : '' }}>
                                    {{ $transmission }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="filter-group">
                        <label class="form-label">Cena za den (Kč)</label>
                        <div class="slider-container">
                            <div id="price-slider"></div>
                            <div class="slider-values">
                                <span id="price-min"></span>
                                <span id="price-max"></span>
                            </div>
                            <input type="hidden" name="min_price" id="min_price" value="{{ request('min_price', $min_db_price) }}">
                            <input type="hidden" name="max_price" id="max_price" value="{{ request('max_price', $max_db_price) }}">
                        </div>
                    </div>

                    <div class="filter-group">
                        <label class="form-label">Výkon (kW)</label>
                        <div class="slider-container">
                            <div id="power-slider"></div>
                            <div class="slider-values">
                                <span id="power-min"></span>
                                <span id="power-max"></span>
                            </div>
                            <input type="hidden" name="min_power" id="min_power" value="{{ request('min_power', $min_db_power) }}">
                            <input type="hidden" name="max_power" id="max_power" value="{{ request('max_power', $max_db_power) }}">
                        </div>
                    </div>

                    <div class="filter-group">
                        <button type="submit" class="btn btn-primary w-100 mb-2">
                            <i class="fas fa-search"></i> Filtrovat
                        </button>
                        <a href="{{ route('dashboard') }}" class="btn btn-secondary w-100">
                            <i class="fas fa-undo"></i> Resetovat
                        </a>
                    </div>
                </form>
            </div>

            <!-- Seznam aut -->
            <div class="cars-content">
                @if($verificationNeeded)
                    <div class="alert alert-warning">
                        <i class="fas fa-exclamation-triangle"></i>
                        Pro rezervaci auta je potřeba ověřit váš email.
                        <a href="{{ route('verification.notice') }}" class="verify-link">Ověřit email</a>
                    </div>
                @endif

                <div class="car-grid">
                    @foreach($cars as $car)
                        <div class="car-card">
                            <img src="{{ asset($car->image_url) }}" class="car-img" alt="{{ $car->name }}">
                            <div class="car-body">
                                <h5 class="car-title">{{ $car->name }}</h5>
                                <p class="car-description">{{ Str::limit($car->description, 100) }}</p>
                                <div class="car-info">
                                    <div class="car-info-item">
                                        <span class="car-info-label">Značka:</span>
                                        <span class="car-info-value">{{ $car->brand }}</span>
                                    </div>
                                    <div class="car-info-item">
                                        <span class="car-info-label">Rok:</span>
                                        <span class="car-info-value">{{ $car->year }}</span>
                                    </div>
                                    <div class="car-info-item">
                                        <span class="car-info-label">Výkon:</span>
                                        <span class="car-info-value">{{ $car->power }} kW</span>
                                    </div>
                                    <div class="car-info-item">
                                        <span class="car-info-label">Motor:</span>
                                        <span class="car-info-value">{{ $car->engine }}</span>
                                    </div>
                                    <div class="car-info-item">
                                        <span class="car-info-label">Převodovka:</span>
                                        <span class="car-info-value">{{ $car->transmission }}</span>
                                    </div>
                                    <div class="car-info-item">
                                        <span class="car-info-label">Cena za den:</span>
                                        <span class="car-info-value">{{ number_format($car->price_per_day, 0, ',', ' ') }} Kč</span>
                                    </div>
                                </div>
                                @if($canReserve)
                                    <a href="{{ route('reservations.show', ['id' => $car->id]) }}" class="btn-reserve">
                                        Rezervovat
                                    </a>
                                @elseif(auth()->check())
                                    <button class="btn-reserve" disabled title="Pro rezervaci je potřeba ověřit email">
                                        Rezervovat
                                    </button>
                                @else
                                    <a href="{{ route('login') }}" class="btn-reserve">
                                        Pro rezervaci se přihlaste
                                    </a>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="pagination-wrapper">
                    {{ $cars->links() }}
                </div>
            </div>
        </div>
    </div>
    @endsection

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const filterToggle = document.getElementById('filterToggle');
            const mobileFilters = document.getElementById('mobile-filters');
            const filterOverlay = document.getElementById('filterOverlay');

            if (filterToggle && mobileFilters && filterOverlay) {
                // Přidání event listeneru pro tlačítko filtrů
                filterToggle.addEventListener('click', function() {
                    mobileFilters.classList.toggle('active');
                    filterOverlay.classList.toggle('active');
                    document.body.style.overflow = mobileFilters.classList.contains('active') ? 'hidden' : '';
                });

                // Zavření filtrů při kliknutí na overlay
                filterOverlay.addEventListener('click', function() {
                    mobileFilters.classList.remove('active');
                    filterOverlay.classList.remove('active');
                    document.body.style.overflow = '';
                });

                // Zavření filtrů při kliknutí na tlačítka uvnitř filtrů
                const filterButtons = mobileFilters.querySelectorAll('button[type="submit"], a.btn-secondary');
                filterButtons.forEach(button => {
                    button.addEventListener('click', function() {
                        mobileFilters.classList.remove('active');
                        filterOverlay.classList.remove('active');
                        document.body.style.overflow = '';
                    });
                });
            }

            // Inicializace cenového slideru
            const priceSlider = document.getElementById('price-slider');
            if (priceSlider) {
                noUiSlider.create(priceSlider, {
                    start: [
                        parseInt("{{ request('min_price', $min_db_price) }}"),
                        parseInt("{{ request('max_price', $max_db_price) }}")
                    ],
                    connect: true,
                    step: 100,
                    range: {
                        'min': parseInt("{{ $min_db_price }}"),
                        'max': parseInt("{{ $max_db_price }}")
                    },
                    format: {
                        to: function(value) {
                            return Math.round(value);
                        },
                        from: function(value) {
                            return Math.round(value);
                        }
                    }
                });

                // Update hodnot cenového slideru
                priceSlider.noUiSlider.on('update', function(values, handle) {
                    document.getElementById('price-min').textContent = values[0] + ' Kč';
                    document.getElementById('price-max').textContent = values[1] + ' Kč';
                    document.getElementById('min_price').value = values[0];
                    document.getElementById('max_price').value = values[1];
                });
            }

            // Inicializace výkonového slideru
            const powerSlider = document.getElementById('power-slider');
            if (powerSlider) {
                noUiSlider.create(powerSlider, {
                    start: [
                        parseInt("{{ request('min_power', $min_db_power) }}"),
                        parseInt("{{ request('max_power', $max_db_power) }}")
                    ],
                    connect: true,
                    step: 1,
                    range: {
                        'min': parseInt("{{ $min_db_power }}"),
                        'max': parseInt("{{ $max_db_power }}")
                    },
                    format: {
                        to: function(value) {
                            return Math.round(value);
                        },
                        from: function(value) {
                            return Math.round(value);
                        }
                    }
                });

                // Update hodnot výkonového slideru
                powerSlider.noUiSlider.on('update', function(values, handle) {
                    document.getElementById('power-min').textContent = values[0] + ' kW';
                    document.getElementById('power-max').textContent = values[1] + ' kW';
                    document.getElementById('min_power').value = values[0];
                    document.getElementById('max_power').value = values[1];
                });
            }

            // Animace pro karty aut
            const cards = document.querySelectorAll('.car-card');
            cards.forEach((card, index) => {
                card.style.animationDelay = `${index * 0.1}s`;
            });

            // Hover efekt pro obrázky
            cards.forEach(card => {
                const img = card.querySelector('.car-img');
                card.addEventListener('mouseenter', () => {
                    img.style.transform = 'scale(1.05)';
                });
                card.addEventListener('mouseleave', () => {
                    img.style.transform = 'scale(1)';
                });
            });
        });
    </script>

    <!-- Přidáme overlay pro filtry -->
    <div class="filter-overlay" id="filterOverlay"></div>

    <!-- Tlačítko pro zobrazení filtrů -->
    <button class="filter-toggle" id="filterToggle">
        <i class="fas fa-filter"></i>
    </button>
</body>

</html>