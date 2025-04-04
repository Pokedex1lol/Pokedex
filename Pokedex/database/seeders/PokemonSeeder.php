<?php

namespace Database\Seeders;

use App\Models\Pokemon;
use Illuminate\Database\Seeder;

class PokemonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $pokemons = [
            [
                'name' => 'Pikachu',
                'type' => 'Electric',
                'level' => 25,
                'hp' => 35,
                'attack' => 55,
                'defense' => 40,
                'speed' => 90,
                'image' => 'pikachu.png',
                'description' => 'Elektrický Pokémon, který dokáže generovat elektřinu ve svých tvářích.'
            ],
            [
                'name' => 'Charizard',
                'type' => 'Fire/Flying',
                'level' => 36,
                'hp' => 78,
                'attack' => 84,
                'defense' => 78,
                'speed' => 100,
                'image' => 'charizard.png',
                'description' => 'Ohnivý drak, který chrlí tak horký plamen, že roztaví i balvany.'
            ],
            [
                'name' => 'Bulbasaur',
                'type' => 'Grass/Poison',
                'level' => 15,
                'hp' => 45,
                'attack' => 49,
                'defense' => 49,
                'speed' => 45,
                'image' => 'bulbasaur.png',
                'description' => 'Rostlinný Pokémon s cibulkou na zádech, která roste společně s ním.'
            ],
            [
                'name' => 'Squirtle',
                'type' => 'Water',
                'level' => 18,
                'hp' => 44,
                'attack' => 48,
                'defense' => 65,
                'speed' => 43,
                'image' => 'squirtle.png',
                'description' => 'Vodní želva, která stříká vodu pod vysokým tlakem.'
            ],
            [
                'name' => 'Mewtwo',
                'type' => 'Psychic',
                'level' => 70,
                'hp' => 106,
                'attack' => 110,
                'defense' => 90,
                'speed' => 130,
                'image' => 'mewtwo.png',
                'description' => 'Geneticky upravený Pokémon s nesmírnou psychickou silou.'
            ],
            [
                'name' => 'Gengar',
                'type' => 'Ghost/Poison',
                'level' => 40,
                'hp' => 60,
                'attack' => 65,
                'defense' => 60,
                'speed' => 110,
                'image' => 'gengar.png',
                'description' => 'Stínový Pokémon, který se živí nočními můrami.'
            ],
            [
                'name' => 'Dragonite',
                'type' => 'Dragon/Flying',
                'level' => 55,
                'hp' => 91,
                'attack' => 134,
                'defense' => 95,
                'speed' => 80,
                'image' => 'dragonite.png',
                'description' => 'Dračí Pokémon známý svou laskavou povahou a obrovskou silou.'
            ]
        ];

        // Vyčistíme kolekci před seedováním
        Pokemon::query()->delete();

        foreach ($pokemons as $pokemon) {
            Pokemon::create($pokemon);
        }
    }
}
