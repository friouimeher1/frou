@extends('admin.layout.default')

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
                          <a href="" class="btn btn-danger btn-lg" role="button"> <br/>Notification(s) Utilisateur {{ $notificationsUser }} </a>
                          <a href="{{route('admin.produit')}}" class="btn btn-warning btn-lg" role="button"> <br/>Notification(s) Commercant {{ $notificationsCommercant }} </a>
                          <a href="{{route('admin.produit')}}" class="btn btn-primary btn-lg" role="button"> <br/>Produit</a>
                          <a href="{{route('admin.promotion')}}" class="btn btn-primary btn-lg" role="button">Produits en Promotion <br/></a>
                        </div>
                        <div class="col-xs-6 col-md-6">
                          <a href="{{url('admin/User')}}" class="btn btn-success btn-lg" role="button"> <br/>Client</a>
                          <a href="{{url('admin/Customer')}}" class="btn btn-info btn-lg" role="button"> <br/>Commerçant</a>
                          <a href="{{route('Categorie.index')}}" class="btn btn-primary btn-lg" role="button"> <br/>Catégorie</a>
                          <a href="{{route('charts')}}" class="btn btn-primary btn-lg" role="button" <br/>Statistique clients</a>
                        </div>
                    </div>
                    <a href="http://www.jquery2dotnet.com/" class="btn btn-success btn-lg btn-block" role="button"> Website</a>
                </div>

            </div><!--/.row-->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
