@extends('admin.layout.default')
@section('content')


<br><br><br><br>
<div id="user-profile-1" class="user-profile row">
										<div class="col-xs-12 col-sm-3 center">
											<div>
												<span class="profile-picture">
													<img id="avatar" class="editable img-responsive"  src="/admin/{{Auth::guard('admin')->user()->image}}" />
												</span>

												<div class="space-4"></div>

												<div class="width-80 label label-info label-xlg arrowed-in arrowed-in-right">
													<div class="inline position-relative">
														<a href="#" class="user-title-label dropdown-toggle" data-toggle="dropdown">
															<i class="ace-icon fa fa-circle light-green"></i>
															&nbsp;
															<span class="white">{{ucfirst(Auth::guard('admin')->user()->name)  }}</span>
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
														<span class="editable">{{ucfirst(Auth::guard('admin')->user()->name)  }}</span>
													</div>
												</div>




												<div class="profile-info-row">
													<div class="profile-info-name"> Téléphone </div>

													<div class="profile-info-value">
														<span class="editable" id="about">{{Auth::guard('admin')->user()->telephone  }}</span>
													</div>
												</div>






												<div class="profile-info-row">
													<div class="profile-info-name"> E-mail </div>

													<div class="profile-info-value">
														<span class="editable" id="about">{{Auth::guard('admin')->user()->email  }}</span>
													</div>
												</div>
											</div>
											</div>

										</div>
									</div>
								</div>
@stop
