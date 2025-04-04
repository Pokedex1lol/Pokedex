@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="create-header">
            <h1 class="pokemon-title">Přidat nového Pokemona</h1>
        </div>

        <div class="card form-card">
            <div class="card-body">
                <form action="{{ route('pokemons.store') }}" method="POST" enctype="multipart/form-data" class="mt-4">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group mb-4">
                                <label for="name" class="form-label">Jméno</label>
                                <input type="text" class="form-control custom-input @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" required>
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group mb-4">
                                <label for="type" class="form-label">Typ</label>
                                <input type="text" class="form-control custom-input @error('type') is-invalid @enderror" id="type" name="type" value="{{ old('type') }}" required>
                                @error('type')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group mb-4">
                                <label for="level" class="form-label">Úroveň</label>
                                <input type="number" class="form-control custom-input @error('level') is-invalid @enderror" id="level" name="level" value="{{ old('level') }}" required min="1">
                                @error('level')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group mb-4">
                                <label for="hp" class="form-label">HP</label>
                                <input type="number" class="form-control custom-input @error('hp') is-invalid @enderror" id="hp" name="hp" value="{{ old('hp') }}" required min="1">
                                @error('hp')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group mb-4">
                                <label for="attack" class="form-label">Útok</label>
                                <input type="number" class="form-control custom-input @error('attack') is-invalid @enderror" id="attack" name="attack" value="{{ old('attack') }}" required min="1">
                                @error('attack')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group mb-4">
                                <label for="defense" class="form-label">Obrana</label>
                                <input type="number" class="form-control custom-input @error('defense') is-invalid @enderror" id="defense" name="defense" value="{{ old('defense') }}" required min="1">
                                @error('defense')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group mb-4">
                                <label for="speed" class="form-label">Rychlost</label>
                                <input type="number" class="form-control custom-input @error('speed') is-invalid @enderror" id="speed" name="speed" value="{{ old('speed') }}" required min="1">
                                @error('speed')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group mb-4">
                                <label for="image" class="form-label">Obrázek</label>
                                <input type="file" class="form-control custom-input @error('image') is-invalid @enderror" id="image" name="image" accept="image/*">
                                @error('image')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-group mb-4">
                                <label for="description" class="form-label">Popis</label>
                                <textarea class="form-control custom-input @error('description') is-invalid @enderror" id="description" name="description" rows="3">{{ old('description') }}</textarea>
                                @error('description')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="button-group">
                        <button type="submit" class="btn btn-primary create-button">
                            <i class="fas fa-plus-circle"></i> Přidat Pokemona
                        </button>
                        <a href="{{ route('pokemons.index') }}" class="btn btn-secondary back-button">
                            <i class="fas fa-arrow-left"></i> Zpět
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <style>
        @import url('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css');

        .create-header {
            margin-bottom: 2rem;
            padding: 1rem 0;
            border-bottom: 2px solid #eee;
        }

        .pokemon-title {
            color: #2c3e50;
            font-weight: bold;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.1);
        }

        .form-card {
            background: #fff;
            border-radius: 15px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            transition: transform 0.3s ease;
            border: none;
            margin-bottom: 2rem;
        }

        .form-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 6px 12px rgba(0,0,0,0.15);
        }

        .form-label {
            font-weight: 600;
            color: #2c3e50;
            margin-bottom: 0.5rem;
        }

        .custom-input {
            border-radius: 8px;
            border: 2px solid #eee;
            padding: 0.75rem;
            transition: all 0.3s ease;
        }

        .custom-input:focus {
            border-color: #3498db;
            box-shadow: 0 0 0 0.2rem rgba(52,152,219,0.25);
        }

        .button-group {
            display: flex;
            gap: 1rem;
            margin-top: 2rem;
        }

        .create-button {
            background: linear-gradient(45deg, #3498db, #2980b9);
            border: none;
            padding: 0.8rem 1.5rem;
            color: white;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .create-button:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(52,152,219,0.3);
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

        .invalid-feedback {
            font-size: 0.875rem;
            color: #e74c3c;
            margin-top: 0.25rem;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .form-card {
            animation: fadeIn 0.5s ease-out forwards;
        }
    </style>
@endsection 