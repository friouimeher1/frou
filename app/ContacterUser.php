<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContacterUser extends Model
{
  protected $fillable=['user_id','sujet','message','role'];
  public function user(){
    return $this->belongsTo(User::class);
  }
  public function commercants(){
    return $this->hasMany(Commercant::class);
  }
}
