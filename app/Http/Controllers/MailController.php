<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admin;
use Mail;
use App\Mail\SendMail;
use Session;
class MailController extends Controller
{
   public function send(){
    	Mail::send(new SendMail());
    	session()->flash('message', 'Mail est envoyé avec succès!');
    	return back();
    }

    public function email(){
    	$admin = Admin::first();
    	return view('user.contact', compact('admin'));
    }


}
