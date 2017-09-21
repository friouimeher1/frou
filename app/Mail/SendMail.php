<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Request;
use App\User;
use App\ContacterAdmin;
class SendMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
       $msg=\Request::get('user_email');
       //dd($msg);
       //$user=User::all();
       //dd($user);
       $email=\Request::get('user_email');
       $user=User::where('email',$email)->first();
      //dd(\Request::get('sujet'));
       if($user){
       ContacterAdmin::create([
         'user_id'=>$user->id,
         'sujet'=>\Request::get('sujet'),
         'message'=>\Request::get('message'),
       ]);
       session()->flash('message', 'message envoyer avec success');
       return $this->view('user.contact');
     }else{
        return $this->view('user.mail', ['msg' => \Request::get('message')])->to(\Request::get('user_email'));
    }
  }
}
