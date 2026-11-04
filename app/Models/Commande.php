<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Commande extends Model
{
    protected $fillable=[
        'gestionnaire_du_paiement',
        'id_du_paiement',
        'date',
        'rabais_du_paiement',
        'prix_total',
        'user_id',
    ];


    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function produits()
    {
        return $this->belongsToMany(Produit::class, 'commande_produit', 'commande_id', 'produit_id')
            ->withPivot('id','prix_unitaire', 'quantite');
    }

    public function coupons(){
        return $this->belongsToMany(Coupon::class, 'commande_coupon');
    }

    public function estRemboursee()
    {
        $ids = $this->produits->pluck('pivot.id');
        return Remboursement::whereIn('commande_produit_id', $ids)->exists();
    }
}
