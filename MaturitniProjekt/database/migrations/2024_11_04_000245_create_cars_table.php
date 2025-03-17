<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->string('brand');
            $table->string('name');
            $table->text('description')->nullable();
            $table->decimal('price_per_day', 10, 2);
            $table->boolean('availability')->default(true);
            $table->string('image_url'); // Přidá URL na obrázky
            $table->timestamps();
            $table->integer('power')->nullable(); // Výkon v kW
            $table->string('engine')->nullable(); // Typ motoru (benzín, diesel, hybrid, elektro)
            $table->integer('year')->nullable(); // Rok výroby
            $table->string('transmission')->nullable(); // Převodovka (manuální/automatická)
            $table->decimal('fuel_consumption', 4, 1)->nullable(); // Spotřeba (litry na 100 km)
            $table->integer('seats')->nullable(); // Počet míst
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cars');
    }
};
