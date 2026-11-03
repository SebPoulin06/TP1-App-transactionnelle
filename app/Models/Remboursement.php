<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Remboursement extends Model
{
    protected $fillable =[
        'date_remboursement',
        'quantite',
        'cause_remboursement',
        'commande_produit_id',
        'statut_id'
    ];


    public function statut(){
        return $this->belongsTo(Statut::class);
    }
}
