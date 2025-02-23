<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CarSeeder extends Seeder
{
    public function run()
    {
        DB::table('cars')->insert([
            ['name' => 'Acura NSX', 'description' => 'Japonský sportovní vůz', 'price_per_day' => 3500, 'availability' => true, 'image_url' => 'images/acura_nsx.jpg', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Honda Civic Type R', 'description' => 'Kompaktní hatchback', 'price_per_day' => 2500, 'availability' => true, 'image_url' => 'images/honda_civic_type_r.jpg', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Lexus RC F', 'description' => 'Luxusní sportovní kupé', 'price_per_day' => 4000, 'availability' => true, 'image_url' => 'images/lexus_rc_f.jpg', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Mazda MX5 Miata', 'description' => 'Ikonický roadster', 'price_per_day' => 2000, 'availability' => true, 'image_url' => 'images/mazda_mx5_miata.jpg', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Mazda RX7', 'description' => 'Legendární Wankel motor', 'price_per_day' => 3000, 'availability' => true, 'image_url' => 'images/mazda_rx7.jpg', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Mitsubishi Lancer', 'description' => 'Rally sedan', 'price_per_day' => 2800, 'availability' => true, 'image_url' => 'images/mitsubishi_lancer_evo_ix.jpg', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Nissan 370Z', 'description' => 'Moderní sportovní vůz', 'price_per_day' => 2700, 'availability' => true, 'image_url' => 'images/nissan_370z.jpg', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Nissan Silvia S15', 'description' => 'Driftovací klasika', 'price_per_day' => 2600, 'availability' => true, 'image_url' => 'images/nissan_silvia_s15.jpg', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Nissan Skyline GTR', 'description' => 'JDM legenda', 'price_per_day' => 5000, 'availability' => true, 'image_url' => 'images/nissan_skyline_gtr.jpg', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Subaru Impreza', 'description' => 'AWD rally legenda', 'price_per_day' => 2900, 'availability' => true, 'image_url' => 'images/subaru_impreza_wrx.jpg', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Toyota AE86', 'description' => 'Driftovací ikona', 'price_per_day' => 2400, 'availability' => true, 'image_url' => 'images/toyota_ae86.jpg', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Toyota MR2', 'description' => 'Motor uprostřed', 'price_per_day' => 2300, 'availability' => true, 'image_url' => 'images/toyota_mr2.jpg', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Toyota Supra', 'description' => 'Sportovní JDM legenda', 'price_per_day' => 4500, 'availability' => true, 'image_url' => 'images/toyota_supra.jpg', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
