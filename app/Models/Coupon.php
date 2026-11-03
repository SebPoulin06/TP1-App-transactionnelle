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



    }
