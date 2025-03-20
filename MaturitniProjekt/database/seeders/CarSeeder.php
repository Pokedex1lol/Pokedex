<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Car;

class CarSeeder extends Seeder
{
    public function run()
    {
        $cars = [
            [
                'name' => 'Acura NSX',
                'brand' => 'Acura',
                'description' => 'Acura NSX je ikona japonského sportovního inženýrství. Srdcem tohoto vozu je 3.5L V6 Twin-Turbo motor, který zajišťuje dechberoucí výkon 537 kW. Tento moderní supercar s špičkovým designem a precizními jízdními vlastnostmi je připraven na jakoukoli výzvu. Automatická převodovka a hybridní pohon dodávají vozu plynulost a efektivitu. Vůz je ideální volbou pro každého, kdo touží po rychlosti a eleganci.',
                'price_per_day' => 3500,
                'availability' => true,
                'image_url' => 'images/acura_nsx.jpg',
                'power' => '537 kW',
                'engine' => '3.5L V6 Twin-Turbo',
                'year' => 2021,
                'transmission' => '7-stupňová dvouspojková',
                'fuel_consumption' => '11.2 l/100km',
                'seats' => 2,

                // Rozšířené informace
                'color' => 'Thermal Orange Pearl',
                'mileage' => 15000,
                'origin_country' => 'Japonsko',
                'service_book' => true,

                // Další technické parametry
                'max_speed' => 307,
                'acceleration' => 2.9,
                'torque' => 645,
                'fuel_tank' => 59,

                // Výbava
                'safety_features' => json_encode(['ABS', 'ESP', 'Traction Control', 'Lane Departure Warning', 'Forward Collision Warning']),
                'airbags' => 8,
                'air_conditioning' => 'Dvouzónová automatická klimatizace',
                'parking_camera' => true,
                'heated_seats' => true,

                // Podmínky pronájmu
                'deposit' => 150000,
                'min_driver_age' => 27,
                'min_license_length' => 7,
                'mileage_limit' => 150
            ],
            [
                'name' => 'Honda Civic Type R',
                'brand' => 'Honda',
                'description' => 'Honda Civic Type R je jeden z nejlepších kompaktních hatchbacků, který spojuje sportovní výkon s praktičností. Je vybavena 2.0L I4 Turbo motorem, který poskytuje výkon 306 kW a dynamiku, kterou nelze přehlédnout. S jeho výkonným podvozkem a ostrým řízením je Civic Type R perfektním vozem pro ty, kteří milují adrenalinové jízdy, a to i v městském provozu. Tento model je ideální pro každého, kdo chce zažít rychlost bez kompromisů.',
                'price_per_day' => 2500,
                'availability' => true,
                'image_url' => 'images/honda_civic_type_r.jpg',
                'power' => '306 kW',
                'engine' => '2.0L I4 Turbo',
                'year' => 2020,
                'transmission' => '6-stupňová manuální',
                'fuel_consumption' => '7.9 l/100km',
                'seats' => 4,

                // Rozšířené informace
                'color' => 'Championship White',
                'mileage' => 25000,
                'origin_country' => 'Japonsko',
                'service_book' => true,

                // Další technické parametry
                'max_speed' => 272,
                'acceleration' => 5.7,
                'torque' => 400,
                'fuel_tank' => 47,

                // Výbava
                'safety_features' => json_encode(['ABS', 'ESP', 'VSA', 'Agile Handling Assist', 'Limited Slip Differential']),
                'airbags' => 6,
                'air_conditioning' => 'Automatická klimatizace',
                'parking_camera' => true,
                'heated_seats' => true,

                // Podmínky pronájmu
                'deposit' => 70000,
                'min_driver_age' => 23,
                'min_license_length' => 3,
                'mileage_limit' => 200
            ],
            [
                'name' => 'Lexus RC F',
                'brand' => 'Lexus',
                'description' => 'Lexus RC F je luxusní sportovní kupé, které nabízí nekompromisní výkon a špičkový komfort. Jeho 5.0L V8 motor s výkonem 472 kW poskytuje sílu, kterou si můžete užívat na silnici, zatímco elegantní design a vysoce kvalitní materiály uvnitř vozu zajišťují pocit luxusu. S vysoce kvalitním audio systémem a pokročilými technologiemi je tento vůz ideální volbou pro ty, kteří hledají výkon a pohodlí v jednom balíčku.',
                'price_per_day' => 4000,
                'availability' => true,
                'image_url' => 'images/lexus_rc_f.jpg',
                'power' => '472 kW',
                'engine' => '5.0L V8',
                'year' => 2021,
                'transmission' => '8-stupňová automatická',
                'fuel_consumption' => '12.5 l/100km',
                'seats' => 4,

                // Rozšířené informace
                'color' => 'Ultrasonic Blue Mica',
                'mileage' => 18000,
                'origin_country' => 'Japonsko',
                'service_book' => true,

                // Další technické parametry
                'max_speed' => 270,
                'acceleration' => 4.2,
                'torque' => 530,
                'fuel_tank' => 66,

                // Výbava
                'safety_features' => json_encode(['ABS', 'ESP', 'VDIM', 'Pre-Collision System', 'Lane Departure Alert']),
                'airbags' => 8,
                'air_conditioning' => 'Dvouzónová automatická klimatizace',
                'parking_camera' => true,
                'heated_seats' => true,

                // Podmínky pronájmu
                'deposit' => 100000,
                'min_driver_age' => 25,
                'min_license_length' => 5,
                'mileage_limit' => 200
            ],
            [
                'name' => 'Mazda MX5 Miata',
                'brand' => 'Mazda',
                'description' => 'Mazda MX5 Miata je kultovní roadster, který byl navržen pro ty, kdo milují čistou a vzrušující jízdu. Jeho 2.0L I4 motor poskytuje dostatečný výkon pro zábavné řízení, zatímco nízká hmotnost a perfektní vyvážení vozu přinášejí nezapomenutelné zážitky na každé křivce. MX5 Miata je synonymem pro zábavu za volantem a s tímto vozem se nikdy nebudete nudit.',
                'price_per_day' => 2000,
                'availability' => true,
                'image_url' => 'images/mazda_mx5_miata.jpg',
                'power' => '181 kW',
                'engine' => '2.0L I4',
                'year' => 2021,
                'transmission' => '6-stupňová manuální',
                'fuel_consumption' => '8.5 l/100km',
                'seats' => 2,

                // Rozšířené informace
                'color' => 'Soul Red Crystal',
                'mileage' => 12000,
                'origin_country' => 'Japonsko',
                'service_book' => true,

                // Další technické parametry
                'max_speed' => 219,
                'acceleration' => 6.5,
                'torque' => 205,
                'fuel_tank' => 45,

                // Výbava
                'safety_features' => json_encode(['ABS', 'DSC', 'Traction Control', 'Lane Departure Warning']),
                'airbags' => 4,
                'air_conditioning' => 'Manuální klimatizace',
                'parking_camera' => false,
                'heated_seats' => true,

                // Podmínky pronájmu
                'deposit' => 60000,
                'min_driver_age' => 21,
                'min_license_length' => 2,
                'mileage_limit' => 200
            ],
            [
                'name' => 'Mazda RX7',
                'brand' => 'Mazda',
                'description' => 'Mazda RX7 je legendární vůz s unikátním Wankelovým motorem, který nabízí skvělé jízdní vlastnosti a nenapodobitelný zvuk. Tento sportovní vůz s výkonem 280 kW je příkladem japonského inženýrství. Jeho kompaktní rozměry a perfektní rozložení hmotnosti činí RX7 velmi agilním vozem, který je vhodný pro všechny nadšence motoristického sportu. Pokud hledáte automobil s unikátním charakterem, RX7 je pro vás ta pravá volba.',
                'price_per_day' => 3000,
                'availability' => true,
                'image_url' => 'images/mazda_rx7.jpg',
                'power' => '280 kW',
                'engine' => '1.3L Wankel',
                'year' => 1992,
                'transmission' => '5-stupňová manuální',
                'fuel_consumption' => '14.0 l/100km',
                'seats' => 2,

                // Rozšířené informace
                'color' => 'Competition Yellow Mica',
                'mileage' => 89000,
                'origin_country' => 'Japonsko',
                'service_book' => true,

                // Další technické parametry
                'max_speed' => 250,
                'acceleration' => 5.3,
                'torque' => 296,
                'fuel_tank' => 76,

                // Výbava
                'safety_features' => json_encode(['ABS', 'Limited Slip Differential']),
                'airbags' => 2,
                'air_conditioning' => 'Manuální klimatizace',
                'parking_camera' => false,
                'heated_seats' => false,

                // Podmínky pronájmu
                'deposit' => 85000,
                'min_driver_age' => 25,
                'min_license_length' => 5,
                'mileage_limit' => 200
            ],
            [
                'name' => 'Mitsubishi Lancer',
                'brand' => 'Mitsubishi',
                'description' => 'Mitsubishi Lancer je výkonný rally sedan, který nabízí skvělou kombinaci výkonu, stability a ovladatelnosti. Jeho 2.0L I4 Turbo motor poskytuje 280 kW a přináší vynikající zrychlení. Lancer je známý svou odolností a schopností zvládat i náročné podmínky. Pokud máte rádi jízdu na limitu, Lancer je ideální auto pro vás.',
                'price_per_day' => 2800,
                'availability' => true,
                'image_url' => 'images/mitsubishi_lancer_evo_ix.jpg',
                'power' => '280 kW',
                'engine' => '2.0L I4 Turbo',
                'year' => 2008,
                'transmission' => '5-stupňová manuální',
                'fuel_consumption' => '9.5 l/100km',
                'seats' => 5,

                // Rozšířené informace
                'color' => 'Phantom Black Pearl',
                'mileage' => 95000,
                'origin_country' => 'Japonsko',
                'service_book' => true,

                // Další technické parametry
                'max_speed' => 250,
                'acceleration' => 4.7,
                'torque' => 400,
                'fuel_tank' => 55,

                // Výbava
                'safety_features' => json_encode(['ABS', 'Active Yaw Control', 'Super All Wheel Control']),
                'airbags' => 6,
                'air_conditioning' => 'Automatická klimatizace',
                'parking_camera' => false,
                'heated_seats' => true,

                // Podmínky pronájmu
                'deposit' => 80000,
                'min_driver_age' => 25,
                'min_license_length' => 5,
                'mileage_limit' => 200
            ],
            [
                'name' => 'Nissan 370Z',
                'brand' => 'Nissan',
                'description' => 'Nissan 370Z je moderní sportovní vůz, který nabídne zážitky z jízdy a výborný výkon. S motorem o objemu 3.7L V6 a výkonem 332 kW dokáže tento automobil dosahovat vysokých rychlostí, ať už na silnici nebo na okruhu. Jeho robustní podvozek a agresivní design jsou neodolatelné pro každého, kdo hledá sportovní vůz, který nezklame.',
                'price_per_day' => 2700,
                'availability' => true,
                'image_url' => 'images/nissan_370z.jpg',
                'power' => '332 kW',
                'engine' => '3.7L V6',
                'year' => 2015,
                'transmission' => '6-stupňová manuální',
                'fuel_consumption' => '9.2 l/100km',
                'seats' => 2,

                // Rozšířené informace
                'color' => 'Magnetic Black',
                'mileage' => 45000,
                'origin_country' => 'Japonsko',
                'service_book' => true,

                // Další technické parametry
                'max_speed' => 250,
                'acceleration' => 5.3,
                'torque' => 363,
                'fuel_tank' => 72,

                // Výbava
                'safety_features' => json_encode(['ABS', 'VDC', 'Traction Control', 'Limited Slip Differential']),
                'airbags' => 6,
                'air_conditioning' => 'Automatická klimatizace',
                'parking_camera' => true,
                'heated_seats' => true,

                // Podmínky pronájmu
                'deposit' => 75000,
                'min_driver_age' => 23,
                'min_license_length' => 4,
                'mileage_limit' => 200
            ],
            [
                'name' => 'Nissan Silvia S15',
                'brand' => 'Nissan',
                'description' => 'Nissan Silvia S15 je drifterská ikona, která byla navržena pro driftování a motorsport. Její 2.0L I4 Turbo motor s výkonem 250 kW nabízí dostatečnou sílu pro driftování, zatímco precizní ovládání a nízká hmotnost poskytují maximální agilitu. Pokud máte rádi driftování, Silvia S15 je autem, které musíte mít.',
                'price_per_day' => 2600,
                'availability' => true,
                'image_url' => 'images/nissan_silvia_s15.jpg',
                'power' => '250 kW',
                'engine' => '2.0L I4 Turbo',
                'year' => 2002,
                'transmission' => '5-stupňová manuální',
                'fuel_consumption' => '10.0 l/100km',
                'seats' => 4,

                // Rozšířené informace
                'color' => 'Silica Breath',
                'mileage' => 120000,
                'origin_country' => 'Japonsko',
                'service_book' => true,

                // Další technické parametry
                'max_speed' => 240,
                'acceleration' => 6.2,
                'torque' => 275,
                'fuel_tank' => 65,

                // Výbava
                'safety_features' => json_encode(['ABS', 'Limited Slip Differential']),
                'airbags' => 2,
                'air_conditioning' => 'Manuální klimatizace',
                'parking_camera' => false,
                'heated_seats' => false,

                // Podmínky pronájmu
                'deposit' => 70000,
                'min_driver_age' => 25,
                'min_license_length' => 5,
                'mileage_limit' => 200
            ],
            [
                'name' => 'Nissan Skyline GTR',
                'brand' => 'Nissan',
                'description' => 'Nissan Skyline GTR je japonská legenda, která se stala ikonou v motorsportu a mezi nadšenci rychlých aut. S jeho 2.6L I6 Twin-Turbo motorem a výkonem 280 kW nabízí tento vůz vynikající akceleraci a maximální stabilitu při vysokých rychlostech. Skyline GTR je známý pro svou technologii ATTESA (pohon všech kol) a aktivní diferenciál, což zajišťuje perfektní trakci. Pokud hledáte vůz, který zanechá stopy na silnici, Skyline GTR je pro vás tou správnou volbou.',
                'price_per_day' => 5000,
                'availability' => true,
                'image_url' => 'images/nissan_skyline_gtr.jpg',
                'power' => '280 kW',
                'engine' => '2.6L I6 Twin-Turbo',
                'year' => 1999,
                'transmission' => '6-stupňová manuální',
                'fuel_consumption' => '12.0 l/100km',
                'seats' => 4,

                // Rozšířené informace
                'color' => 'Bayside Blue',
                'mileage' => 85000,
                'origin_country' => 'Japonsko',
                'service_book' => true,

                // Další technické parametry
                'max_speed' => 250,
                'acceleration' => 4.9,
                'torque' => 392,
                'fuel_tank' => 65,

                // Výbava
                'safety_features' => json_encode(['ABS', 'ATTESA E-TS AWD', 'Multimode HICAS']),
                'airbags' => 4,
                'air_conditioning' => 'Automatická klimatizace',
                'parking_camera' => false,
                'heated_seats' => true,

                // Podmínky pronájmu
                'deposit' => 100000,
                'min_driver_age' => 25,
                'min_license_length' => 5,
                'mileage_limit' => 200
            ],
            [
                'name' => 'Subaru Impreza',
                'brand' => 'Subaru',
                'description' => 'Subaru Impreza WRX je rally legenda, která získala popularitu díky své neuvěřitelné ovladatelnosti a výkonu. S 2.5L I4 Turbo motorem o výkonu 300 kW je tento vůz připraven na jakoukoli výzvu. Díky trvalému pohonu všech kol (AWD) je Impreza ideální pro náročné podmínky a zimní jízdu. Pokud hledáte vůz, který se nezalekne žádného terénu, Impreza je jasnou volbou.',
                'price_per_day' => 2900,
                'availability' => true,
                'image_url' => 'images/subaru_impreza_wrx.jpg',
                'power' => '300 kW',
                'engine' => '2.5L I4 Turbo',
                'year' => 2015,
                'transmission' => '6-stupňová manuální',
                'fuel_consumption' => '11.0 l/100km',
                'seats' => 5,

                // Rozšířené informace
                'color' => 'WR Blue Pearl',
                'mileage' => 65000,
                'origin_country' => 'Japonsko',
                'service_book' => true,

                // Další technické parametry
                'max_speed' => 255,
                'acceleration' => 4.8,
                'torque' => 407,
                'fuel_tank' => 60,

                // Výbava
                'safety_features' => json_encode(['ABS', 'VDC', 'Symmetrical AWD', 'Active Torque Vectoring']),
                'airbags' => 7,
                'air_conditioning' => 'Automatická klimatizace',
                'parking_camera' => true,
                'heated_seats' => true,

                // Podmínky pronájmu
                'deposit' => 80000,
                'min_driver_age' => 23,
                'min_license_length' => 4,
                'mileage_limit' => 200
            ],
            [
                'name' => 'Toyota AE86',
                'brand' => 'Toyota',
                'description' => 'Toyota AE86 je sportovní auto, které se stalo legendou nejen díky své účasti v motorsportu, ale také díky své pozici v driftingu. S jeho 1.6L I4 motorem nabízí AE86 skvělé jízdní vlastnosti, které si každý nadšenec motorsportu zamiluje. Toto auto, známé pro svou lehkou hmotnost a vynikající vyvážení, je ideální pro driftování i běžné řízení na silnici. AE86 je výjimečným kouskem, který stále žije v srdcích fanoušků motorsportu.',
                'price_per_day' => 2400,
                'availability' => true,
                'image_url' => 'images/toyota_ae86.jpg',
                'power' => '130 kW',
                'engine' => '1.6L I4',
                'year' => 1985,
                'transmission' => '5-stupňová manuální',
                'fuel_consumption' => '7.5 l/100km',
                'seats' => 4,

                // Rozšířené informace
                'color' => 'Panda Black/White',
                'mileage' => 150000,
                'origin_country' => 'Japonsko',
                'service_book' => true,

                // Další technické parametry
                'max_speed' => 195,
                'acceleration' => 8.3,
                'torque' => 150,
                'fuel_tank' => 50,

                // Výbava
                'safety_features' => json_encode(['Limited Slip Differential']),
                'airbags' => 0,
                'air_conditioning' => 'Manuální klimatizace',
                'parking_camera' => false,
                'heated_seats' => false,

                // Podmínky pronájmu
                'deposit' => 60000,
                'min_driver_age' => 25,
                'min_license_length' => 5,
                'mileage_limit' => 150
            ],
            [
                'name' => 'Toyota MR2',
                'brand' => 'Toyota',
                'description' => 'Toyota MR2 je kompaktní sportovní vůz, který se pyšní svou jedinečnou koncepcí – motorem umístěným uprostřed. Tento 1.6L I4 motor poskytuje dostatek výkonu pro zábavnou jízdu a skvělé ovládání na silnici. MR2 je ideální volbou pro ty, kdo hledají sportovní auto s přístupem k technologiím, které zajišťují vysoce dynamické jízdní vlastnosti. Ať už se chystáte na víkendový výlet nebo na track day, Toyota MR2 nikdy nezklame.',
                'price_per_day' => 2300,
                'availability' => true,
                'image_url' => 'images/toyota_mr2.jpg',
                'power' => '140 kW',
                'engine' => '1.6L I4',
                'year' => 1990,
                'transmission' => '5-stupňová manuální',
                'fuel_consumption' => '8.0 l/100km',
                'seats' => 2,

                // Rozšířené informace
                'color' => 'Super Red',
                'mileage' => 110000,
                'origin_country' => 'Japonsko',
                'service_book' => true,

                // Další technické parametry
                'max_speed' => 210,
                'acceleration' => 7.1,
                'torque' => 186,
                'fuel_tank' => 45,

                // Výbava
                'safety_features' => json_encode(['ABS']),
                'airbags' => 2,
                'air_conditioning' => 'Manuální klimatizace',
                'parking_camera' => false,
                'heated_seats' => false,

                // Podmínky pronájmu
                'deposit' => 65000,
                'min_driver_age' => 23,
                'min_license_length' => 3,
                'mileage_limit' => 200
            ],
            [
                'name' => 'Toyota Supra',
                'brand' => 'Toyota',
                'description' => 'Toyota Supra je jedno z nejvíce ikonických sportovních aut na světě. S výkonem 330 koní z 3.0L I6 Turbo motoru tento vůz nabízí nejen neuvěřitelnou akceleraci, ale i stabilitu při vysokých rychlostech. Supra je známá svou schopností upravit se pro různé potřeby a motorsporty, což z ní činí ideální auto pro všechny, kdo milují vysoký výkon a přesnost. Tento model je skutečnou legendou mezi sportovními vozy, která pokračuje ve své tradici.',
                'price_per_day' => 4500,
                'availability' => true,
                'image_url' => 'images/toyota_supra.jpg',
                'power' => '330 kW',
                'engine' => '3.0L I6 Turbo',
                'year' => 1998,
                'transmission' => '6-stupňová manuální',
                'fuel_consumption' => '12.3 l/100km',
                'seats' => 4,

                // Rozšířené informace
                'color' => 'Renaissance Red',
                'mileage' => 92000,
                'origin_country' => 'Japonsko',
                'service_book' => true,

                // Další technické parametry
                'max_speed' => 250,
                'acceleration' => 4.8,
                'torque' => 431,
                'fuel_tank' => 80,

                // Výbava
                'safety_features' => json_encode(['ABS', 'Traction Control', 'Limited Slip Differential']),
                'airbags' => 2,
                'air_conditioning' => 'Automatická klimatizace',
                'parking_camera' => false,
                'heated_seats' => true,

                // Podmínky pronájmu
                'deposit' => 90000,
                'min_driver_age' => 25,
                'min_license_length' => 5,
                'mileage_limit' => 200
            ]
        ];

        foreach ($cars as $car) {
            Car::create($car);
        }
    }
}
