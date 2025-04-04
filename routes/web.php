<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\CommandeController;
use App\Http\Controllers\ProduitCategorieControllerClient;
use App\Http\Controllers\ProduitController;
use App\Http\Controllers\UserController;
use App\Models\categorie;
use App\Models\produit;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

// Routes protégées par l'authentification
Route::middleware(['auth'])->group(function () {
    // Catégorie
    Route::get('/categories', [CategorieController::class, 'index'])->name('categorie.index');
    Route::get('/categorie/create', [CategorieController::class, 'create'])->name('categorie.create');
    Route::post('/categorie', [CategorieController::class, 'store'])->name('categorie.store');
    Route::get('/categorie/edit/{id}', [CategorieController::class, 'edit'])->name('categorie.edit');
    Route::put('/categorie/update/{id}', [CategorieController::class, 'update'])->name('categorie.update');
    Route::get('/categorie/delete/{id}', [CategorieController::class, 'delete'])->name('categorie.delete');

    // Produit
    Route::get('/produits', [ProduitController::class, 'index'])->name('produit.index');
    Route::get('/produit/create', [ProduitController::class, 'create'])->name('produit.create');
    Route::post('/produit', [ProduitController::class, 'store'])->name('produit.store');
    Route::get('/produit/edit/{id}', [ProduitController::class, 'edit'])->name('produit.edit');
    Route::put('/produit/update/{id}', [ProduitController::class, 'update'])->name('produit.update');
    Route::delete('/produit/delete/{id}', [ProduitController::class, 'delete'])->name('produit.delete');

    // Utilisateur
    Route::get('/utilisateurs', [UserController::class, 'index'])->name('utilisateur.index');
    Route::get('/utilisateur/edit/{id}', [UserController::class, 'edit'])->name('utilisateur.edit');
    Route::put('/utilisateur/update/{id}', [UserController::class, 'update'])->name('utilisateur.update');
    Route::delete('/utilisateur/delete/{id}', [UserController::class, 'delete'])->name('utilisateur.delete');
});

// cote client
Route::get('/', [ProduitCategorieControllerClient::class, 'index'])->name('accueil');
Route::get('/passer une commmande/{produit}', [ProduitCategorieControllerClient::class, 'passerCommande'])->name('passerCommande');
Route::get('/produits/{produit}', [ProduitCategorieControllerClient::class, 'show'])->name('produits.show');
Route::post('/commande/{produit}', [ProduitCategorieControllerClient::class, 'commande'])->name('commande');

Route::get('/commandes', [CommandeController::class, 'index'])->name('commande.index');

//auth
Route::get('/login', [UserController::class, 'showLoginForm'])->name('showLoginForm');
Route::post('/doLogin', [UserController::class, 'doLogin'])->name('doLogin');
Route::get('/register/create', [UserController::class, 'showRegisterForm'])->name('showRegisterForm');
Route::post('/register', [UserController::class, 'register'])->name('register');
Route::post('/logout', [UserController::class, 'logout'])->name('logout');

