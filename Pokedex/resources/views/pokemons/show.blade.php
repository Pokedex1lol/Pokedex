@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="detail-header mb-4">
            <h1 class="pokemon-title">{{ $pokemon->name }}</h1>
            <div class="button-group">
                <a href="{{ route('pokemons.edit', $pokemon) }}" class="btn btn-warning edit-button">
                    <i class="fas fa-edit"></i> Upravit
                </a>
                <form action="{{ route('pokemons.destroy', $pokemon) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger delete-button" onclick="return confirm('Opravdu chcete smazat tohoto Pokemona?')">
                        <i class="fas fa-trash"></i> Smazat
                    </button>
                </form>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4">
                @if($pokemon->image_url)
                    <div class="image-card">
                        <img src="{{ $pokemon->image_url }}" class="pokemon-image" alt="{{ $pokemon->name }}">
                    </div>
                @endif
            </div>
            <div class="col-md-8">
                <div class="card info-card">
                    <div class="card-body">
                        <h5 class="card-title section-title">Základní informace</h5>
                        <div class="stats-grid">
                            <div class="stat-item">
                                <div class="stat-label">Typ</div>
                                <div class="stat-value">
                                    @foreach(explode('/', $pokemon->type) as $type)
                                        <span class="badge type-badge">{{ trim($type) }}</span>
                                    @endforeach
                                </div>
                            </div>
                            <div class="stat-item">
                                <div class="stat-label">Úroveň</div>
                                <div class="stat-value level-value">{{ $pokemon->level }}</div>
                            </div>
                            <div class="stat-item">
                                <div class="stat-label">HP</div>
                                <div class="stat-value hp-value">{{ $pokemon->hp }}</div>
                            </div>
                            <div class="stat-item">
                                <div class="stat-label">Útok</div>
                                <div class="stat-value attack-value">{{ $pokemon->attack }}</div>
                            </div>
                            <div class="stat-item">
                                <div class="stat-label">Obrana</div>
                                <div class="stat-value defense-value">{{ $pokemon->defense }}</div>
                            </div>
                            <div class="stat-item">
                                <div class="stat-label">Rychlost</div>
                                <div class="stat-value speed-value">{{ $pokemon->speed }}</div>
                            </div>
                        </div>
                    </div>
                </div>

                @if($pokemon->description)
                    <div class="card info-card mt-4">
                        <div class="card-body">
                            <h5 class="card-title section-title">Popis</h5>
                            <p class="description-text">{{ $pokemon->description }}</p>
                        </div>
                    </div>
                @endif
            </div>
        </div>

        <div class="mt-4">
            <a href="{{ route('pokemons.index') }}" class="btn btn-secondary back-button">
                <i class="fas fa-arrow-left"></i> Zpět na seznam
            </a>
        </div>
    </div>

    <style>
        @import url('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css');

        .detail-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1rem 0;
            border-bottom: 2px solid #eee;
        }

        .pokemon-title {
            color: #2c3e50;
            font-weight: bold;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.1);
            margin: 0;
        }

        .button-group {
            display: flex;
            gap: 1rem;
        }

        .edit-button, .delete-button {
            padding: 0.8rem 1.5rem;
            border: none;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .edit-button {
            background: linear-gradient(45deg, #f1c40f, #f39c12);
        }

        .delete-button {
            background: linear-gradient(45deg, #e74c3c, #c0392b);
        }

        .edit-button:hover, .delete-button:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0,0,0,0.2);
        }

        .image-card {
            background: white;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            transition: transform 0.3s ease;
            margin-bottom: 2rem;
        }

        .image-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 6px 12px rgba(0,0,0,0.15);
        }

        .pokemon-image {
            width: 100%;
            height: 300px;
            object-fit: contain;
            padding: 1rem;
            background: #f8f9fa;
            transition: transform 0.3s ease;
        }

        .pokemon-image:hover {
            transform: scale(1.05);
        }

        .info-card {
            background: white;
            border-radius: 15px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            transition: transform 0.3s ease;
            border: none;
            margin-bottom: 2rem;
        }

        .info-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 6px 12px rgba(0,0,0,0.15);
        }

        .section-title {
            color: #2c3e50;
            font-weight: bold;
            margin-bottom: 1.5rem;
            padding-bottom: 0.5rem;
            border-bottom: 2px solid #eee;
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
            gap: 1.5rem;
        }

        .stat-item {
            text-align: center;
            padding: 1rem;
            background: #f8f9fa;
            border-radius: 10px;
            transition: transform 0.3s ease;
        }

        .stat-item:hover {
            transform: translateY(-3px);
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }

        .stat-label {
            font-weight: 600;
            color: #7f8c8d;
            margin-bottom: 0.5rem;
        }

        .stat-value {
            font-size: 1.25rem;
            font-weight: bold;
            color: #2c3e50;
        }

        .type-badge {
            background: linear-gradient(45deg, #4CAF50, #45a049);
            color: white;
            font-size: 0.9em;
            padding: 0.4em 0.8em;
            border-radius: 20px;
            margin: 0.2em;
            display: inline-block;
            transition: all 0.3s ease;
        }

        .type-badge:hover {
            transform: scale(1.1);
        }

        .description-text {
            font-size: 1.1rem;
            line-height: 1.6;
            color: #2c3e50;
        }

        .back-button {
            background: linear-gradient(45deg, #95a5a6, #7f8c8d);
            border: none;
            padding: 0.8rem 1.5rem;
            color: white;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .back-button:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(127,140,141,0.3);
        }

        .hp-value { color: #e74c3c; }
        .attack-value { color: #e67e22; }
        .defense-value { color: #3498db; }
        .speed-value { color: #2ecc71; }
        .level-value { color: #9b59b6; }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .info-card {
            animation: fadeIn 0.5s ease-out forwards;
        }
    </style>
@endsection 