<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class PochodzenieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Dodajmy kilka przykładowych rekordów do tabeli pochodzenie
        DB::table('pochodzenie')->insert([
            [
                'Nazwa_wojewódźtwa' => 'Podkarpackie',
                'Miasto' => 'Rzeszów',
                'numer_ulicy' => 11,
            ],
            [
                'Nazwa_wojewódźtwa' => 'Podkarpackie',
                'Miasto' => 'Frysztak',
                'numer_ulicy' => 6,
            ],
            [
                'Nazwa_wojewódźtwa' => 'Podkarpackie',
                'Miasto' => 'Babica',
                'numer_ulicy' => 20,
            ],
            [
                'Nazwa_wojewódźtwa' => 'Podkarpackie',
                'Miasto' => 'Leżańsk',
                'numer_ulicy' => 11,
            ],
            [
                'Nazwa_wojewódźtwa' => 'Podkarpackie',
                'Miasto' => 'Krosno',
                'numer_ulicy' => 6,
            ],
            [
                'Nazwa_wojewódźtwa' => 'Podkarpackie',
                'Miasto' => 'Lesko',
                'numer_ulicy' => 20,
            ],
            // Dodaj więcej rekordów według potrzeb
        ]);
    }
}
