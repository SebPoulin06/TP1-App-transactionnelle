<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{
    protected $fillable = ['nom', 'description', 'prix', 'image'];

    //Formater le prix
    public function getPrixFormateAttribute(){
        return number_format($this->prix, 2, ',', ' ') . '$';
    }
}
