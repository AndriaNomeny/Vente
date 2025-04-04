<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\UserRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index() 
    {
        $users = User::all();

        return view('users.index', [
            'users' => $users
        ]);
    }

    public function edit($id) 
    {
        $user = User::findOrFail($id);
        return view('users.edit', [
            'user' => $user
        ]);
    }

    public function update(UserRequest $request, $id)
    {
        // Récupérer l'utilisateur à mettre à jour
        $user = User::findOrFail($id);

        // Mettre à jour les informations de l'utilisateur
        $user->update([
            'name' => $request->name, // Mise à jour du champ 'name'
            'email' => $request->email, // Mise à jour du champ 'email'
            'password' => $request->password ? bcrypt($request->password) : $user->password, // Mise à jour du mot de passe si fourni
        ]);

        // Rediriger vers l'index des utilisateurs avec un message de succès
        return to_route('utilisateur.index')->with('success', 'Utilisateur mis à jour avec succès!');
    }

    
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return to_route('utilisateur.index')->with('success', 'Utilisateur supprimé avec succès.');
    }

    // -----------------------------------------------------------------------------------------------------

    public function showLoginForm()
    {
        return view('auth.login');
    }


    public function doLogin(LoginRequest $request)
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

    public function register(RegisterRequest $request)
    {
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return to_route('showLoginForm')->with('success', 'Inscription réussie ! Connectez-vous.');
    }


    public function logout()
    {
        Auth::logout();
        return to_route('showLoginForm')->with('success', 'Déconnexion réussie.');
    }
}
