<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KlatkiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Dodajmy kilka przykładowych rekordów do tabeli klatki
        DB::table('klatki')->insert([
            [
                'numer_klatki' => 1,
                'rozmiar' => 'Średnia',
                'opis_klatki' => 'Klatka przystosowana dla średnich psów i nie tylko',
            ],
            [
                'numer_klatki' => 2,
                'rozmiar' => 'Średnia',
                'opis_klatki' => 'Klatka dla dużych (grubych) kotów i nie tylko',
            ],
            [
                'numer_klatki' => 3,
                'rozmiar' => 'Duża',
                'opis_klatki' => 'Klatka przystosowana dla dużych psów i nie tylko',
            ],
            [
                'numer_klatki' => 4,
                'rozmiar' => 'Mała',
                'opis_klatki' => 'Klatka przystosowana dla małych kotów i nie tylko',
            ],
            [
                'numer_klatki' => 5,
                'rozmiar' => 'Mała',
                'opis_klatki' => 'Klatka przystosowana dla małych psów i nie tylko',
            ],
            [
                'numer_klatki' => 6,
                'rozmiar' => 'Mała',
                'opis_klatki' => 'Klatka przystosowana dla królików i nie tylko',
            ],
            // Dodaj więcej rekordów według potrzeb
        
        ]);
    }
}
