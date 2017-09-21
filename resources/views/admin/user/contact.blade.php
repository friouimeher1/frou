<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>Commerce</title>

		<meta name="description" content="overview &amp; stats" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

		<!-- bootstrap & fontawesome -->
		<link rel="stylesheet" href="{{URL::asset('assets/css/bootstrap.min.css')}}" />
		<link rel="stylesheet" href="{{URL::asset('assets/font-awesome/4.5.0/css/font-awesome.min.css')}}" />


		<link rel="stylesheet" href="{{URL::asset('assets/css/fonts.googleapis.com.css')}}" />


		<link rel="stylesheet" href="{{URL::asset('assets/css/ace.min.css')}}" class="ace-main-stylesheet" id="main-ace-style" />


		<link rel="stylesheet" href="{{URL::asset('assets/css/ace-skins.min.css')}}" />
		<link rel="stylesheet" href="{{URL::asset('assets/css/ace-rtl.min.css')}}" />

		<script src="{{URL::asset('assets/js/ace-extra.min.js')}}"></script>
		<script src="http://maps.google.com/maps/api/js?sensor=false"
	          type="text/javascript"></script>
	</head>

	<body class="no-skin">

		<div id="navbar" class="navbar navbar-default          ace-save-state">
			<div class="navbar-container ace-save-state" id="navbar-container">
				<button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler" data-target="#sidebar">
					<span class="sr-only">Toggle sidebar</span>

					<span class="icon-bar"></span>

					<span class="icon-bar"></span>

					<span class="icon-bar"></span>
				</button>

				<div class="navbar-header pull-left">
					<a href="{{url('admin/index')}}" class="navbar-brand">
						<small>
							<i class="fa fa-leaf"></i>
							Espace Administrateur
						</small>
					</a>

				</div>


				<div class="navbar-buttons navbar-header pull-right" role="navigation">


					<ul class="nav ace-nav">
					 @if (Auth::guard('admin')->check())
					 <li class="light-blue dropdown-modal">
 						<a data-toggle="dropdown" href="#" class="dropdown-toggle">
 							<img class="nav-user-photo" src="/admin/{{Auth::guard('admin')->user()->image}}" alt="{{Auth::guard('admin')->user()->name}}" />
 							<span class="user-info">
 								<small>Bienvenue,</small>
 								{{ucfirst(Auth::guard('admin')->user()->name)}}
 							</span>

							 <i class="ace-icon fa fa-caret-down"></i>
						 </a>

						 <ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
							 <li>
								 <a href="{{route('admin.modifypofile')}}">
 									<i class="ace-icon fa fa-cog"></i>
 									Paramètres
 								</a>
							 </li>

							 <li>
								 <a href="{{route('admin.profile')}}">
									 <i class="ace-icon fa fa-user"></i>
									 Profil
								 </a>
							 </li>

							 <li class="divider"></li>

							 <li>


																	 <a href="{{ url('/admin/logout') }}"
																			 onclick="event.preventDefault();
																								document.getElementById('logout-form').submit();">
																								 <i class="fa fa-sign-out" aria-hidden="true"></i>
																			 Déconnecter
																	 </a>

																	 <form id="logout-form" action="{{ url('/admin/logout') }}" method="POST" style="display: none;">
																			 {{ csrf_field() }}
																	 </form>
															 </li>
						@else
						<li class="grey dropdown-modal">
							<a  class="dropdown-toggle" href="{{url('admin/register')}}">

								<span class=""><i class="fa fa-user-plus" aria-hidden="true"></i>S'inscrire</span>
							</a>

						</li>



						<li class="green dropdown-modal">
							<a  class="dropdown-toggle" href="{{url('admin/login')}}">
								<span class=""><i class="fa fa-sign-in" aria-hidden="true"></i>S'authentifier'</span>
							</a>


						</li>


								@endif
					</ul>
				</div>
			</div><!-- /.navbar-container -->
		</div>


		<div class="main-container ace-save-state" id="main-container">

	<div id="sidebar" class="sidebar responsive  ace-save-state">
					<ul class="nav nav-list">
						<li class="active">
							<a href="{{url('/')}}">
								<i class="menu-icon fa fa-tachometer"></i>
								<span class="menu-text"> Accueil </span>
							</a>

							<b class="arrow"></b>
						</li>
						@if (Auth::guard('admin')->check())
						<li class="eborder-top">
						<a href="{{route('admin.profile')}}"><i class="icon_profile"></i> Profil</a>
						</li>
						<li>
							<a href="{{route('admin.produit')}}"><i class="icon_mail_alt"></i>Produits </a>
						</li>
						<li>
							<a href="{{route('admin.promotion')}}"><i class="button expanded add-to-cart"></i> Produits en Promotion</a>
						</li>


						<li>
							<a href="{{route('admin.getContact')}}">Contact <i class="badge badge-success"></i></a>
						</li>
						<li>
							<a href="{{url('admin/Customer')}}"><i class="icon_chat_alt"></i> Commerçants</a>
						</li>
						<li>
							<a href="{{url('admin/User')}}"><i class="icon_key_alt"></i> Clients</a>
						</li>
						<li>
							<a href="{{route('Categorie.index')}}"><i class="icon_key_alt"></i> Catégories</a>
						</li>
						<li>
							<a href="{{url('admin/notification')}}"><i class="icon_key_alt"></i> Notifications<span class="btn btn-danger badge " >{{Auth::guard('admin')->user()->unreadnotifications()->count()}}</span></a>
						</li>
						<li>
							<a href="{{route('charts')}}"><i class="icon_key_alt"></i> Statistique Client</a>

						</li>
						<li>
							<a href="{{route('chartscustomer')}}"><i class="icon_key_alt"></i> Statistique Commercant</a>

						</li>

						<br><br>

						<br><br>

						@endif
                            <div class="log-arrow-up"></div>




			   </div>



								<div class="main-content">
                  				<div class="main-content-inner">

                  					<div class="page-content">




															@if(Session::has('message'))
															<div class="row">
																<div class="alert alert-success fade in col-sm-6 col-md-4, col-md-offset-4 col-sm-offset-3">

																<button data-dismiss="alert" class="close close-sm" type="button">
																		<i class="icon-remove"></i>
																</button>
																	 {{ Session::get('message')}}
																 </div>
															 </div>

															@endif

                              <br><br><br><br><br>
                              <div class="row">
                                            <div class="col-xs-12">
                                              <!-- PAGE CONTENT BEGINS -->
                                              <div class="row">
                                                <div class="col-xs-12">
                                                  <table id="simple-table" class="table  table-bordered table-hover">
                                                    <thead>

                                                      <tr>

                                                        <th >Nom</th>
                                                        <th >Email</th>
                                                        <th> Sujet</th>
                                                        <th> Message</th>
                                                        <th> Action</th>
                                                      </tr>
                                                    </thead>

                                                    <tbody>

                                                      <tr>

                                                        @foreach($contact as $cont)
                                                        <td class="center">
                                                          {{ucfirst($cont->user->name)}}
                                                        </td>

                                                        <td class="center">
                                                          <a href="{{route('replyContact',$cont->user->id)}}">{{$cont->user->email}}</a>
                                                        </td>


                                                        <td >
                                                         {{$cont->sujet}}
                                                        </td>
                                                        <td >
                                                         {{$cont->message}}
                                                        </td>
                                                        <td>
                                                          <form method="POST" action="{{ route('contact.destroy', $cont->id) }}" >
                                                                  {{csrf_field()}}
                                                                  {{method_field('DELETE')}}
                                                                <input type="submit" class="btn btn-danger" onclick="return confirm('are you sure ?');" value="Delete">
                                                              </form>
                                                </td>
                                                      </tr>

                                                      @endforeach

                                                      </tbody>
                                                      </table>
                                                      <div class="row">
                                      </div>


                                                              </div>
                                                            </div>
                                                        </div>



                                                    </div>







                                </div>
                              </div>
                          </div>



                      </div>


		<!--[if !IE]> -->
		<script src="{{URL::asset('assets/js/jquery-2.1.4.min.js')}}"></script>

		<!-- <![endif]-->

		<!--[if IE]>
<script src="assets/js/jquery-1.11.3.min.js"></script>
<![endif]-->
		<script type="text/javascript">
			if('ontouchstart' in document.documentElement) document.write("<script src='assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
		</script>
		<script src="{{URL::asset('assets/js/bootstrap.min.js')}}"></script>


	</body>
</html>
