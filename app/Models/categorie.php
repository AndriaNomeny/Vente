<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class categorie extends Model
{
    use HasFactory;
    protected $fillable = ['nom_categorie'];
    // Relation inverse : Une catégorie possède plusieurs produits
    
    public function produits()
    {
        return $this->hasMany(Produit::class, 'categorie_id');
    }
}
