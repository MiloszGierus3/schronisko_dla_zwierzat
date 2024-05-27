<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Zwierzaki;
use App\Models\Pochodzenie;
use App\Models\klatki;
use App\Models\Opiekunowie;
use App\Models\Users;
class KlatkiController
{
    //

    public function index()
    {
       
        $klatki = klatki::all();
        
        return view('schronisko.klatki', ['klatki' => $klatki]);
    }
}
