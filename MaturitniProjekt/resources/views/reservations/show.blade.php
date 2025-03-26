<!DOCTYPE html>
<html lang="cs">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $car->brand }} {{ $car->name }} - Detail vozu</title>
    
    <!-- Flatpickr CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/themes/dark.css">

    <!-- Ikony -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

    <!-- Flatpickr JS -->
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr/dist/l10n/cs.js"></script>

    <!-- Sweetalert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <style>
        /* Základní styly */
        body {
            background-color: #1D1D1D;
            color: #E9E9E9;
            font-family: Arial, sans-serif;
        }

        .container {
            max-width: 1400px;
            margin: 6rem auto 2rem auto;  /* Zvětšené odsazení od menu */
            padding: 0 20px;
        }

        /* Grid layout pro detail auta */
        .car-detail {
            display: grid;
            grid-template-columns: 2fr 1fr;
            gap: 30px;
            margin-bottom: 40px;
        }

        /* Levý sloupec s hlavními informacemi */
        .car-main {
            background-color: #2C2C2C;
            border-radius: 12px;
            padding: 30px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .car-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 30px;
            padding-bottom: 20px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        .car-title h1 {
            font-size: 2rem;
            margin: 0 0 10px 0;
            color: #E44146;
        }

        .car-price {
            text-align: right;
        }

        .price-amount {
            font-size: 2rem;
            font-weight: bold;
            color: #E44146;
        }

        .price-note {
            color: rgba(255, 255, 255, 0.7);
            font-size: 0.9rem;
        }

        .car-description {
            margin-bottom: 30px;
            line-height: 1.6;
            color: rgba(255, 255, 255, 0.9);
            font-size: 1.1rem;
        }

        /* Galerie */
        .car-gallery {
            margin-bottom: 30px;
        }

        .car-gallery img {
            width: 100%;
            border-radius: 8px;
            margin-bottom: 15px;
        }

        .gallery-thumbnails {
            display: grid;
            grid-template-columns: repeat(5, 1fr);
            gap: 10px;
        }

        .gallery-thumbnails img {
            width: 100%;
            border-radius: 4px;
            cursor: pointer;
            transition: opacity 0.3s;
        }

        .gallery-thumbnails img:hover {
            opacity: 0.8;
        }

        /* Pravý sloupec s detaily */
        .car-sidebar {
            background-color: #2C2C2C;
            border-radius: 12px;
            padding: 30px;
            height: fit-content;
        }

        /* Specifikace */
        .specs-section {
            margin-bottom: 30px;
        }

        .specs-section h2 {
            font-size: 1.5rem;
            margin-bottom: 20px;
            color: #E44146;
        }

        .specs-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 15px;
        }

        .spec-item {
            display: flex;
            flex-direction: column;
        }

        .spec-label {
            color: rgba(255, 255, 255, 0.7);
            font-size: 0.9rem;
            margin-bottom: 5px;
        }

        .spec-label i {
            margin-right: 8px;
            color: #E44146;
            width: 16px;
            text-align: center;
        }

        .spec-value {
            font-weight: bold;
        }

        /* Kalendář */
        .flatpickr-calendar {
            background: #2C2C2C !important;
            border: 1px solid rgba(255, 255, 255, 0.1) !important;
            border-radius: 12px !important;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1) !important;
            font-family: Arial, sans-serif !important;
        }

        .flatpickr-day {
            color: #E9E9E9 !important;
            border-radius: 6px !important;
            height: 45px !important;
            line-height: 45px !important;
            border: none !important;
        }

        /* Minulé dny */
        .flatpickr-day.flatpickr-disabled {
            color: rgba(255, 255, 255, 0.3) !important;
            background: rgba(255, 255, 255, 0.05) !important;
            text-decoration: line-through !important;
            cursor: not-allowed !important;
        }

        /* Rezervované dny */
        .flatpickr-day.flatpickr-disabled.is-reserved {
            color: rgba(255, 255, 255, 0.5) !important;
            background: rgba(228, 65, 70, 0.15) !important;
            text-decoration: none !important;
            position: relative;
        }

        .flatpickr-day.flatpickr-disabled.is-reserved::after {
            content: '×';
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            font-size: 1.5em;
            color: rgba(228, 65, 70, 0.7);
        }

        .flatpickr-day.selected {
            background: #E44146 !important;
            border-color: #E44146 !important;
            color: white !important;
        }

        .flatpickr-day.today {
            border: 2px solid #E44146 !important;
            color: #E44146 !important;
            font-weight: bold !important;
        }

        .flatpickr-day:hover {
            background: rgba(228, 65, 70, 0.2) !important;
        }

        .flatpickr-day.prevMonthDay,
        .flatpickr-day.nextMonthDay {
            color: rgba(255, 255, 255, 0.5) !important;
        }

        .flatpickr-day.inRange {
            background: rgba(228, 65, 70, 0.2) !important;
            box-shadow: -5px 0 0 rgba(228, 65, 70, 0.2), 5px 0 0 rgba(228, 65, 70, 0.2) !important;
        }

        .flatpickr-months .flatpickr-month {
            background: #2C2C2C !important;
            color: #E9E9E9 !important;
        }

        .flatpickr-current-month {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 7px 0;
            height: auto;
            width: 100%;
            position: relative;
        }

        .flatpickr-current-month input.cur-year {
            position: static !important;
            left: auto !important;
            top: auto !important;
            transform: none !important;
            display: block;
            font-size: inherit !important;
            padding: 2px;
            margin: 4px 0 0 0;
            width: auto;
            min-width: 4ch;
            text-align: center;
        }

        .flatpickr-current-month span.cur-month {
            margin-right: 0;
            font-weight: bold;
            display: block;
        }

        .flatpickr-current-month .cur-month {
            margin-right: 5px;
        }

        .flatpickr-current-month .numInputWrapper {
            width: 6ch;
        }

        .numInputWrapper span {
            display: none;
        }

        .flatpickr-current-month input.cur-year {
            font-size: 100%;
            padding: 0;
            margin: 0;
            width: 6ch;
        }

        .flatpickr-monthDropdown-months {
            background: #2C2C2C !important;
            border: 1px solid rgba(255, 255, 255, 0.1) !important;
            color: #E9E9E9 !important;
        }

        .flatpickr-monthDropdown-month {
            background-color: #2C2C2C !important;
            color: #E9E9E9 !important;
        }

        .flatpickr-monthDropdown-month:hover {
            background-color: #E44146 !important;
        }

        .flatpickr-weekday {
            color: #E44146 !important;
        }

        .flatpickr-months .flatpickr-prev-month, 
        .flatpickr-months .flatpickr-next-month {
            fill: #E9E9E9 !important;
            padding: 10px !important;
        }

        .flatpickr-months .flatpickr-prev-month:hover, 
        .flatpickr-months .flatpickr-next-month:hover {
            fill: #E44146 !important;
        }

        /* Formulář rezervace */
        .reservation-form {
            background-color: #2C2C2C;
            border-radius: 12px;
            padding: 30px;
            margin-top: 30px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-label {
            display: block;
            margin-bottom: 8px;
            color: rgba(255, 255, 255, 0.9);
        }

        .form-control {
            width: 100%;
            padding: 12px;
            background-color: #1D1D1D;
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 6px;
            color: #E9E9E9;
            font-size: 1rem;
        }

        .form-control:focus {
            border-color: #E44146;
            outline: none;
        }

        .reserve-button {
            width: 100%;
            padding: 15px;
            background-color: #E44146;
            color: white;
            border: none;
            border-radius: 6px;
            font-size: 1.1rem;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .reserve-button:hover {
            background-color: #c83238;
        }

        /* Responzivní design */
        @media (max-width: 992px) {
            .car-detail {
                grid-template-columns: 1fr;
            }

            .gallery-thumbnails {
                grid-template-columns: repeat(4, 1fr);
            }
        }

        @media (max-width: 768px) {
            .container {
                margin: 5.5rem auto 1rem auto;
                padding: 0 10px;
            }

            .car-detail {
                grid-template-columns: 1fr;
                gap: 15px;
            }

            .car-main {
                padding: 15px;
            }

            .car-header {
                flex-direction: column;
                align-items: center;
                text-align: center;
                gap: 10px;
                margin-bottom: 15px;
                padding-bottom: 15px;
            }

            .car-title h1 {
                font-size: 1.5rem;
                margin-bottom: 5px;
            }

            .price-amount {
                font-size: 1.5rem;
            }

            .car-description {
                font-size: 0.95rem;
                margin-bottom: 20px;
            }

            .specs-section {
                margin-bottom: 20px;
            }

            .specs-section h2 {
                font-size: 1.2rem;
                margin-bottom: 15px;
            }

            .specs-grid {
                grid-template-columns: 1fr;
                gap: 10px;
            }

            .spec-item {
                background: rgba(255, 255, 255, 0.05);
                padding: 10px;
                border-radius: 8px;
                flex-direction: row;
                justify-content: space-between;
                align-items: center;
            }

            .spec-label {
                font-size: 0.9rem;
                margin-bottom: 0;
            }

            .spec-value {
                font-size: 0.9rem;
            }

            .car-sidebar {
                padding: 15px;
            }

            .reservation-form h2 {
                font-size: 1.2rem;
                margin-bottom: 15px;
            }

            .selected-dates {
                padding: 10px;
            }

            .date-display {
                font-size: 0.9rem;
            }

            .reserve-button {
                padding: 12px;
                font-size: 1rem;
            }

            .features-grid {
                grid-template-columns: 1fr;
            }

            .feature-item {
                font-size: 0.85rem;
                padding: 6px 10px;
            }

            .safety-features h3 {
                font-size: 1.1rem;
                margin-bottom: 10px;
            }

            .flatpickr-calendar {
                font-size: 0.9rem;
            }

            .flatpickr-day {
                height: 35px !important;
                line-height: 35px !important;
            }

            .flatpickr-current-month {
                display: flex;
                align-items: center;
                justify-content: center;
                padding: 7px 0 0 0;
                height: 34px;
                width: 100%;
                position: relative;
            }

            .flatpickr-current-month input.cur-year {
                position: static !important;
                left: auto !important;
                top: auto !important;
                transform: none !important;
                display: inline-block;
                font-size: inherit !important;
                padding: 0 2px;
                margin: 0;
                width: auto;
                min-width: 4ch;
            }

            .flatpickr-current-month span.cur-month {
                margin-right: 5px;
                font-weight: bold;
            }

            .numInput.cur-year {
                color: #E9E9E9 !important;
            }
        }

        #calendar-wrapper {
            margin-bottom: 20px;
        }

        .selected-dates {
            background: rgba(255, 255, 255, 0.05);
            border-radius: 8px;
            padding: 15px;
            margin: 20px 0;
        }

        .date-display {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 8px 0;
        }

        .date-display:first-child {
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            margin-bottom: 8px;
            padding-bottom: 12px;
        }

        .date-label {
            color: #E44146;
            font-weight: bold;
        }

        /* Úpravy kalendáře */
        .flatpickr-calendar {
            width: 100% !important;
            max-width: none;
            margin-bottom: 15px;
        }

        .flatpickr-calendar.inline {
            box-shadow: none !important;
            margin: 0 !important;
        }

        .flatpickr-days {
            width: 100% !important;
        }

        .dayContainer {
            width: 100% !important;
            min-width: 100% !important;
            max-width: 100% !important;
        }

        .flatpickr-day {
            width: 14.2857% !important;
            max-width: none !important;
            height: 45px !important;
            line-height: 45px !important;
        }

        .flatpickr-day.inRange {
            background: rgba(228, 65, 70, 0.2) !important;
            box-shadow: -5px 0 0 rgba(228, 65, 70, 0.2), 5px 0 0 rgba(228, 65, 70, 0.2) !important;
        }

        .flatpickr-day.selected.startRange,
        .flatpickr-day.selected.endRange {
            background: #E44146 !important;
        }

        .flatpickr-day.selected.startRange {
            border-radius: 6px 0 0 6px !important;
        }

        .flatpickr-day.selected.endRange {
            border-radius: 0 6px 6px 0 !important;
        }

        .login-prompt {
            text-align: center;
            padding: 20px;
        }

        .login-prompt p {
            margin-bottom: 20px;
            color: rgba(255, 255, 255, 0.9);
            font-size: 1.1rem;
        }

        .login-prompt .reserve-button {
            display: inline-block;
            text-decoration: none;
        }

        .safety-features {
            margin-top: 20px;
        }

        .safety-features h3 {
            color: #E44146;
            font-size: 1.2rem;
            margin-bottom: 15px;
        }

        .features-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
            gap: 10px;
        }

        .feature-item {
            display: flex;
            align-items: center;
            gap: 8px;
            padding: 8px 12px;
            background: rgba(255, 255, 255, 0.05);
            border-radius: 6px;
            font-size: 0.9rem;
        }

        .feature-item i {
            color: #E44146;
        }
    </style>
