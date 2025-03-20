<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Registered;

class RegisterController extends Controller
{
    /**
     * Zobrazí registrační formulář.
     */
    public function showRegistrationForm()
    {
        return view('auth.register'); // Ujistěte se, že existuje soubor `auth/register.blade.php`
    }

    /**
     * Zpracuje registrační požadavek.
     */
    public function register(Request $request)
    {
        // Validace
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);
    
        // Vytvoření uživatele
        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => bcrypt($validatedData['password']),
        ]);

        event(new Registered($user));
    
        // Přihlášení uživatele
        auth()->login($user);
    
        // Přesměrování na dashboard
        return redirect()->route('verification.notice');
    }
}
