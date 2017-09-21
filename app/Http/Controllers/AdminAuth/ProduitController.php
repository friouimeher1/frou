<?php

namespace App\Http\Controllers\AdminAuth;
use App\Produit;
use App\Promotion;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Storage;

class ProduitController extends Controller
{
    public function produit(){
      $produits=Produit::all();
      return view('admin.toutProduit',compact('produits'));
    }

    public function ProduitPromotion(){
      $promotions=Promotion::all();
      return view('admin.ProduiPromotiont',compact('promotions'));
    }

//search product
    public function search(){

    	$produit = Produit::all();

    $search = \Request::get('search');  
    //dd($search );
    $produits = Produit::where('nom', 'like', '%'.request()->search.'%')->get();
    //dd($produits);
    return view('admin.searchProduit',compact('produits'));

    }

//delete product
    public function delete($id){
    	$p= Produit::find($id);
    	//dd($p);
            Storage::delete($p->image);
            $p->delete();
            return redirect()->back();
    }
}
