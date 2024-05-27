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
        Schema::create('zwierzaki', function (Blueprint $table) {
            $table->increments('id');
            $table->string('imię', 25)->nullable(false);
            $table->string('gatunek', 25)->nullable(false);
            $table->integer('wiek')->nullable(false);
            $table->string('img', 35);
            $table->string('stan_zdrowia',25);
            $table->string('rasa',20);
            $table->boolean('status_adopcji')->default(false);
            $table->foreignId('opiekun_id')->references('opiekun_id')->on('opiekunowie');
            $table->foreignId('id_klatki')->references('id_klatki')->on('klatki');
            $table->foreignId('id_pochodzenia')->references('id_pochodzenia')->on('pochodzenie');
            $table->foreignId('user_id')->references('id')->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('zwierzaki');
    }
};
