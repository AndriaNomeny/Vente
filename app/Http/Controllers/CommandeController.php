<?php

namespace App\Http\Controllers;

use App\Models\Commande;
use Illuminate\Http\Request;

class CommandeController extends Controller
{
    public function index()
    {
        // Récupérer toutes les commandes avec leurs clients et produits associés
        $commandes = Commande::with('client', 'produit')->latest()->get();

        // Retourner la vue avec les commandes
        return view('commandes.index', [
            'commandes' => $commandes
        ]);
    }
}
