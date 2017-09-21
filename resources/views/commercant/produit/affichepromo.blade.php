@extends('commercant.layout.default')
@section('content')


@if(Session::has('message'))
<div class="row">
  <div class="alert alert-success fade in col-sm-6 col-md-4, col-md-offset-4 col-sm-offset-3">

  <button data-dismiss="alert" class="close close-sm" type="button">
      <i class="icon-remove">*</i>
  </button>

  <strong>Information :</strong> .

     {{ Session::get('message')}}
   </div>
 </div>

@endif

<br><br><br><br><br>
<div class="row">
              <div class="col-xs-12">
                <!-- PAGE CONTENT BEGINS -->
                <div class="row">
                  <div class="col-xs-12">
                    <table id="simple-table" class="table  table-bordered table-hover">
                      <thead>

                        <tr>

                          <th >#</th>
                          <th> Nom Produit</th>
                          <th> Image</th>
                          <th> Prix sans promotion</th>
                        <th> Prix avec promotion</th>
                        <th> Pourcentage</th>
                        <th>Action</th>
                        </tr>
                      </thead>

                      <tbody>
                      @foreach($promotions as $promotion)
                        <tr>


                          <td class="center">
                            {{$promotion->id}}
                          </td>




                          <td >
					{{$promotion->produit->nom}}
                      </td>
                      <td >
					<img src="/images/{{$promotion->produit->image}}" width="20px" height="20px">
                      </td>
                      <td>
                      {{$promotion->produit->prix}}
                      </td>
                          <td >
                           {{$promotion->prixpromo}}
                          </td>

                          <td>
                           {{number_format(($percent=($promotion->prixpromo * 100)/$promotion->produit->prix),2,'.',',')}}%
                  </td>
                  <td >
                   <form class="" action="{{route('deletepromotion',$promotion)}}" method="post">
                     {{csrf_field()}}
                     {{method_field('DELETE')}}
                     <button type="submit" name="button" class="btn btn-danger" onclick="vous étes sure pour la supprission">Supprimer</button>
                   </form>
                  </td>
                        </tr>

                        @endforeach

                        </tbody>
                        </table>
                        <div class="row">
          <a class="btn btn-success" href="">Ajouter</a>
        </div>


                                </div>
                              </div>
                          </div>



                      </div>
                      @if($paniers1)

                      @foreach($paniers1 as $panier)

                      @foreach($panier->contenu->items as $item)
                      @if($item['item']['commercant_id'] == Auth::guard('commercant')->user()->getAuthIdentifier())
                      <div class="row">
                                    <div class="col-xs-12">
                                      <!-- PAGE CONTENT BEGINS -->
                                      <div class="row">
                                        <div class="col-xs-12">
                                          <table id="simple-table" class="table  table-bordered table-hover">
                                            <thead>

                                              <tr>

                                                <th >Nom</th>
                                                <th> Prénom</th>
                                                <th> Téléphone</th>
                                                <th> Envoyer SMS</th>
                                              </tr>


<tr>
  <td>{{$panier->user->name}}</td>
  <td>{{$panier->user->prenom}}</td>
  <td>{{$panier->user->telephone}}</td>

    <td >

      <form action="{{route('sendnotif',$panier)}}" method="post">
        {{csrf_field()}}
        <p><textarea name="name" rows="5" cols="15">Cher client bienvenus à notre promotion!</textarea></p>
        <p>  <input type="text" name="tele" value="216{{$panier->user->telephone}}">
</p>
        <button type="submit" name="button" class="btn btn-info"><p>Envoyer SMS</p></button>

      </form>
    </td>


</tr>
@endif

@endforeach

@endforeach
@else
<h1>Pas de Commande</h1>
@endif
@stop
