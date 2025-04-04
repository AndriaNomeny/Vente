<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClientRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nom' => 'required|string|max:255',
            'emailClient' => 'required|email|max:255|unique:clients,emailClient',
            'telephone' => 'required|regex:/^(\+?\d{1,3}[- ]?)?\d{8,15}$/',
            'quantite' => 'required|integer|min:1'
        ];
    }

    /**
     * Get custom messages for validation errors.
     */
    public function messages(): array
    {
        return [
            'nom.required' => 'Le nom est obligatoire.',
            'nom.string' => 'Le nom doit être une chaîne de caractères.',
            'nom.max' => 'Le nom ne peut pas dépasser 255 caractères.',

            'emailClient.required' => 'L\'adresse email est obligatoire.',
            'emailClient.email' => 'Veuillez entrer une adresse email valide.',
            'emailClient.max' => 'L\'email ne peut pas dépasser 255 caractères.',
            'emailClient.unique' => 'Cette adresse email est déjà utilisée.',

            'telephone.required' => 'Le numéro de téléphone est obligatoire.',
            'telephone.regex' => 'Le format du numéro de téléphone est invalide.',
            
            'quantite.required' => 'La quantité est obligatoire.',
            'quantite.integer' => 'La quantité doit être un nombre entier.',
            'quantite.min' => 'La quantité doit être d\'au moins 1.'
        ];
    }
}
