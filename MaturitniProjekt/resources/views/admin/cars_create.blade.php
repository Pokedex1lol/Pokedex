<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Přidat Auto</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="container">
        <h1>Přidat Auto</h1>
        
        <form action="{{ route('admin.cars.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            
            <div class="form-group">
                <label for="name">Název:</label>
                <input type="text" id="name" name="name" class="form-control" required>
            </div>
            
            <div class="form-group">
                <label for="description">Popis:</label>
                <textarea id="description" name="description" class="form-control" required></textarea>
            </div>
            
            <div class="form-group">
                <label for="price_per_day">Cena za den:</label>
                <input type="number" id="price_per_day" name="price_per_day" class="form-control" required>
            </div>
            
            <div class="form-group">
                <label for="available">Dostupné:</label>
                <select id="available" name="available" class="form-control">
                    <option value="1">Ano</option>
                    <option value="0">Ne</option>
                </select>
            </div>
            
            <div class="form-group">
                <label for="image">Obrázek:</label>
                <input type="file" id="image" name="image" class="form-control" required>
            </div>
            
            <button type="submit" class="btn btn-success">Přidat</button>
            <a href="{{ route('admin.cars') }}" class="btn btn-secondary">Zpět</a>
        </form>
    </div>
</body>
</html>
