<!DOCTYPE html>
<html lang="cs">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Přidat Auto</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
        .container {
            max-width: 800px;
            margin: 2rem auto;
            padding: 2rem;
        }

        .form-group {
            margin-bottom: 1rem;
        }

        .form-control {
            width: 100%;
            padding: 0.5rem;
            margin-top: 0.25rem;
        }

        .text-danger {
            color: red;
            font-size: 0.875rem;
        }

        .btn {
            padding: 0.5rem 1rem;
            margin-right: 0.5rem;
        }

        .btn-success {
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .btn-secondary {
            background-color: #6c757d;
            color: white;
            border: none;
            border-radius: 4px;
            text-decoration: none;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Přidat Auto</h1>

        @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
        @endif

        <form action="{{ route('admin.cars.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="name">Název:</label>
                <input type="text" id="name" name="name" class="form-control" value="{{ old('name') }}" required>
                @error('name')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="description">Popis:</label>
                <textarea id="description" name="description" class="form-control">{{ old('description') }}</textarea>
                @error('description')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="price_per_day">Cena za den:</label>
                <input type="number" id="price_per_day" name="price_per_day" class="form-control" value="{{ old('price_per_day') }}" required>
                @error('price_per_day')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="available">Dostupné:</label>
                <select id="available" name="availability" class="form-control">
                    <option value="1" {{ old('available') == '1' ? 'selected' : '' }}>Ano</option>
                    <option value="0" {{ old('available') == '0' ? 'selected' : '' }}>Ne</option>
                </select>
                @error('available')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="image">Obrázek:</label>
                <input type="file" id="image" name="image" class="form-control">
                @error('image')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-success">Přidat</button>
            <a href="{{ route('admin.cars') }}" class="btn btn-secondary">Zpět</a>
        </form>
    </div>
</body>

</html>