<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategorieController;
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

Route::get('/', function () {
    return view('welcome');
});

// Routes protégées par l'authentification
//Route::middleware(['auth'])->group(function () {
    // Catégorie
    Route::get('/categories', [CategorieController::class, 'index'])->name('categorie.index');
    Route::get('/categorie/create', [CategorieController::class, 'create'])->name('categorie.create');
    Route::post('/categorie', [CategorieController::class, 'store'])->name('categorie.store');
    Route::get('/categorie/edit/{id}', [CategorieController::class, 'edit'])->name('categorie.edit');
    Route::post('/categorie/update/{id}', [CategorieController::class, 'update'])->name('categorie.update');
    Route::get('/categorie/delete/{id}', [CategorieController::class, 'delete'])->name('categorie.delete');

    // Produit
    Route::get('/produits', [ProduitController::class, 'index'])->name('produit.index');
    Route::get('/produit/cree', [ProduitController::class, 'create'])->name('produit.create');
    Route::put('/produit', [ProduitController::class, 'store'])->name('produit.store');
    Route::get('/produit/edit/{id}', [ProduitController::class, 'edit'])->name('produit.edit');
    Route::post('/produit/update/{id}', [ProduitController::class, 'update'])->name('produit.update');
    Route::delete('/produit/delete/{id}', [ProduitController::class, 'delete'])->name('produit.delete');
//});

//login
//Route::get('/login', [AuthController::class, 'login'])->name('auth.login');
//Route::post('/login', [AuthController::class, 'doLogin']);

//auth
Route::get('/login', [UserController::class, 'showLoginForm'])->name('login');
Route::post('/loginn', [UserController::class, 'login'])->name('seConnecter');
Route::get('/register', [UserController::class, 'showRegisterForm']);
Route::post('/register', [UserController::class, 'register']);
Route::post('/logout', [UserController::class, 'logout'])->name('deconnexion');

