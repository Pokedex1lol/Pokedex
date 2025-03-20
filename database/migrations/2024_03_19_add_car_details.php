<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('cars', function (Blueprint $table) {
            // Základní info
            $table->string('color')->nullable();
            $table->integer('mileage')->nullable(); // Stav tachometru
            $table->string('origin_country')->nullable();
            $table->boolean('service_book')->default(false);
            
            // Technické parametry
            $table->integer('max_speed')->nullable(); // km/h
            $table->decimal('acceleration', 3, 1)->nullable(); // 0-100 km/h
            $table->integer('torque')->nullable(); // Nm
            $table->integer('fuel_tank')->nullable(); // L
            
            // Výbava
            $table->json('safety_features')->nullable(); // ABS, ESP, atd.
            $table->integer('airbags')->nullable();
            $table->string('air_conditioning')->nullable();
            $table->boolean('parking_camera')->default(false);
            $table->boolean('heated_seats')->default(false);
            
            // Podmínky pronájmu
            $table->integer('deposit')->nullable(); // Kauce
            $table->integer('min_driver_age')->default(21);
            $table->integer('min_license_length')->default(2); // Roky
            $table->integer('mileage_limit')->nullable(); // Denní limit km
        });
    }

    public function down()
    {
        Schema::table('cars', function (Blueprint $table) {
            $table->dropColumn([
                'color',
                'mileage',
                'origin_country',
                'service_book',
                'max_speed',
                'acceleration',
                'torque',
                'fuel_tank',
                'safety_features',
                'airbags',
                'air_conditioning',
                'parking_camera',
                'heated_seats',
                'deposit',
                'min_driver_age',
                'min_license_length',
                'mileage_limit'
            ]);
        });
    }
}; 