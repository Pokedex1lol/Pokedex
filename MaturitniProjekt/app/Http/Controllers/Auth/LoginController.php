<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller; // Toto zajistí správné připojení middleware
use Illuminate\Support\Facades\Auth; // Pro autentizaci
use Illuminate\Http\Request; // Pro práci s požadavky

class LoginController extends Controller
{
    public function __construct()
    {
        // Nastavení middleware pro hosty (povolit přihlášení pouze nepřihlášeným uživatelům)
        $this->middleware('guest')->except('logout');
    }

    public function showLoginForm()
    {
        // Zobrazení šablony pro přihlášení
        return view('auth.login'); // Ověřte, že soubor existuje v resources/views/auth/login.blade.php
    }

    public function login(Request $request)
    {
        // Validace přihlašovacích údajů
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Pokus o přihlášení
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/landing'); // Přesměrování po přihlášení
        }


        // Pokud přihlášení selže
        return back()->withErrors([
            'email' => 'Poskytnuté přihlašovací údaje nejsou správné.',
        ]);
    }

    public function logout(Request $request)
    {
        // Odhlášení uživatele
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/'); // Přesměrování po odhlášení
    }
}
