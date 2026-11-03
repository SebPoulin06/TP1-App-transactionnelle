<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProduitController;
use App\Http\Controllers\PanierController;

Route::get('/', [ProduitController::class, 'index'])->name('acceuil');

//catalogue
Route::get('/produits', [ProduitController::class, 'index'])->name('produits.index');
Route::get('/produit/{produit}', [ProduitController::class, 'show']);
Route::post('/produit', [ProduitController::class, 'store']);
Route::put('/produit/{produit}', [ProduitController::class, 'update']);
Route::delete('/produit/{produit}', [ProduitController::class, 'destroy']);
Route::get('/produit/{produit}/edit', [ProduitController::class, 'edit']);


//Panier
Route::get('/panier', [PanierController::class, 'index'])->name('panier');
Route::post('/panier/ajouter/{id}', [PanierController::class, 'ajouter'])->name('panier.ajouter');
Route::delete('/panier/{id}', [PanierController::class, 'supprimer'])->name('panier.supprimer');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
