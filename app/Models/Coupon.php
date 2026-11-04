<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    protected $fillable = [
        'code',
        'rabais_fix',
        'rabais_pourcentage',
        'date_expiration',
    ];

    public function commandes(){
        return $this->belongsToMany(Commande::class, 'commande_coupon');
    }

    public function calculerRabais($sousTotal)
    {
        if ($this->rabais_pourcentage) {
            return round($sousTotal * $this->rabais_pourcentage / 100, 2);
        }
        return min($this->rabais_fix, $sousTotal);
    }
}
