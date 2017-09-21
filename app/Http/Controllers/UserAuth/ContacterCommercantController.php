<?php
namespace App\Http\Controllers\UserAuth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\ContacterCommercant;
use App\User;
use App\Commercant;
use App\ContacterUser;
use Auth;
class ContacterCommercantController extends Controller
{

    public function store(Request $request)
    {
      $user_email=User::all();
    //  dd($request->commercant_email);
      foreach ($user_email as $email) {

      $user=User::where('email',$request->user_email)->first();
      //dd($user);
      }
      //dd($user);
      if($user){
        ContacterCommercant::create([
          'user_id'=>$user->id,
          'email_commercant'=>$request->commercant_email,
          'sujet'=>$request->sujet,
          'message'=>$request->message,
        ]);
        session()->flash('message', 'message envoyer avec success');
        return redirect()->back();
      }else{
        session()->flash('message', 'SVP Verifier votre Email');
        return redirect()->back();


    }

    }

    public function show(){
      $commercant =Auth::guard('commercant')->user()->email;
      //foreach ($commercants as $commercant) {
        $contactcommercants=ContacterCommercant::where('email_commercant',$commercant)->get();
      //dd($commercant->email);

      //}
      return view('commercant.affichemessageclinet',compact('contactcommercants'));
    }
    public function delete($id){
      // $commercant=ContacterCommercant::findORFail($id);
      ContacterCommercant::destroy($id);
      return redirect()->back();
    }
    //repondre to user
    public function replyToUser($id){
      //dd($id);
      $commercants=Auth::guard('commercant')->user();
      //foreach ($commercants as $commercant) {
        $contactcommercants=ContacterCommercant::where('email_commercant',$commercants->email)->first();
      //}
      $user=User::where('id',$id)->first();

      //dd($user);
      return view('commercant.envoyermail',compact('contactcommercants','user'));
    }
    //this function use to store data
    public function storereply($id,Request $request){
      //dd($request->commercant_email);
      ContacterUser::create([
        'user_id'=>$id,

        'sujet'=>$request->sujet,
        'message'=>$request->message,
        'role'=>$request->commercant_email,
      ]);
      session()->flash('message', 'message envoyer avec success');
      return redirect()->back();
    }
    //show paricular message for user

    public function showmessagetouser(){
      $users=User::where('id',Auth::guard('user')->user()->id)->first()->get();
      //dd($users);
      $contacteruser=ContacterUser::all();
      foreach ($users as $user) {
        $contact=ContacterUser::where('user_id',$user->id)->get();
      }
      // dd($contact);
      return view('admin.user.repondreadmin',compact('contact'));
    }
    // public function (){
    //   $users=User::all();
    //   foreach ($isers as $user) {
    //   $contact=ContacterUser::where('user_id',$user->id)->get();
    //
    //   }
    //   dd($contact);
    //   ;
    //
    //   return view('admin.user.contact',compact('contact'));
    // }
}
