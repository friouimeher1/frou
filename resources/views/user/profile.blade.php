@extends('user.layout.app')

@section('content')
@if(Session::has('message'))
<div class="row">
  <div class="alert alert-danger fade in col-sm-6 col-md-4, col-md-offset-4 col-sm-offset-3">

  <button data-dismiss="alert" class="close close-sm" type="button">
      <i class="icon-remove"></i>
  </button>

  <strong>Warning!</strong> 
     {{ Session::get('message')}}
   </div>
 </div>

@endif
@foreach($paniers as $panier)
@if($panier->user_id == Auth::guard('user')->user()->getAuthIdentifier())

                               <div class="row">
                            <div class="col-xs-12">
                                <!-- PAGE CONTENT BEGINS -->
                                <div class="row">
                                    <div class="col-xs-12">
                                        <table id="simple-table" class="table  table-bordered table-hover">
                                            <thead>
                                                <tr>

                                                    <th class="detail-col">Image</th>
                                                    <th>Prix</th>
                                                    <th>Quantité</th>



                                                    <th class="hidden-480">Produit</th>

                                                    <th></th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                @forelse($panier->contenu->items as $item)
                                                <tr>


                                                    <td class="center">
                                                       <div class="media">
                                             <a class="thumbnail pull-left" href="#">
                                               <img class="media-object" src="/images/{{$item['item']['image']}}" width="100px" > </a>
                                             <div class="media-body">


                                             </div>
                                                    </td>

                                                    <td>
                                                 {{ $item['price'] }} DT
                                                    </td>
                                                    <td>{{ $item['qty'] }}</td>


                                                    <td class="hidden-480">
                                                        <span class="label label-sm label-warning">{{$item['item']['nom']}}</span>
                                                    </td>

                                                    <td>
                                                        <div class="btn btn-primary">
                                                            <a href="{{route('commande.pdf',$panier->id)}}">Télécharger</a>


                                                        </div>


                                                    </td>
                                                    <div class="col-md-12">
@empty
                                                          <h3 class="btn btn-primary">pas de commande/h3>
                                                      @endforelse

                                                      <div class="col-md-4">
                    <div class="pull-left"><h4>Commande Totale</h4> </div>
                <div class="pull-right"><h4 class="text-right">{{$panier->totalPrice }} DT</h4></div>
                <div class="clearfix"></div>
            </div>
                      </div>

                                                </tr>





@endif
@endforeach
@endsection
