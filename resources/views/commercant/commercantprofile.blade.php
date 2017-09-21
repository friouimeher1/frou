@extends('commercant.layout.default')
@section('content')


<br><br><br><br>
<div id="user-profile-1" class="user-profile row">
										<div class="col-xs-12 col-sm-3 center">
											<div>
												<span class="profile-picture">
													<img id="avatar" class="editable img-responsive"  src="/commercant/{{Auth::guard('commercant')->user()->image}}" />
												</span>

												<div class="space-4"></div>

												<div class="width-80 label label-info label-xlg arrowed-in arrowed-in-right">
													<div class="inline position-relative">
														<a href="#" class="user-title-label dropdown-toggle" data-toggle="dropdown">
															<i class="ace-icon fa fa-circle light-green"></i>
															&nbsp;
															<span class="white">{{ucfirst(Auth::guard('commercant')->user()->name)  }}-{{Auth::guard('commercant')->user()->prenom  }}</span>
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
														<span class="editable">{{ucfirst(Auth::guard('commercant')->user()->name)  }}</span>
													</div>
												</div>
												<div class="profile-info-row">
													<div class="profile-info-name"> Prénom </div>

													<div class="profile-info-value">
														<span class="editable" >{{ucfirst(Auth::guard('commercant')->user()->prenom)  }}</span>
													</div>
												</div>

												<div class="profile-info-row">
													<div class="profile-info-name"> Addresse </div>

													<div class="profile-info-value">
														<i class="fa fa-map-marker light-orange bigger-110"></i>
														<span class="editable" id="country">{{Auth::guard('commercant')->user()->adresse  }}</span>
														<span class="editable" id="city">{{Auth::guard('commercant')->user()->ville  }}</span>
													</div>
												</div>



												<div class="profile-info-row">
													<div class="profile-info-name"> Numéro de téléphone </div>

													<div class="profile-info-value">
														<span class="editable" id="signup">{{Auth::guard('commercant')->user()->telephone  }}</span>
													</div>
												</div>



												<div class="profile-info-row">
													<div class="profile-info-name"> E-mail </div>

													<div class="profile-info-value">
														<span class="editable" id="about">{{Auth::guard('commercant')->user()->email  }}</span>
													</div>
												</div>
											</div>
											</div>

										</div>
									</div>
								</div>
@stop
