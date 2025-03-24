<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\categorieController;
use App\Http\Controllers\produitController;
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
    Route::get('/categories', [CategorieController::class, 'a'])->name('index.categorie');
    Route::get('/index/create', [CategorieController::class, 'b']);
    Route::post('/index', [CategorieController::class, 'store'])->name('categorie.create');
    Route::get('/index/edit/{id}', [CategorieController::class, 'edit'])->name('categorie.edit');
    Route::post('/index/update/{id}', [CategorieController::class, 'update'])->name('categorie.update');
    Route::get('/index/delete/{id}', [CategorieController::class, 'delete'])->name('categorie.delete');

    // Produit
    Route::get('/produits', [ProduitController::class, 'a'])->name('index.produit');
    Route::get('/indexx/cree', [ProduitController::class, 'b'])->name('produit.creat');
    Route::put('/indexx', [ProduitController::class, 'c'])->name('produit.store');
    Route::get('/indexx/edit/{id}', [ProduitController::class, 'edit'])->name('produit.edit');
    Route::post('/indexx/update/{id}', [ProduitController::class, 'update'])->name('produit.update');
    Route::delete('/indexx/delete/{id}', [ProduitController::class, 'delete'])->name('produit.delete');
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

