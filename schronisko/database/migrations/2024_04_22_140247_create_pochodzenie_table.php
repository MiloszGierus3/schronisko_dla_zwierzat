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
        Schema::create('pochodzenie', function (Blueprint $table) {
            $table->id('id_pochodzenia');
            $table->string('Nazwa_wojewódźtwa', 35)->nullable(false);
            $table->string('Miasto')->nullable(false);
            $table->integer('numer_ulicy')->nullable(false);
            
            //$table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pochodzenie');
    }
};
