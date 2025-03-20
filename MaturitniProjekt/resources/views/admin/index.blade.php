@extends('layouts.app')

@section('content')
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
<style>
    body {
        font-family: Arial, sans-serif;
        background: linear-gradient(135deg, #1D1D1D, #3A3A3A);
        color: #E9E9E9;
        margin: 0;
        padding: 0;
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
    }

    .page-title {
        color: #E44146;
        margin-top: 0;
        margin-bottom: 30px;
        text-align: center;
        font-size: 2rem;
    }

    /* Statistiky */
    .stats-container {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 20px;
        margin-bottom: 30px;
    }

    .stat-card {
        background-color: #333;
        padding: 20px;
        border-radius: 8px;
        text-align: center;
    }

    .stat-number {
        font-size: 2.5rem;
        color: #E44146;
        margin: 10px 0;
    }

    .stat-label {
        color: #E9E9E9;
        font-size: 1rem;
    }

    /* Rychlé akce */
    .quick-actions {
        display: flex;
        gap: 15px;
        justify-content: center;
        flex-wrap: wrap;
    }

    .btn {
        display: inline-flex;
        align-items: center;
        padding: 10px 20px;
        border: none;
        border-radius: 4px;
        background-color: #E44146;
        color: white;
        text-decoration: none;
        font-weight: bold;
        transition: all 0.3s ease;
    }

    .btn i {
        margin-right: 8px;
    }

    .btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    }

    .btn-primary {
        background-color: #007BFF;
    }

    .btn-success {
        background-color: #28A745;
    }

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
        .stats-container {
            grid-template-columns: 1fr;
        }
        .quick-actions {
            flex-direction: column;
        }
        .btn {
            width: 100%;
            justify-content: center;
        }
    }
</style>

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
            <div class="stats-container">
                <div class="stat-card">
                    <div class="stat-number">{{ $cars_count }}</div>
                    <div class="stat-label">Celkem aut</div>
                </div>
                <div class="stat-card">
                    <div class="stat-number">{{ $users_count }}</div>
                    <div class="stat-label">Registrovaných uživatelů</div>
                </div>
                <div class="stat-card">
                    <div class="stat-number">{{ $reservations_count }}</div>
                    <div class="stat-label">Všechny rezervace</div>
                </div>
                <div class="stat-card">
                    <div class="stat-number">{{ $active_reservations_count }}</div>
                    <div class="stat-label">Dokončené rezervace</div>
                </div>
            </div>

            <!-- Rychlé akce -->
            <h2 style="color: #E44146; margin-bottom: 20px;">Rychlé akce</h2>
            <div class="quick-actions">
                <a href="{{ route('admin.cars.create') }}" class="btn"><i class="fas fa-plus"></i> Přidat nové auto</a>
                <a href="{{ route('admin.reservations') }}" class="btn btn-primary"><i class="fas fa-list"></i> Zobrazit rezervace</a>
                <a href="{{ route('admin.users') }}" class="btn btn-success"><i class="fas fa-user-edit"></i> Správa uživatelů</a>
            </div>
        </div>
    </div>
</div>
@endsection