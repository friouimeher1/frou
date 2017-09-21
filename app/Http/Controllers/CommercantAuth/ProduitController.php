<?php

namespace App\Http\Controllers\CommercantAuth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Produit;
use App\Categorie;
use App\Http\Requests;
use Session;
use App\Cart;
use App\Commercant;
use Illuminate\Support\Facades\Auth;
use App\produit_commercants;
use App\Promotion;
use Storage;
use App\Commande;
use App\Panier;
use Nexmo;
class ProduitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $comm = Auth::guard('commercant')->user()->getAuthIdentifier();

        $produits =Produit::where('commercant_id',$comm)->get();

        foreach ($produits as $produit) {
          //dd($produit->id);
        $promotion=Promotion::where('produit_id',$produit->id)->get();
        //dd($promotion);
        }
        //dd($produits);


      return view('commercant.produit.index',compact('produits','promotion'));

    }
    public function affichepromo(){

      $comm = Auth::guard('commercant')->user()->getAuthIdentifier();

      //----------------------------------------------------------------------

//pour l affichage de tout les client qui vente de cette commerçant
        $produits =Produit::where('commercant_id',$comm)->get();
    //dd($produits);
        // foreach ($produits as $produit) {
        //   //dd($produit->id);
         $promotions=Promotion::all();

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

      $curent_commercant=Auth::guard('commercant')->user()->getAuthIdentifier();
      //dd($curent_commercant);
      foreach ($p->contenu->items as $key1 ) {

      // dd($commercant_id==$curent_commercant)
               $paniers1=Panier::all();

      $paniers1->transform(function($panier, $key) {
      $panier->contenu = unserialize($panier->contenu);
      return $panier;
      });
      //dd($paniers1);


    }

      //-----------------------------------------------------------------------

        $produits =Produit::where('commercant_id',$comm)->get();
//dd($produits);
        // foreach ($produits as $produit) {
        //   //dd($produit->id);
         $promotions=Promotion::all();

        // }
        //
        //dd($promotions);

        //session()->flash('message', 'produit enregistrer avec success');

      return view('commercant.produit.affichepromo',compact('produits','promotions','paniers1'));

    }

    public function promotion($id){
      $produit=Produit::findOrFail($id);

      return view('commercant.produit.promotion',compact('produit'));
    }

    public function storepromo(Request $request){
      $promo =new Promotion();

//        validation
      $this->validate($request,[
          'prixpromo'=>'required',
          'produit_id'=>'required'
      ]);
//        image upload



        $promo->prixpromo=$request->prixpromo;
        $promo->produit_id=$request->produit_id;
        $promo->save();

        //session()->flash('message', 'produit enregistrer avec success');





      return redirect()->route('promotion.affiche');
    }



