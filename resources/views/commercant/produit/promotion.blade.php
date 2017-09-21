@extends('commercant.layout.default')
@section('content')


<br> <br><br><br>
@if(Session::has('message'))
<div class="row">
  <div class="alert alert-success fade in col-sm-6 col-md-4, col-md-offset-4 col-sm-offset-3">

  <button data-dismiss="alert" class="close close-sm" type="button">
      <i class="icon-remove"></i>
  </button>

  <strong>Warning!</strong> .

     {{ Session::get('message')}}
   </div>
 </div>

@endif
<div class="container">
    <div class="row">



              <div class="col-md-8 col-md-offset-1">
              <div class="panel panel-default">
                <div class="panel-heading">
                  <div class="pull-left">Ajouter Promotion</div>
                  <div class="widget-icons pull-right">
                    <a href="#" class="wminimize"><i class="fa fa-chevron-up"></i></a>
                    <a href="#" class="wclose"><i class="fa fa-times"></i></a>
                  </div>
                  <div class="clearfix"></div>
                </div>
                <div class="panel-body">
                  <div class="padd">

                      <div class="form quick-post">
                                      <!-- Edit profile form (not working)-->
                                      <form class="form-horizontal" action="{{route('produit.storepromo',$produit->id)}}" method="post" enctype="multipart/form-data">
                                          <!-- Title -->
                                          {{csrf_field()}}
                                          <input type="hidden" value="{{$produit->id}}" name="produit_id">
                                          <div class="form-group">
                                            <label class="control-label col-lg-2" for="title">Prix sans promotion</label>
                                            <div class="col-lg-6">
                                              <input type="text" value="{{$produit->prix}}"class="form-control" id="title" readonly="true">
                                            </div>
                                          </div>
                                          <!-- Content -->
                                          <div class="form-group">
                                            <label class="control-label col-lg-2" for="title">Prix avec promotion</label>
                                            <div class="col-lg-6">
                                              <input   name="prixpromo" class="form-control" id="title">
                                            </div>
                                          </div>
                                          <!-- Cateogry -->


                                          <!-- Tags -->

                                          <!-- Buttons -->
                                          <div class="form-group">
                                             <!-- Buttons -->
                                             <div class="col-lg-6">

                                                        <center>
                                                            <button type="submit" class="btn btn-primary" name="button">Ajouter Promotion</button>
                                                          </center>
                                                         </div>
                                          </div>
                                      </form>
                                    </div>


                  </div>
                  </div>
                  </div>
                  @endsection
