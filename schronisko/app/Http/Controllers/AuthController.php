<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Zwierzaki;
use App\Models\Pochodzenie;
use App\Models\klatki;
use App\Models\Opiekunowie;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class AuthController extends Controller
{
    public function loginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('/');
        }

        return back()->withErrors([
            'email' => 'Nieprawidłowy adres email.',
            'password' => 'Nieprawidłowe hasło.',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
