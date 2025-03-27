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
        .container {
            padding: 1rem;
            margin-top: 0;
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
            <li><a href="{{ route('admin.reservations') }}" class="active"><i class="fas fa-calendar-alt"></i> Rezervace</a></li>
            <li><a href="{{ route('admin.users') }}"><i class="fas fa-users"></i> Uživatelé</a></li>
        </ul>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <div class="content-container">
            <h1 class="page-title">Správa Rezervací</h1>

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
                        <th>Uživatel</th>
                        <th>Vůz</th>
                        <th>Začátek</th>
                        <th>Konec</th>
                        <th>Stav</th>
                        <th>Akce</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($reservations as $reservation)
                        <tr>
                            <td>{{ $reservation->id }}</td>
                            <td>{{ $reservation->user ? $reservation->user->name : 'Smazaný uživatel' }}</td>
                            <td>{{ $reservation->car ? $reservation->car->name : 'Smazané auto' }}</td>
                            <td>{{ $reservation->start_date }}</td>
                            <td>{{ $reservation->end_date }}</td>
                            <td>
                                @if ($reservation->status == 'pending')
                                    <span class="badge bg-warning">Čeká</span>
                                @elseif ($reservation->status == 'completed')
                                    <span class="badge bg-success">Dokončeno</span>
                                @else
                                    <span class="badge bg-secondary">Neznámý</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('admin.reservations.edit', $reservation->id) }}" class="btn btn-primary">Upravit</a>
                                <form action="{{ route('admin.reservations.complete', $reservation->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" class="btn btn-success">Dokončit</button>
                                </form>
                                <form action="{{ route('admin.reservations.destroy', $reservation->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Smazat</button>
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
                        text: "Tuto akci nelze vrátit zpět!",
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
        
        // Přidání posluchače pro potvrzení při dokončení rezervace
        const completeButtons = document.querySelectorAll('form button.btn-success');
        if (completeButtons) {
            completeButtons.forEach(button => {
                button.addEventListener('click', function(e) {
                    e.preventDefault();
                    const form = this.closest('form');
                    
                    Swal.fire({
                        title: 'Dokončit rezervaci?',
                        text: "Chcete označit tuto rezervaci jako dokončenou?",
                        icon: 'question',
                        showCancelButton: true,
                        confirmButtonColor: '#28a745',
                        cancelButtonColor: '#6C757D',
                        confirmButtonText: 'Ano, dokončit',
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
