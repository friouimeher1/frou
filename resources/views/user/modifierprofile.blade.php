@extends('user.layout.app')
@section('content')


<br><br><br><br>
<form  action="{{route('user.updateProfileuser')}}" method="post" enctype="multipart/form-data">
{{csrf_field()}}


<div id="user-profile-1" class="user-profile row">
										<div class="col-xs-12 col-sm-3 center">
											<div>
												<span class="profile-picture">
													<img id="avatar" class="editable img-responsive"  src="/user/{{Auth::guard('user')->user()->image}}" />
												</span>

												<div class="space-4"></div>

												<div class="width-80 label label-info label-xlg arrowed-in arrowed-in-right">
													<div class="inline position-relative">
														<a href="#" class="user-title-label dropdown-toggle" data-toggle="dropdown">
															<i class="ace-icon fa fa-circle light-green"></i>
															&nbsp;
															<span class="white"><strong>{{ucfirst(Auth::guard('user')->user()->name)}}-{{Auth::guard('user')->user()->prenom}}</strong></span>
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
														<span class="editable"><input type="text" name="name" value="{{Auth::guard('user')->user()->name  }}"></span>
													</div>
												</div>

                        <div class="profile-info-row">
                          <div class="profile-info-name"> prénom  </div>

                          <div class="profile-info-value">
                            <span class="editable"><input type="text" name="prenom" value="{{Auth::guard('user')->user()->prenom  }}"></span>
                          </div>
                        </div>

                        <div class="profile-info-row">
                          <div class="profile-info-name"> Addresse  </div>

                          <div class="profile-info-value">
                            <span class="editable"><input type="text" name="addresse" value="{{Auth::guard('user')->user()->adresse  }}"></span>
                          </div>
                        </div>

                        <div class="profile-info-row">
                          <div class="profile-info-name"> Ville  </div>

                          <div class="profile-info-value">
                            <span class="editable"><input type="text" name="ville" value="{{Auth::guard('user')->user()->ville  }}"></span>
                          </div>
                        </div>

												<div class="profile-info-row">
													<div class="profile-info-name"> Téléphone </div>

													<div class="profile-info-value">
														<span class="editable" id="about"><input type="text" name="telephone" value="{{Auth::guard('user')->user()->telephone  }}"></span>
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
														<span class="editable" id="about"><input type="text" name="email" value="{{Auth::guard('user')->user()->email  }}"></span>
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
@stop
