<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Client extends Model
{
    use HasFactory, Notifiable;

    protected $fillable = ['nom', 'emailClient', 'telephone'];

    /**
     * Relation : Un client peut passer plusieurs commandes.
     */
    public function commandes()
    {
        return $this->hasMany(Commande::class);
    }

    /**
     * Récupérer tous les produits commandés par le client.
     */
    public function produits()
    {
        return $this->belongsToMany(Produit::class, 'commandes')->withPivot('quantite')->withTimestamps();
    }
}
