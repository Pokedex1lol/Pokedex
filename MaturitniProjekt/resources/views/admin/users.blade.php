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
    
    .table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 1.5rem;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    }
    
    .table th, .table td {
        padding: 12px 15px;
        text-align: left;
        border-bottom: 1px solid #444;
    }
    
    .table th {
        background-color: #1D1D1D;
        color: #E44146;
        font-weight: bold;
        text-transform: uppercase;
        font-size: 0.9rem;
    }
    
    .table tbody tr {
        background-color: #2C2C2C;
        transition: background-color 0.3s ease;
    }
    
    .table tbody tr:hover {
        background-color: #3A3A3A;
    }
    
    .badge {
        display: inline-block;
        padding: 3px 8px;
        border-radius: 3px;
        font-size: 0.8rem;
        font-weight: bold;
    }
    
    .bg-warning {
        background-color: #FFC107;
        color: #212529;
    }
    
    .bg-success {
        background-color: #28A745;
        color: #FFFFFF;
    }
    
    .bg-secondary {
        background-color: #6C757D;
        color: #FFFFFF;
    }
    
    .btn {
        display: inline-block;
        padding: 5px 10px;
        margin: 0 3px;
        border: none;
        border-radius: 3px;
        cursor: pointer;
        font-weight: bold;
        transition: all 0.3s ease;
        background-color: #E44146;
        color: #FFFFFF;
        text-decoration: none;
    }
    
    .btn-primary {
        background-color: #007BFF;
        color: #FFFFFF;
        text-decoration: none;
    }
    
    .btn-success {
        background-color: #28A745;
        color: #FFFFFF;
        text-decoration: none;
    }
    
    .btn-danger {
        background-color: #DC3545;
        color: #FFFFFF;
        text-decoration: none;
    }
    
    .btn:hover {
        transform: scale(1.05);
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);
    }
    
    .alert {
        padding: 15px;
        margin-bottom: 20px;
        border-radius: 5px;
    }
    
    .alert-success {
        background-color: #28A745;
        color: white;
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
            <h1 class="page-title">Správa Uživatelů</h1>

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

            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Jméno</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Vytvořeno</th>
                        <th>Akce</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            @if($user->role == 'admin')
                                <span class="badge bg-success">Admin</span>
                            @else
                                <span class="badge bg-secondary">Uživatel</span>
                            @endif
                        </td>
                        <td>{{ $user->created_at }}</td>
                        <td>
                            <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                            <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Přidání posluchače pro potvrzení při mazání
        const deleteButtons = document.querySelectorAll('form button.btn-danger');
        if (deleteButtons) {
            deleteButtons.forEach(button => {
                button.addEventListener('click', function(e) {
                    e.preventDefault();
                    const form = this.closest('form');
                    
                    Swal.fire({
                        title: 'Jste si jistí?',
                        text: "Tato akce smaže uživatele a všechna jeho data. Akci nelze vrátit zpět!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#E44146',
                        cancelButtonColor: '#6C757D',
                        confirmButtonText: 'Ano, smazat!',
                        cancelButtonText: 'Zrušit'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            form.submit();
                        }
                    });
                });
            });
        }
    });
</script>
@endsection