<!DOCTYPE html>
<html lang="cs">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upravit profil</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #1D1D1D, #3A3A3A);
            color: #E9E9E9;
            margin: 0;
            padding: 0;
            min-height: 100vh;
        }

        .edit-container {
            max-width: 800px;
            margin: 6rem auto 3rem;
            background-color: #2C2C2C;
            padding: 2rem;
            border-radius: 10px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.5);
        }

        .edit-header {
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

        .edit-form {
            background: rgba(255, 255, 255, 0.05);
            padding: 2rem;
            border-radius: 10px;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-group label {
            display: block;
            margin-bottom: 0.5rem;
            color: #888;
            font-size: 0.9rem;
        }

        .form-control {
            width: 100%;
            padding: 0.75rem;
            background: rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 5px;
            color: #E9E9E9;
            transition: all 0.3s ease;
        }

        .form-control:focus {
            outline: none;
            border-color: #E44146;
            box-shadow: 0 0 0 2px rgba(228, 65, 70, 0.2);
        }

        .error-message {
            color: #dc3545;
            font-size: 0.9rem;
            margin-top: 0.5rem;
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
            border: none;
            border-radius: 5px;
            font-size: 1rem;
            font-weight: bold;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .action-button:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(228, 65, 70, 0.3);
        }

        .action-button.secondary {
            background: rgba(255, 255, 255, 0.1);
        }

        .action-button i {
            margin-right: 0.5rem;
        }

        .btn-link {
            background: none;
            border: none;
            color: #E44146;
            text-decoration: underline;
            cursor: pointer;
            padding: 0;
            font-size: 0.9rem;
        }

        .btn-link:hover {
            color: #ff5c61;
        }

        @media (max-width: 768px) {
            .edit-container {
                margin: 4rem 1rem;
                padding: 1rem;
            }

            .action-buttons {
                grid-template-columns: 1fr;
            }
        }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>

<body>
    @extends("layouts.app")

    @section("content")
    <div class="edit-container">
        <div class="edit-header">
            <div class="profile-avatar">
                {{ substr(auth()->user()->name, 0, 1) }}
            </div>
            <h1>Upravit profil</h1>
            
            @if(auth()->user()->hasVerifiedEmail())
                <div class="verification-status verified">
                    <i class="fas fa-check-circle"></i>
                    Email ověřen
                </div>
            @else
                <div class="verification-status unverified">
                    <i class="fas fa-exclamation-circle"></i>
                    Email není ověřen
                    <form action="{{ route('verification.send') }}" method="POST" style="display: inline; margin-left: 1rem;">
                        @csrf
                        <button type="submit" class="btn-link">Poslat ověřovací email znovu</button>
                    </form>
                </div>
            @endif
        </div>

        <div class="edit-form">
            <form method="POST" action="{{ route('profile.update') }}" id="profileForm">
                @csrf
                @method('PATCH')

                <div class="form-group">
                    <label for="name">Jméno</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" 
                           name="name" id="name" value="{{ old('name', $user->name) }}" required>
                    @error('name')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" 
                           name="email" id="email" value="{{ old('email', $user->email) }}" required>
                    @error('email')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>

                <div class="action-buttons">
                    <button type="submit" class="action-button">
                        <i class="fas fa-save"></i>
                        Uložit změny
                    </button>
                    <a href="{{ route('profile.index') }}" class="action-button secondary">
                        <i class="fas fa-times"></i>
                        Zrušit
                    </a>
                </div>
            </form>
        </div>
    </div>

    <script>
        document.getElementById('profileForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            Swal.fire({
                title: 'Ukládám změny...',
                allowOutsideClick: false,
                didOpen: () => {
                    Swal.showLoading();
                }
            });

            this.submit();
        });

        @if(session('error'))
            Swal.fire({
                icon: 'error',
                title: 'Chyba!',
                text: "{{ session('error') }}",
                confirmButtonText: 'OK'
            });
        @endif
    </script>
    @endsection
</body>

</html>