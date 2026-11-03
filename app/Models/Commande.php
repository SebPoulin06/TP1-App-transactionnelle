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
        return $this->belongsTo(User::class);
    }

    public function produits()
    {
        return $this->belongsToMany(Produit::class, 'CommandeProduit', 'id_commande', 'IDCommande')
            ->withPivot('prix_unitaire', 'quantite');
    }
}
