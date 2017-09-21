<?php

namespace App\Http\Controllers\UserAuth;
use App\Admin;
use App\User;
use App\Commercant;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
class UserProfil extends Controller
{
  //show profile for user
    public function profileuser(){

    	return view('user.userprofile');
    }
    //show profile for admin
    public function profileadmin(){

    	return view('admin.adminprofile');
    }
    //show profile for customer
    public function profilecommercant(){

    	return view('commercant.commercantprofile');
    }
    //show the setting page for admin
    public function modifyprofileadmin(){
      $admin=Admin::where('id',Auth::guard('admin')->user()->id)->first();
      //dd($admin->id);
      return view('admin.modifierprofile',compact('admin'));
    }
    //update the information for admin
    public function updateyprofileadmin(Request $request){
      $formInput=$request->except('image');


    $image=$request->image;
    //dd($image);
    //dd($image);
    if($image){
        $imageName=$image->getClientOriginalName();
        $image->move('admin',$imageName);
        $formInput['image']=$imageName;
        //dd($imageName);
  }


  //$comm = Auth::guard('commercant')->user()->getAuthIdentifier();
    //$formInput['commercant_id']=$comm;
  //Produit::create($formInput);
  Admin::find(Auth::guard('admin')->user()->id)->update($formInput);
    return redirect()->route('admin.profile');
    }

    //--------------------------------------------------------------------------

    //show the setting page for user
    public function modifyprofileuser(){
      $user=User::where('id',Auth::guard('user')->user()->id)->first();

      return view('user.modifierprofile',compact('user'));
    }
    //update the information for user
    public function updateyprofileuser(Request $request){
      $formInput=$request->except('image');

//dd($request);
    $image=$request->image;
    //dd($image);
    //dd($image);
    if($image){
        $imageName=$image->getClientOriginalName();
        $image->move('user',$imageName);
        $formInput['image']=$imageName;
        //dd($imageName);
    }


    //$comm = Auth::guard('commercant')->user()->getAuthIdentifier();
    //$formInput['commercant_id']=$comm;
    //Produit::create($formInput);
    User::find(Auth::guard('user')->user()->id)->update($formInput);
    return redirect()->route('user.profile');
    }


    //----------------------------------------------------------------------------

    //--------------------------------------------------------------------------

    //show the setting page for user
    public function modifyprofilecommercant(){
      //$commercant=Commercant::where('id',Auth::guard('commercant')->user()->id)->first();

      return view('commercant.modifierprofile',compact('commercant'));
    }
    //update the information for user
    public function updateyprofilecommercant(Request $request){
      $formInput=$request->except('image');

//dd($request);
    $image=$request->image;
    //dd($image);
    //dd($image);
    if($image){
        $imageName=$image->getClientOriginalName();
        $image->move('commercant',$imageName);
        $formInput['image']=$imageName;
        //dd($imageName);
    }


    //$comm = Auth::guard('commercant')->user()->getAuthIdentifier();
    //$formInput['commercant_id']=$comm;
    //Produit::create($formInput);
    Commercant::find(Auth::guard('commercant')->user()->id)->update($formInput);
    return redirect()->route('commercant.profile');
    }


    //----------------------------------------------------------------------------

}