</head>

<body>
    @extends('layouts.app')

    @section('content')
    <div class="container">
        <div class="car-detail">
            <!-- Levý sloupec -->
            <div class="car-main">
                <div class="car-header">
                    <div class="car-title">
                        <h1>{{ $car->brand }} {{ $car->name }}</h1>
                        <div class="car-subtitle">{{ $car->year }}</div>
                    </div>
                    <div class="car-price">
                        <div class="price-amount">{{ number_format($car->price_per_day, 0, ',', ' ') }} Kč/den</div>
                        <div class="price-note">Včetně DPH</div>
                    </div>
                </div>
                <div class="car-gallery">
                    <img src="{{ asset($car->image_url) }}" alt="{{ $car->name }}" class="main-image">
                </div>

                <div class="car-description">
                    <p>{{ $car->description }}</p>
                </div>

                <!-- Hlavní specifikace -->
                <div class="specs-section">
                    <h2>Hlavní specifikace</h2>
                    <div class="specs-grid">
                        <div class="spec-item">
                            <span class="spec-label"><i class="fas fa-tachometer-alt"></i> Výkon</span>
                            <span class="spec-value">{{ $car->power }}</span>
                        </div>
                        <div class="spec-item">
                            <span class="spec-label"><i class="fas fa-car-battery"></i> Motor</span>
                            <span class="spec-value">{{ $car->engine }}</span>
                        </div>
                        <div class="spec-item">
                            <span class="spec-label"><i class="fas fa-cog"></i> Převodovka</span>
                            <span class="spec-value">{{ $car->transmission }}</span>
                        </div>
                        <div class="spec-item">
                            <span class="spec-label"><i class="fas fa-gas-pump"></i> Spotřeba</span>
                            <span class="spec-value">{{ $car->fuel_consumption }}</span>
                        </div>
                        <div class="spec-item">
                            <span class="spec-label"><i class="fas fa-chair"></i> Počet sedadel</span>
                            <span class="spec-value">{{ $car->seats }}</span>
                        </div>
                    </div>
                </div>

                <!-- Technické parametry -->
                <div class="specs-section">
                    <h2>Technické parametry</h2>
                    <div class="specs-grid">
                        <div class="spec-item">
                            <span class="spec-label"><i class="fas fa-gauge-high"></i> Maximální rychlost</span>
                            <span class="spec-value">{{ $car->max_speed }} km/h</span>
                        </div>
                        <div class="spec-item">
                            <span class="spec-label"><i class="fas fa-stopwatch"></i> Zrychlení 0-100 km/h</span>
                            <span class="spec-value">{{ $car->acceleration }} s</span>
                        </div>
                        <div class="spec-item">
                            <span class="spec-label"><i class="fas fa-gauge"></i> Točivý moment</span>
                            <span class="spec-value">{{ $car->torque }} Nm</span>
                        </div>
                        <div class="spec-item">
                            <span class="spec-label"><i class="fas fa-gas-pump"></i> Objem nádrže</span>
                            <span class="spec-value">{{ $car->fuel_tank }} l</span>
                        </div>
                    </div>
                </div>

                <!-- Další informace -->
                <div class="specs-section">
                    <h2>Další informace</h2>
                    <div class="specs-grid">
                        <div class="spec-item">
                            <span class="spec-label"><i class="fas fa-palette"></i> Barva</span>
                            <span class="spec-value">{{ $car->color }}</span>
                        </div>
                        <div class="spec-item">
                            <span class="spec-label"><i class="fas fa-road"></i> Najeto</span>
                            <span class="spec-value">{{ number_format($car->mileage, 0, ',', ' ') }} km</span>
                        </div>
                        <div class="spec-item">
                            <span class="spec-label"><i class="fas fa-flag"></i> Země původu</span>
                            <span class="spec-value">{{ $car->origin_country }}</span>
                        </div>
                        <div class="spec-item">
                            <span class="spec-label"><i class="fas fa-book"></i> Servisní knížka</span>
                            <span class="spec-value">{{ $car->service_book ? 'Ano' : 'Ne' }}</span>
                        </div>
                    </div>
                </div>

                <!-- Výbava -->
                <div class="specs-section">
                    <h2>Výbava</h2>
                    <div class="specs-grid">
                        <div class="spec-item">
                            <span class="spec-label"><i class="fas fa-snowflake"></i> Klimatizace</span>
                            <span class="spec-value">{{ $car->air_conditioning ? 'Ano' : 'Ne' }}</span>
                        </div>
                        <div class="spec-item">
                            <span class="spec-label"><i class="fas fa-shield-alt"></i> Počet airbagů</span>
                            <span class="spec-value">{{ $car->airbags }}</span>
                        </div>
                        <div class="spec-item">
                            <span class="spec-label"><i class="fas fa-camera"></i> Parkovací kamera</span>
                            <span class="spec-value">{{ $car->parking_camera ? 'Ano' : 'Ne' }}</span>
                        </div>
                        <div class="spec-item">
                            <span class="spec-label"><i class="fas fa-chair"></i> Vyhřívaná sedadla</span>
                            <span class="spec-value">{{ $car->heated_seats ? 'Ano' : 'Ne' }}</span>
                        </div>
                    </div>

                    @if($car->safety_features)
                        <div class="safety-features">
                            <h3>Bezpečnostní prvky</h3>
                            <div class="features-grid">
                                @foreach(json_decode($car->safety_features) as $feature)
                                    <div class="feature-item">
                                        <i class="fas fa-check"></i>
                                        {{ $feature }}
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif
                </div>

                <!-- Podmínky pronájmu -->
                <div class="specs-section">
                    <h2>Podmínky pronájmu</h2>
                    <div class="specs-grid">
                        <div class="spec-item">
                            <span class="spec-label"><i class="fas fa-money-bill"></i> Kauce</span>
                            <span class="spec-value">{{ number_format($car->deposit, 0, ',', ' ') }} Kč</span>
                        </div>
                        <div class="spec-item">
                            <span class="spec-label"><i class="fas fa-id-card"></i> Minimální věk řidiče</span>
                            <span class="spec-value">{{ $car->min_driver_age }} let</span>
                        </div>
                        <div class="spec-item">
                            <span class="spec-label"><i class="fas fa-clock"></i> Délka řidičského průkazu</span>
                            <span class="spec-value">{{ $car->min_license_length }} let</span>
                        </div>
                        <div class="spec-item">
                            <span class="spec-label"><i class="fas fa-road"></i> Denní limit kilometrů</span>
                            <span class="spec-value">{{ $car->mileage_limit }} km</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Pravý sloupec -->
            <div class="car-sidebar">
                <div class="reservation-form">
                    <h2>Rezervace vozu</h2>
                    @auth
                    <div class="reservation-form">
                        <form id="reservationForm" action="{{ route('reservations.store') }}" method="POST">
                            @csrf
                            <input type="hidden" name="car_id" value="{{ $car->id }}">
                            
                            <!-- Kalendář -->
                            <div id="calendar-wrapper">
                                <div id="inline-calendar"></div>
                            </div>

                            <div class="selected-dates">
                                <div class="date-display">
                                    <span class="date-label">Od:</span>
                                    <span id="start-date-display">Vyberte datum začátku</span>
                                </div>
                                <div class="date-display">
                                    <span class="date-label">Do:</span>
                                    <span id="end-date-display">Vyberte datum konce</span>
                                </div>
                            </div>

                            <input type="hidden" name="start_date" id="start_date">
                            <input type="hidden" name="end_date" id="end_date">

                            <div class="price-summary" style="display: none;">
                                <p>Celková cena: <span id="totalPrice">0</span> Kč</p>
                                <p>Počet dní: <span id="totalDays">0</span></p>
                            </div>

                            <button type="submit" class="reserve-button">Rezervovat</button>
                        </form>
                    </div>

                    <script>
                        document.addEventListener('DOMContentLoaded', function() {
                            // Získání již rezervovaných dat
                            const reservedDates = {!! json_encode($reservedDates) !!};
                            
                            // Konfigurace Flatpickr
                            const fp = flatpickr("#inline-calendar", {
                                inline: true,
                                mode: "range",
                                locale: "cs",
                                dateFormat: "Y-m-d",
                                minDate: "today",
                                disable: reservedDates,
                                disableMobile: false,
                                showMonths: 1,
                                animate: true,
                                theme: "dark",
                                onChange: function(selectedDates, dateStr, instance) {
                                    if (selectedDates.length > 0) {
                                        document.getElementById('start_date').value = selectedDates[0] ? instance.formatDate(selectedDates[0], 'Y-m-d') : '';
                                        document.getElementById('end_date').value = selectedDates[1] ? instance.formatDate(selectedDates[1], 'Y-m-d') : '';
                                        
                                        document.getElementById('start-date-display').textContent = formatDisplayDate(selectedDates[0]);
                                        document.getElementById('end-date-display').textContent = selectedDates[1] ? formatDisplayDate(selectedDates[1]) : 'Vyberte datum konce';

                                        if (selectedDates.length === 2) {
                                            calculateTotalPrice(selectedDates[0], selectedDates[1]);
                                        }
                                    }
                                },
                                onDayCreate: function(dObj, dStr, fp, dayElem) {
                                    // Přidání třídy pro rezervované dny
                                    if (reservedDates.includes(dayElem.dateObj.toISOString().split('T')[0])) {
                                        dayElem.classList.add('is-reserved');
                                    }
                                }
                            });

                            // Formátování data pro zobrazení
                            function formatDisplayDate(date) {
                                return new Date(date).toLocaleDateString('cs-CZ', {
                                    weekday: 'long',
                                    year: 'numeric',
                                    month: 'long',
                                    day: 'numeric'
                                });
                            }

                            function calculateTotalPrice(startDate, endDate) {
                                const days = Math.ceil((endDate - startDate) / (1000 * 60 * 60 * 24)) + 1;
                                const totalPrice = days * {{ $car->price_per_day }};

                                document.getElementById('totalDays').textContent = days;
                                document.getElementById('totalPrice').textContent = new Intl.NumberFormat('cs-CZ', {
                                    style: 'currency',
                                    currency: 'CZK'
                                }).format(totalPrice);
                                document.querySelector('.price-summary').style.display = 'block';
                            }

                            // Zpracování odeslání formuláře
                            document.getElementById('reservationForm').addEventListener('submit', function(e) {
                                e.preventDefault();
                                
                                const startDate = document.getElementById('start_date').value;
                                const endDate = document.getElementById('end_date').value;
                                
                                if (!startDate || !endDate) {
                                    Swal.fire({
                                        title: 'Chyba!',
                                        text: 'Prosím vyberte termín rezervace',
                                        icon: 'error',
                                        confirmButtonText: 'OK',
                                        confirmButtonColor: '#E44146'
                                    });
                                    return;
                                }

                                // Potvrzení rezervace pomocí SweetAlert2
                                Swal.fire({
                                    title: 'Potvrdit rezervaci?',
                                    html: `
                                        <p>Termín: ${document.getElementById('start-date-display').textContent} - ${document.getElementById('end-date-display').textContent}</p>
                                        <p>Počet dní: ${document.getElementById('totalDays').textContent}</p>
                                        <p>Celková cena: ${document.getElementById('totalPrice').textContent}</p>
                                        <p>Kauce: ${{{ $car->deposit }}} Kč</p>
                                    `,
                                    icon: 'question',
                                    showCancelButton: true,
                                    confirmButtonText: 'Rezervovat',
                                    cancelButtonText: 'Zrušit',
                                    confirmButtonColor: '#E44146',
                                    cancelButtonColor: '#6c757d'
                                }).then((result) => {
                                    if (result.isConfirmed) {
                                        const form = this;
                                        // Odeslání formuláře
                                        fetch(form.action, {
                                            method: 'POST',
                                            body: new FormData(form),
                                            headers: {
                                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                                                'Accept': 'application/json'
                                            },
                                            credentials: 'same-origin'
                                        })
                                        .then(response => response.json())
                                        .then(data => {
                                            if (data.success) {
                                                Swal.fire({
                                                    title: 'Úspěch!',
                                                    text: data.message,
                                                    icon: 'success',
                                                    confirmButtonText: 'OK',
                                                    confirmButtonColor: '#E44146'
                                                }).then(() => {
                                                    window.location.href = data.redirect;
                                                });
                                            } else {
                                                Swal.fire({
                                                    title: 'Chyba!',
                                                    text: data.message,
                                                    icon: 'error',
                                                    confirmButtonText: 'OK',
                                                    confirmButtonColor: '#E44146'
                                                });
                                            }
                                        })
                                        .catch(error => {
                                            Swal.fire({
                                                title: 'Chyba!',
                                                text: 'Při zpracování požadavku došlo k chybě.',
                                                icon: 'error',
                                                confirmButtonText: 'OK',
                                                confirmButtonColor: '#E44146'
                                            });
                                        });
                                    }
                                });
                            });
                        });
                    </script>
                    @else
                    <div class="login-prompt">
                        <p>Pro vytvoření rezervace se prosím přihlaste.</p>
                        <a href="{{ route('login') }}" class="btn btn-primary">Přihlásit se</a>
                    </div>
                    @endauth
                </div>
            </div>
        </div>
    </div>
    @endsection
</body>

</html>