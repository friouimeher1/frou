<?php

namespace App\Http\Controllers\UserAuth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Admin;
use App\ContacterAdmin;
use App\User;
class ContacterAdminController extends Controller
{
    public function index(){

      $admin=Admin::first();

      return view('user.contact',compact('admin'));
    }
    public function store(Request $request){

      $user_email=User::all();
      //dd($request->message);
      foreach ($user_email as $email) {

      $user=User::where('email',$request->user_email)->first();
      //dd($user);
      }
      //dd($user);
      if($user){
        ContacterAdmin::create([
          'user_id'=>$user->id,
          'sujet'=>$request->sujet,
          'message'=>$request->message,
        ]);
        session()->flash('message', 'message envoyer avec success');
        return redirect()->route('contacteradmin');
      }else{
        session()->flash('message', 'SVP Verifier votre Email');
        return redirect()->route('contacteradmin');

      }
    }
}
