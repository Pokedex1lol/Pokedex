<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CarSeeder extends Seeder
{
    public function run()
    {
        DB::table('cars')->insert([
            [
                'name' => 'Acura NSX',
                'description' => 'Japonský sportovní vůz',
                'price_per_day' => 3500,
                'availability' => true,
                'image_url' => 'images/acura_nsx.jpg',
                'power' => 537, // Nový sloupec pro výkon
                'engine' => '3.5L V6 Twin-Turbo',
                'year' => 2021,
                'transmission' => '7-stupňová dvouspojková',
                'fuel_consumption' => 11.2, // spotřeba v litrech na 100 km
                'seats' => 2,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Honda Civic Type R',
                'description' => 'Kompaktní hatchback',
                'price_per_day' => 2500,
                'availability' => true,
                'image_url' => 'images/honda_civic_type_r.jpg',
                'power' => 306, // Nový sloupec pro výkon
                'engine' => '2.0L I4 Turbo',
                'year' => 2020,
                'transmission' => '6-stupňová manuální',
                'fuel_consumption' => 7.9,
                'seats' => 4,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Lexus RC F',
                'description' => 'Luxusní sportovní kupé',
                'price_per_day' => 4000,
                'availability' => true,
                'image_url' => 'images/lexus_rc_f.jpg',
                'power' => 472, // Nový sloupec pro výkon
                'engine' => '5.0L V8',
                'year' => 2021,
                'transmission' => '8-stupňová automatická',
                'fuel_consumption' => 12.5,
                'seats' => 4,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Mazda MX5 Miata',
                'description' => 'Ikonický roadster',
                'price_per_day' => 2000,
                'availability' => true,
                'image_url' => 'images/mazda_mx5_miata.jpg',
                'power' => 181, // Nový sloupec pro výkon
                'engine' => '2.0L I4',
                'year' => 2021,
                'transmission' => '6-stupňová manuální',
                'fuel_consumption' => 8.5,
                'seats' => 2,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Mazda RX7',
                'description' => 'Legendární Wankel motor',
                'price_per_day' => 3000,
                'availability' => true,
                'image_url' => 'images/mazda_rx7.jpg',
                'power' => 280, // Nový sloupec pro výkon
                'engine' => '1.3L Wankel',
                'year' => 1992,
                'transmission' => '5-stupňová manuální',
                'fuel_consumption' => 14.0,
                'seats' => 2,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Mitsubishi Lancer',
                'description' => 'Rally sedan',
                'price_per_day' => 2800,
                'availability' => true,
                'image_url' => 'images/mitsubishi_lancer_evo_ix.jpg',
                'power' => 280, // Nový sloupec pro výkon
                'engine' => '2.0L I4 Turbo',
                'year' => 2008,
                'transmission' => '5-stupňová manuální',
                'fuel_consumption' => 9.5,
                'seats' => 5,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Nissan 370Z',
                'description' => 'Moderní sportovní vůz',
                'price_per_day' => 2700,
                'availability' => true,
                'image_url' => 'images/nissan_370z.jpg',
                'power' => 332, // Nový sloupec pro výkon
                'engine' => '3.7L V6',
                'year' => 2015,
                'transmission' => '6-stupňová manuální',
                'fuel_consumption' => 9.2,
                'seats' => 2,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Nissan Silvia S15',
                'description' => 'Driftovací klasika',
                'price_per_day' => 2600,
                'availability' => true,
                'image_url' => 'images/nissan_silvia_s15.jpg',
                'power' => 250, // Nový sloupec pro výkon
                'engine' => '2.0L I4 Turbo',
                'year' => 2002,
                'transmission' => '5-stupňová manuální',
                'fuel_consumption' => 10.0,
                'seats' => 4,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Nissan Skyline GTR',
                'description' => 'JDM legenda',
                'price_per_day' => 5000,
                'availability' => true,
                'image_url' => 'images/nissan_skyline_gtr.jpg',
                'power' => 280, // Nový sloupec pro výkon
                'engine' => '2.6L I6 Twin-Turbo',
                'year' => 1999,
                'transmission' => '6-stupňová manuální',
                'fuel_consumption' => 12.0,
                'seats' => 4,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Subaru Impreza',
                'description' => 'AWD rally legenda',
                'price_per_day' => 2900,
                'availability' => true,
                'image_url' => 'images/subaru_impreza_wrx.jpg',
                'power' => 300, // Nový sloupec pro výkon
                'engine' => '2.5L I4 Turbo',
                'year' => 2015,
                'transmission' => '6-stupňová manuální',
                'fuel_consumption' => 11.0,
                'seats' => 5,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Toyota AE86',
                'description' => 'Driftovací ikona',
                'price_per_day' => 2400,
                'availability' => true,
                'image_url' => 'images/toyota_ae86.jpg',
                'power' => 130, // Nový sloupec pro výkon
                'engine' => '1.6L I4',
                'year' => 1985,
                'transmission' => '5-stupňová manuální',
                'fuel_consumption' => 7.5,
                'seats' => 4,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Toyota MR2',
                'description' => 'Motor uprostřed',
                'price_per_day' => 2300,
                'availability' => true,
                'image_url' => 'images/toyota_mr2.jpg',
                'power' => 140, // Nový sloupec pro výkon
                'engine' => '1.6L I4',
                'year' => 1990,
                'transmission' => '5-stupňová manuální',
                'fuel_consumption' => 8.0,
                'seats' => 2,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Toyota Supra',
                'description' => 'Sportovní JDM legenda',
                'price_per_day' => 4500,
                'availability' => true,
                'image_url' => 'images/toyota_supra.jpg',
                'power' => 330, // Nový sloupec pro výkon
                'engine' => '3.0L I6 Turbo',
                'year' => 1998,
                'transmission' => '6-stupňová manuální',
                'fuel_consumption' => 12.3,
                'seats' => 4,
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}
