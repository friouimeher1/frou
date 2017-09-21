@extends('user.layout.app')

@section('content')
<br><br><br><br>
<div id="user-profile-1" class="user-profile row">
										<div class="col-xs-12 col-sm-3 center">
											<div>
												<span class="profile-picture">
													<img id="avatar" class="editable img-responsive"  src="{{Auth::guard('user')->user()->image}}" />
												</span>

												<div class="space-4"></div>

												<div class="width-80 label label-info label-xlg arrowed-in arrowed-in-right">
													<div class="inline position-relative">
														<a href="#" class="user-title-label dropdown-toggle" data-toggle="dropdown">
															<i class="ace-icon fa fa-circle light-green"></i>
															&nbsp;
															<span class="white">{{ucfirst(Auth::guard('user')->user()->name)  }}-{{Auth::guard('user')->user()->prenom  }}</span>
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
														<span class="editable">{{ucfirst(Auth::guard('user')->user()->name)  }}</span>
													</div>
												</div>
												<div class="profile-info-row">
													<div class="profile-info-name"> Prénom </div>

													<div class="profile-info-value">
														<span class="editable" >{{Auth::guard('user')->user()->prenom  }}</span>
													</div>
												</div>

												<div class="profile-info-row">
													<div class="profile-info-name"> Addresse </div>

													<div class="profile-info-value">
														<i class="fa fa-map-marker light-orange bigger-110"></i>
														<span class="editable" id="country">{{Auth::guard('user')->user()->adresse  }}</span>
														<span class="editable" id="city">{{Auth::guard('user')->user()->ville  }}</span>
													</div>
												</div>



												<div class="profile-info-row">
													<div class="profile-info-name"> Numéro de téléphone </div>

													<div class="profile-info-value">
														<span class="editable" id="signup">{{Auth::guard('user')->user()->telephone  }}</span>
													</div>
												</div>



												<div class="profile-info-row">
													<div class="profile-info-name"> E-mail </div>

													<div class="profile-info-value">
														<span class="editable" id="about">{{Auth::guard('user')->user()->email  }}</span>
													</div>
												</div>
											</div>
											</div>

										</div>
									</div>
								</div>
@stop
