<?php

use App\Http\Controllers\CommandeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProduitController;
use App\Http\Controllers\PanierController;
use App\Http\Controllers\StripeController;

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


<<<<<<< HEAD
=======
//historique
Route::get('/historique', [commandeController::class, 'historique'])->middleware(['auth', 'verified'])->name('historique');

>>>>>>> 1cebdbc28b5ed11317b8eba39031be5e9f21eb42

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


    //Stripe
    Route::post('/stripe/payer', [StripeController::class, 'payer'])->name('stripe.payer');
    Route::get('/stripe/succes', [StripeController::class, 'succes'])->name('stripe.succes');
    Route::get('/stripe/annuler', [StripeController::class, 'annuler'])->name('stripe.annuler');


});




require __DIR__.'/auth.php';
