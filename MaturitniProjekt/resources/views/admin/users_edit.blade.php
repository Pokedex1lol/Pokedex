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
    
    .form-section {
        border-bottom: 1px solid #444;
        padding-bottom: 20px;
        margin-bottom: 20px;
    }
    
    .user-avatar {
        width: 100px;
        height: 100px;
        border-radius: 50%;
        object-fit: cover;
        margin: 0 auto 20px;
        display: block;
        background-color: #444;
        color: #E9E9E9;
        text-align: center;
        line-height: 100px;
        font-size: 40px;
    }
    
    .role-select {
        margin-top: 10px;
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
            <li><a href="{{ route('admin.cars') }}"><i class="fas fa-car"></i> Správa aut</a></li>
            <li><a href="{{ route('admin.reservations') }}"><i class="fas fa-calendar-alt"></i> Rezervace</a></li>
            <li><a href="{{ route('admin.users') }}" class="active"><i class="fas fa-users"></i> Uživatelé</a></li>
        </ul>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <div class="content-container">
            <h1 class="page-title">Upravit Uživatele</h1>
            
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

            <div class="text-center">
                <div class="user-avatar">
                    {{ strtoupper(substr($user->name, 0, 1)) }}
                </div>
            </div>

            <form action="{{ route('admin.users.update', $user->id) }}" method="POST" id="editUserForm">
                @csrf
                @method('PUT')

                <div class="form-section">
                    <h3><i class="fas fa-user"></i> Základní informace</h3>
                    <div class="form-group">
                        <label for="name">Jméno:</label>
                        <input type="text" id="name" name="name" class="form-control" value="{{ $user->name }}" required>
                    </div>

                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" id="email" name="email" class="form-control" value="{{ $user->email }}" required>
                    </div>
                </div>

                <div class="form-section">
                    <h3><i class="fas fa-key"></i> Oprávnění</h3>
                    <div class="form-group">
                        <label>Role:</label>
                        <div class="role-select">
                            @if(auth()->user()->id === $user->id && $user->is_admin)
                                <div style="color: #888;">
                                    <i class="fas fa-info-circle"></i> Nemůžete změnit svoji roli administrátora
                                </div>
                                <input type="hidden" name="is_admin" value="1">
                            @else
                                <label style="display: inline-block; margin-right: 20px;">
                                    <input type="radio" name="is_admin" value="0" {{ !$user->is_admin ? 'checked' : '' }}>
                                    Uživatel
                                </label>
                                <label style="display: inline-block;">
                                    <input type="radio" name="is_admin" value="1" {{ $user->is_admin ? 'checked' : '' }}>
                                    Administrátor
                                </label>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="form-section">
                    <h3><i class="fas fa-lock"></i> Změna hesla (volitelné)</h3>
                    <div class="form-group">
                        <label for="password">Nové heslo:</label>
                        <input type="password" id="password" name="password" class="form-control" placeholder="Ponechte prázdné pro zachování stávajícího hesla">
                    </div>

                    <div class="form-group">
                        <label for="password_confirmation">Potvrzení hesla:</label>
                        <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" placeholder="Potvrzení nového hesla">
                    </div>
                </div>

                <div class="form-section">
                    <h3><i class="fas fa-info-circle"></i> Doplňující informace</h3>
                    <div style="background-color: #333; padding: 15px; border-radius: 5px;">
                        <p><strong>Vytvořeno:</strong> {{ $user->created_at }}</p>
                        <p><strong>Aktualizováno:</strong> {{ $user->updated_at }}</p>
                        <p><strong>Počet rezervací:</strong> {{ $user->reservations()->count() }}</p>
                    </div>
                </div>

                <div class="form-buttons">
                    <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Uložit změny</button>
                    <a href="{{ route('admin.users') }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Zpět</a>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const form = document.getElementById('editUserForm');
        const passwordField = document.getElementById('password');
        const confirmField = document.getElementById('password_confirmation');
        
        form.addEventListener('submit', function(e) {
            // Kontrola hesel (pouze pokud je zadáno nové heslo)
            if (passwordField.value.length > 0) {
                if (passwordField.value !== confirmField.value) {
                    e.preventDefault();
                    Swal.fire({
                        title: 'Hesla se neshodují!',
                        text: 'Zadané heslo a jeho potvrzení musí být stejné.',
                        icon: 'error',
                        confirmButtonText: 'Opravit',
                        confirmButtonColor: '#E44146'
                    });
                }
                
                if (passwordField.value.length < 8) {
                    e.preventDefault();
                    Swal.fire({
                        title: 'Heslo je příliš krátké!',
                        text: 'Heslo musí obsahovat alespoň 8 znaků.',
                        icon: 'error',
                        confirmButtonText: 'Opravit',
                        confirmButtonColor: '#E44146'
                    });
                }
            }
        });
    });
</script>
@endsection