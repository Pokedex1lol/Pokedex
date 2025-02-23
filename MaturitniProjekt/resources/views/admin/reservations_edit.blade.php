<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upravit Rezervaci</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #1D1D1D, #3A3A3A);
            color: #E9E9E9;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 800px;
            margin: 6rem auto 3rem;
            background-color: #2C2C2C;
            padding: 2rem;
            border-radius: 8px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.5);
        }
        .btn {
            display: inline-block;
            padding: 0.5rem 1rem;
            background-color: #E44146;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
            transition: all 0.3s ease;
        }
        .btn:hover {
            background-color: #BF353A;
            transform: scale(1.05);
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="text-center">Upravit Rezervaci</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.reservations.update', $reservation->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="start_date">Datum od:</label>
                <input type="date" id="start_date" name="start_date" class="form-control" value="{{ $reservation->start_date }}" required>
            </div>

            <div class="form-group">
                <label for="end_date">Datum do:</label>
                <input type="date" id="end_date" name="end_date" class="form-control" value="{{ $reservation->end_date }}" required>
            </div>

            <button type="submit" class="btn">Uložit změny</button>
            <a href="{{ route('admin.reservations') }}" class="btn">Zpět</a>
        </form>
    </div>
</body>
</html>