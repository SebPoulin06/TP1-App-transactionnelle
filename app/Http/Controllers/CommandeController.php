<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CommandeController extends Controller
{
    public function historique(Request $request){
        $commandes = $request->user()
            ->commandes()
            ->with('produits')
            ->latest()
            ->get();

        return view('historique', compact('commandes'));
    }
}
