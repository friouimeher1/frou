@extends('admin.layout.default')

@section('content')

<br> <br><br><br>
<div class="container">
    <div class="row">



              <div class="col-md-10 col-md-offset-2">
              <div class="panel panel-default">
                <div class="panel-heading">
                  <div class="pull-left">Modifier Profil </div>
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
                                      <form class="form-horizontal" action="{{route('Profile.update',$admin->id)}}" method="post" enctype="multipart/form-data">
                                          <!-- Title -->
                                          {{csrf_field()}}
                                          {{method_field('PUT')}}
                                          <div class="form-group">
                                            <label class="control-label col-lg-2" for="title">Nom</label>
                                            <div class="col-lg-6">
                                              <input type="text" value="{{$admin->name}}" name="nom"class="form-control" id="title">
                                            </div>
                                          </div>

                                          <div class="form-group">
                                            <label class="control-label col-lg-2" for="title">E-mail</label>
                                            <div class="col-lg-6">
                                              <input type="text" value="{{$admin->email}}" name="nom"class="form-control" id="title">
                                            </div>
                                          </div>
                                          <!-- Tags -->

                                          <div class="form-group">
                                            <label class="control-label col-lg-2" for="tags">Image</label>
                                            <div class="col-lg-6">
                                              <img src="/image/{{$admin->image}}" border="1px" width="100px" height="100px">
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="control-label col-lg-2" for="title">Modifier Image</label>
                                            <div class="col-lg-6">
                                              <input type="file" name="image"class="form-control" id="title">
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="control-label col-lg-2" for="tags">Mot de passe</label>
                                            <div class="col-lg-6">
                                              <input type="text"  name="password" class="form-control" id="tags">
                                            </div>
                                          </div>
                                          <!-- Buttons -->
                                          <div class="form-group">
                                             <!-- Buttons -->
                                             <div class="col-lg-6">

                                                        <center>
                                                            <button type="submit" class="btn btn-primary" name="button">Modifier Profil</button>
                                                          </center>
                                                         </div>
                                          </div>
                                      </form>
                                    </div>


                  </div>
                  </div>
                  </div>
@endsection
