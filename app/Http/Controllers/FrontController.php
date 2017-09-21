<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Produit;
use Illuminate\Support\Facades\Auth;
use App\Commercant;
use App\Promotion;
use App\Event;
use Calendar;
class FrontController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


       // $produit=Produit::orderBy('id')->take(4)->get();
       // $count=Produit::count('id');
       // $count=$count-count($produit);
       // //dd($count);
       // $produits = Produit::orderBy('id', 'desc')->take($count)->get();
       return "bom !!!";




  // return view('user.front.index',compact('produit','produits'));
    }

    public function profile($id){


         $c=Commercant::where('id',$id)->firstOrFail() ;
         $events = [];

       $data = Event::all();

       if($data->count()){

          foreach ($data as $key => $value) {

            $events[] = Calendar::event(

                $value->title,

                true,

                new \DateTime($value->start_date),

                new \DateTime($value->end_date.' +1 day')

            );

          }

       }

      $calendar = Calendar::addEvents($events); 
         //dd($c->produit);
        //  $produits=Produit::all();
        //  foreach ($produits as $produit) {
        //  $promotions=Promotion::where('produit_id',$produit->id)->orderBy('id','desc')->first();
        // //dd($promotions);
         //}
           return view('user.front.index',compact('c','promotions','calendar'));

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
        $produit =Produit::findOrFail($id);

        return view('user.front.single',compact('produit'));
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
