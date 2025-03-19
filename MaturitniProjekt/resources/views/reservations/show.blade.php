<!DOCTYPE html>
<html lang="cs">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail vozu</title>
    
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
            color: #E9E9E9 !important;
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
            .specs-grid {
                grid-template-columns: 1fr;
            }

            .gallery-thumbnails {
                grid-template-columns: repeat(3, 1fr);
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


                <div class="specs-section">
                    <h2>Technické parametry</h2>
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
            </div>

            <!-- Pravý sloupec -->
            <div class="car-sidebar">
                <div class="reservation-form">
                    <h2>Rezervace vozu</h2>
                    <form method="POST" action="{{ route('reservations.store') }}" id="reservationForm">
                        @csrf
                        <input type="hidden" name="car_id" value="{{ $car->id }}">
                        
                        <div id="calendar-wrapper">
                            <div id="inline-calendar"></div>
                        </div>

                        <input type="hidden" id="start_date" name="start_date" required>
                        <input type="hidden" id="end_date" name="end_date" required>

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

                        <button type="submit" class="reserve-button">Rezervovat</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endsection

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Získání pole rezervovaných dat z backendu
            const reservedDates = @json(collect($calendar)->filter(function($day) {
                return $day['reserved'];
            })->pluck('date'));

            // Formátování data pro zobrazení
            function formatDate(date) {
                if (!date) return 'Vyberte datum';
                return new Date(date).toLocaleDateString('cs-CZ', {
                    weekday: 'long',
                    year: 'numeric',
                    month: 'long',
                    day: 'numeric'
                });
            }

            // Konfigurace kalendáře
            const calendar = flatpickr("#inline-calendar", {
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
                        
                        document.getElementById('start-date-display').textContent = formatDate(selectedDates[0]);
                        document.getElementById('end-date-display').textContent = selectedDates[1] ? formatDate(selectedDates[1]) : 'Vyberte datum konce';
                    }
                },
                onDayCreate: function(dObj, dStr, fp, dayElem) {
                    // Přidání třídy pro rezervované dny
                    if (reservedDates.includes(dayElem.dateObj.toISOString().split('T')[0])) {
                        dayElem.classList.add('is-reserved');
                    }
                }
            });
        });
    </script>
</body>


</html>