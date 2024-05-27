<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\ZwierzakiController;
use App\Http\Controllers\KlatkiController;
use App\Http\Controllers\PochodzenieController;
use App\Http\Controllers\OpiekunowieController;
use App\Http\Controllers\AuthController;

//Route::get('/', function () {
 //   return view('welcome');
//});

//dodyczące zwierząt //->middleware('auth')
Route::controller(ZwierzakiController::class)->group(function () {
Route::get('/zwierzeta', 'index')->name('schronisko.zwierzeta');
Route::get('/zwierzeta/create', 'create')->middleware('auth')->name('schronisko.dodaj');
Route::post('/zwierzeta/store',  'store')->name('schronisko.store');
Route::get('/zwierzeta/{id}/edit',  'edit')->middleware('auth')->name('schronisko.edit');
Route::put('/zwierzeta/{zwierzak}',  'update')->name('schronisko.update');
Route::delete('/zwierzeta/{id}', 'delete')->middleware('auth')->name('schronisko.delete');
Route::get('/zwierzeta/{id}/adoptuj',  'adoptuj')->name('schronisko.adoptuj');
Route::get('/zwierzeta/zaadoptowane',  'zaadoptowane')->name('schronisko.zaadoptowane');
Route::delete('/zwierzeta/{id}/usun-adopcje', 'usunAdopcje')->middleware('auth')->name('schronisko.usunAdopcje');
});

//zrobic aby przekazywało zwierzakicontroller i opiekunowiecontroller aby możliwe było wyświetlenie opiekunów
//opiekunowie
Route::get('/opiekunowie', [OpiekunowieController::class, 'index'])->name('schronisko.opiekunowie');


//kaltki
Route::get('/klatki', [KlatkiController::class, 'index'])->name('schronisko.klatki');


//główna strona
Route::controller(ZwierzakiController::class)->group(function () {
    Route::get('/', 'index1')->name('schronisko.index');
    Route::get('/schronisko/{id}', 'show')->name('schronisko.show');
    Route::get('/schronisko', 'search')->name('schronisko.search');
});
//logowanie
//Route::get('/login', [UsersController::class, 'index'])->name('logowanie.login');

Route::get('/rejstracja', [UsersController::class, 'index1'])->name('auth.rejstracja');

Route::post('/rejstracja', [UsersController::class, 'store'])->name('auth.rejstracja');

Route::get('/login', [AuthController::class, 'loginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('auth.login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


