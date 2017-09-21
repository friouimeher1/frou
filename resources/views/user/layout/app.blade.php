<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>Application de commerce</title>

		<meta name="description" content="" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

		<!-- bootstrap & fontawesome -->
		<link rel="stylesheet" href="{{URL::asset('/assets/css/bootstrap.min.css')}}" />
		<link rel="stylesheet" href="{{URL::asset('/assets/font-awesome/4.5.0/css/font-awesome.min.css')}}" />
		<link rel="stylesheet" href="{{URL::asset('assets/css/fullcalendar.min.css')}}" />

		<script src="{{URL::asset('assets/js/ace-extra.min.js')}}"></script>

		<!-- page specific plugin styles -->

		<!-- text fonts -->
		<link rel="stylesheet" href="{{URL::asset('/assets/css/fonts.googleapis.com.css')}}" />

		<!-- ace styles -->
		<link rel="stylesheet" href="{{URL::asset('/assets/css/ace.min.css')}}" class="ace-main-stylesheet" id="main-ace-style" />

		<!--[if lte IE 9]>
			<link rel="stylesheet" href="assets/css/ace-part2.min.css" class="ace-main-stylesheet" />
		<![endif]-->
		<link rel="stylesheet" href="{{URL::asset('/assets/css/ace-skins.min.css')}}" />
		<link rel="stylesheet" href="{{URL::asset('/assets/css/ace-rtl.min.css')}}" />

		<!--[if lte IE 9]>
		  <link rel="stylesheet" href="assets/css/ace-ie.min.css" />
		<![endif]-->

		<!-- inline styles related to this page -->

		<!-- ace settings handler -->
		<script src="{{URL::asset('/assets/js/ace-extra.min.js')}}"></script>
		<script src="http://maps.google.com/maps/api/js?sensor=false" type="text/javascript"></script>
	           <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
	</head>

	<body class="no-skin" background-color="#eeeeee">
		<div id="navbar" class="navbar navbar-default          ace-save-state">
			<div class="navbar-container ace-save-state" id="navbar-container">
				<button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler" data-target="#sidebar">
					<span class="sr-only">Toggle sidebar</span>

					<span class="icon-bar"></span>

					<span class="icon-bar"></span>

					<span class="icon-bar"></span>
				</button>

				<div class="navbar-header pull-left">
					<a href="{{url('/')}}" class="navbar-brand">
						<small>
							<i class="fa fa-leaf"></i>
Commerce						</small>
					</a>
				</div>

				<div class="navbar-buttons navbar-header pull-right" role="navigation">

					<ul class="nav ace-nav">
					 @if (Auth::guard('user')->check())
					 <li class="light-blue dropdown-modal">
						 <a data-toggle="dropdown" href="#" class="dropdown-toggle">
							 <img class="nav-user-photo" src="/user/{{Auth::guard('user')->user()->image}}" alt="Jason's Photo" />
							 <span class="user-info">
								 <small>Bienvenue,</small>
									{{ucfirst(Auth::guard('user')->user()->name)}}
							 </span>

							 <i class="ace-icon fa fa-caret-down"></i>
						 </a>

						 <ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
							 <li>
								 <a href="{{route('user.modifypofile')}}">
									 <i class="ace-icon fa fa-cog"></i>
									 Paramétres
								 </a>
							 </li>

							 <li>
								 <a href="{{route('user.profile')}}">
									 <i class="ace-icon fa fa-user"></i>
									 Profil
								 </a>
							 </li>

							 <li class="divider"></li>

							 <li>


																	 <a href="{{ url('/user/logout') }}"
																			 onclick="event.preventDefault();
																								document.getElementById('logout-form').submit();">
																								 <i class="fa fa-sign-out" aria-hidden="true"></i>
																			Déconnecter
																	 </a>

																	 <form id="logout-form" action="{{ url('/user/logout') }}" method="POST" style="display: none;">
																			 {{ csrf_field() }}
																	 </form>
															 </li>
						@else
						<li class="grey dropdown-modal">
							<a  class="dropdown-toggle" href="{{url('user/register')}}">

								<span class=""><i class="fa fa-user-plus" aria-hidden="true"></i>S'inscrire</span>
							</a>

						</li>



						<li class="green dropdown-modal">
							<a  class="dropdown-toggle" href="{{url('user/login')}}">
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
																		 <li>
												 <a href="{{route('produit.shoppingCart')}}">
													 <i class="fa fa-shopping-cart" aria-hidden="true"></i> Panier
													 <span class="badge">{{Session::has('cart') ? Session::get('cart')->totalQty : ''}}</span>
												 </a>
											 </li>
												@if (Auth::guard('user')->check())
												<li class="eborder-top">
						                                <a href="{{route('user.profile')}}"><i class="icon_profile"></i> Profil</a>
						                            </li>
												    <li class="eborder-top">
						                                <a href="{{route('getProfile')}}"><i class="icon_profile"></i> Factures</a>
						                            </li>

						                            <li>
						                                <a href="{{route('index')}}"><i class="icon_mail_alt"></i>Liste Commerçants </a>
						                            </li>
																				<li>
						                                <a href="{{route('admin.showmessagetouser')}}">Contact</i></a>
						                            </li>



												<br><br>

												@endif


				<br><br>




			</ul><!-- /.nav-list -->
			   </div>


                  			<div class="main-content">
                  				<div class="main-content-inner">

                  					<div class="page-content">






								@yield('content')






                                </div>
                              </div>
                          </div>



                      </div>

<!-- basic scripts -->

		<!--[if !IE]> -->
		<script src="{{URL::asset('/assets/js/jquery-2.1.4.min.js')}}"></script>

		<!-- <![endif]-->

		<!--[if IE]>
<script src="assets/js/jquery-1.11.3.min.js"></script>
<![endif]-->
		<script type="text/javascript">
			if('ontouchstart' in document.documentElement) document.write("<script src='{{URL::asset('/assets/js/jquery.mobile.custom.min.js')}}'>"+"<"+"/script>");
		</script>
		<script src="/assets/js/bootstrap.min.js"></script>

		<!-- page specific plugin scripts -->

		<!-- ace scripts -->
		<script src="{{URL::asset('/assets/js/ace-elements.min.js')}}"></script>
		<script src="{{URL::asset('/assets/js/ace.min.js')}}"></script>
		


	</body>
</html>
