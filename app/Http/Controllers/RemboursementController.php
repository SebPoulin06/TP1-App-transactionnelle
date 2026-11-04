<?php

namespace App\Http\Controllers;

use App\Models\Commande;
use App\Models\Remboursement;
use Illuminate\Http\Request;
use Stripe\Refund;
use Stripe\Stripe;

class RemboursementController extends Controller
{
    public function rembourser(Commande $commande)
    {
        if ($commande->user_id !== auth()->id()) {
            abort(403);
        }
        if ($commande->estRemboursee()) {
            return back()->with('error', 'Cette commande est déjà remboursée.');
        }

        if ($commande->created_at->lt(now()->subDays(30))) {
            return back()->with('error', 'Le délai de 30 jours est dépassé.');
        }
        Stripe::setApiKey(config('services.stripe.secret'));

        try {
            Refund::create(['payment_intent' => $commande->id_du_paiement]);
        } catch (\Exception $e) {
            return back()->with('error', 'Le remboursement a échoué.');
        }
        foreach ($commande->produits as $produit) {
            Remboursement::create([
                'date_remboursement' => now(),
                'quantite' => $produit->pivot->quantite,
                'cause_remboursement' => 'Annulation demandée par le client',
                'commande_produit_id' => $produit->pivot->id,
                'statut_id' => 2,
            ]);
        }

        return back()->with('success', 'Commande remboursée !');
    }

}
