<?php

namespace App\Http\Controllers\UserAuth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Livraision;
use App\User;
use Session;
use App\Cart;
class LivraisionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
            return view('user.front.checkout');

    }


    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
     {

  
   
          $this->validate($request,[
            'ville'=>'required',
            'gouvernement'=>'required',
            'addresse'=>'required',
            'code'=>'required|integer',
            'statut'=>'sometimes',
            'telephone'=>'sometimes|integer',
        ]);

        //$user=Auth::guard('user')->user()->getAuthIdentifier();
      if (!Session::has('cart')) {
            return redirect()->route('profile',1);
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        //dd($cart);
        //dd($request->input('stripeToken'));
        
        Livraision::create([
            
            
            'ville'=>$request->ville,
            'gouvernement'=>$request->gouvernement,
            'addresse'=>$request->addresse,
            'zip'=>$request->code,
            'statut'=>$request->statut,
            'telephone'=>$request->telephone,
            ]);
        Session::flash('success','add with success');
        return redirect()->route('payment');

    }

    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
