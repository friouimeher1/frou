@extends('admin.layout.default')

@section('content')

<form action="{{route('admin.search')}}" method="get">
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

                   <th><i class="icon_pin_alt"></i> Image</th>
                   <th><i class="icon_cogs"></i> Action</th>
                </tr>
                @foreach($produits as $produit)
                <tr>
                  <td>{{$produit -> id   }}   </td>
                   <td>{{$produit -> nom   }}   </td>
                   <td>{{$produit -> description}} </td>
                   <td>{{$produit -> categorie->nom_categorie}} </td>
                   <td>{{$produit -> prix}}</td>
                   <td><img src="/images/{{$produit ->image}}" width="100px" height="100px"> </td>

                   <td>
                     <form method="POST" action="{{ route('admin.destroy', $produit->id) }}" accept-charset="UTF-8">
                                    <input name="_method" type="hidden" value="DELETE">
                                     <input name="_token" type="hidden" value="{{ csrf_token() }}">
                                  <input type="submit" class="btn btn-danger" onclick="return confirm('Confirmer suppression ?');" value="Supprimer">
                                </form>



                    </td>

                </tr>
                @endforeach
             </tbody>
          </table>

@stop
