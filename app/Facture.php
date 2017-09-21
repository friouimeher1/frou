<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Facture extends Model
{
    protected $fillable=['commande_id'];

    public function commande(){
    	return $this->belongsTo(Commande::class);
    }

}
