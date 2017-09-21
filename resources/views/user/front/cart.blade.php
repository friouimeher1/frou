@extends('user.layout.app')

@section('content')


@if(Session::has('cart'))
<br><br>

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Contact</div>
                <div class="panel-body">


                  <div class="form quick-post">

                <div class="col-md-8">
                    <div class="product-content-right">
                        <div class="woocommerce">
                          <div class="cart-collaterals">






                            <form method="post" action="#">
                                <table cellspacing="0" id="simple-table" class="table  table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th class="product-remove">#</th>
                                            <th class="product-thumbnail">Image</th>
                                            <th class="product-name">Produit</th>
                                            <th class="product-price">Prix</th>
                                            <th class="product-quantity">Quantité</th>
                                            <th class="product-subtotal">Action</th>
                                        </tr>
                                    </thead>
                                    @foreach($products as $product)
                                    <tbody>

                                        <tr class="cart_item">
                                            <td class="product-remove">
                                                <a title="Remove this item" class="remove" href="#">{{$product['item']['id'] }}</a>
                                            </td>

                                            <td class="product-thumbnail">
                                                <a href="#"><img width="145" height="145" alt="poster_1_up" class="shop_thumbnail" src="images/{{$product['item']['image']}}"></a>
                                            </td>

                                            <td class="product-name">
                                                <a href="#">{{$product['item']['nom']}}</a>
                                            </td>

                                            <td class="product-price">
                                                <span class="amount"> {{$product['item']['prix']}} DT</span>
                                            </td>

                                            <td class="product-quantity">
                                                <div class="quantity buttons_added">
                                                    <input type="text" size="4" class="input-text qty text" title="Qty" value="{{$product['qty']}}"  >
                                                </div>
                                            </td>

                                            <td>

                                  <a href="{{route('produit.addByOne', ['id' => $product['item']['id']])}}"><input type="button"  class="btn btn-default" name="" value="Supprimer par un"></a>
                                   <a href="{{route('produit.reduceByOne', ['id' => $product['item']['id']])}}"><input type="button"  class="btn btn-primary" name="" value="Ajouter par un"></a>
                                   <a href="{{route('produit.remove', ['id' => $product['item']['id']])}}"><input type="button"  class="btn btn-danger" name="" value="Supprimer"></a>


                                            </td>
                                        </tr>
                                        <tr>

                                        </tr>

                                    </tbody>
                                      @endforeach
                                      <td class="actions" colspan="6">




                                          <a href="{{route('livraision.index')}}"  class="btn btn-primary">Valider</a>

                                      </td>
                                </table>
                            </form>
                            <div class="cart_totals ">
                                

                                
                            </div>



                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

              @else
              <h1 class="btn btn-primary">pas acun produit dans la panier</h1>
              @endif
            </div>
          </div>

    @stop
