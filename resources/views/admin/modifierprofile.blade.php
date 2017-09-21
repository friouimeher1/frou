@extends('admin.layout.default')
@section('content')


<br><br><br><br>
<form  action="{{route('admin.updateProfile')}}" method="post" enctype="multipart/form-data">
{{csrf_field()}}


<div id="user-profile-1" class="user-profile row">
										<div class="col-xs-12 col-sm-3 center">
											<div>
												<span class="profile-picture">
													<img id="avatar" class="editable img-responsive" alt="Alex's Avatar" src="{{URL::asset('assets/images/avatars/profile-pic.jpg')}}" />
												</span>

												<div class="space-4"></div>

												<div class="width-80 label label-info label-xlg arrowed-in arrowed-in-right">
													<div class="inline position-relative">
														<a href="#" class="user-title-label dropdown-toggle" data-toggle="dropdown">
															<i class="ace-icon fa fa-circle light-green"></i>
															&nbsp;
															<span class="white">{{ucfirst(Auth::guard('admin')->user()->name)}}</span>
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
														<span class="editable"><input type="text" name="name" value="{{Auth::guard('admin')->user()->name  }}"></span>
													</div>
												</div>




												<div class="profile-info-row">
													<div class="profile-info-name"> Téléphone </div>

													<div class="profile-info-value">
														<span class="editable" id="about"><input type="text" name="telephone" value="{{Auth::guard('admin')->user()->telephone  }}"></span>
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
														<span class="editable" id="about"><input type="text" name="email" value="{{Auth::guard('admin')->user()->email  }}"></span>
													</div>
												</div>
                        <div class="profile-info-row">
													<div class="profile-info-name"> Modifier </div>

													<div class="profile-info-value">
														<span class="editable"><button type="submit" class="btn btn-primary"name="button">Modifier votre profil</button></span>
													</div>
												</div>
											</div>
											</div>

										</div>
									</div>
								</div>
                </form>
@stop
