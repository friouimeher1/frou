@extends('commercant.layout.default')
@section('content')
@if(Session::has('message'))
<div class="row">
  <div class="alert alert-success fade in col-sm-6 col-md-4, col-md-offset-4 col-sm-offset-3">

  <button data-dismiss="alert" class="close close-sm" type="button">
      <i class="icon-remove"></i>
  </button>

  <strong>Warning!</strong>  .

     {{ Session::get('message')}}
   </div>
 </div>

@endif
 <div class="col-xs-12 col-md-6" id="map-box">
         <input class="form-control" id="search" type="search" name="search" placeholder="S'il vous plaît entrer votre emplacement de point de vente">
         <div id="map">
         </div>

       </div>
<div class="col-md-6 portlets">
              <div class="panel panel-default">
                <div class="panel-heading">
                  <div class="pull-left"><b>Information</b></div>

                  <div class="clearfix"></div>
                </div>
                <div class="panel-body">
                  <div class="padd">

                      <div class="form quick-post">
                                      <!-- Edit profile form (not working)-->



                                      <form class="form-horizontal" role="form" method="POST" action="{{ url('/commercant/register') }}">
                       {{ csrf_field() }}

                       <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                           <label for="name" class="col-md-4 control-label">Nom</label>

                           <div class="col-md-6">
                               <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" autofocus>

                               @if ($errors->has('name'))
                                   <span class="help-block">
                                       <strong>{{ $errors->first('name') }}</strong>
                                   </span>
                               @endif
                           </div>
                       </div>


                       <div class="form-group{{ $errors->has('prenom') ? ' has-error' : '' }}">
                           <label for="prenom" class="col-md-4 control-label">Prénom</label>

                           <div class="col-md-6">
                               <input id="prenom" type="text" class="form-control" name="prenom" value="{{ old('prenom') }}" autofocus>

                               @if ($errors->has('prenom'))
                                   <span class="help-block">
                                       <strong>{{ $errors->first('prenom') }}</strong>
                                   </span>
                               @endif
                           </div>
                       </div>

                       <div class="form-group{{ $errors->has('adresse') ? ' has-error' : '' }}">
                           <label for="prenom" class="col-md-4 control-label">Adresse</label>

                           <div class="col-md-6">
                               <input id="adresse" type="text" class="form-control" name="adresse" value="{{ old('adresse') }}" autofocus>

                               @if ($errors->has('adresse'))
                                   <span class="help-block">
                                       <strong>{{ $errors->first('adresse') }}</strong>
                                   </span>
                               @endif
                           </div>
                       </div>

                       <div class="form-group{{ $errors->has('lng') ? ' has-error' : '' }}">
                           <label for="prenom" class="col-md-4 control-label">Langitude</label>

                           <div class="col-md-6">
                               <input id="lng" type="text" class="form-control" name="lng" value="{{ old('lng') }}" autofocus>

                               @if ($errors->has('lng'))
                                   <span class="help-block">
                                       <strong>{{ $errors->first('lng') }}</strong>
                                   </span>
                               @endif
                           </div>
                       </div>

                       <div class="form-group{{ $errors->has('lat') ? ' has-error' : '' }}">
                           <label for="lat" class="col-md-4 control-label">Latitude</label>

                           <div class="col-md-6">
                               <input id="lat" type="text" class="form-control" name="lat" value="{{ old('lat') }}" autofocus>

                               @if ($errors->has('lat'))
                                   <span class="help-block">
                                       <strong>{{ $errors->first('lat') }}</strong>
                                   </span>
                               @endif
                           </div>
                       </div>

                       <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                           <label for="email" class="col-md-4 control-label">E-Mail</label>

                           <div class="col-md-6">
                               <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}">

                               @if ($errors->has('email'))
                                   <span class="help-block">
                                       <strong>{{ $errors->first('email') }}</strong>
                                   </span>
                               @endif
                           </div>
                       </div>

                       <div class="form-group{{ $errors->has('telephone') ? ' has-error' : '' }}">
                           <label for="lat" class="col-md-4 control-label">Téléphone</label>

                           <div class="col-md-6">
                               <input id="telephone" type="text" class="form-control" name="telephone" value="{{ old('telephone') }}" autofocus>

                               @if ($errors->has('telephone'))
                                   <span class="help-block">
                                       <strong>{{ $errors->first('telephone') }}</strong>
                                   </span>
                               @endif
                           </div>
                       </div>


                       <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                           <label for="password" class="col-md-4 control-label">Mot de passe</label>

                           <div class="col-md-6">
                               <input id="password" type="password" class="form-control" name="password">

                               @if ($errors->has('password'))
                                   <span class="help-block">
                                       <strong>{{ $errors->first('password') }}</strong>
                                   </span>
                               @endif
                           </div>
                       </div>

                       <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                           <label for="password-confirm" class="col-md-4 control-label">Confirmer mot de passe</label>

                           <div class="col-md-6">
                               <input id="password-confirm" type="password" class="form-control" name="password_confirmation">

                               @if ($errors->has('password_confirmation'))
                                   <span class="help-block">
                                       <strong>{{ $errors->first('password_confirmation') }}</strong>
                                   </span>
                               @endif
                           </div>
                       </div>




                 </div>

                       <div class="form-group">
                           <div class="col-md-6 col-md-offset-4">
                               <button type="submit" class="btn btn-primary">
                                   S'inscrire
                               </button>
                           </div>
                       </div>
                   </form>



                  </div>
                  <div class="widget-foot">
                    <!-- Footer goes here -->
                  </div>
                </div>
              </div>

            </div>

          </div>
@stop
