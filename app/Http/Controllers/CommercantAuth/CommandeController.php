<?php

namespace App\Http\Controllers\CommercantAuth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Commande;
use App\Panier;
use App\User;
use Auth;
class CommandeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        // $commandes=Commande::all();
        // $paniers=Panier::all();
        // foreach ($paniers as $panier) {
        //   $users =User::where('id',$panier->user_id)->first()->get();
        // }
        // //dd($users);
        // return view('commercant.commande',compact('commandes','panier','commande','users'));
    }

    public function commande($type=''){

        if($type=='spending'){

            $commandes=Commande::where('etat',0)->get();
        }
        elseif($type=='delivred'){

            $commandes=Commande::where('etat',1)->get();

        }
        else
        {
            $commandes=Commande::all();
           // dd($commandes);
            $paniers=Panier::all();

        $paniers->transform(function($panier, $key) {
            $panier->contenu = unserialize($panier->contenu);
            return $panier;
        });
         //dd($paniers);
        foreach ($paniers as $key2) {
           $p=$key2;
        }

            //$curent_commercant=Auth::guard('commercant')->user()->getAuthIdentifier();
 //dd($curent_commercant);
       foreach ($p->contenu->items as $key1 ) {



                     $paniers1=Panier::all();

            $paniers1->transform(function($panier, $key) {
            $panier->contenu = unserialize($panier->contenu);
            return $panier;
        });
            //dd($paniers1);


       }
       //dd($commercant_id);
        }
        //$panier= Panier::all();




        return view('commercant.commande',compact('commandes','paniers1','a'));
    }


    public function approve(Request $request)
    {
        // dd($request->userId);
        $post = Commande::find($request->userId);
       // dd($post);
        $approveVal = $request->etat;
        //dd($approveVal);
        if($approveVal == 'on'){
            $approveVal = 1;
        }else{
            $approveVal = 0;
        }
        $post->etat = $approveVal;
        $post->save();
        return back();
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
