<?php

namespace App\Http\Controllers;

use App\Models\Produit;
use Illuminate\Http\Request;
use App\Models\Panier;

class PanierController extends Controller
{
    public function index(){
        return view('Panier');
    }

    public function ajouter(Request $request, $id){
        $request->validate([
            'quantite' => 'required|integer|min:1',
        ]);

        $produit = Produit::findOrFail($id);

        $panier = session()->get('panier', []);
        $quantiteDemandee = $request->input('quantite');

        if(isset($panier[$id])){
            $panier[$id]['quantite'] += $quantiteDemandee;
        }else{
            $panier[$id] = [
                "nom" => $produit->nom,
                "quantite" => $quantiteDemandee,
                "prix" => $produit->prix,
            ];
        }

        session()->put('panier', $panier);

        session()->flash('success', $produit->nom . ' a été ajouté au panier!');

        return redirect()->back();
    }

    public function supprimer($id){
        $panier = session()->get('panier', []);

        if(isset($panier[$id])){
            unset($panier[$id]);
            session()->put('panier', $panier);
        }

        session()->flash('success', 'Produit supprimé du panier.');
        return redirect()->route('panier');
    }

    public function appliquerCoupon(Request $request){
        $request->validate([
            'code' => 'required|string',
        ]);
        $cou
    }



}
