<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>Commerce</title>

		<meta name="description" content="" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

		<!-- bootstrap & fontawesome -->
		<link rel="stylesheet" href="{{URL::asset('assets/css/bootstrap.min.css')}}" />
		<link rel="stylesheet" href="{{URL::asset('assets/font-awesome/4.5.0/css/font-awesome.min.css')}}" />

		<!-- page specific plugin styles -->

		<!-- text fonts -->
		<link rel="stylesheet" href="{{URL::asset('assets/css/fonts.googleapis.com.css')}}" />

		<!-- ace styles -->
		<link rel="stylesheet" href="{{URL::asset('assets/css/ace.min.css')}}" class="ace-main-stylesheet" id="main-ace-style" />

		<!--[if lte IE 9]>
			<link rel="stylesheet" href="assets/css/ace-part2.min.css" class="ace-main-stylesheet" />
		<![endif]-->
		<link rel="stylesheet" href="{{URL::asset('assets/css/ace-skins.min.css')}}" />
		<link rel="stylesheet" href="{{URL::asset('assets/css/ace-rtl.min.css')}}" />

		<!--[if lte IE 9]>
		  <link rel="stylesheet" href="assets/css/ace-ie.min.css" />
		<![endif]-->

		<!-- inline styles related to this page -->

		<!-- ace settings handler -->
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
					<a href="index.html" class="navbar-brand">
						<small>
							<i class="fa fa-leaf"></i>
							Commerce
						</small>
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
								<span class=""><i class="fa fa-sign-in" aria-hidden="true"></i>S'authentifier</span>
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
						<br>
						<li class="active">
							<span class="input-icon">
<form action="{{route('cherche')}}" method="get">

									<input type="text" name="search" placeholder="Que Cherchez-vous ?" class="nav-search-input" id="nav-search-input" autocomplete="off" />
											<i class="ace-icon fa fa-search nav-search-icon"></i>
								</span>
</form>
							<b class="arrow"></b>
						</li>
					<br>

					<li class="">

						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-pencil-square-o"></i>
							<span class="menu-text"> Catégorie </span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
						@foreach($categories as $categorie)
							<li class="">




								<a href="#" class="dropdown-toggle">
									<i class="menu-icon fa fa-caret-right"></i>

									{{$categorie->nom_categorie}}
									<b class="arrow fa fa-angle-down"></b>
								</a>

								<b class="arrow"></b>

								<ul class="submenu nav-hide" style="display: none;">
								@foreach($categorie->produit as $produit1)
									<li class="">
										<a href="#">
											<i class="menu-icon fa fa-caret-right"></i>
											<img src="/images/{{$produit1->image}}" width="20px" height="20px">{{$produit1->nom}}


										</a>

										<b class="arrow"></b>
									</li>
									@endforeach

								</ul>



								<b class="arrow"></b>
							</li>
							@endforeach

						</ul>
					</li>

					<li class="">




						<a href="{{url('user/contacter')}}" >
							<i class="ace-icon fa fa-user"></i>
									 Contact

						</a>

						<b class="arrow"></b>
					</li>

				</ul><!-- /.nav-list -->

			</div>


			<div class="main-content">
				<div class="main-content-inner">
					<div class="breadcrumbs ace-save-state" id="breadcrumbs">
						<ul class="breadcrumb">

							<li class="active">Accueil</li>
						</ul><!-- /.breadcrumb -->

						<!-- /.nav-search -->
					</div>

					<div class="page-content">

							<!-- /.ace-settings-box -->





						<div id="map" style="width: 1120px; height: 550px;"></div>
</div>
</div>
</div>


						<script type="text/javascript">
						var geocoder;
var map;
var directionsDisplay;
var directionsService = new google.maps.DirectionsService();

							var locations = [
								@foreach($c as $l)
								['{{$l->name}}',{{$l->lat}} , {{$l->lng}}, {{$l->id}},'{{$l->image}}','{{$l->prenom}}',{{$l->telephone}},'{{$l->adresse}}'],
							@endforeach
							];
