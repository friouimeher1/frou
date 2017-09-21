@extends('commercant.layout.default')

@section('content')

<h1></h1>

@if($paniers1)

@foreach($paniers1 as $panier)

@foreach($panier->contenu->items as $item)
@if($item['item']['commercant_id'] == Auth::guard('commercant')->user()->getAuthIdentifier())

<table cellspacing="0" id="simple-table" class="table  table-bordered table-hover">
                                    <thead>
                                        <tr>

                                            <th class="product-name">Produit</th>
                                            <th class="product-price">Prix</th>
                                            <th class="product-quantity">Quantité</th>
                                            <th class="product-quantity">Somme de chaque produit</th>

                                        </tr>

                                        <li> <h1>Commande Crée par :{{$panier->user->name}}-{{$panier->user->prenom}} </h1>
                                        </li>


                                        <tr>

                                        <td>{{$item['item']['nom']}}</td>
                                        <td> {{ $item['price'] }} DT</td>
                                        <td>{{ $item['qty'] }}</td>

                                        <td>{{$subtot=number_format(($item['price']*$item['qty'])),2}}</td>

                                        </tr>



                                        <tr><th>totale : </th>
                                        <td colspan="2" class="centered">

                                        {{$p=0}}
                                        {{ $p=$p+(number_format(($panier->commande->total)*($panier->contenu->totalQty))) }} DT

                                        </td>
                                        <td><form action="{{url('commercant/approve')}}" method="POST">
                                                                {{ csrf_field() }}
                                                                <input <?php if($panier->commande->etat == 1) { echo "checked";}?> type="checkbox" name="etat">
                                                                <input type="hidden" name="userId" value="{{ $panier->commande->id }}"> &nbsp;
                                                                <input type="submit" value="Approver" class="btn btn-primary">
                                                            </form>
                                                            </td>
                                        </tr>

                                        </tr>

                                    </thead>
                                    </table>
                                    @endif

@endforeach

@endforeach
 @else
                                    <h1>Pas de Commande</h1>
 @endif

@stop
