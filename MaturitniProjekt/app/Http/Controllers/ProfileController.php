<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Reservation;

class ProfileController extends Controller
{
    /**
     * Display the profile page with user reservations.
     */
    public function index()
    {
        // Získání přihlášeného uživatele
        $user = Auth::user();

        // Načíst rezervace přihlášeného uživatele
        $reservations = Reservation::where('user_id', $user->id)->get();

        return view('profile.index', [
            'user' => $user,
            'reservations' => $reservations,
        ]);
    }

    /**
     * Display the user's profile form.
     */
    public function edit(Request $request)
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(Request $request)
    {
        $request->user()->fill($request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
        ]));

        $request->user()->save();

        return redirect()->route('profile.edit')->with('status', 'Profile updated successfully!');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request)
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();
        Auth::logout();
        $user->delete();

        return redirect('/')->with('status', 'Account deleted.');
    }
}