//-------------------------------------------------------------------------------------------------------
//enable to active the location by using navigator
							var x = document.getElementById("map");


							    if (navigator.geolocation) {
							        navigator.geolocation.getCurrentPosition(showPosition);
							    } else {
							        x.innerHTML = "Geolocation is not supported by this browser.";
							    }
										var lat,lng;

											function showPosition(position) {
											    lat=position.coords.latitude ;
											    lng= position.coords.longitude;
											    //alert('lat');

//---------------------------------------------------------------------------------------------------------

							var map = new google.maps.Map(document.getElementById('map'), {
								zoom: 15,

								center: new google.maps.LatLng(35.88639899999999,10.591507200000024),
								mapTypeId: google.maps.MapTypeId.ROADMAP
							});

							var infowindow = new google.maps.InfoWindow();
						// 	var infowindow = new google.maps.InfoWindow({
            //     content: "loading...", maxWidth: 500
            // });

							var marker, i;

							for (i = 0; i < locations.length; i++) {

								marker = new google.maps.Marker({
									position: new google.maps.LatLng(locations[i][1], locations[i][2]),
									icon:'js/Marker.png',
									map: map
								});

								google.maps.event.addListener(marker, 'click', (function(marker, i) {
									return function() {
										var url = '{{ route("profile", ":id") }}';//welcome.show
										url = url.replace(':id', locations[i][3]);
										infowindow.setContent(
										'<br><img src=commercant/'+locations[i][4]+" ><p> Contacter : "+locations[i][6]+
										'<p>Nom :'+locations[i][0]+
										'<p>Prénom :'+locations[i][5]+
											'<p>Adresse :'+locations[i][7]+
										'<p><a  href="'+url+'">'+"Spécialiser"+'</a>');
										infowindow.open(map, marker);
									}
								})(marker, i));

//-------------------------------------------------------------------------------------
//GETTING CURRENT POSITION
      var marker1 = new google.maps.Marker({
				position: new google.maps.LatLng(35.88639899999999,10.591507200000024),
        icon:'marker1.png',
        map: map

      });
     marker1.addListener('click', function() {
     	  infowindow.setContent("Voici votre position actuelle");
        infowindow.open(map, marker1);
      });

//-------------------------------------------------------------------------------------
// if (i == 0) request.origin = marker.getPosition();
//     else if (i == locations.length - 1) request.destination = marker.getPosition();
//     else {
//       if (!request.waypoints) request.waypoints = [];
//       request.waypoints.push({
//         location: marker.getPosition(),
//         stopover: true
//       });
//     }

//-----------------------------------------------------------------------------------------------------

  // directionsService.route(request, function(result, status) {
  //   if (status == google.maps.DirectionsStatus.OK) {
  //     directionsDisplay.setDirections(result);
  //   }
  // });

//__________________________________________________________________________________________________

}}

 google.maps.event.addDomListener(window, "load", initialize);

							//------------------------------------------------------------------------------------------
						</script>



		<!--[if !IE]> -->
		<script src="{{URL::asset('assets/js/jquery-2.1.4.min.js')}}"></script>

		<!-- <![endif]-->

		<!--[if IE]>
<script src="assets/js/jquery-1.11.3.min.js"></script>
<![endif]-->
		<script type="text/javascript">
			if('ontouchstart' in document.documentElement) document.write("<script src='{{URL::asset('assets/js/jquery.mobile.custom.min.js')}}'>"+"<"+"/script>");
		</script>
		<script src="assets/js/bootstrap.min.js"></script>

		<!-- page specific plugin scripts -->

		<!-- ace scripts -->
		<script src="{{URL::asset('assets/js/ace-elements.min.js')}}"></script>
		<script src="{{URL::asset('assets/js/ace.min.js')}}"></script>


	</body>
</html>
