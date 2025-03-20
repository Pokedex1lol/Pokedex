<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            
            // Základní informace o vozidle
            $table->string('name');
            $table->string('brand');
            $table->text('description');
            $table->decimal('price_per_day', 10, 2);
            $table->boolean('availability')->default(true);
            $table->string('image_url');
            
            // Hlavní technické parametry
            $table->string('power'); // Výkon motoru (např. "180 kW")
            $table->string('engine'); // Motor (např. "2.0 TSI")
            $table->integer('year'); // Rok výroby
            $table->string('transmission'); // Převodovka (např. "Automatická")
            $table->string('fuel_consumption'); // Spotřeba (např. "7.5 l/100km")
            $table->integer('seats'); // Počet sedadel
            
            // Rozšířené informace o vozidle
            $table->string('color')->nullable(); // Barva
            $table->integer('mileage')->nullable(); // Stav tachometru v km
            $table->string('origin_country')->nullable(); // Země původu
            $table->boolean('service_book')->default(false); // Servisní knížka
            
            // Další technické parametry
            $table->integer('max_speed')->nullable(); // Maximální rychlost v km/h
            $table->decimal('acceleration', 4, 1)->nullable(); // Zrychlení 0-100 km/h v sekundách
            $table->integer('torque')->nullable(); // Točivý moment v Nm
            $table->integer('fuel_tank')->nullable(); // Objem nádrže v litrech
            
            // Výbava
            $table->json('safety_features')->nullable(); // Bezpečnostní prvky (ABS, ESP, atd.)
            $table->integer('airbags')->nullable(); // Počet airbagů
            $table->string('air_conditioning')->nullable(); // Typ klimatizace
            $table->boolean('parking_camera')->default(false); // Parkovací kamera
            $table->boolean('heated_seats')->default(false); // Vyhřívaná sedadla
            
            // Podmínky pronájmu
            $table->integer('deposit')->nullable(); // Kauce v Kč
            $table->integer('min_driver_age')->default(21); // Minimální věk řidiče
            $table->integer('min_license_length')->default(2); // Minimální délka řidičského průkazu v letech
            $table->integer('mileage_limit')->nullable(); // Denní limit kilometrů
            
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('cars');
    }
}; 