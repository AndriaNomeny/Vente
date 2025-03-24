<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class produitRequest extends FormRequest
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
            'nom' => 'required|regex:/^[A-Za-zÀ-ÿ\s]+$/|min:2',
            'categorie_id' => 'required|exists:categories,id',
            'description' => 'required|string|max:500',
            'image' => 'required|image', // max 2MB
        ];
    }

    public function messages()
    {
        return [
            'nom.required' => 'Le nom de la catégorie est obligatoire.',
            'nom.string' => 'Le nom doit être une chaîne de caractères.',
            'nom.min' => 'Le nom doit contenir au moins 2 caractères.',
            'nom.regex' => 'Le nom doit contenir uniquement des lettres et des espaces.',
            'categorie_id.required' => 'Veuillez sélectionner une catégorie.',
            'categorie_id.exists' => 'La catégorie sélectionnée n\'existe pas.',
            'description.string' => 'La description doit être une chaîne de caractères.',
            // 'description.min' => 'La description doit contenir au moins 10 caractères.',
            'description.max' => 'La description ne peut pas dépasser 500 caractères.',
            'image.image' => 'Le fichier doit être une image.',
            'image.mimes' => 'L\'image doit être au format jpeg, png, jpg ou gif.',
            'image.max' => 'L\'image ne doit pas dépasser 2 Mo.',
        ];
    }
}
