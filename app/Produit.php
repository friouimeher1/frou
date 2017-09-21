<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{
    protected $fillable=['commercant_id','nom','description','prix','categorie_id','image', 'qte', 'qtemin'];
     public function categorie(){
   return $this->belongsTo(Categorie::class);
 }

public function commercant(){
  return $this->belongsTo(Commercant::class);
}
public function promotion(){
  return $this->hasMany(Promotion::class);
}
}
