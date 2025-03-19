<!DOCTYPE html>
<html lang="cs">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #1D1D1D, #3A3A3A);
            color: #E9E9E9;
            margin: 0;
            padding: 0;
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
            box-sizing: border-box;
            left: 0;
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

        /* Admin Layout */
        .admin-container {
            display: flex;
            margin-top: 70px;
            min-height: calc(100vh - 70px);
        }

        /* Sidebar */
        .sidebar {
            width: 250px;
            background-color: #252525;
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.2);
            position: fixed;
            height: calc(100vh - 70px);
            overflow-y: auto;
            top: 70px;
            left: 0;
        }

        .sidebar-header {
            padding: 20px;
            text-align: center;
            border-bottom: 1px solid #3A3A3A;
        }

        .sidebar-header h2 {
            margin: 0;
            color: #E44146;
            font-size: 1.5rem;
        }

        .sidebar-menu {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .sidebar-menu li {
            border-bottom: 1px solid #3A3A3A;
        }

        .sidebar-menu a {
            display: flex;
            align-items: center;
            padding: 15px 20px;
            color: #E9E9E9;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .sidebar-menu a:hover, .sidebar-menu a.active {
            background-color: #3A3A3A;
            color: #E44146;
        }

        .sidebar-menu i {
            margin-right: 10px;
            width: 20px;
            text-align: center;
        }

        /* Main Content */
        .main-content {
            flex: 1;
            margin-left: 250px;
            padding: 30px;
        }

        .content-container {
            background-color: #2C2C2C;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
            padding: 30px;
            min-height: 500px;
        }

        .page-title {
            color: #E44146;
            margin-top: 0;
            margin-bottom: 30px;
            text-align: center;
            font-size: 2rem;
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }

        .stat-card {
            background-color: #3A3A3A;
            border-radius: 8px;
            padding: 20px;
            text-align: center;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
        }

        .stat-card:hover {
            transform: translateY(-5px);
        }

        .stat-value {
            font-size: 2.5rem;
            font-weight: bold;
            color: #E44146;
            margin: 10px 0;
        }

        .stat-label {
            color: #CCCCCC;
            font-size: 1rem;
        }

        .quick-actions {
            display: flex;
            flex-wrap: wrap;
            gap: 15px;
            justify-content: center;
            margin-top: 30px;
        }

        .btn {
            display: inline-block;
            padding: 12px 20px;
            background-color: #E44146;
            color: #FFFFFF;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
            border: none;
            cursor: pointer;
            transition: all 0.3s ease;
            text-align: center;
        }

        .btn:hover {
            background-color: #BF353A;
            transform: scale(1.05);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            text-decoration: none;
        }

        .btn i {
            margin-right: 8px;
        }

        .btn-primary {
            background-color: #007BFF;
            text-decoration: none;
        }

        .btn-primary:hover {
            background-color: #0069D9;
            text-decoration: none;
        }

        .btn-success {
            background-color: #28A745;
            text-decoration: none;
        }

        .btn-success:hover {
            background-color: #218838;
            text-decoration: none;
        }

        /* Media queries pro responzivitu */
        @media (max-width: 992px) {
            .sidebar {
                width: 200px;
            }
            .main-content {
                margin-left: 200px;
            }
        }

        @media (max-width: 768px) {
            .admin-container {
                flex-direction: column;
            }
            .sidebar {
                width: 100%;
                height: auto;
                position: relative;
            }
            .main-content {
                margin-left: 0;
                padding: 20px;
            }
            .navbar {
                padding: 10px 15px;
            }
            .content-container {
                padding: 20px;
            }
            .table {
                display: block;
                overflow-x: auto;
            }
            
            .btn {
                padding: 3px 6px;
                font-size: 0.8rem;
            }
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
            <button class="account-button">{{ Auth::user()->name }}</button>
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

    <!-- Admin Layout -->
    <div class="admin-container">
        <!-- Sidebar -->
        <div class="sidebar">
            <div class="sidebar-header">
                <h2>Admin Panel</h2>
            </div>
            <ul class="sidebar-menu">
                <li><a href="{{ route('admin.index') }}" class="active"><i class="fas fa-tachometer-alt"></i> Přehled</a></li>
                <li><a href="{{ route('admin.cars') }}"><i class="fas fa-car"></i> Správa aut</a></li>
                <li><a href="{{ route('admin.reservations') }}"><i class="fas fa-calendar-alt"></i> Rezervace</a></li>
                <li><a href="{{ route('admin.users') }}"><i class="fas fa-users"></i> Uživatelé</a></li>
            </ul>
        </div>

        <!-- Main Content -->
        <div class="main-content">
            <div class="content-container">
                <h1 class="page-title">Přehled administrace</h1>
                
                <!-- Statistiky -->
                <div class="stats-grid">
                    <div class="stat-card">
                        <div class="stat-value">{{ App\Models\Car::count() }}</div>
                        <div class="stat-label">Celkem aut</div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-value">{{ App\Models\User::count() }}</div>
                        <div class="stat-label">Registrovaných uživatelů</div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-value">{{ App\Models\Reservation::count() }}</div>
                        <div class="stat-label">Celkem rezervací</div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-value">{{ App\Models\Reservation::where('status', 'pending')->count() }}</div>
                        <div class="stat-label">Aktivních rezervací</div>
                    </div>
                </div>
                
                <!-- Rychlé akce -->
                <h2 style="color: #E9E9E9; text-align: center; margin-top: 30px;">Rychlé akce</h2>
                <div class="quick-actions">
                    <a href="{{ route('admin.cars.create') }}" class="btn"><i class="fas fa-plus"></i> Přidat nové auto</a>
                    <a href="{{ route('admin.reservations') }}" class="btn btn-primary"><i class="fas fa-list"></i> Zobrazit rezervace</a>
                    <a href="{{ route('admin.users') }}" class="btn btn-success"><i class="fas fa-user-edit"></i> Správa uživatelů</a>
                </div>
            </div>
        </div>
    </div>
</body>

</html>