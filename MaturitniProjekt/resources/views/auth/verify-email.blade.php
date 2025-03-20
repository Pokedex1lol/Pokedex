<!DOCTYPE html>
<html lang="cs">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ověření emailu</title>
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
            margin-bottom: 1rem;
            text-align: center;
            color: #E44146;
        }

        .subtitle {
            text-align: center;
            margin-bottom: 1.5rem;
            color: #E9E9E9;
            font-size: 14px;
        }

        .message {
            background-color: #2D2D2D;
            padding: 1rem;
            border-radius: 4px;
            margin-bottom: 1.5rem;
            font-size: 14px;
            line-height: 1.5;
        }

        .success-message {
            background-color: #1E3A2B;
            color: #4ADE80;
            padding: 1rem;
            border-radius: 4px;
            margin-bottom: 1.5rem;
            font-size: 14px;
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
            margin-bottom: 1rem;
            transition: background-color 0.3s;
        }

        .btn:hover {
            background-color: #d4353a;
        }

        .logout-btn {
            background: none;
            border: none;
            color: #E9E9E9;
            font-size: 14px;
            cursor: pointer;
            text-decoration: underline;
            padding: 0;
            width: auto;
            transition: color 0.3s;
        }

        .logout-btn:hover {
            color: #E44146;
        }

        .text-center {
            text-align: center;
        }

        .dashboard-link {
            display: block;
            text-align: center;
            margin-top: 1rem;
            color: #E9E9E9;
            text-decoration: none;
            font-size: 14px;
        }

        .dashboard-link:hover {
            color: #E44146;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2 class="title">Ověření emailové adresy</h2>
        <p class="subtitle">Děkujeme za registraci!</p>

        @if (session('message'))
            <div class="success-message">
                {{ session('message') }}
            </div>
        @endif

        @if (session('status') == 'verification-link-sent')
            <div class="success-message">
                Nový ověřovací odkaz byl odeslán na vaši emailovou adresu.
            </div>
        @endif

        <div class="message">
            Než budete moci pokračovat, musíte ověřit svou emailovou adresu kliknutím na odkaz, který jsme vám právě poslali.
            Pokud jste email neobdrželi, rádi vám pošleme další.
        </div>

        <form method="POST" action="{{ route('verification.send') }}">
            @csrf
            <button type="submit" class="btn">
                Odeslat ověřovací email znovu
            </button>
        </form>

        <div class="text-center">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="logout-btn">
                    Odhlásit se
                </button>
            </form>
        </div>

        <a href="{{ route('dashboard') }}" class="dashboard-link">
            Zpět na hlavní stránku
        </a>
    </div>
</body>

</html>
