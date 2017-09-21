<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
    protected $fillable=['produit_id','prixpromo'];

    public function produit(){
	   return $this->belongsTo(Produit::class);
	}
}
