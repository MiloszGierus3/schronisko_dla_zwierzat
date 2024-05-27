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
        Schema::create('opiekunowie', function (Blueprint $table) {
            $table->id('opiekun_id');
            $table->string('imię', 25)->nullable(false);
            $table->string('nazwisko', 25)->nullable(false);
            $table->integer('wiek')->nullable(false);
            $table->string('telefon', 15);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('opiekunowie');
    }
};
