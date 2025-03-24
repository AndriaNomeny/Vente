<?php

namespace App\Http\Controllers;

use App\Http\Requests\produitRequest;
use App\Models\categorie;
use App\Models\produit;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class produitController extends Controller
{
    public function a()
    {
        //bobotadsfsd
        // User::create([ssdssd
        //     'name' => 'Nomeny',
        //     'email'=> 'Nomeny@gmail.com',
        //     'password' => Hash::make('0000')
        // ]);


        $produits = produit::with('categorie')->get();  // Charger les catégories avec les produits

        // alefa any vue
        return view('vueProduit.indexx', compact('produits'));
    }
    public function b()
    {
        $produit = new produit(); // Assurez-vous que le nom de la classe commence par une majuscule
        // Récupérer toutes les catégories
        $categories = Categorie::pluck('nom_categorie', 'id'); // Assurez-vous que 'Categorie' commence par une majuscule et que la colonne est correcte
    
        // Afficher la vue avec les catégories
        return view('vueProduit.create', compact('categories', 'produit'));  // Remplacez 'vueProduit.create' par le chemin correct de votre vue
    }
    
    public function c(produitRequest $request)
    {
        // dd($request);
        // $request->validate();

        // Gérer l'upload de l'image
        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
        };

        // Création du produit
        Produit::create([
            'nom_produit' => $request->nom,
            'categorie_id' => $request->categorie_id, // Ajout de la catégorie
            'description' => $request->description,
            'image' => $imagePath, // Enregistrer l'image dans la base de données
        ]);
        return redirect('/indexx')->with('success', 'Produit ajoutée pr e!');
    }

    public function edit($id)
    {
        // maka anlecatégorie en fonction any ID
        $produit = produit::findOrFail($id);
        $categorie = categorie::all();

        return view('vueProduit.edit', compact('produit', 'categorie'));
    }

    public function update(Request $request, $id)
    {
        // dd($request);
        // Validation des données
        $request->validate([
            'nom' => 'required|regex:/^[A-Za-zÀ-ÿ\s]+$/|min:2',
            'categorie_id' => 'required|exists:categories,id',
            'description' => 'required|string|max:500',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validation de l'image
        ], [
            'nom.required' => 'Le nom du produit est obligatoire.',
            'nom.regex' => 'Le nom doit contenir uniquement des lettres et des espaces.',
            'description.max' => 'La description ne peut pas dépasser 500 caractères.',
            'description.required' => 'La description doit etre obligatoire',
            'image.image' => 'Le fichier doit être une image.',
            'image.mimes' => 'L\'image doit être de type jpeg, png, jpg ou gif.',
            'image.max' => 'L\'image ne doit pas dépasser 2 Mo.',
        ]);

        // dd($request);
        // Récupérer le produit existant
        $produit = Produit::findOrFail($id);
        // dd($produit);

        // Mise à jour des informations
        $produit->nom_produit = $request->nom;
        $produit->categorie_id = $request->categorie_id;
        $produit->description = $request->description;

        // Vérification et gestion de l'image
        if ($request->hasFile('image')) {
            // Supprimer l'ancienne image si elle existe
            if ($produit->image) {
                Storage::delete('public/' . $produit->image);
            }
            // Enregistrer la nouvelle image
            $produit->image = $request->file('image')->store('images', 'public');
        }

        // Enregistrer les modifications
        $produit->save();

        return redirect('/indexx')->with('success', 'Produit mis à jour avec succès !');
    }

    public function delete($id)
    {
        $produit = produit::findOrFail($id);
        // Vérifier et supprimer l'image associée s'il y en a une
        if ($produit->image) {
            Storage::delete('public/' . $produit->image);
        }
        $produit->delete();

        return redirect('/indexx')->with('success', 'Efa oe mety pr lesy io an!');
    }
};
