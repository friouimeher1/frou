<?php

namespace App;

use Illuminate\Database\Eloquent\Model;




class Commande extends Model
{

	protected $fillable=['livraision_id','panier_id','date','etat','total'];



     public function panier() {
    	return $this->belongsTo(Panier::class);
    }
     public function livraision() {
      return $this->belongsTo(Livraision::class);
    }




}
