@extends('commercant.layout.default')
@section('content')

@if(Session::has('message'))
<div class="row">
  <div class="alert alert-success fade in col-sm-6 col-md-4, col-md-offset-4 col-sm-offset-3">

  <button data-dismiss="alert" class="close close-sm" type="button">
      <i class="icon-remove"></i>
  </button>

  <strong>Warning!</strong> Produit Ajouter.

     {{ Session::get('success')}}
   </div>
 </div>

@endif
          <a class="btn btn-primary" href="{{ route('produit.create') }}">Ajouter</a>

                  <form action="{{route('commercant.search')}}" method="get">
<input type="text" name="search" value="">
<button class="btn btn-primary">Rechercher</button>
</form>
                    <table class="table table-bordered table-striped table-advance table-hover">
                       <tbody>
                          <tr>
                            <th><i class="icon_mobile"></i> #</th>
                            <th><i class="icon_profile"></i> Nom </th>
                             <th><i class="icon_profile"></i> Description</th>
                             <th><i class="icon_calendar"></i> Nom Catégorie</th>
                             <th><i class="icon_mail_alt"></i> Prix</th>
                             <th><i class="icon_mail_alt"></i> Quantité</th>
                             <th><i class="icon_mail_alt"></i> Quantité min</th>
                             <th><i class="icon_pin_alt"></i> Image</th>
                             <th><i class="icon_cogs"></i> Action</th>
                          </tr>
                          @foreach($produits as $produit)
                          <tr>
                            <td>{{$produit -> id   }}   </td>
                             <td>{{$produit -> nom   }}   </td>
                             <td>{{$produit -> description}} </td>
                             <td>{{$produit -> categorie->nom_categorie}} </td>
                             <td>{{$produit -> prix}} DT</td>
                             <td>{{$produit -> qte}}</td>
                             <td>{{$produit -> qtemin}}</td>
                             <td><img src="/images/{{$produit ->image}}" width="100px" height="100px"> </td>

                             <td>
                               <form method="POST" action="{{ route('produit.destroy', $produit->id) }}" accept-charset="UTF-8">
               		                            <input name="_method" type="hidden" value="DELETE">
               		                            <input name="_token" type="hidden" value="{{ csrf_token() }}">
               		                            <a href="{{route('produit.edit', $produit->id)}}" class="btn btn-primary">Modifier </a>
               		                        	<input type="submit" class="btn btn-danger" onclick="return confirm('Confirmer suppression ?');" value="Supprimer">
               		                        </form><br>
                                          <a href="{{url('/commercant/produit1', $produit->id)}}" class="btn btn-primary">Ajouter promotion </a>


                              </td>

                          </tr>
                          @endforeach
                       </tbody>
                    </table>

@stop
