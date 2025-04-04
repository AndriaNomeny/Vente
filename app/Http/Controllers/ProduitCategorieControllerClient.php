<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClientRequest;
use App\Models\Client;
use App\Models\Commande;
use App\Models\produit;
use App\Models\User;
use App\Notifications\ContactRequestNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProduitCategorieControllerClient extends Controller
{
    
    public function index()
    {
        
        // User::create([
        //     'name' => 'Mpanjaka',
        //     'email'=> 'mpanjaka@gmail.com',
        //     'password' => Hash::make('0000')
        // ]);
        $produits = produit::with('categorie')->get();  // Charger les catégories avec les produits

        return view('clients.accueil', [
            'produits' => $produits
        ]);
    }

    public function show(produit $produit)
    {
        return view('clients.show', [
            'produit' => $produit
        ]);
    }

    public function passerCommande(produit $produit)
    {   
        $client = new Client();
        return view('clients.commande', [
            'produit' => $produit,
            'client' => $client
        ]);
    }

    public function commande(ClientRequest $request, produit $produit)
    {
        // Vérifier si le client existe déjà, sinon le créer
        $client = Client::firstOrCreate(
            ['emailClient' => $request->emailClient], // Condition unique (email)
            [
                'nom' => $request->nom,
                'telephone' => $request->telephone
            ]
        );

        // Création d'une commande dans la table "commandes"
        $commande = Commande::create([
            'client_id' => $client->id,
            'produit_id' => $produit->id,
            'quantite' => $request->quantite
        ]);
        $user = User::first();
        $user->notify(new ContactRequestNotification($commande));

        return redirect()->route('accueil')->with('success', 'Votre commande a été passée avec succès !');
    }
}
