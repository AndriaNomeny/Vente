<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class produit extends Model
{
    use HasFactory;
    protected $fillable = ['nom_produit', 'categorie_id', 'description', 'prix','image', 'stock']; // Assurez-vous d'avoir la colonne categorie_id

    // Relation entre Produit et Categorie
    public function categorie()
    {
        return $this->belongsTo(Categorie::class, 'categorie_id');
    }

    /**
     * Relation : Un produit peut être commandé plusieurs fois.
     */
    public function commandes()
    {
        return $this->hasMany(Commande::class);
    }

    /**
     * Récupérer tous les clients qui ont commandé ce produit.
     */
    public function clients()
    {
        return $this->belongsToMany(Client::class, 'commandes')->withPivot('quantite')->withTimestamps();
    }

    public function image_url()
    {
        // dd(Storage::url($this->image));
        return Storage::url($this->image);
    }
}
