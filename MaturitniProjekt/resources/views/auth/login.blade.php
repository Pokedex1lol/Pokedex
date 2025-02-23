<!DOCTYPE html>
<html lang="cs">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Přihlášení</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        body {
            background-color: #181818;
            color: #E9E9E9;
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .container {
            max-width: 400px;
            padding: 2rem;
            background-color: #1D1D1D;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);
        }

        .title {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 1.5rem;
            text-align: center;
            color: #E44146;
        }

        label {
            color: #E9E9E9;
            font-size: 14px;
            letter-spacing: 1px;
        }

        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-top: 0.5rem;
            margin-bottom: 1rem;
            background-color: #181818;
            border: 1px solid #3D3D3D;
            color: #E9E9E9;
            border-radius: 4px;
            transition: border-color 0.3s, box-shadow 0.3s;
        }

        /* Chybný vstup */
        input.error {
            border-color: #E44146;
            box-shadow: 0 0 5px #E44146;
            animation: shake 0.3s;
        }

        /* Animace třesení */
        @keyframes shake {
            0% {
                transform: translateX(0);
            }

            25% {
                transform: translateX(-5px);
            }

            50% {
                transform: translateX(5px);
            }

            75% {
                transform: translateX(-5px);
            }

            100% {
                transform: translateX(0);
            }
        }

        .btn {
            background-color: #E44146;
            color: #FFFFFF;
            padding: 10px;
            width: 100%;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-weight: bold;
        }

        .btn:hover {
            background-color: #d4353a;
        }

        .link {
            display: block;
            text-align: center;
            margin-top: 1rem;
            color: #E9E9E9;
            font-size: 14px;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2 class="title">Přihlášení</h2>
        @if (session('status'))
        <div class="mb-4 text-green-600">
            {{ session('status') }}
        </div>
        @endif
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <label for="email">Email</label>
            <input
                id="email"
                type="email"
                name="email"
                value="{{ old('email') }}"
                placeholder="{{ $errors->has('email') ? $errors->first('email') : 'Zadejte svůj email' }}"
                class="{{ $errors->has('email') ? 'error' : '' }}"
                required
                autofocus>

            <label for="password">Heslo</label>
            <input
                id="password"
                type="password"
                name="password"
                placeholder="{{ $errors->has('password') ? $errors->first('password') : 'Zadejte heslo' }}"
                class="{{ $errors->has('password') ? 'error' : '' }}"
                required>

            <button type="submit" class="btn">Přihlásit se</button>
        </form>
        <a href="{{ route('register') }}" class="link">Nemáte účet? Zaregistrujte se</a>
    </div>
</body>

</html>