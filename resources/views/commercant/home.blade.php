@extends('commercant.layout.default')
@section('content')
<br><br><br>
<style type="text/css">
     { padding-top:50px; }
.panel-body .btn:not(.btn-block) { width:300px; height: 100px; margin-bottom:10px; }
</style>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Accueil</div>

                <div class="panel-body">
                    <div class="row">
                        <div class="col-xs-6 col-md-6">
                          <a href="{{route('commercant.profile')}}" class="btn btn-danger btn-lg" role="button"> <br/>Profile  </a>
                          <a href="{{route('produit.index')}}" class="btn btn-warning btn-lg" role="button"> <br/> Produit </a>
                          <a href="{{route('promotion.affiche')}}" class="btn btn-primary btn-lg" role="button"> <br/>Produit promotion</a>
                          <a href="{{route('commercant.commande')}}" class="btn btn-primary btn-lg" role="button">Commande <br/></a>
                        </div>
                        <div class="col-xs-6 col-md-6">
                          <a href="{{route('calender')}}" class="btn btn-success btn-lg" role="button"> <br/>Calendrier</a>
                          <a href="{{route('commercant.show')}}" class="btn btn-info btn-lg" role="button"> <br/>Contacter</a>
                          <a href="{{url('commercant/notification')}}" class="btn btn-primary btn-lg" role="button"> <br/>Notification<span> ({{Auth::guard('commercant')->user()->unreadnotifications()->count()}})</span></a>
                          <a href="{{route('notificationproduit')}}" class="btn btn-primary btn-lg" role="button" <br/>Envoyer Notification</a>
                        </div>
                    </div>
                    <a href="http://www.jquery2dotnet.com/" class="btn btn-success btn-lg btn-block" role="button"> Website</a>
                </div>

            </div><!--/.row-->
                </div>
            </div>
        </div>
    </div>
@endsection
