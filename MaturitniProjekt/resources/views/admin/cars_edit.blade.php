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
            <h1 class="page-title">Upravit auto</h1>
            
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
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('admin.cars.update', $car->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <!-- Základní informace -->
                <div class="form-section">
                    <h2>Základní informace</h2>
                    <div class="form-group">
                        <label for="brand">Značka</label>
                        <input type="text" id="brand" name="brand" class="form-control" value="{{ old('brand', $car->brand) }}" required>
                    </div>
                    <div class="form-group">
                        <label for="name">Model</label>
                        <input type="text" id="name" name="name" class="form-control" value="{{ old('name', $car->name) }}" required>
                    </div>
                    <div class="form-group">
                        <label for="year">Rok výroby</label>
                        <input type="number" id="year" name="year" class="form-control" value="{{ old('year', $car->year) }}" required>
                    </div>
                    <div class="form-group">
                        <label for="price_per_day">Cena za den (Kč)</label>
                        <input type="number" id="price_per_day" name="price_per_day" class="form-control" value="{{ old('price_per_day', $car->price_per_day) }}" required>
                    </div>
                    <div class="form-group">
                        <label for="description">Popis</label>
                        <textarea id="description" name="description" class="form-control" required>{{ old('description', $car->description) }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="availability">Dostupnost</label>
                        <select id="availability" name="availability" class="form-control" required>
                            <option value="1" {{ old('availability', $car->availability) == '1' ? 'selected' : '' }}>Dostupné</option>
                            <option value="0" {{ old('availability', $car->availability) == '0' ? 'selected' : '' }}>Nedostupné</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="image">Fotografie</label>
                        @if($car->image_url)
                            <img src="{{ asset($car->image_url) }}" alt="Aktuální fotografie" class="img-preview">
                        @endif
                        <input type="file" id="image" name="image" class="form-control" accept="image/*">
                        <small class="text-muted">Nahrajte novou fotografii pouze pokud chcete změnit současnou.</small>
                    </div>
                </div>

                <!-- Hlavní specifikace -->
                <div class="form-section">
                    <h2>Hlavní specifikace</h2>
                    <div class="form-group">
                        <label for="power">Výkon</label>
                        <input type="text" id="power" name="power" class="form-control" value="{{ old('power', $car->power) }}" required>
                    </div>
                    <div class="form-group">
                        <label for="engine">Motor</label>
                        <input type="text" id="engine" name="engine" class="form-control" value="{{ old('engine', $car->engine) }}" required>
                    </div>
                    <div class="form-group">
                        <label for="transmission">Převodovka</label>
                        <input type="text" id="transmission" name="transmission" class="form-control" value="{{ old('transmission', $car->transmission) }}" required>
                    </div>
                    <div class="form-group">
                        <label for="fuel_consumption">Spotřeba</label>
                        <input type="text" id="fuel_consumption" name="fuel_consumption" class="form-control" value="{{ old('fuel_consumption', $car->fuel_consumption) }}" required>
                    </div>
                    <div class="form-group">
                        <label for="seats">Počet sedadel</label>
                        <input type="number" id="seats" name="seats" class="form-control" value="{{ old('seats', $car->seats) }}" required>
                    </div>
                </div>

                <!-- Technické parametry -->
                <div class="form-section">
                    <h2>Technické parametry</h2>
                    <div class="form-group">
                        <label for="max_speed">Maximální rychlost (km/h)</label>
                        <input type="number" id="max_speed" name="max_speed" class="form-control" value="{{ old('max_speed', $car->max_speed) }}" required>
                    </div>
                    <div class="form-group">
                        <label for="acceleration">Zrychlení 0-100 km/h (s)</label>
                        <input type="number" id="acceleration" name="acceleration" class="form-control" step="0.1" value="{{ old('acceleration', $car->acceleration) }}" required>
                    </div>
                    <div class="form-group">
                        <label for="torque">Točivý moment (Nm)</label>
                        <input type="number" id="torque" name="torque" class="form-control" value="{{ old('torque', $car->torque) }}" required>
                    </div>
                    <div class="form-group">
                        <label for="fuel_tank">Objem nádrže (l)</label>
                        <input type="number" id="fuel_tank" name="fuel_tank" class="form-control" value="{{ old('fuel_tank', $car->fuel_tank) }}" required>
                    </div>
                </div>

                <!-- Další informace -->
                <div class="form-section">
                    <h2>Další informace</h2>
                    <div class="form-group">
                        <label for="color">Barva</label>
                        <input type="text" id="color" name="color" class="form-control" value="{{ old('color', $car->color) }}" required>
                    </div>
                    <div class="form-group">
                        <label for="mileage">Najeto (km)</label>
                        <input type="number" id="mileage" name="mileage" class="form-control" value="{{ old('mileage', $car->mileage) }}" required>
                    </div>
                    <div class="form-group">
                        <label for="origin_country">Země původu</label>
                        <input type="text" id="origin_country" name="origin_country" class="form-control" value="{{ old('origin_country', $car->origin_country) }}" required>
                    </div>
                    <div class="form-group">
                        <label for="service_book">Servisní knížka</label>
                        <select id="service_book" name="service_book" class="form-control" required>
                            <option value="1" {{ old('service_book', $car->service_book) == '1' ? 'selected' : '' }}>Ano</option>
                            <option value="0" {{ old('service_book', $car->service_book) == '0' ? 'selected' : '' }}>Ne</option>
                        </select>
                    </div>
                </div>

                <!-- Výbava -->
                <div class="form-section">
                    <h2>Výbava</h2>
                    <div class="form-group">
                        <label for="air_conditioning">Klimatizace</label>
                        <select id="air_conditioning" name="air_conditioning" class="form-control" required>
                            <option value="1" {{ old('air_conditioning', $car->air_conditioning) == '1' ? 'selected' : '' }}>Ano</option>
                            <option value="0" {{ old('air_conditioning', $car->air_conditioning) == '0' ? 'selected' : '' }}>Ne</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="airbags">Počet airbagů</label>
                        <input type="number" id="airbags" name="airbags" class="form-control" value="{{ old('airbags', $car->airbags) }}" required>
                    </div>
                    <div class="form-group">
                        <label for="parking_camera">Parkovací kamera</label>
                        <select id="parking_camera" name="parking_camera" class="form-control" required>
                            <option value="1" {{ old('parking_camera', $car->parking_camera) == '1' ? 'selected' : '' }}>Ano</option>
                            <option value="0" {{ old('parking_camera', $car->parking_camera) == '0' ? 'selected' : '' }}>Ne</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="heated_seats">Vyhřívaná sedadla</label>
                        <select id="heated_seats" name="heated_seats" class="form-control" required>
                            <option value="1" {{ old('heated_seats', $car->heated_seats) == '1' ? 'selected' : '' }}>Ano</option>
                            <option value="0" {{ old('heated_seats', $car->heated_seats) == '0' ? 'selected' : '' }}>Ne</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="safety_features">Bezpečnostní prvky (oddělené čárkou)</label>
                        <input type="text" id="safety_features" name="safety_features" class="form-control" value="{{ old('safety_features', implode(', ', json_decode($car->safety_features) ?? [])) }}" placeholder="Např. ABS, ESP, ASR">
                    </div>
                </div>

                <!-- Podmínky pronájmu -->
                <div class="form-section">
                    <h2>Podmínky pronájmu</h2>
                    <div class="form-group">
                        <label for="deposit">Kauce (Kč) - vratná záloha</label>
                        <input type="number" id="deposit" name="deposit" class="form-control" value="{{ old('deposit', $car->deposit) }}" required>
                        <small class="text-muted">Částka, kterou musí zákazník složit před zapůjčením jako pojistku. Bude vrácena po vrácení vozidla v pořádku.</small>
                    </div>
                    <div class="form-group">
                        <label for="min_driver_age">Minimální věk řidiče</label>
                        <input type="number" id="min_driver_age" name="min_driver_age" class="form-control" value="{{ old('min_driver_age', $car->min_driver_age) }}" required>
                    </div>
                    <div class="form-group">
                        <label for="min_license_length">Délka řidičského průkazu (roky)</label>
                        <input type="number" id="min_license_length" name="min_license_length" class="form-control" value="{{ old('min_license_length', $car->min_license_length) }}" required>
                    </div>
                    <div class="form-group">
                        <label for="mileage_limit">Denní limit kilometrů</label>
                        <input type="number" id="mileage_limit" name="mileage_limit" class="form-control" value="{{ old('mileage_limit', $car->mileage_limit) }}" required>
                    </div>
                </div>

                <div class="form-buttons">
                    <button type="submit" class="btn btn-primary">Uložit změny</button>
                    <a href="{{ route('admin.cars') }}" class="btn btn-secondary">Zrušit</a>
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