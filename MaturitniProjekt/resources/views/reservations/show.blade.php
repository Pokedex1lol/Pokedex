<!DOCTYPE html>
<html lang="cs">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail vozu</title>
    <!-- Flatpickr CSS -->
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css"> -->

    <!-- Ikony -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

    <!-- Flatpickr JS -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr/dist/l10n/cs.js"></script> -->

    <!-- FullCalendar CSS (verze 5) -->
    <link href="https://cdn.jsdelivr.net/npm/@fullcalendar/core@5.11.0/main.min.css" rel="stylesheet">

    <!-- Moment.js -->
    <script src="https://cdn.jsdelivr.net/npm/moment@2.24.0/moment.min.js"></script>

    <!-- FullCalendar JS (verze 5) -->
    <script type="module">
        import { Calendar } from 'https://cdn.jsdelivr.net/npm/@fullcalendar/core@5.11.0/main.min.js';
        import dayGridPlugin from 'https://cdn.jsdelivr.net/npm/@fullcalendar/daygrid@5.11.0/main.min.js';
        import interactionPlugin from 'https://cdn.jsdelivr.net/npm/@fullcalendar/interaction@5.11.0/main.min.js';

        document.addEventListener('DOMContentLoaded', function () {
            var calendarEl = document.getElementById('calendar');
            var calendar = new Calendar(calendarEl, {
                headerToolbar: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'dayGridMonth,timeGridWeek,timeGridDay'
                },
                plugins: [dayGridPlugin, interactionPlugin],
                events: [
                    @foreach ($calendar as $day)
                        {
                            title: 'Rezervováno',
                            start: '{{ $day['date'] }}',
                            backgroundColor: '{{ $day['reserved'] ? '#DC3545' : '#28A745' }}', // Červená pro rezervované, zelená pro dostupné
                            allDay: true
                        },
                    @endforeach
            ],
                editable: true,
                droppable: false
            });
            calendar.render();
        });
    </script>


    <!-- Sweetalert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    <style>
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
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        /* Auto a jeho detaily */
        .car-container {
            display: flex;
            align-items: flex-start;
            gap: 40px;
            margin-bottom: 20px;
        }

        .car-image {
            width: 40%;
            max-height: 300px;
            object-fit: cover;
            border-radius: 0.5rem;
        }

        .car-details {
            width: 60%;
            background-color: #333;
            padding: 1.5rem;
            border-radius: 0.5rem;
        }

        .car-details p {
            margin: 1rem 0;
            font-size: 1.1rem;
        }

        .description,
        .additional-info {
            margin-top: 2rem;
            padding: 1.5rem;
            background-color: #444;
            border-radius: 0.5rem;
            font-size: 1.1rem;
        }

        .additional-info h3,
        .description h3 {
            margin-bottom: 1rem;
        }

        .features {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
        }

        .feature-item {
            background-color: #555;
            padding: 10px 15px;
            border-radius: 5px;
            font-size: 1rem;
        }

        .car-specs {
            width: 100%;
            border-collapse: collapse;
            margin-top: 1rem;
            background-color: #333;
            border-radius: 0.5rem;
            overflow: hidden;
        }

        .car-specs th,
        .car-specs td {
            padding: 10px;
            border-bottom: 1px solid #444;
            text-align: left;
        }

        .car-specs th {
            background-color: #222;
        }

        .price-highlight {
            font-size: 1.5rem;
            font-weight: bold;
            color: #ffcc00;
        }

        /* Kalendář */
        /* .calendar {
            display: flex;
            flex-wrap: wrap;
            gap: 0.5rem;
            margin-bottom: 2rem;
            width: 60%;
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
        } */

        #calendar {
            width: 100%;
            margin-top: 2rem;
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
    @extends('layouts.app')

    @section('content')
        <!-- Obsah stránky -->
        <div class="container">
            <div>
                <h2>{{ $car->name }}</h2>
                <div class="car-container">
                    <img src="{{ asset($car->image_url) }}" alt="{{ $car->name }}" class="car-image">
                    <div class="car-details">
                        <table class="car-specs">
                            <tr>
                                <th><i class="fas fa-tachometer-alt"></i> Výkon</th>
                                <td>{{ $car->power }} kW</td>
                            </tr>
                            <tr>
                                <th><i class="fas fa-car"></i> Dostupnost</th>
                                <td>{{ $car->availability ? 'Ano' : 'Ne' }}</td>
                            </tr>
                            <tr>
                                <th><i class="fas fa-calendar-alt"></i> Rok výroby</th>
                                <td>{{ $car->year }}</td>
                            </tr>
                            <tr>
                                <th><i class="fas fa-cogs"></i> Motor</th>
                                <td>{{ $car->engine }}</td>
                            </tr>
                            <tr>
                                <th><i class="fas fa-gears"></i> Převodovka</th>
                                <td>{{ $car->transmission }}</td>
                            </tr>
                            <tr>
                                <th><i class="fas fa-gas-pump"></i> Spotřeba</th>
                                <td>{{ $car->fuel_consumption }} l/100km</td>
                            </tr>
                            <tr>
                                <th><i class="fas fa-users"></i> Počet sedadel</th>
                                <td>{{ $car->seats }}</td>
                            </tr>
                            <tr>
                                <th><i class="fas fa-user-shield"></i> Min. věk řidiče</th>
                                <td>{{ $car->min_driver_age }} let</td>
                            </tr>
                            <tr>
                                <th><i class="fas fa-money-bill-wave"></i> Vratná kauce</th>
                                <td>{{ $car->deposit }} Kč</td>
                            </tr>
                            <tr>
                                <th><i class="fas fa-shield-alt"></i> Pojištění</th>
                                <td>{{ $car->insurance ? 'Ano' : 'Ne' }}</td>
                            </tr>
                            <tr>
                                <th><i class="fas fa-tag"></i> Cena</th>
                                <td class="price-highlight">{{ $car->price_per_day }} Kč / den</td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="description">
                    <h3>Popis vozu</h3>
                    <p>{{ $car->description }}</p>
                </div>

            </div>

            <!-- Kalendář -->
            <!-- <h3>Kalendář dostupnosti</h3>
                                            <div class="calendar" id="calendar">
                                                @foreach ($calendar as $day)
                                                <div class="calendar-day {{ $day['reserved'] ? 'reserved' : '' }}">
                                                    {{ $day['date'] }}
                                                </div>
                                                @endforeach
                                            </div> -->

            <h3>Kalendář dostupnosti</h3>
            <div id="calendar"></div>

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

        <!-- 1) Vyvolání SweetAlert2 při $errors->any() (validace/konflikt) -->
        @if ($errors->any())
            <script>
                let allErrors = '';
                @foreach($errors->all() as $error)
                    allErrors += "{{ $error }}\n";
                @endforeach

                Swal.fire({
                    icon: 'error',
                    title: 'Chyba',
                    text: allErrors,
                    confirmButtonText: 'OK'
                });
            </script>
        @endif

        <!-- 2) Vyvolání SweetAlert2 při session('success') -->
        @if(session('success'))
            <script>
                Swal.fire({
                    icon: 'success',
                    title: 'Hotovo',
                    text: "{{ session('success') }}",
                    confirmButtonText: 'OK'
                });
            </script>
        @endif
    @endsection
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                headerToolbar: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'dayGridMonth,timeGridWeek,timeGridDay'
                },
                events: [
                    @foreach ($calendar as $day)
                                {
                            title: 'Rezervováno',
                            start: '{{ $day['date'] }}',
                            backgroundColor: '{{ $day['reserved'] ? '#DC3545' : '#28A745' }}', // Červená pro rezervované, zelená pro dostupné
                            allDay: true
                        },
                    @endforeach
                ],
                editable: true,
                droppable: false
            });
            calendar.render();
        });
    </script>
</body>


</html>