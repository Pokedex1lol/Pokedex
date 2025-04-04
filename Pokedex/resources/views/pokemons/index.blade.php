@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="pokemon-title">Seznam Pokemonů</h1>
            <a href="{{ route('pokemons.create') }}" class="btn btn-primary add-button">
                <i class="fas fa-plus"></i> Přidat nového Pokemona
            </a>
        </div>

        <!-- Filtrování -->
        <div class="card mb-4 filter-card">
            <div class="card-body">
                <form action="{{ route('pokemons.index') }}" method="GET" class="row g-3">
                    <div class="col-md-3">
                        <label for="name" class="form-label">Jméno</label>
                        <input type="text" class="form-control search-input" id="name" name="name" value="{{ request('name') }}">
                    </div>
                    
                    <div class="col-md-3">
                        <label for="type" class="form-label">Typ</label>
                        <select class="form-select" id="type" name="type">
                            <option value="">Všechny typy</option>
                            @foreach($types as $type)
                                <option value="{{ $type }}" {{ $selectedType == $type ? 'selected' : '' }}>
                                    {{ $type }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-2">
                        <label for="min_level" class="form-label">Min. úroveň</label>
                        <input type="number" class="form-control" id="min_level" name="min_level" 
                               value="{{ request('min_level') }}" min="1">
                    </div>

                    <div class="col-md-2">
                        <label for="max_level" class="form-label">Max. úroveň</label>
                        <input type="number" class="form-control" id="max_level" name="max_level" 
                               value="{{ request('max_level') }}" min="1">
                    </div>

                    <div class="col-md-1">
                        <label for="sort" class="form-label">Řadit dle</label>
                        <select class="form-select" id="sort" name="sort">
                            <option value="name" {{ request('sort', 'name') == 'name' ? 'selected' : '' }}>Jména</option>
                            <option value="type" {{ request('sort') == 'type' ? 'selected' : '' }}>Typu</option>
                            <option value="level" {{ request('sort') == 'level' ? 'selected' : '' }}>Úrovně</option>
                            <option value="hp" {{ request('sort') == 'hp' ? 'selected' : '' }}>HP</option>
                            <option value="attack" {{ request('sort') == 'attack' ? 'selected' : '' }}>Útoku</option>
                            <option value="defense" {{ request('sort') == 'defense' ? 'selected' : '' }}>Obrany</option>
                            <option value="speed" {{ request('sort') == 'speed' ? 'selected' : '' }}>Rychlosti</option>
                        </select>
                    </div>

                    <div class="col-md-1">
                        <label for="direction" class="form-label">Směr</label>
                        <select class="form-select" id="direction" name="direction">
                            <option value="asc" {{ request('direction', 'asc') == 'asc' ? 'selected' : '' }}>Vzestupně</option>
                            <option value="desc" {{ request('direction') == 'desc' ? 'selected' : '' }}>Sestupně</option>
                        </select>
                    </div>

                    <div class="col-12">
                        <button type="submit" class="btn btn-primary filter-button">
                            <i class="fas fa-filter"></i> Filtrovat
                        </button>
                        <a href="{{ route('pokemons.index') }}" class="btn btn-secondary reset-button">
                            <i class="fas fa-undo"></i> Resetovat
                        </a>
                    </div>
                </form>
            </div>
        </div>

        <div class="row">
            @foreach($pokemons as $pokemon)
                <div class="col-md-4 mb-4">
                    <div class="card pokemon-card h-100">
                        @if($pokemon->image)
                            <img src="{{ $pokemon->image_url }}" class="card-img-top pokemon-image" alt="{{ $pokemon->name }}">
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">{{ $pokemon->name }}</h5>
                            <p class="card-text">
                                <strong>Typ:</strong> 
                                @foreach(explode('/', $pokemon->type) as $type)
                                    <span class="badge type-badge me-1">{{ trim($type) }}</span>
                                @endforeach
                                <br>
                                <strong>Úroveň:</strong> {{ $pokemon->level }}<br>
                                <strong>HP:</strong> {{ $pokemon->hp }}<br>
                                <strong>Útok:</strong> {{ $pokemon->attack }}<br>
                                <strong>Obrana:</strong> {{ $pokemon->defense }}<br>
                                <strong>Rychlost:</strong> {{ $pokemon->speed }}
                            </p>
                            <div class="d-flex justify-content-between mt-auto button-group">
                                <a href="{{ route('pokemons.show', $pokemon) }}" class="btn btn-info">
                                    <i class="fas fa-eye"></i> Detail
                                </a>
                                <a href="{{ route('pokemons.edit', $pokemon) }}" class="btn btn-warning">
                                    <i class="fas fa-edit"></i> Upravit
                                </a>
                                <form action="{{ route('pokemons.destroy', $pokemon) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Opravdu chcete smazat tohoto Pokemona?')">
                                        <i class="fas fa-trash"></i> Smazat
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <style>
        @import url('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css');

        .pokemon-title {
            color: #2c3e50;
            font-weight: bold;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.1);
        }

        .filter-card {
            background: #fff;
            border-radius: 15px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            transition: transform 0.3s ease;
        }

        .filter-card:hover {
            transform: translateY(-5px);
        }

        .pokemon-card {
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
            transition: all 0.3s ease;
            border: none;
        }

        .pokemon-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 8px 25px rgba(0,0,0,0.2);
        }

        .pokemon-image {
            height: 200px;
            object-fit: contain;
            padding: 1rem;
            background: #f8f9fa;
            transition: transform 0.3s ease;
        }

        .pokemon-image:hover {
            transform: scale(1.05);
        }

        .type-badge {
            background: linear-gradient(45deg, #4CAF50, #45a049);
            color: white;
            font-size: 0.9em;
            padding: 0.4em 0.8em;
            border-radius: 20px;
            transition: all 0.3s ease;
        }

        .type-badge:hover {
            transform: scale(1.1);
        }

        .btn {
            border-radius: 8px;
            transition: all 0.3s ease;
            font-weight: 500;
        }

        .btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }

        .add-button {
            background: linear-gradient(45deg, #2ecc71, #27ae60);
            border: none;
            padding: 0.8rem 1.5rem;
        }

        .filter-button {
            background: linear-gradient(45deg, #3498db, #2980b9);
            border: none;
        }

        .reset-button {
            background: linear-gradient(45deg, #95a5a6, #7f8c8d);
            border: none;
        }

        .search-input {
            border-radius: 8px;
            border: 2px solid #eee;
            transition: all 0.3s ease;
        }

        .search-input:focus {
            border-color: #3498db;
            box-shadow: 0 0 0 0.2rem rgba(52,152,219,0.25);
        }

        .form-select {
            border-radius: 8px;
            border: 2px solid #eee;
        }

        .button-group {
            gap: 0.5rem;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .pokemon-card {
            animation: fadeIn 0.5s ease-out forwards;
        }
    </style>
@endsection 