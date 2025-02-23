<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('reservations', function (Blueprint $table) {
            // Přidáme sloupec pouze pokud neexistuje
            if (!Schema::hasColumn('reservations', 'car_id')) {
                $table->foreignId('car_id')->constrained()->onDelete('cascade');
            }
        });
    }

    public function down()
    {
        Schema::table('reservations', function (Blueprint $table) {
            // Smažeme sloupec, pokud existuje
            if (Schema::hasColumn('reservations', 'car_id')) {
                $table->dropForeign(['car_id']);
                $table->dropColumn('car_id');
            }
        });
    }


};
