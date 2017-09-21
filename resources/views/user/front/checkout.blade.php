@extends('user.layout.app')

@section('content')

<br><br><br><br>

@if (Session::has('success'))

<div class="alert alert-success">
<strong>Success : </strong>
</div>
@endif


<div class="container">
    <div class="row">
        <div class="col-md-12 col-md-offset-2">


    <div class="col-md-8 portlets">
              <div class="panel panel-default">
                <div class="panel-heading">
                  <div class="pull-left"><b>Information</b></div>

                  <div class="clearfix"></div>
                </div>
                <div class="panel-body">
                  <div class="padd">

                      <div class="form quick-post">

                         <form class="form-horizontal" method="post" action="{{route('livraision.store')}}">
                         {{csrf_field() }}


                            <label for="name" class="col-md-4 control-label">ville</label>

                           <div class="col-md-6">
                               <input id="name" type="text" class="form-control" name="ville"  autofocus>


                                   <span class="help-block">
                                       <strong></strong>
                                   </span>

                           </div>

                           <label for="name" class="col-md-4 control-label">Gouvernement</label>

                           <div class="col-md-6">
                               <input id="name" type="text" class="form-control" name="gouvernement"  autofocus>


                                   <span class="help-block">
                                       <strong></strong>
                                   </span>

                           </div>
                            <label for="name" class="col-md-4 control-label">Ligne d'adresse</label>

                           <div class="col-md-6">
                               <input id="name" type="text" class="form-control" name="addresse"  autofocus>


                                   <span class="help-block">
                                       <strong></strong>
                                   </span>

                           </div>
                           <label for="name" class="col-md-4 control-label">Code Postal</label>

                           <div class="col-md-6">
                               <input id="name" type="text" class="form-control" name="code"  autofocus>


                                   <span class="help-block">
                                       <strong></strong>
                                   </span>

                           </div>

                            


                           <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Effectuer paiement
                                </button>


                            </div>
                        </div>

                       </div>
                      </div>
                    </div>
                    </form>
                 </div>
                 </div>
             </div>


              </div>
             </div>

             </div>
             </div>



  @stop
