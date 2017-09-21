<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Commercant;
use App\Produit;
use App\Categorie;
use App\Promotion;
use App\User;
use Auth;
class WelcomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $c=Commercant::all();

       $categories=Categorie::all();
       //dd($categories);

       $produits=Produit::all();
       //dd($produits);
        foreach ($categories as $categorie) {
            //var_dump($categorie->id);
           $p=Produit::where('categorie_id',$categorie->id)->get();
           //dd($p->categorie->nom_categorie);
        }




      return view('index',compact('c','categories','promotions'));
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
      $c=Commercant::findOrFail($id);

    //   $produit=Produit::orderBy('id')->take(4)->get();
    //   $count=Produit::count('id');
    //   $count=$count-count($produit);
    //   //dd($count);
    //   $produits = Produit::orderBy('id', 'desc')->take($count)->get();
    //
    //     return view('user.front.index',compact('produit','c','produits'));
    return redirect()->route('front.index',compact('c'));
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
