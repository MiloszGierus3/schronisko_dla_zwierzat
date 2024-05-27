<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OpiekunowieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Dodajmy kilka przykładowych rekordów do tabeli opiekunowie
        DB::table('opiekunowie')->insert([
            [
                'imię' => 'Jan',
                'nazwisko' => 'Kowalski',
                'wiek' => 30,
                'telefon' => '123456789',
            ],
            [
                'imię' => 'Anna',
                'nazwisko' => 'Nowak',
                'wiek' => 25,
                'telefon' => '987654321',
            ],
            [
                'imię' => 'Michał',
                'nazwisko' => 'Wiśniewski',
                'wiek' => 40,
                'telefon' => '555666777',
            ],
            [
                'imię' => 'Stanisław',
                'nazwisko' => 'Majewski',
                'wiek' => 20,
                'telefon' => '111334991',
            ],
            [
                'imię' => 'Gabriela',
                'nazwisko' => 'Małostkowicz',
                'wiek' => 30,
                'telefon' => '882771642',
            ],
            [
                'imię' => 'Michał',
                'nazwisko' => 'Bagietson',
                'wiek' => 45,
                'telefon' => '888371771',
            ],
            // Dodaj więcej rekordów według potrzeb
        ]);
    }
}
