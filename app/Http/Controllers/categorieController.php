<?php

namespace App\Http\Controllers;

use App\Models\categorie;
use Illuminate\Http\Request;

class categorieController extends Controller
{
    public function a()
    {
        
        // alaina any am catégories
        $categories = categorie::all();

        // alefa any vue
        return view('index', compact('categories'));
    }

    public function b()
    {
        return view('create');
    }

    public function store(Request $request)
    {
        // dd('ok');
        $request->validate([
            'nom' => 'required|regex:/^[A-Za-zÀ-ÿ\s]+$/|min:2',
        ], [
            'nom.required' => 'Le nommmmm de la catégorie est obligatoire.',
            'nom.string' => 'Le nom doit être une chaîne de caractères.',
            'nom.min' => 'Le nom doit contenir au moins 2 caractères.',
            'nom.regex' => 'Le nom doit contenir uniquement des lettres et des espaces.',
        ]);
        
        
        
        categorie::create([
            'nom_categorie' => $request->nom,
        ]);
        return redirect('categories')->with('success', 'Catégorie ajoutée pr e!');
    }

    public function edit($id)
    {
        // maka anlecatégorie en fonction any ID
        $categorie = categorie::findOrFail($id);

        return view('edit', compact('categorie'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nom' => 'required|regex:/^[A-Za-zÀ-ÿ\s]+$/|min:2',
    ], [
            'nom.required' => 'Le nommmmm de la catégorie est obligatoire.',
            'nom.string' => 'Le nom doit être une chaîne de caractères.',
            'nom.min' => 'Le nom doit contenir au moins 2 caractères.',
            'nom.regex' => 'Le nom doit contenir uniquement des lettres et des espaces.',
    ]);
        // Récupérer la catégorie à mettre à jour
        $categorie = categorie::findOrFail($id);
    //  $categorie = categorie::find($id);

    // if (!$categorie) {
    //     return redirect('/index')->with('error', 'Catégorie non trouvée.');
    // }

        $categorie->update([
            'nom_categorie' => $request->nom, // Mise à jour du champ dans la base de données
        ]);
        
    return redirect('/index')->with('success', 'Catégorie mise à jour pr oa!');
    }

    public function delete($id)
    {
        $categorie = categorie::findOrFail($id);
        $categorie->delete();

        return redirect('/index')->with('success', 'Efa oe mety pr lesy io an!');
    }
}