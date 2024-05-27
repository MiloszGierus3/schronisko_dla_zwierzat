<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ZwierzakiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Dodajmy kilka przykładowych rekordów do tabeli zwierzaki
        DB::table('zwierzaki')->insert([
            [
                'imię' => 'Burek',
                'gatunek' => 'Pies',
                'wiek' => 5,
                'img' => 'owca.jpg',
                'stan_zdrowia' => 'upośledzony',
                'rasa' => 'Mieszaniec',
                'opiekun_id' => 1, // ID opiekuna
                'id_klatki' => 1, // ID klatki
                'id_pochodzenia' => 1,
                'user_id' => 1, // ID pochodzenia
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'imię' => 'Mruczek',
                'gatunek' => 'Kot',
                'wiek' => 6,
                'img' => 'mruczek.jpg',
                'stan_zdrowia' => 'zdrowy',
                'rasa' => 'dachowiec',
                'opiekun_id' => 2, // ID opiekuna
                'id_klatki' => 2, // ID klatki
                'id_pochodzenia' => 2, // ID pochodzenia
                'user_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'imię' => 'Mruczysław',
                'gatunek' => 'Kot',
                'wiek' => 6,
                'img' => 'mruczyslaw.jpg',
                'stan_zdrowia' => 'kulawy',
                'rasa' => 'dachowiec',
                'opiekun_id' => 3, // ID opiekuna
                'id_klatki' => 4, // ID klatki
                'id_pochodzenia' => 3, // ID pochodzenia
                'user_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'imię' => 'Bonifacy',
                'gatunek' => 'Pies',
                'wiek' => 5,
                'img' => 'bonifacy.jpg',
                'stan_zdrowia' => 'zdrowy',
                'rasa' => 'domowy',
                'opiekun_id' => 4, // ID opiekuna
                'id_klatki' => 1, // ID klatki
                'id_pochodzenia' => 4, // ID pochodzenia
                'user_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],[
                'imię' => 'Tora',
                'gatunek' => 'Kot',
                'wiek' => 7,
                'img' => 'tora.jpg',
                'stan_zdrowia' => 'chory',
                'rasa' => 'dachowiec',
                'opiekun_id' => 5, // ID opiekuna
                'id_klatki' => 4, // ID klatki
                'id_pochodzenia' => 5, // ID pochodzenia
                'user_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'imię' => 'Bruno',
                'gatunek' => 'Pies',
                'wiek' => 2,
                'img' => 'bruno.jpg',
                'stan_zdrowia' => 'zdrowy',
                'rasa' => 'Dalmatynczyk',
                'opiekun_id' => 6, // ID opiekuna
                'id_klatki' => 1, // ID klatki
                'id_pochodzenia' => 6, // ID pochodzenia
                'user_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Dodaj więcej rekordów według potrzeb
        ]);
    }
}
