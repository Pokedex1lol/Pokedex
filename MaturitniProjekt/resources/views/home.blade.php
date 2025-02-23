<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Půjčovna JDM - Přihlášení / Registrace</title>
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
            text-align: center;
            background-color: #1D1D1D;
            padding: 2rem;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);
        }
        .title {
            font-size: 36px;
            color: #E44146;
            margin-bottom: 20px;
        }
        .links a {
            color: #E9E9E9;
            font-size: 18px;
            margin: 0 10px;
            text-decoration: none;
        }
        .links a:hover {
            color: #E44146;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2 class="title">Vítejte v půjčovně JDM</h2>
        <div class="links">
            <a href="{{ route('login') }}">Přihlášení</a>
            <a href="{{ route('register') }}">Registrace</a>
        </div>
    </div>
</body>
</html>
