{{-- resources/views/profile/history.blade.php --}}
<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Historie rezervací</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        /* Globální styl */
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #1D1D1D, #3A3A3A);
            color: #E9E9E9;
            margin: 0;
            padding: 0;
        }

        /* Kontejner */
        .container {
            max-width: 1000px;
            margin: 6rem auto 3rem;
            background-color: #2C2C2C;
            padding: 2rem;
            border-radius: 8px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.5);
        }

        .history-header {
            text-align: center;
            margin-bottom: 2rem;
            padding: 2rem;
            background: rgba(255, 255, 255, 0.05);
            border-radius: 10px;
        }

        .history-header h1 {
            color: #E44146;
            font-size: 2rem;
            margin: 0;
        }

        .history-stats {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 1rem;
            margin-bottom: 2rem;
        }

        .stat-card {
            background: rgba(255, 255, 255, 0.05);
            padding: 1.5rem;
            border-radius: 10px;
            text-align: center;
            transition: transform 0.3s ease;
        }

        .stat-card:hover {
            transform: translateY(-5px);
        }

        .stat-value {
            font-size: 2.5rem;
            font-weight: bold;
            color: #E44146;
            margin-bottom: 0.5rem;
        }

        .stat-label {
            color: #888;
            font-size: 0.9rem;
        }

        .reservations-list {
            display: grid;
            gap: 1rem;
        }

        .reservation-card {
            background: rgba(255, 255, 255, 0.05);
            border-radius: 10px;
            overflow: hidden;
            transition: transform 0.3s ease;
        }

        .reservation-card:hover {
            transform: translateY(-5px);
        }

        .reservation-header {
            background: rgba(228, 65, 70, 0.1);
            padding: 1rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .reservation-header h3 {
            margin: 0;
            color: #E9E9E9;
            font-size: 1.2rem;
        }

        .reservation-status {
            padding: 0.5rem 1rem;
            border-radius: 20px;
            font-size: 0.9rem;
            font-weight: bold;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .status-pending {
            background-color: rgba(255, 193, 7, 0.2);
            color: #ffc107;
            border: 1px solid #ffc107;
        }

        .status-completed {
            background-color: rgba(40, 167, 69, 0.2);
            color: #28a745;
            border: 1px solid #28a745;
        }

        .status-cancelled {
            background-color: rgba(220, 53, 69, 0.2);
            color: #dc3545;
            border: 1px solid #dc3545;
        }

        .reservation-body {
            padding: 1.5rem;
            display: grid;
            grid-template-columns: 150px 1fr;
            gap: 1.5rem;
        }

        .car-image {
            width: 150px;
            height: 100px;
            object-fit: cover;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .reservation-details {
            display: grid;
            gap: 1rem;
        }

        .detail-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0.5rem 0;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        .detail-row:last-child {
            border-bottom: none;
        }

        .detail-label {
            color: #888;
            font-size: 0.9rem;
        }

        .detail-value {
            font-weight: bold;
            color: #E9E9E9;
        }

        .price {
            color: #ffd700;
            font-weight: bold;
        }

        .reservation-actions {
            padding: 1rem;
            background: rgba(0, 0, 0, 0.1);
            display: flex;
            justify-content: flex-end;
            gap: 1rem;
        }

        .action-button {
            padding: 0.75rem 1.5rem;
            border-radius: 5px;
            font-weight: bold;
            text-decoration: none;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            border: none;
            cursor: pointer;
            font-size: 1rem;
            background: #E44146;
            color: white;
        }

        .action-button:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(228, 65, 70, 0.3);
        }

        .btn-cancel {
            background-color: #dc3545;
            color: white;
        }

        .btn-cancel:hover {
            background-color: #c82333;
        }

        .empty-state {
            text-align: center;
            padding: 4rem 2rem;
            background: rgba(255, 255, 255, 0.05);
            border-radius: 10px;
        }

        .empty-state i {
            font-size: 4rem;
            color: #E44146;
            margin-bottom: 1.5rem;
        }

        .empty-state h2 {
            color: #E9E9E9;
            margin-bottom: 1rem;
        }

        .empty-state p {
            color: #888;
            margin-bottom: 2rem;
            font-size: 1.1rem;
        }

        .btn-container {
            margin-top: 2rem;
            text-align: center;
        }

        @media (max-width: 768px) {
            .container {
                margin: 4rem 1rem;
                padding: 1rem;
            }

            .reservation-body {
                grid-template-columns: 1fr;
            }

            .car-image {
                width: 100%;
                height: 200px;
            }
        }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>
    @extends("layouts.app")

    @section("content")
    <div class="container">
        <div class="history-header">
            <h1>Historie rezervací</h1>
        </div>

        <div class="history-stats">
            <div class="stat-card">
                <div class="stat-value">{{ $reservations->count() }}</div>
                <div class="stat-label">Celkem rezervací</div>
            </div>
            <div class="stat-card">
                <div class="stat-value">{{ $reservations->where('status', 'completed')->count() }}</div>
                <div class="stat-label">Dokončené rezervace</div>
            </div>
            <div class="stat-card">
                <div class="stat-value">{{ $reservations->where('status', 'pending')->count() }}</div>
                <div class="stat-label">Aktivní rezervace</div>
            </div>
        </div>

        @if($reservations->isEmpty())
            <div class="empty-state">
                <i class="fas fa-calendar-times"></i>
                <h2>Žádné rezervace</h2>
                <p>Zatím nemáte žádné rezervace v historii.</p>
                <a href="{{ route('dashboard') }}" class="action-button">
                    <i class="fas fa-car"></i>
                    Prohlédnout dostupná auta
                </a>
            </div>
        @else
            <div class="reservations-list">
                @foreach($reservations as $reservation)
                    <div class="reservation-card">
                        <div class="reservation-header">
                            <h3>{{ $reservation->car->brand }} {{ $reservation->car->model }}</h3>
                            <span class="reservation-status status-{{ $reservation->status }}">
                                @if($reservation->status === 'pending')
                                    <i class="fas fa-clock"></i> Čeká na schválení
                                @elseif($reservation->status === 'completed')
                                    <i class="fas fa-check"></i> Dokončeno
                                @else
                                    <i class="fas fa-times"></i> Zrušeno
                                @endif
                            </span>
                        </div>
                        <div class="reservation-body">
                            <img src="{{ asset($reservation->car->image_url) }}" alt="{{ $reservation->car->brand }} {{ $reservation->car->model }}" class="car-image">
                            <div class="reservation-details">
                                <div class="detail-row">
                                    <span class="detail-label">Datum rezervace:</span>
                                    <span class="detail-value">{{ \Carbon\Carbon::parse($reservation->created_at)->format('d.m.Y') }}</span>
                                </div>
                                <div class="detail-row">
                                    <span class="detail-label">Období pronájmu:</span>
                                    <span class="detail-value">{{ \Carbon\Carbon::parse($reservation->start_date)->format('d.m.Y') }} - {{ \Carbon\Carbon::parse($reservation->end_date)->format('d.m.Y') }}</span>
                                </div>
                                <div class="detail-row">
                                    <span class="detail-label">Cena za den:</span>
                                    <span class="price">{{ number_format($reservation->car->price_per_day, 0, ',', ' ') }} Kč</span>
                                </div>
                                <div class="detail-row">
                                    <span class="detail-label">Celková cena:</span>
                                    <span class="price">{{ number_format($reservation->car->price_per_day * \Carbon\Carbon::parse($reservation->start_date)->diffInDays(\Carbon\Carbon::parse($reservation->end_date)), 0, ',', ' ') }} Kč</span>
                                </div>
                            </div>
                        </div>
                        @if($reservation->status === 'pending')
                            <div class="reservation-actions">
                                <form method="POST" action="{{ route('reservations.destroy', $reservation->id) }}" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="action-button btn-cancel">
                                        <i class="fas fa-times"></i>
                                        Zrušit rezervaci
                                    </button>
                                </form>
                            </div>
                        @endif
                    </div>
                @endforeach
            </div>
        @endif

        <div class="btn-container">
            <a href="{{ route('profile.index') }}" class="action-button">
                <i class="fas fa-arrow-left"></i>
                Zpět na profil
            </a>
        </div>
    </div>

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

    @if(session('error'))
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Chyba',
                text: "{{ session('error') }}",
                confirmButtonText: 'OK'
            });
        </script>
    @endif
    @endsection
</body>
</html>
