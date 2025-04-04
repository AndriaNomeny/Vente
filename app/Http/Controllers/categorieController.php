<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategorieRequest;
use App\Models\categorie;
use Illuminate\Http\Request;

class CategorieController extends Controller
{
    public function index()
    {
        
        // alaina any am catégories
        $categories = categorie::all();

        // alefa any vue
        return view('Categories.index', [
            'categories' => $categories
        ]);
    }

    public function create()
    {
        $categorie = new categorie();
        return view('Categories.formCategorie', [
            'categorie' => $categorie
        ]);
    }

    public function store(CategorieRequest $request)
    {
        categorie::create([
            'nom_categorie' => $request->nom,
        ]);
        return to_route('categorie.index')->with('success', 'Catégorie ajoutée pr e!');
    }

    public function edit($id)
    {
        // maka anlecatégorie en fonction any ID
        $categorie = categorie::findOrFail($id);

        return view('Categories.formCategorie', [
            'categorie' => $categorie
        ]);
    }

    public function update(CategorieRequest $request, $id)
    {
        // Récupérer la catégorie à mettre à jour
        $categorie = categorie::findOrFail($id);
        //  $categorie = categorie::find($id);

        $categorie->update([
            'nom_categorie' => $request->nom, // Mise à jour du champ dans la base de données
        ]);
        
    return to_route('categorie.index')->with('success', 'Catégorie mise à jour pr oa!');
    }

    public function delete($id)
    {
        $categorie = categorie::findOrFail($id);
        $categorie->delete();

        return to_route('categorie.index')->with('success', 'Efa oe mety pr lesy io an!');
    }
}