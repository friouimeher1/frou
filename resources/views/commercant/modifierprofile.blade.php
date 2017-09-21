@extends('commercant.layout.default')
@section('content')
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
<form  action="{{route('commercant.updateProfilecommercant')}}" method="post" enctype="multipart/form-data">
{{csrf_field()}}


<div id="user-profile-1" class="user-profile row">
										<div class="col-xs-12 col-sm-3 center">
											<div>
												<span class="profile-picture">
													<img id="avatar" class="editable img-responsive" alt="Alex's Avatar" src="/commercant/{{Auth::guard('commercant')->user()->image}}" />
												</span>

												<div class="space-4"></div>

												<div class="width-80 label label-info label-xlg arrowed-in arrowed-in-right">
													<div class="inline position-relative">
														<a href="#" class="user-title-label dropdown-toggle" data-toggle="dropdown">
															<i class="ace-icon fa fa-circle light-green"></i>
															&nbsp;
															<span class="white">{{Auth::guard('commercant')->user()->name}}</span>
														</a>


													</div>
												</div>
											</div>


											<div class="hr hr16 dotted"></div>
										</div>

										<div class="col-xs-12 col-sm-9">
											<div class="center">
												<div class="profile-user-info profile-user-info-striped">
												<div class="profile-info-row">
													<div class="profile-info-name"> Nom  </div>

													<div class="profile-info-value">
														<span class="editable"><input type="text" name="name" value="{{Auth::guard('commercant')->user()->name  }}"></span>
													</div>
												</div>

                        <div class="profile-info-row">
                          <div class="profile-info-name"> prénom  </div>

                          <div class="profile-info-value">
                            <span class="editable"><input type="text" name="prenom" value="{{Auth::guard('commercant')->user()->prenom  }}"></span>
                          </div>
                        </div>

                        <div class="profile-info-row">
                          <div class="profile-info-name"> Addresse  </div>

                          <div class="profile-info-value">
                            <span class="editable"><input type="text" name="addresse" value="{{Auth::guard('commercant')->user()->adresse  }}"></span>
                          </div>
                        </div>

                        <div class="profile-info-row">
                          <div class="profile-info-name"> Langitude  </div>

                          <div class="profile-info-value">
                            <span class="editable"><input id="lng" type="text" name="lng" value="{{Auth::guard('commercant')->user()->lng  }}"></span>
                          </div>
                        </div>

                        <div class="profile-info-row">
                          <div class="profile-info-name"> Latitude  </div>

                          <div class="profile-info-value">
                            <span class="editable"><input id="lat" type="text" name="lat" value="{{Auth::guard('commercant')->user()->lat  }}"></span>
                          </div>
                        </div>

												<div class="profile-info-row">
													<div class="profile-info-name"> Téléphone </div>

													<div class="profile-info-value">
														<span class="editable" id="about"><input type="text" name="telephone" value="{{Auth::guard('commercant')->user()->telephone  }}"></span>
													</div>
												</div>


												<div class="profile-info-row">
													<div class="profile-info-name"> Image </div>

													<div class="profile-info-value">
														<span class="editable" ><input type="file" name="image"></span>
													</div>
												</div>

												<div class="profile-info-row">
													<div class="profile-info-name"> E-mail </div>

													<div class="profile-info-value">
														<span class="editable" id="about"><input type="text" name="email" value="{{Auth::guard('commercant')->user()->email  }}"></span>
													</div>
												</div>
                        <div class="profile-info-row">
													<div class="profile-info-name"> Modifier </div>

													<div class="profile-info-value">
														<span class="editable"><button type="submit" class="btn btn-primary"name="button">Modifier profil</button></span>
													</div>
												</div>
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
