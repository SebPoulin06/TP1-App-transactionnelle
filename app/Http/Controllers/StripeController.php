<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Checkout\Session as StripeSession;
use App\Models\Commande;
use Illuminate\Support\Facades\Mail;
use App\Mail\ConfirmationCommande;

class StripeController extends Controller
{
    public function payer(Request $request)
    {
        $panier = session()->get('panier', []);
        if (empty($panier)) {
            return redirect()->back()->with('error', 'Votre panier est vide.');
        }

        Stripe::setApiKey(config('services.stripe.secret'));


        $lineItems = [];
        foreach ($panier as $id => $details) {
            $lineItems[] = [
                'price_data' => [
                    'currency' => 'cad',
                    'product_data' => ['name' => $details['nom']],
                    'unit_amount' => (int) round($details['prix'] * 100),
                ],
                'quantity' => $details['quantite'],
            ];
        }
        $checkoutSession = StripeSession::create([
            'line_items'  => $lineItems,
            'mode'        => 'payment',
            'success_url' => route('stripe.succes') . '?session_id={CHECKOUT_SESSION_ID}',
            'cancel_url'  => route('stripe.annuler'),
        ]);

        return redirect()->away($checkoutSession->url);
    }


    public function succes(Request $request)
    {
        if (!$request->has('session_id')) {
            return redirect()->route('produits.index');
        }
        Stripe::setApiKey(config('services.stripe.secret'));
        $session = StripeSession::retrieve($request->get('session_id'));

        if ($session->payment_status === 'paid') {
            $paymentIntentId =$session->payment_intent;

            $panier = session()->get('panier', []);
            $commande =Commande::create([
                'gestionnaire_du_paiement' => 'Stripe',
                'id_du_paiement' => $paymentIntentId,
                'date' => now(),
                'rabais_du_paiement' => 0,
               'prix_total' => $session->amount_total / 100,
                'user_id' => auth()->user()->id,

            ]);

            foreach ($panier as $id => $details) {
                $commande->produits()->attach($id, [
                    'prix_unitaire' => $details['prix'],
                    'quantite'      => $details['quantite'],
                ]);
            }

            $commande->load('produits', 'user');

            try {
                Mail::to($commande->user->email)
                    ->send(new ConfirmationCommande($commande));
            } catch (\Throwable $e) {
                report($e);
            }


            session()->forget('panier');
            return redirect()->route('produits.index')->with('success','Paiment stripe réussi! ( ID Transaction'.$paymentIntentId.')');
        }
        return redirect()->route('produits.index')->with('error', 'Le paiement n’a pas pu être validé.');
    }

    public function annuler(){
        return redirect()->route('produits.index')
            ->with('error', 'Vous avez annulé le paiement Stripe.');
    }
}
