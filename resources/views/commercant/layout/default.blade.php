<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>Application de Commerce</title>

		<meta name="description" content="overview &amp; stats" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

		<!-- bootstrap & fontawesome -->
		<link rel="stylesheet" href="{{URL::asset('assets/css/bootstrap.min.css')}}" />
		<link rel="stylesheet" href="{{URL::asset('assets/font-awesome/4.5.0/css/font-awesome.min.css')}}" />


		<link rel="stylesheet" href="{{URL::asset('assets/css/fonts.googleapis.com.css')}}" />


		<link rel="stylesheet" href="{{URL::asset('assets/css/ace.min.css')}}" class="ace-main-stylesheet" id="main-ace-style" />


		<link rel="stylesheet" href="{{URL::asset('assets/css/ace-skins.min.css')}}" />
		<link rel="stylesheet" href="{{URL::asset('assets/css/ace-rtl.min.css')}}" />
		<link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}">
		<link rel="stylesheet" href="{{URL::asset('assets/css/fullcalendar.min.css')}}" />

		<script src="{{URL::asset('assets/js/ace-extra.min.js')}}"></script>
		<script src="{{URL::asset('assets/js/ace-extra.min.js')}}"></script>
		<script src="http://maps.google.com/maps/api/js?sensor=false"
	          type="text/javascript"></script>
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
							Commerce
						</small>
					</a>
				</div>

				<div class="navbar-buttons navbar-header pull-right" role="navigation">

					<ul class="nav ace-nav">
					 @if (Auth::guard('commercant')->check())
					 <li class="light-blue dropdown-modal">
						 <a data-toggle="dropdown" href="#" class="dropdown-toggle">
							 <img class="nav-user-photo" src="/commercant/{{Auth::guard('commercant')->user()->image}}" alt="Jason's Photo" />
							 <span class="user-info">
								 <small>Bienvenue,</small>
									{{Auth::guard('commercant')->user()->name}}
							 </span>

							 <i class="ace-icon fa fa-caret-down"></i>
						 </a>

						 <ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
							 <li>
								 <a href="{{route('commercant.modifypofilecommercant')}}">
									 <i class="ace-icon fa fa-cog"></i>
									 Paramétres
								 </a>
							 </li>

							 <li>
								 <a href="{{route('commercant.profile')}}">
									 <i class="ace-icon fa fa-user"></i>
									 Profile
								 </a>
							 </li>

							 <li class="divider"></li>

							 <li>


						 <a href="{{ url('/commercant/logout') }}"
								 onclick="event.preventDefault();
													document.getElementById('logout-form').submit();">
													 <i class="fa fa-sign-out" aria-hidden="true"></i>
								 Logout
						 </a>

						 <form id="logout-form" action="{{ url('/commercant/logout') }}" method="POST" style="display: none;">
								 {{ csrf_field() }}
						 </form>
				 </li>
						@else
						<li class="grey dropdown-modal">
							<a  class="dropdown-toggle" href="{{url('commercant/register')}}">

								<span class=""><i class="fa fa-user-plus" aria-hidden="true"></i>S'inscrire</span>
							</a>

						</li>



						<li class="green dropdown-modal">
							<a  class="dropdown-toggle" href="{{url('commercant/login')}}">
								<span class=""><i class="fa fa-sign-in" aria-hidden="true"></i>Se Connecter</span>
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
								<span class="menu-text"> Acueil </span>
							</a>

							<b class="arrow"></b>
						</li>
						<br><br>
						@if (Auth::guard('commercant')->check())

                            <div class="log-arrow-up"></div>
                            <li>
                                <a href="{{route('commercant.profile')}}"><i class="icon_mail_alt"></i>Profile</a>
                            </li>

                            <li>
                                <a href="{{route('produit.index')}}"><i class="icon_mail_alt"></i>Produit </a>
                            </li>
                            <li>
                                <a href="{{route('promotion.affiche')}}"><i class="button expanded add-to-cart"></i> Produit Promotion</a>
                            </li>


                            <li>
                                <a href="{{route('commercant.commande')}}" class="dropdown-toggle"> Commande</a>
                                <b class="arrow fa fa-angle-down"></b>
                                <ul class="submenu">
                                	<li>hhh</li>
                                </ul>
                            </li>
                            <li>
                                <a href="{{route('commercant.show')}}"><i class="icon_key_alt"></i> Contacter</a>
                            </li>
														<li>
                                <a href="{{route('calender')}}"><i class="icon_key_alt"></i> Calender</a>
                            </li>
														<li>
															<a href="{{url('commercant/notification')}}"><i class="icon_key_alt"></i> Notifications<span class="btn btn-danger badge " >({{Auth::guard('commercant')->user()->unreadnotifications()->count()}})</span></a>
														</li>
                            </ul>

														@endif

			   </div>


                  			<div class="main-content">
                  				<div class="main-content-inner">

                  					<div class="page-content">






								@yield('content')






                                </div>
                              </div>
                          </div>



                      </div>





<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
<!--JAVASCRIPT FIEL-->
<script src="{{asset('js/script.js')}}"></script>
<!--Google Map JavaScript CDN-->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAPsoJPzIFTpVmpHO4G7Qfkzggmjg6phz4&callback=initMap&libraries=places"></script>
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
		<script src="https://code.jquery.com/jquery-3.0.0.js"></script>




	</body>
</html>
