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

    .btn-success {
        background-color: #28a745;
        text-decoration: none;
    }

    .btn-success:hover {
        background-color: #218838;
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
    
    .text-danger {
        color: #DC3545;
        font-size: 0.875rem;
        margin-top: 5px;
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
            <h1 class="page-title">Přidat nové auto</h1>
            
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

            <form action="{{ route('admin.cars.store') }}" method="POST" enctype="multipart/form-data" id="createCarForm">
                @csrf
                
                <div class="form-section">
                    <h3><i class="fas fa-info-circle"></i> Základní informace</h3>
                    <div class="form-group">
                        <label for="name">Název:</label>
                        <input type="text" id="name" name="name" class="form-control" value="{{ old('name') }}" required>
                        @error('name')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="brand">Značka:</label>
                        <input type="text" id="brand" name="brand" class="form-control" value="{{ old('brand') }}" required>
                        @error('brand')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="description">Popis:</label>
                        <textarea id="description" name="description" class="form-control">{{ old('description') }}</textarea>
                        @error('description')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="price_per_day">Cena za den (Kč):</label>
                        <input type="number" id="price_per_day" name="price_per_day" class="form-control"
                            value="{{ old('price_per_day') }}" required>
                        @error('price_per_day')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="available">Dostupné:</label>
                        <select id="available" name="availability" class="form-control">
                            <option value="1" {{ old('available') == '1' ? 'selected' : '' }}>Ano</option>
                            <option value="0" {{ old('available') == '0' ? 'selected' : '' }}>Ne</option>
                        </select>
                        @error('available')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-section">
                    <h3><i class="fas fa-cogs"></i> Technické parametry</h3>
                    <div class="form-group">
                        <label for="power">Výkon (kW):</label>
                        <input type="number" name="power" id="power" class="form-control" value="{{ old('power') }}">
                        @error('power')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="engine">Typ motoru:</label>
                        <input type="text" name="engine" id="engine" class="form-control" value="{{ old('engine') }}">
                        @error('engine')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="year">Rok výroby:</label>
                        <input type="number" name="year" id="year" class="form-control" value="{{ old('year') }}">
                        @error('year')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="transmission">Převodovka:</label>
                        <select name="transmission" id="transmission" class="form-control">
                            <option value="manuální" {{ old('transmission') == 'manuální' ? 'selected' : '' }}>Manuální</option>
                            <option value="automatická" {{ old('transmission') == 'automatická' ? 'selected' : '' }}>Automatická</option>
                        </select>
                        @error('transmission')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="fuel_consumption">Spotřeba (l/100 km):</label>
                        <input type="number" step="0.1" name="fuel_consumption" id="fuel_consumption" class="form-control" value="{{ old('fuel_consumption') }}">
                        @error('fuel_consumption')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="seats">Počet míst:</label>
                        <input type="number" name="seats" id="seats" class="form-control" value="{{ old('seats') }}">
                        @error('seats')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-section">
                    <h3><i class="fas fa-image"></i> Obrázek</h3>
                    <div class="form-group">
                        <label for="image">Nahrát obrázek:</label>
                        <input type="file" id="image" name="image" class="form-control">
                        @error('image')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-buttons">
                    <button type="submit" class="btn btn-success"><i class="fas fa-plus-circle"></i> Přidat auto</button>
                    <a href="{{ route('admin.cars') }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Zpět</a>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const form = document.getElementById('createCarForm');
        
        form.addEventListener('submit', function(e) {
            // Formulář se odešle normálně, Laravel validace se postará o zbytek
            // Pokud by se použil AJAX, zde by byla logika pro zpracování
        });
        
        @if($errors->any())
            Swal.fire({
                title: 'Ověření se nezdařilo!',
                html: `@foreach($errors->all() as $error)
                        <p>{{ $error }}</p>
                      @endforeach`,
                icon: 'error',
                confirmButtonText: 'Opravit',
                confirmButtonColor: '#E44146'
            });
        @endif
    });
</script>
@endsection