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
                'description' => 'Acura NSX je ikona japonského sportovního inženýrství. Srdcem tohoto vozu je 3.5L V6 Twin-Turbo motor, který zajišťuje dechberoucí výkon 537 kW. Tento moderní supercar s špičkovým designem a precizními jízdními vlastnostmi je připraven na jakoukoli výzvu. Automatická převodovka a hybridní pohon dodávají vozu plynulost a efektivitu. Vůz je ideální volbou pro každého, kdo touží po rychlosti a eleganci.',
                'price_per_day' => 3500,
                'availability' => true,
                'image_url' => 'images/acura_nsx.jpg',
                'power' => 537,
                'engine' => '3.5L V6 Twin-Turbo',
                'year' => 2021,
                'transmission' => '7-stupňová dvouspojková',
                'fuel_consumption' => 11.2,
                'seats' => 2,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Honda Civic Type R',
                'description' => 'Honda Civic Type R je jeden z nejlepších kompaktních hatchbacků, který spojuje sportovní výkon s praktičností. Je vybavena 2.0L I4 Turbo motorem, který poskytuje výkon 306 kW a dynamiku, kterou nelze přehlédnout. S jeho výkonným podvozkem a ostrým řízením je Civic Type R perfektním vozem pro ty, kteří milují adrenalinové jízdy, a to i v městském provozu. Tento model je ideální pro každého, kdo chce zažít rychlost bez kompromisů.',
                'price_per_day' => 2500,
                'availability' => true,
                'image_url' => 'images/honda_civic_type_r.jpg',
                'power' => 306,
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
                'description' => 'Lexus RC F je luxusní sportovní kupé, které nabízí nekompromisní výkon a špičkový komfort. Jeho 5.0L V8 motor s výkonem 472 kW poskytuje sílu, kterou si můžete užívat na silnici, zatímco elegantní design a vysoce kvalitní materiály uvnitř vozu zajišťují pocit luxusu. S vysoce kvalitním audio systémem a pokročilými technologiemi je tento vůz ideální volbou pro ty, kteří hledají výkon a pohodlí v jednom balíčku.',
                'price_per_day' => 4000,
                'availability' => true,
                'image_url' => 'images/lexus_rc_f.jpg',
                'power' => 472,
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
                'description' => 'Mazda MX5 Miata je kultovní roadster, který byl navržen pro ty, kdo milují čistou a vzrušující jízdu. Jeho 2.0L I4 motor poskytuje dostatečný výkon pro zábavné řízení, zatímco nízká hmotnost a perfektní vyvážení vozu přinášejí nezapomenutelné zážitky na každé křivce. MX5 Miata je synonymem pro zábavu za volantem a s tímto vozem se nikdy nebudete nudit.',
                'price_per_day' => 2000,
                'availability' => true,
                'image_url' => 'images/mazda_mx5_miata.jpg',
                'power' => 181,
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
                'description' => 'Mazda RX7 je legendární vůz s unikátním Wankelovým motorem, který nabízí skvélé jízdní vlastnosti a nenapodobitelný zvuk. Tento sportovní vůz s výkonem 280 kW je příkladem japonského inženýrství. Jeho kompaktní rozměry a perfektní rozložení hmotnosti činí RX7 velmi agilním vozem, který je vhodný pro všechny nadšence motoristického sportu. Pokud hledáte automobil s unikátním charakterem, RX7 je pro vás ta pravá volba.',
                'price_per_day' => 3000,
                'availability' => true,
                'image_url' => 'images/mazda_rx7.jpg',
                'power' => 280,
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
                'description' => 'Mitsubishi Lancer je výkonný rally sedan, který nabízí skvělou kombinaci výkonu, stability a ovladatelnosti. Jeho 2.0L I4 Turbo motor poskytuje 280 kW a přináší vynikající zrychlení. Lancer je známý svou odolností a schopností zvládat i náročné podmínky. Pokud máte rádi jízdu na limitu, Lancer je ideální auto pro vás.',
                'price_per_day' => 2800,
                'availability' => true,
                'image_url' => 'images/mitsubishi_lancer_evo_ix.jpg',
                'power' => 280,
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
                'description' => 'Nissan 370Z je moderní sportovní vůz, který nabídne zážitky z jízdy a výborný výkon. S motorem o objemu 3.7L V6 a výkonem 332 kW dokáže tento automobil dosahovat vysokých rychlostí, ať už na silnici nebo na okruhu. Jeho robustní podvozek a agresivní design jsou neodolatelné pro každého, kdo hledá sportovní vůz, který nezklame.',
                'price_per_day' => 2700,
                'availability' => true,
                'image_url' => 'images/nissan_370z.jpg',
                'power' => 332,
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
                'description' => 'Nissan Silvia S15 je drifterská ikona, která byla navržena pro driftování a motorsport. Její 2.0L I4 Turbo motor s výkonem 250 kW nabízí dostatečnou sílu pro driftování, zatímco precizní ovládání a nízká hmotnost poskytují maximální agilitu. Pokud máte rádi driftování, Silvia S15 je autem, které musíte mít.',
                'price_per_day' => 2600,
                'availability' => true,
                'image_url' => 'images/nissan_silvia_s15.jpg',
                'power' => 250,
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
                'description' => 'Nissan Skyline GTR je japonská legenda, která se stala ikonou v motorsportu a mezi nadšenci rychlých aut. S jeho 2.6L I6 Twin-Turbo motorem a výkonem 280 kW nabízí tento vůz vynikající akceleraci a maximální stabilitu při vysokých rychlostech. Skyline GTR je známý pro svou technologii ATTESA (pohon všech kol) a aktivní diferenciál, což zajišťuje perfektní trakci. Pokud hledáte vůz, který zanechá stopy na silnici, Skyline GTR je pro vás tou správnou volbou.',
                'price_per_day' => 5000,
                'availability' => true,
                'image_url' => 'images/nissan_skyline_gtr.jpg',
                'power' => 280,
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
                'description' => 'Subaru Impreza WRX je rally legenda, která získala popularitu díky své neuvěřitelné ovladatelnosti a výkonu. S 2.5L I4 Turbo motorem o výkonu 300 kW je tento vůz připraven na jakoukoli výzvu. Díky trvalému pohonu všech kol (AWD) je Impreza ideální pro náročné podmínky a zimní jízdu. Pokud hledáte vůz, který se nezalekne žádného terénu, Impreza je jasnou volbou.',
                'price_per_day' => 2900,
                'availability' => true,
                'image_url' => 'images/subaru_impreza_wrx.jpg',
                'power' => 300,
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
                'description' => 'Toyota AE86 je sportovní auto, které se stalo legendou nejen díky své účasti v motorsportu, ale také díky své pozici v driftingu. S jeho 1.6L I4 motorem nabízí AE86 skvélé jízdní vlastnosti, které si každý nadšenec motorsportu zamiluje. Toto auto, známé pro svou lehkou hmotnost a vynikající vyvážení, je ideální pro driftování i běžné řízení na silnici. AE86 je výjimečným kouskem, který stále žije v srdcích fanoušků motorsportu.',
                'price_per_day' => 2400,
                'availability' => true,
                'image_url' => 'images/toyota_ae86.jpg',
                'power' => 130,
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
                'description' => 'Toyota MR2 je kompaktní sportovní vůz, který se pyšní svou jedinečnou koncepcí – motorem umístěným uprostřed. Tento 1.6L I4 motor poskytuje dostatek výkonu pro zábavnou jízdu a skvélé ovládání na silnici. MR2 je ideální volbou pro ty, kdo hledají sportovní auto s přístupem k technologiím, které zajišťují vysoce dynamické jízdní vlastnosti. Ať už se chystáte na víkendový výlet nebo na track day, Toyota MR2 nikdy nezklame.',
                'price_per_day' => 2300,
                'availability' => true,
                'image_url' => 'images/toyota_mr2.jpg',
                'power' => 140,
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
                'description' => 'Toyota Supra je jedno z nejvíce ikonických sportovních aut na světě. S výkonem 330 koní z 3.0L I6 Turbo motoru tento vůz nabízí nejen neuvěřitelnou akceleraci, ale i stabilitu při vysokých rychlostech. Supra je známá svou schopností upravit se pro různé potřeby a motorsporty, což z ní činí ideální auto pro všechny, kdo milují vysoký výkon a přesnost. Tento model je skutečnou legendou mezi sportovními vozy, která pokračuje ve své tradici.',
                'price_per_day' => 4500,
                'availability' => true,
                'image_url' => 'images/toyota_supra.jpg',
                'power' => 330,
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


