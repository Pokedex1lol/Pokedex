@extends('layouts.app')

@section('content')
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
    
    .form-group {
        margin-bottom: 20px;
    }
    
    .form-group label {
        display: block;
        margin-bottom: 8px;
        font-weight: bold;
        color: #E9E9E9;
    }
    
    .form-control {
        width: 100%;
        padding: 10px;
        border: 1px solid #444;
        border-radius: 4px;
        background-color: #333;
        color: #E9E9E9;
        font-size: 16px;
    }
    
    .form-control:focus {
        outline: none;
        border-color: #E44146;
        box-shadow: 0 0 5px rgba(228, 65, 70, 0.5);
    }
    
    textarea.form-control {
        min-height: 100px;
        resize: vertical;
    }
    
    .btn {
        display: inline-block;
        padding: 10px 20px;
        margin: 5px;
        border: none;
        border-radius: 4px;
        background-color: #E44146;
        color: #FFFFFF;
        font-size: 16px;
        font-weight: bold;
        cursor: pointer;
        transition: all 0.3s ease;
        text-decoration: none;
    }
    
    .btn:hover {
        background-color: #BF353A;
        transform: scale(1.05);
        text-decoration: none;
    }
    
    .btn-primary {
        background-color: #007BFF;
        text-decoration: none;
    }
    
    .btn-primary:hover {
        background-color: #0069D9;
        text-decoration: none;
    }
    
    .btn-secondary {
        background-color: #6C757D;
        text-decoration: none;
    }
    
    .btn-secondary:hover {
        background-color: #5A6268;
        text-decoration: none;
    }
    
    .form-buttons {
        display: flex;
        justify-content: center;
        margin-top: 30px;
    }
    
    .alert {
        padding: 15px;
        margin-bottom: 20px;
        border-radius: 5px;
    }
    
    .alert-danger {
        background-color: #DC3545;
        color: white;
    }
    
    .img-preview {
        max-width: 200px;
        margin-top: 10px;
        border-radius: 4px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
    }
    
    .form-section {
        border-bottom: 1px solid #444;
        padding-bottom: 20px;
        margin-bottom: 20px;
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
        .btn {
            padding: 8px 15px;
            font-size: 14px;
        }
        .form-buttons {
            flex-direction: column;
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
            <li><a href="{{ route('admin.index') }}"><i class="fas fa-tachometer-alt"></i> Přehled</a></li>
            <li><a href="{{ route('admin.cars') }}" class="active"><i class="fas fa-car"></i> Správa aut</a></li>
            <li><a href="{{ route('admin.reservations') }}"><i class="fas fa-calendar-alt"></i> Rezervace</a></li>
            <li><a href="{{ route('admin.users') }}"><i class="fas fa-users"></i> Uživatelé</a></li>
        </ul>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <div class="content-container">
            <h1 class="page-title">Upravit Auto</h1>
            
            @if(session('success'))
                <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        Swal.fire({
                            title: 'Úspěch!',
                            text: '{{ session("success") }}',
                            icon: 'success',
                            confirmButtonText: 'OK',
                            confirmButtonColor: '#28a745'
                        });
                    });
                </script>
            @endif

            @if(session('error'))
                <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        Swal.fire({
                            title: 'Chyba!',
                            text: '{{ session("error") }}',
                            icon: 'error',
                            confirmButtonText: 'OK',
                            confirmButtonColor: '#E44146'
                        });
                    });
                </script>
            @endif
            
            @if ($errors->any())
                <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        Swal.fire({
                            title: 'Ověření se nezdařilo!',
                            html: `<ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>`,
                            icon: 'error',
                            confirmButtonText: 'Opravit',
                            confirmButtonColor: '#E44146'
                        });
                    });
                </script>
            @endif

            <form action="{{ route('admin.cars.update', $car->id) }}" method="POST" enctype="multipart/form-data" id="editCarForm">
                @csrf
                @method('PUT')
                
                <div class="form-section">
                    <h3><i class="fas fa-info-circle"></i> Základní informace</h3>
                    <div class="form-group">
                        <label for="name">Název:</label>
                        <input type="text" id="name" name="name" class="form-control" value="{{ $car->name }}" required>
                    </div>

                    <div class="form-group">
                        <label for="brand">Značka:</label>
                        <input type="text" id="brand" name="brand" class="form-control" value="{{ $car->brand }}" required>
                    </div>

                    <div class="form-group">
                        <label for="description">Popis:</label>
                        <textarea id="description" name="description" class="form-control" required>{{ $car->description }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="price_per_day">Cena za den (Kč):</label>
                        <input type="number" id="price_per_day" name="price_per_day" class="form-control" value="{{ $car->price_per_day }}" required>
                    </div>

                    <div class="form-group">
                        <label for="availability">Dostupné:</label>
                        <select id="availability" name="availability" class="form-control">
                            <option value="1" {{ $car->availability == 1 ? 'selected' : '' }}>Ano</option>
                            <option value="0" {{ $car->availability == 0 ? 'selected' : '' }}>Ne</option>
                        </select>
                    </div>
                </div>

                <div class="form-section">
                    <h3><i class="fas fa-cogs"></i> Technické parametry</h3>
                    <div class="form-group">
                        <label for="power">Výkon (kW):</label>
                        <input type="number" name="power" id="power" class="form-control" value="{{ $car->power }}">
                    </div>

                    <div class="form-group">
                        <label for="engine">Typ motoru:</label>
                        <input type="text" name="engine" id="engine" class="form-control" value="{{ $car->engine }}">
                    </div>

                    <div class="form-group">
                        <label for="year">Rok výroby:</label>
                        <input type="number" name="year" id="year" class="form-control" value="{{ $car->year }}">
                    </div>

                    <div class="form-group">
                        <label for="transmission">Převodovka:</label>
                        <select name="transmission" id="transmission" class="form-control">
                            <option value="manuální" {{ $car->transmission == 'manuální' ? 'selected' : '' }}>Manuální</option>
                            <option value="automatická" {{ $car->transmission == 'automatická' ? 'selected' : '' }}>Automatická</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="fuel_consumption">Spotřeba (l/100 km):</label>
                        <input type="number" step="0.1" name="fuel_consumption" id="fuel_consumption" class="form-control" value="{{ $car->fuel_consumption }}">
                    </div>

                    <div class="form-group">
                        <label for="seats">Počet míst:</label>
                        <input type="number" name="seats" id="seats" class="form-control" value="{{ $car->seats }}">
                    </div>
                </div>

                <div class="form-section">
                    <h3><i class="fas fa-image"></i> Obrázek</h3>
                    <div class="form-group">
                        <label for="image">Nahrát nový obrázek:</label>
                        <input type="file" id="image" name="image" class="form-control">
                        @if ($car->image_url)
                        <p>Aktuální obrázek:</p>
                        <img src="{{ asset($car->image_url) }}" alt="Aktuální obrázek" class="img-preview">
                        @endif
                    </div>
                </div>

                <div class="form-buttons">
                    <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Uložit změny</button>
                    <a href="{{ route('admin.cars') }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Zpět</a>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const form = document.getElementById('editCarForm');
        
        // Přidání posluchače pro potvrzení při mazání
        const deleteButtons = document.querySelectorAll('.delete-btn');
        if (deleteButtons) {
            deleteButtons.forEach(button => {
                button.addEventListener('click', function(e) {
                    e.preventDefault();
                    const url = this.getAttribute('href');
                    
                    Swal.fire({
                        title: 'Jste si jistí?',
                        text: "Tato akce nelze vrátit zpět!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#E44146',
                        cancelButtonColor: '#6C757D',
                        confirmButtonText: 'Ano, smazat!',
                        cancelButtonText: 'Zrušit'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = url;
                        }
                    });
                });
            });
        }
    });
</script>
@endsection