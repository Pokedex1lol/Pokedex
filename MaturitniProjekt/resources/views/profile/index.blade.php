<!DOCTYPE html>
<html lang="cs">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Můj profil</title>
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
            animation: fadeIn 1.5s ease;
        }

        /* @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        } */

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

        /* @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateX(-30px);
            }

            to {
                opacity: 1;
                transform: translateX(0);
            }
        } */

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

        /* Barva textu stavu objednávky */
        .text-warning {
            color: #ffc107;
        }

        .text-success {
            color: #28a745;
        }

        .text-secondary {
            color: #6c757d;
        }

        .profile-header {
            text-align: center;
            margin-bottom: 2rem;
            padding: 2rem;
            background: rgba(255, 255, 255, 0.05);
            border-radius: 10px;
        }

        .profile-avatar {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            margin: 0 auto 1rem;
            background-color: #E44146;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 3rem;
            color: white;
            text-transform: uppercase;
        }

        .verification-status {
            display: inline-flex;
            align-items: center;
            padding: 0.5rem 1rem;
            border-radius: 20px;
            margin: 1rem 0;
            font-weight: bold;
        }

        .verified {
            background-color: rgba(40, 167, 69, 0.2);
            color: #28a745;
            border: 1px solid #28a745;
        }

        .unverified {
            background-color: rgba(255, 193, 7, 0.2);
            color: #ffc107;
            border: 1px solid #ffc107;
        }

        .verification-status i {
            margin-right: 0.5rem;
        }

        .profile-info {
            background: rgba(255, 255, 255, 0.05);
            padding: 2rem;
            border-radius: 10px;
            margin-bottom: 2rem;
        }

        .info-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1rem;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        .info-item:last-child {
            border-bottom: none;
        }

        .info-label {
            color: #888;
            font-size: 0.9rem;
        }

        .info-value {
            font-weight: bold;
        }

        .action-buttons {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 1rem;
            margin-top: 2rem;
        }

        .action-button {
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 1rem;
            background: #E44146;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            transition: all 0.3s ease;
        }

        .action-button:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(228, 65, 70, 0.3);
        }

        .action-button i {
            margin-right: 0.5rem;
        }

        @media (max-width: 768px) {
            .action-buttons {
                grid-template-columns: 1fr;
            }
        }

        .empty-reservations {
            text-align: center;
            padding: 2rem;
            margin: 1rem 0 2rem;
            background: rgba(255, 255, 255, 0.05);
            border-radius: 10px;
        }

        .empty-reservations p {
            color: #888;
            margin-bottom: 1rem;
        }

        .reservations-list {
            margin: 1.5rem 0 2rem;
        }

        .reservations-section {
            margin-top: 2rem;
            padding-top: 2rem;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
        }

        .reservations-section h2 {
            margin-bottom: 1.5rem;
            color: #E44146;
            font-size: 1.5rem;
            text-align: center;
        }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>

<body>
    @extends("layouts.app")

    @section("content")
    
    <!-- Hlavní obsah -->
    <div class="container">
        <div class="profile-header">
            <div class="profile-avatar">
                {{ substr(auth()->user()->name, 0, 1) }}
            </div>
            <h1>{{ auth()->user()->name }}</h1>
            
            @if(auth()->user()->hasVerifiedEmail())
                <div class="verification-status verified">
                    <i class="fas fa-check-circle"></i>
                    Email ověřen
                </div>
            @else
                <div class="verification-status unverified">
                    <i class="fas fa-exclamation-circle"></i>
                    Email není ověřen
                    <form action="{{ route('verification.send') }}" method="POST" style="display: inline;">
                        @csrf
                        <button type="submit" class="btn btn-link">Poslat ověřovací email znovu</button>
                    </form>
                </div>
            @endif
        </div>

        <div class="profile-info">
            <div class="info-item">
                <span class="info-label">Email</span>
                <span class="info-value">{{ auth()->user()->email }}</span>
            </div>
            <div class="info-item">
                <span class="info-label">Člen od</span>
                <span class="info-value">{{ auth()->user()->created_at->format('d.m.Y') }}</span>
            </div>
            <div class="info-item">
                <span class="info-label">Role</span>
                <span class="info-value">{{ auth()->user()->is_admin ? 'Administrátor' : 'Uživatel' }}</span>
            </div>
        </div>

        <div class="action-buttons">
            <a href="{{ route('profile.edit') }}" class="action-button">
                <i class="fas fa-user-edit"></i>
                Upravit profil
            </a>
            <a href="{{ route('profile.history') }}" class="action-button">
                <i class="fas fa-history"></i>
                Historie rezervací
            </a>
            <a href="{{ route('password.request') }}" class="action-button" style="background-color: #ffd700; color: #222;" onclick="event.preventDefault(); document.getElementById('password-form').submit();">
                <i class="fas fa-key"></i>
                Změnit heslo
            </a>
            <form id="password-form" action="{{ route('password.email') }}" method="POST" style="display: none;">
                @csrf
                <input type="hidden" name="email" value="{{ auth()->user()->email }}">
            </form>
            @if(auth()->user()->is_admin)
            <a href="{{ route('admin.index') }}" class="action-button" style="background-color: #ffc107; color: #222;">
                <i class="fas fa-user-shield"></i>
                Admin panel
            </a>
            @endif
        </div>

        <div class="reservations-section">
            <h2>Moje aktivní rezervace</h2>
            
            @if ($reservations->where('status', 'pending')->isEmpty())
                <div class="empty-reservations">
                    <p>Nemáte žádné aktivní rezervace.</p>
                    <a href="{{ route('dashboard') }}" class="btn">Prohlédnout dostupná auta</a>
                </div>
            @else
                <div class="reservations-list">
                    @foreach ($reservations->where('status', 'pending') as $reservation)
                        <div class="reservation-card">
                            <img src="{{ asset($reservation->car->image_url) }}" alt="{{ $reservation->car->brand }} {{ $reservation->car->model }}">
                            <div class="reservation-details">
                                <p><strong>{{ $reservation->car->brand }} {{ $reservation->car->model }}</strong></p>
                                <p>Termín: {{ \Carbon\Carbon::parse($reservation->start_date)->format('d.m.Y') }} - {{ \Carbon\Carbon::parse($reservation->end_date)->format('d.m.Y') }}</p>
                                <p class="price">{{ number_format($reservation->car->price_per_day, 0, ',', ' ') }} Kč/den</p>
                                <p><span class="text-warning">Čeká na schválení</span></p>
                            </div>
                            <form method="POST" action="{{ route('reservations.destroy', $reservation->id) }}" onsubmit="return confirm('Opravdu chcete zrušit tuto rezervaci?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn">Zrušit</button>
                            </form>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>

    <!-- SweetAlert2 flash zprávy -->
    @if(session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Hotovo!',
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