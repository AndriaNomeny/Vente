<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProduitRequest extends FormRequest
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
        // dd($this->request->all());
        return [
            'nom' => 'required|min:2',
            'categorie_id' => 'required|exists:categories,id',
            'description' => 'required|string|max:500',
            'prix' => 'required|numeric|min:0.01', // Prix doit être un nombre positif
            'stock' => 'nullable|numeric|min:0', // Stock doit être un nombre positif
            'stockEnleve' => 'nullable|numeric|min:0', // Stock doit être un nombre positif
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validation de l'image
        ];
    }

    public function messages()
    {
        return [
            'nom.required' => 'Le nom du produit est obligatoire.',
            'description.max' => 'La description ne peut pas dépasser 500 caractères.',
            'description.required' => 'La description doit etre obligatoire',
            'categorie_id.required' => 'Une categorie doit etre selectionnée',
            'prix.required' => 'Un doit etre obligatoire',
            'image.image' => 'Le fichier doit être une image.',
            'image.mimes' => 'L\'image doit être de type jpeg, png, jpg ou gif.',
            'image.max' => 'L\'image ne doit pas dépasser 2 Mo.',
        ];
    }
}
