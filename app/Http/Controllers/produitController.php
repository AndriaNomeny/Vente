<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProduitRequest;
use Illuminate\Http\RedirectResponse;
use App\Models\categorie;
use App\Models\produit;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class ProduitController extends Controller
{
    public function index()
    {
        // User::create([ssdssd
        //     'name' => 'Nomeny',
        //     'email'=> 'Nomeny@gmail.com',
        //     'password' => Hash::make('0000')
        // ]);


        $produits = produit::with('categorie')->get();  // Charger les catégories avec les produits

        // alefa any vue
        return view('Produits.index', [
            'produits' => $produits
        ]);
    }
    public function create()
    {
        $produit = new produit(); // Assurez-vous que le nom de la classe commence par une majuscule
        // Récupérer toutes les catégories
        $categories = categorie::pluck('nom_categorie', 'id'); // Assurez-vous que 'Categorie' commence par une majuscule et que la colonne est correcte
    
        // Afficher la vue avec les catégories
        return view('Produits.formProduit', [
            'categories' => $categories,
            'produit' => $produit
        ]);
    }
    
    public function store(ProduitRequest $request)
    {

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
            'prix' => $request->prix,
            'stock' => $request->stock,
            'image' => $imagePath, // Enregistrer l'image dans la base de données
        ]);
        return to_route('produit.index')->with('success', 'Produit ajoutée pr e!');
    }

    public function edit($id)
    {
        // maka anlecatégorie en fonction any ID
        $produit = produit::findOrFail($id);
        $categories = categorie::pluck('nom_categorie', 'id'); // Assurez-vous que 'Categorie' commence par une majuscule et que la colonne est correcte

        return view('Produits.formProduit', [
            'produit' => $produit,
            'categories' => $categories
        ]);
    }

    public function update(ProduitRequest $request, $id)
    {
        $data = $request->validated();

        // Récupérer le produit existant
        $produit = Produit::findOrFail($id);
        // dd($data);
        if($data['stockEnleve'] && $data['stock'] == 0)
        {
            // Mise à jour des informations
            $produit->nom_produit = $request->nom;
            $produit->categorie_id = $request->categorie_id;
            $produit->description = $request->description;
            $produit->prix = $request->prix;
            $produit->stock = $produit->stock - $request->stockEnleve;
        }else{  
            // Mise à jour des informations
            $produit->nom_produit = $request->nom;
            $produit->categorie_id = $request->categorie_id;
            $produit->description = $request->description;
            $produit->prix = $request->prix;
            $produit->stock = $request->stock + $produit->stock;
        }

        // dd($produit->stock);

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

        return to_route('produit.index')->with('success', 'Produit mis à jour avec succès !');
    }

    public function delete($id)
    {
        $produit = produit::findOrFail($id);
        // Vérifier et supprimer l'image associée s'il y en a une
        if ($produit->image) {
            Storage::delete('public/' . $produit->image);
        }
        $produit->delete();

        return to_route('produit.index')->with('success', 'Efa oe mety pr lesy io an!');
    }
};
