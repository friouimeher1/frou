<?php

namespace App\Http\Controllers\UserAuth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;
use Auth;
use PDF;
use App\Admin;
use App\Panier;
use Stripe\Charge;
use Stripe\Stripe;
use App\Cart;
use App\Commande;
use App\Livraision;
use App\Facture;
use App\Produit;
use Illuminate\Notifications\DatabaseNotification;
use Illuminate\Notifications\notifiable;
use Illuminate\Support\Facades\Notification;
use App\Commercant;
class PayementController extends Controller
{
    public function payment(){



        return view('user.front.payment');
    }

     public function storePayment(Request $request)
    {


          {
         if (!Session::has('cart')) {
            return redirect()->route('profile',1);
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);


        //dd($request->input('stripeToken'));
        $products = $cart->items;
       //dd(serialize($cart));
        Stripe::setApiKey('sk_test_slQcYOxidIJ8tULBJVNGyKNo');
        try {
            $charge = Charge::create(array(
                "amount" => $cart->totalPrice * 100,
                "currency" => "usd",
                "source" => $request->input('stripeToken'), // obtained with Stripe.js
                "description" => "Test Charge"
           ));
           //session()->flash('message', 'paiment effectuer avec success ');

                //                dd($cart);
                foreach ($cart->items as $key ) {
                $produitid= $key['item']['id'];
                $produitqte=$key['qty'];
                $produit =Produit::where('id',$produitid)->first();
                //dd($produit->qte);
                $produit->qte=$produit->qte - $produitqte;
                //dd($produit->qte);
                $produit->save();
                $commid = $produit->commercant_id;
                $commercant =  Commercant::where('id',$commid)->first()->get();
                //dd($commercant);

                if($produit->qte < $produit->qtemin){
                  $admins = Admin::all();
                  Notification::send($commercant, new \App\Notifications\Stock($produit));
                }}


            //save all data for cart
             Panier::create([
            'contenu'=>serialize($cart),

            'user_id'=>Auth::guard('user')->user()->id,
          ]);
            //dd($panier->user_id);
          //dd  (Auth::guard('user')->user()->panier()->save($panier));

            //create order

            $livraision=Livraision::orderBy('id','desc')->first();
            $panier=Panier::orderBy('id','desc')->first();
            Commande::create([
            'livraision_id'=>$livraision->id,
            'panier_id'=>$panier->id,
            'total'=>$cart->totalPrice,
            ]);

            //create facture
            $commande=Commande::orderBy('id','desc')->first();
            Facture::create([
                'commande_id'=>$commande->id,
                ]);


            // // $commande->panier = serialize($cart);

            // // $commande->payment_id = $charge->id;
            // // $commande->livraision_id=Auth::guard('user')->user()->id;
            // // $commande->user_id=Auth::guard('user')->user()->id;
            // // dd($commande->commercant_id);
            //  //$comm_ids = $commande->pluck(‘commercant_id’);
            // // dd($comm_ids->all());
        } catch (\Exception $e) {
        }

        Session::forget('cart');
        return redirect()->route('getProfile')->with('message',  'paiment effectuer avec sucess');
    }

    }


      public function getProfile()
    {
        //$commandes = Auth::guard('user')->user()->panier->commande;
        //dd($commandes);
        // // $l=Auth::guard('user')->user()->livraisions;
        // $l=Livraision::where('user_id',Auth::guard('user')->user()->id)->get();

        // $commandes->transform(function($commande, $key) {
        //     $commande->panier = unserialize($commande->panier);
        //     return $commande;
        // });
        // // //dd($commandes);
        // $user=Auth::guard('user')->user()->id;
        // //dd($user);
        $commandes=Commande::all();

            //dd($commandes);
        // foreach ($commandes as $key) {
        //    $paniers=Panier::where('id',$key->panier_id)->first()->get();
        //
        // }
        $paniers=Panier::all();
        $paniers->transform(function($panier, $key) {
            $panier->contenu = unserialize($panier->contenu);
            return $panier;
        });

        return view('user.profile',compact('commandes','paniers'))->with('message',  'paiment effectuer avec sucess vous pouvez télécharger votre facture');
    }
    public function getPDF($id)
    {
         $factures = Facture::find($id);
         $paniers1=Panier::all();
        $paniers1->transform(function($panier, $key) {
            $panier->contenu = unserialize($panier->contenu);
            return $panier;
        });
         //dd($paniers1);
        foreach ($paniers1 as $key) {
          $panier=$key;
        }
        // foreach ($commande as $k ) {
        //     dd($k->panier);
        // }

        //dd($commande->panier['id']);
        $pdf = PDF::loadview('user.pdf', compact('factures','panier') );
        return $pdf->download('commande.pdf');
    }
}
