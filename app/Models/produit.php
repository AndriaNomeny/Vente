<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class produit extends Model
{
    use HasFactory;
    protected $fillable = ['nom_produit', 'categorie_id', 'description','image']; // Assurez-vous d'avoir la colonne categorie_id

    // Relation entre Produit et Categorie
    public function categorie()
    {
        return $this->belongsTo(Categorie::class, 'categorie_id');
    }

    public function image_url()
    {
        // dd(Storage::url($this->image));
        return Storage::url($this->image);
    }
}
