          @extends('user.layout.app')

          @section('content')


          @if(Session::has('success'))
          <div class="row">
          <div class="col-sm-6 col-md-4 col-md-offset-4 col-sm-offset-3">
          <div id="charge-message" class="alert alert-success">
          {{Session::get('success')}}
          </div>
          </div>
          </div>
          @endif
          <br><br>
          <div class="col-md-6 portlets">
          <div class="panel panel-default">
          <div class="panel-heading">
          <div class="pull-left"><b>Contacter Commerçant</b></div>

          <div class="clearfix"></div>
          </div>
          <div class="panel-body">
          <div class="padd">


          <div class="form quick-post">
          <form   action="{{route('commercant.store')}}" method="post">
          {{csrf_field()}}

          <div class="form-group">
          <label class="col-sm-3 control-label no-padding-right" for="form-field-recipient">Commerçant:</label>

          <div class="col-sm-9">
          <span class="input-icon">
          <input type="email"  id="form-field-recipient" value="{{$produit->commercant->email}}" name="commercant_email" placeholder="Email" readonly="true" />
          <i class="ace-icon fa fa-user"></i>
          </span>
          </div>
          </div>

          <div class="hr hr-18 dotted"></div>
          <div class="form-group">
          <label class="col-sm-3 control-label no-padding-right" for="form-field-recipient">Utilisateur:</label>

          <div class="col-sm-9">
          <span class="input-icon">
          <input type="email" name="user_email"    placeholder="Email" />
          <i class="ace-icon fa fa-user"></i>
          </span>
          </div>
          </div>

          <div class="hr hr-18 dotted"></div>

          <div class="form-group">
          <label class="col-sm-3 control-label no-padding-right" for="form-field-subject">Sujet:</label>

          <div class="col-sm-6 col-xs-12">
          <div class="input-icon block col-xs-12 no-padding">
          <input maxlength="100" type="text" class="col-xs-12" name="sujet" id="form-field-subject" placeholder="Subject" />
          <i class="ace-icon fa fa-comment-o"></i>
          </div>
          </div>
          </div>

          <div class="hr hr-18 dotted"></div>

          <div class="form-group">
          <label class="col-sm-3 control-label no-padding-right">
          <span class="inline space-24 hidden-480"></span>

          </label>

          <div class="col-sm-5">
          <textarea name="message" rows="8" cols="55" ></textarea>
          </div>
          </div>

          <div class="hr hr-18 dotted"></div>

          <div class="form-group no-margin-bottom">
          <label class="col-sm-3 control-label no-padding-right">:</label>

          <div class="col-sm-9">

          <button type="submit" class="btn btn-primary" name="button">Envoyer</button>
          </div>
          </div>
          </div>
          </div>
          </div>
          </div>

          </div>

          <div class="col-md-6 portlets">
          <div class="panel panel-default">
          <div class="panel-heading">
          <div class="pull-left"><b>Information sur Produit</b></div>

          <div class="clearfix"></div>
          </div>
          <div class="panel-body">
          <div class="padd">

          <div class="form quick-post">

          <div class="col-md-12">
          <div class="product-content-right">
          <div class="row">
          <div class="col-sm-6">
          <div class="product-images">
          <div class="product-main-img">
          <img src="/images/{{$produit->image}}" alt="">
          </div>


          </div>
          </div>

          <div class="col-sm-6">
          <div class="product-inner">

          <h4>Description de Produit</h4>
          <div class="product-inner-price">
          <h4 class="product-name">Nom de Produit :{{$produit->nom}}</h4>
          Prix de Produit :<ins></ins> <del>{{$produit->prix}} DT</del>

          @foreach($produit->promotion as $promo)
          {{$promo->prixpromo}}
          @endforeach
          </div>
          <p>{{$produit->description}}</p>
          <form action="" class="cart">


          <a href="{{route('produit.addToCart',$produit->id)}}" ><button type="button" class="btn btn-primary" name="button">Ajouter au panier</button> </a>
          <div role="tabpanel" class="tab-pane fade in active" id="home">

          <br><br><br><br><br><br><br><br><br>

          </div>
          </form>
          </div>
          </div>
          </div>
          </div>
          </div>
          </div>
          </div>
          </div>
          </div>
          </div>
          </div>
          </div>
          </div>
          </div>
          </div>

          @stop
