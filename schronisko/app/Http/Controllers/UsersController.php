<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    //
    public function index(){

        return view('auth.login',
        [

          ]);
    }
    public function index1(){

        return view('auth.rejstracja',
        [
             
          ]);
    }

    public function store(Request $request)
    {
        // Walidacja danych wejściowych
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ],
        [
            'name.required' => 'Pole Imię jest wymagane.',
            'name.string' => 'Pole Imię musi być tekstem.',
            'name.max' => 'Pole Imię może mieć maksymalnie 255 znaków.',
            'email.required' => 'Pole E-mail jest wymagane.',
            'email.string' => 'Pole E-mail musi być tekstem.',
            'email.email' => 'Pole E-mail musi być prawidłowym adresem e-mail.',
            'email.max' => 'Pole E-mail może mieć maksymalnie 255 znaków.',
            'email.unique' => 'Podany adres e-mail jest już zajęty.',
            'password.required' => 'Pole Hasło jest wymagane.',
            'password.string' => 'Pole Hasło musi być tekstem.',
            'password.min' => 'Pole Hasło musi mieć co najmniej 8 znaków.',
            'password.confirmed' => 'Pole Hasło nie zgadza się z potwierdzeniem.',
        ]);

        // Tworzenie nowego użytkownika
        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => bcrypt($validatedData['password']),
        ]);

        // Przekierowanie użytkownika po udanej rejestracji
        return redirect()->route('auth.login')->with('success', 'Pomyślnie zarejestrowano. Możesz teraz się zalogować.');
    }
 
    
//logowanie


}
