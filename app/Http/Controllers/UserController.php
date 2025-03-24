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


    public function doLogin(UserRequest $request)
    {
        // dd('ok');
        // Récupère uniquement l'email et le mot de passe depuis la requête validée
        $credentials = $request->only(['email', 'password']);

        // Tente d'authentifier l'utilisateur avec les identifiants fournis
        if (Auth::attempt($credentials)) {
            // Si l'authentification réussit, redirige vers le tableau de bord avec un message de succès
            return to_route('produit.index')->with('success', 'Connexion réussie !');
        }

        // Si l'authentification échoue, redirige vers la page précédente avec un message d'erreur
        return back()->with('error', 'Identifiants incorrects');
    }


    public function showRegisterForm()
    {
        return view('auth.register');
    }

    public function register(UserRequest $request)
    {
        $request->validated();

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        return to_route('showLoginForm')->with('success', 'Inscription réussie ! Connectez-vous.');
    }

    public function logout()
    {
        Auth::logout();
        return to_route('showLoginForm')->with('success', 'Déconnexion réussie.');
    }
}