public function promonotification(){

  $comm = Auth::guard('commercant')->user()->getAuthIdentifier();

    $produits =Produit::where('commercant_id',$comm)->get();
//dd($produits);
    // foreach ($produits as $produit) {
    //   //dd($produit->id);

     $promotions=Promotion::all();

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

  $curent_commercant=Auth::guard('commercant')->user()->getAuthIdentifier();
  //dd($curent_commercant);
  foreach ($p->contenu->items as $key1 ) {
  $commercant_id=$key1['item']['commercant_id'];
  if($commercant_id==$curent_commercant){
  // dd($commercant_id==$curent_commercant)
           $paniers1=Panier::all();

  $paniers1->transform(function($panier, $key) {
  $panier->contenu = unserialize($panier->contenu);
  return $panier;
  });

  }else{
  $paniers1=0;
  }

}
//dd($paniers1);
return view('commercant.produit.affichepromo',compact('paniers1','promotions'));
}
public function sendtification(Request $request){
//dd($request);
  Nexmo::message()->send([
      'to' => $request->tele,
      'from' => Auth::guard('commercant')->user()->name,
      'text' => $request->name,
  ]);
  session()->flash('message', 'SMS envoyer avec success');

return redirect()->back();
}

    public function getAddToCart(Request $request, $id){
            $product = Produit::find($id);
            $oldCart = Session::has('cart') ? Session::get('cart') : null;
            $cart = new Cart($oldCart);
            $cart->add($product, $product->id);
            //dd($cart);
            $request->session()->put('cart', $cart);
          // dd($request->session()->get('cart'));
            //$c=Commercant::findOrFail($id);

            return redirect()->route('front.show',compact('product'));
        }

        public function getReductByOne($id){
                $oldCart = Session::has('cart') ? Session::get('cart') : null;
                $cart = new Cart($oldCart);
                $cart->addByOne($id);

                //Session::put('cart', $cart);
                if (count($cart->items) > 0) {
                    Session::put('cart', $cart);
                } else {
                    Session::forget('cart');
                }
                return redirect()->route('produit.shoppingCart');
            }
            public function getAddByOne($id){
                    $oldCart = Session::has('cart') ? Session::get('cart') : null;
                    $cart = new Cart($oldCart);
                    $cart->reduceByOne($id);

                    //Session::put('cart', $cart);
                    if (count($cart->items) > 0) {
                        Session::put('cart', $cart);
                    } else {
                        Session::forget('cart');
                    }
                    return redirect()->route('produit.shoppingCart');
                }

            public function getRemoveItem($id) {
               $oldCart = Session::has('cart') ? Session::get('cart') : null;
               $cart = new Cart($oldCart);
               $cart->removeItem($id);

               if (count($cart->items) > 0) {
                   Session::put('cart', $cart);
               } else {
                   Session::forget('cart');
       }

       return redirect()->route('produit.shoppingCart');

   }
   public function deletepromotion($id)
   {
           $p= Promotion::find($id);
           Storage::delete($p->image);
           $p->delete();
       //     $file= $p->images;
       // $filename = public_path().'/images/'.$file;
       // \File::delete($filename);
   return redirect()->back();
   }

        public function getCart(){
          if (!Session::has('cart')) {
              return view('user.front.cart');
          }
          $oldCart = Session::get('cart');
         $cart = new Cart($oldCart);
         //dd($cart);
          // foreach ($cart->items as $keye) {
          //   //dd($keye);
          //   $total=number_format($keye['price']*$keye['qty']);
          //   //dd($total);
          // }


          //dd($cart->items->price);
          return view('user.front.cart', ['quantiter'=>$cart->totalQty,'products' => $cart->items, 'totalPrice' => $cart->totalPrice]);



  }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
            $categories=Categorie::pluck('nom_categorie','id');
        return view('commercant.produit.produit',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $produit =new Produit();
        $formInput=$request->except('image');

//        validation
      $this->validate($request,[
          'nom'=>'required',
          'description'=>'required',
          'prix'=>'required',
          'image'=>'image|mimes:png,jpg,jpeg|max:10000',
          'qte'=>'required|numeric',
          'qtemin'=>'required|numeric'
      ]);
//        image upload
      $image=$request->image;
      if($image){
          $imageName=$image->getClientOriginalName();
          $image->move('images',$imageName);
          $formInput['image']=$imageName;
      }
      $comm = Auth::guard('commercant')->user()->getAuthIdentifier();
      $formInput['commercant_id']=$comm;
      Produit::create($formInput);



      session()->flash('message', 'produit enregistrer avec success');

      return redirect()->route('produit.show',$request->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       $produits=Produit::findOrFail($id);
       $c=Commercant::findOrFail($id);
        return view('commercant.produit.index',compact('produits','c'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories=Categorie::pluck('nom_categorie','id');
        $produits=Produit::findOrFail($id);

        return view('commercant.produit.editer',compact('produits','categories'));
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
        $formInput=$request->except('image');
//dd($request);
 //        validation
      $this->validate($request,[
          'nom'=>'required',
          'description'=>'required',
          'prix'=>'required',
          'image'=>'image|mimes:png,jpg,jpeg|max:10000',
          'qte'=>'required|numeric',
          'qtemin'=>'required|numeric'
      ]);
 //        image upload
      $image=$request->image;
      if($image){
          $imageName=$image->getClientOriginalName();
          $image->move('images',$imageName);
          $formInput['image']=$imageName;
    }
    $comm = Auth::guard('commercant')->user()->getAuthIdentifier();
      $formInput['commercant_id']=$comm;
    //Produit::create($formInput);
    Produit::find($id)->update($formInput);
    session()->flash('message', 'produit modifier avec success');

      return redirect()->route('produit.index');
}

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
            $p= Produit::find($id);
            Storage::delete($p->image);
            $p->delete();
        //     $file= $p->images;
        // $filename = public_path().'/images/'.$file;
        // \File::delete($filename);
    return redirect()->route('produit.index');
    }

    public function search(){

      $produit = Produit::where('commercant_id',Auth::guard('commercant')->user()->id);

    $search = \Request::get('search');
    //dd($search );
    $produits = Produit::where('nom', 'like', '%'.request()->search.'%')


    ->get();
//dd($produits);
    return view('commercant.produit.searchProduit',compact('produits'));

    }


}
