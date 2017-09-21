<?php

namespace App;

use App\Notifications\UserResetPassword;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','prenom','adresse','ville','telephone','image', 'email', 'password',
    ];




    // public function livraisions(){

    //     return $this->hasMany(Livraision::class);
    // }
     public function panier(){

        return $this->belongsTo(Panier::class);
    }

    //   public function commandes() {
    //     return $this->hasMany(Commande::class);
    // }
    public function commercant() {
      return $this->hasMany(Commercant::class);
  }

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Send the password reset notification.
     *
     * @param  string  $token
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new UserResetPassword($token));
    }
}
