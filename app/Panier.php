<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Panier extends Model
{
   protected $fillable=['contenu','user_id'];

   public function user(){

   	return $this->belongsTo(User::class);
   }
   
   public function commande(){
   	return $this->hasOne(Commande::class);
   }
   
}
