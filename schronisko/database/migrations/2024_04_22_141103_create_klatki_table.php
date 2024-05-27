<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('klatki', function (Blueprint $table) {
            $table->id('id_klatki');
            $table->integer('numer_klatki');
            $table->enum('rozmiar', ['Mała', 'Średnia', 'Duża']);
            $table->string('opis_klatki', 100);
            //$table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('klatki');
    }
};
