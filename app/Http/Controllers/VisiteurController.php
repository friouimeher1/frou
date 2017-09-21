<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Produit;
class VisiteurController extends Controller
{
  public function search(){

  //  $produit = Produit::where('commercant_id',Auth::guard('commercant')->user()->id);
//dd($request->search);
  $search = \Request::get('search');
  //dd($search );
  $produits = Produit::where('nom',$search)->get();
//dd($produits);
  return view('user.chercheproduitcommercant',compact('produits'));

  }
}
