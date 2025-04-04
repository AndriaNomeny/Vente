<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commande extends Model
{
    use HasFactory;

    // Définition des colonnes remplissables
    protected $fillable = ['client_id', 'produit_id', 'quantite'];

    /**
     * Relation : Une commande appartient à un client.
     */
    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    /**
     * Relation : Une commande concerne un produit.
     */
    public function produit()
    {
        return $this->belongsTo(Produit::class);
    }
}
