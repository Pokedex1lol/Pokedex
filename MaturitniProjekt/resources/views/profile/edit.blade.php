<!DOCTYPE html>
<html lang="cs">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Můj profil</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
        /* Globální styl */
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #1D1D1D, #3A3A3A);
            color: #E9E9E9;
            margin: 0;
            padding: 0;
            animation: fadeIn 1.5s ease;
        }

        /* @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        } */


        /* Kontejner */
        .container {
            max-width: 700px;
            margin: 6rem auto 3rem;
            /* Posun dolů kvůli fixní navigaci */
            background-color: #2C2C2C;
            padding: 2rem;
            border-radius: 8px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.5);
            animation: slideIn 1s ease;
        }

        /* @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateX(-30px);
            }

            to {
                opacity: 1;
                transform: translateX(0);
            }
        } */

        h1 {
            text-align: center;
            margin-bottom: 1.5rem;
            color: #E44146;
            font-size: 2rem;
        }

        label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: bold;
        }

        input {
            width: 100%;
            padding: 0.75rem;
            margin-bottom: 1.5rem;
            border: 2px solid #444;
            background-color: #1D1D1D;
            color: rgb(24, 24, 24);
            border-radius: 5px;
            transition: border-color 0.3s ease;
        }

        input:focus {
            border-color: #E44146;
            outline: none;
        }

        .btn {
            display: inline-block;
            padding: 0.75rem 1.5rem;
            margin: 0.5rem;
            background-color: #E44146;
            color: #fff;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            font-weight: bold;
            transition: all 0.3s ease;
            cursor: pointer;
        }

        .btn:hover {
            background-color: #BF353A;
            transform: scale(1.05);
        }

        /* Animace tlačítek */
        .btn-container {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            margin-top: 1.5rem;
        }
    </style>
</head>

<body>
    @extends("layouts.app")

    @section("content")

        <!-- Hlavní obsah -->
        <div class="container">
            <h1>Můj profil</h1>
            <form method="POST" action="{{ route('profile.update') }}">
                @csrf
                @method('PATCH')

                <label for="name">Jméno</label>
                <input type="text" name="name" id="name" value="{{ old('name', $user->name) }}" required>

                <label for="email">Email</label>
                <input type="email" name="email" id="email" value="{{ old('email', $user->email) }}" required>

                <div class="btn-container">
                    <button type="submit" class="btn">Uložit změny</button>
                </div>
            </form>

            <!-- Navigační tlačítka -->
            <div class="btn-container">
                <a href="{{ route('dashboard') }}" class="btn">Zpět na dashboard</a>
                <a href="{{ route('landing') }}" class="btn">Zpět na hlavní stránku</a>
                <a href="{{ route('profile.index') }}" class="btn">Zpět na profil</a>
            </div>
        </div>
    @endsection
</body>

</html>