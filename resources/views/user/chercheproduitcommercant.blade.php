@extends('user.layout.app')

@section('content')


@foreach($produits as $produit)
                  <table class="table table-bordered table-striped table-advance table-hover">
             <tbody>
                <tr>

                  <th><i class="icon_profile"></i> Nom </th>
                   <th><i class="icon_profile"></i> Description</th>
                   <th><i class="icon_calendar"></i> Nom Catégorie</th>
                   <th><i class="icon_mail_alt"></i> Prix</th>

                   <th><i class="icon_pin_alt"></i> Image</th>

                </tr>
                @foreach($produits as $produit)
                <tr>

                   <td>{{$produit -> nom   }}   </td>
                   <td>{{$produit -> description}} </td>
                   <td>{{$produit -> categorie->nom_categorie}} </td>
                   <td>{{$produit -> prix}}DT</td>
                   <td><img src="/images/{{$produit ->image}}" width="100px" height="100px"> </td>



                </tr>
                @endforeach
             </tbody>
          </table>
     @endforeach
     @stop
