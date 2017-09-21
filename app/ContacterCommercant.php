<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContacterCommercant extends Model
{
    protected $fillable=['user_id','email_commercant','sujet','message'];
    public function user(){
      return $this->belongsTo(User::class);
    }
}
