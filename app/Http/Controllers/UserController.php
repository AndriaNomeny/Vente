<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }


    public function login(UserRequest $request)
    {
        // Récupère uniquement l'email et le mot de passe depuis la requête validée
        $credentials = $request->only(['email', 'password']);

        // Tente d'authentifier l'utilisateur avec les identifiants fournis
        if (Auth::attempt($credentials)) {
            // Si l'authentification réussit, redirige vers le tableau de bord avec un message de succès
            return redirect('/indexx')->with('success', 'Connexion réussie !');
        }

        // Si l'authentification échoue, redirige vers la page précédente avec un message d'erreur
        return back()->with('error', 'Identifiants incorrects');
    }


    public function showRegisterForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed'
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        return redirect('/login')->with('success', 'Inscription réussie ! Connectez-vous.');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login')->with('success', 'Déconnexion réussie.');
    }
}
