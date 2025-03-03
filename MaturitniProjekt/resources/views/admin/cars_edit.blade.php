<!DOCTYPE html>
<html lang="cs">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upravit Auto</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body>
    <div class="container">
        <h1>Upravit Auto</h1>

        <form action="{{ route('admin.cars.update', $car->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="name">Název:</label>
                <input type="text" id="name" name="name" class="form-control" value="{{ $car->name }}" required>
            </div>

            <div class="form-group">
                <label for="description">Popis:</label>
                <textarea id="description" name="description" class="form-control"
                    required>{{ $car->description }}</textarea>
            </div>

            <div class="form-group">
                <label for="price_per_day">Cena za den:</label>
                <input type="number" id="price_per_day" name="price_per_day" class="form-control"
                    value="{{ $car->price_per_day }}" required>
            </div>

            <div class="form-group">
                <label for="available">Dostupné:</label>
                <select id="available" name="availability" class="form-control">
                    <option value="1" {{ $car->available ? 'selected' : '' }}>Ano</option>
                    <option value="0" {{ !$car->available ? 'selected' : '' }}>Ne</option>
                </select>
            </div>

            <div class="form-group">
                <label for="image">Obrázek:</label>
                <input type="file" id="image" name="image" class="form-control">
                @if ($car->image_url)
                <p>Aktuální obrázek:</p>
                <img src="{{ asset($car->image_url) }}" alt="Aktuální obrázek" style="max-width: 200px;">
                @endif
            </div>

            <button type="submit" class="btn btn-primary">Uložit změny</button>
            <a href="{{ route('admin.cars') }}" class="btn btn-secondary">Zpět</a>
        </form>
    </div>
</body>

</html>