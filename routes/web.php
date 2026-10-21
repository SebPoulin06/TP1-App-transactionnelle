<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProduitController;

Route::get('/', [ProduitController::class, 'index'])->name('acceuil');



Route::get('/produits', [ProduitController::class, 'index'])->name('produits.index');
Route::get('/produit/{produit}', [ProduitController::class, 'show']);
Route::post('/produit', [ProduitController::class, 'store']);
Route::put('/produit/{produit}', [ProduitController::class, 'update']);
Route::delete('/produit/{produit}', [ProduitController::class, 'destroy']);
Route::get('/produit/{produit}/edit', [ProduitController::class, 'edit']);




Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
