<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

use App\Http\Controllers\ProduitController;

Route::get('/produits', [ProduitController::class, 'index']);
Route::get('/produit/{produit}', [ProduitController::class, 'show']);
Route::post('/produit', [ProduitController::class, 'store']);
Route::put('/produit/{produit}', [ProduitController::class, 'update']);
Route::delete('/produit/{produit}', [ProduitController::class, 'destroy']);
Route::get('/produit/{produit}/edit', [ProduitController::class, 'edit']);
