<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zapomenuté heslo</title>
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
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .container {
            max-width: 400px;
            width: 90%;
            background-color: #2C2C2C;
            padding: 2rem;
            border-radius: 8px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.5);
        }

        h1 {
            text-align: center;
            color: #E44146;
            margin-bottom: 1.5rem;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        label {
            display: block;
            margin-bottom: 0.5rem;
            color: #E9E9E9;
        }

        input {
            width: 100%;
            padding: 0.75rem;
            border: 1px solid #444;
            border-radius: 4px;
            background-color: #1D1D1D;
            color: #E9E9E9;
            font-size: 1rem;
        }

        input:focus {
            outline: none;
            border-color: #E44146;
        }

        .btn {
            display: block;
            width: 100%;
            padding: 0.75rem;
            background-color: #E44146;
            color: white;
            border: none;
            border-radius: 4px;
            font-size: 1rem;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .btn:hover {
            background-color: #BF353A;
        }

        .back-link {
            display: block;
            text-align: center;
            margin-top: 1rem;
            color: #888;
            text-decoration: none;
        }

        .back-link:hover {
            color: #E44146;
        }

        .alert {
            padding: 1rem;
            margin-bottom: 1rem;
            border-radius: 4px;
            text-align: center;
        }

        .alert-success {
            background-color: rgba(40, 167, 69, 0.2);
            color: #28a745;
            border: 1px solid #28a745;
        }

        .alert-error {
            background-color: rgba(220, 53, 69, 0.2);
            color: #dc3545;
            border: 1px solid #dc3545;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Zapomenuté heslo</h1>

        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <div class="form-group">
                <label for="email">Email</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus>
                @error('email')
                    <div class="alert alert-error">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <button type="submit" class="btn">Odeslat odkaz pro reset hesla</button>
        </form>

        <a href="{{ route('login') }}" class="back-link">Zpět na přihlášení</a>
    </div>
</body>
</html>
