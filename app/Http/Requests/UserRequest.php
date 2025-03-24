<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    /**
     * Détermine si l'utilisateur est autorisé à faire cette requête.
     */
    public function authorize(): bool
    {
        return true; // Important : doit être `true` pour activer la validation
    }

    /**
     * Règles de validation appliquées à la requête.
     */
    public function rules(): array
    {
        // Validation pour la connexion
        if ($this->routeIs('login')) {
            return [
                'email'    => 'required|email',
                'password' => 'required',
            ];
        }

        // Validation pour l'inscription
        if ($this->routeIs('register')) {
            return [
                'name'     => 'required|string|max:255',
                'email'    => 'required|email|unique:users',
                'password' => 'required|min:6|confirmed',
            ];
        }

        return [];
    }
}
