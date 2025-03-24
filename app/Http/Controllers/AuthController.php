<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function doLogin(LoginRequest $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
        

        if(Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended(route('index.produit'));
        }
            return back()->withErrors([
                'email' => "Email invalide"
            ])->withInput();

    }
}
