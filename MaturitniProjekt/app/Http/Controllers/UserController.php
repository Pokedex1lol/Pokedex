<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // Zobrazení seznamu uživatelů
    public function index()
    {
        $users = User::all();
        return view('admin.users', compact('users'));
    }

    // Zobrazení formuláře pro editaci uživatele
    public function edit(User $user)
    {
        return view('admin.users_edit', compact('user'));
    }

    // Aktualizace uživatele
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:6|confirmed',
            'is_admin' => 'required|boolean',
        ], [
            'name.required' => 'Jméno je povinné.',
            'email.required' => 'E-mail je povinný.',
            'email.email' => 'Musíte zadat platný e-mail.',
            'email.unique' => 'Tento e-mail je již používán.',
            'password.min' => 'Heslo musí mít alespoň 6 znaků.',
            'password.confirmed' => 'Hesla se neshodují.',
            'is_admin.required' => 'Role je povinná.',
        ]);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->is_admin = $request->is_admin;

        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return redirect()->route('admin.users')->with('success', 'Uživatel byl úspěšně upraven!');
    }

    // Smazání uživatele
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('admin.users')->with('success', 'Uživatel byl úspěšně smazán!');
    }
}
