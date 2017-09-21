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
					<a href="{{url('/')}}" class="navbar-brand">
						<small>
							<i class="fa fa-leaf"></i>
							Vie de Quartier
						</small>
					</a>
				</div>

				<div class="navbar-buttons navbar-header pull-right" role="navigation">
					<ul class="nav ace-nav">
						<li class="grey dropdown-modal">
							<a  class="dropdown-toggle" href="{{url('user/register')}}">

								<span class="">S'inscrire</span>
							</a>

						</li>



						<li class="green dropdown-modal">
							<a  class="dropdown-toggle" href="{{url('user/login')}}">
								<span class="">Login</span>
							</a>


						</li>


					</ul>
				</div>
			</div><!-- /.navbar-container -->
		</div>

		<div class="main-container ace-save-state" id="main-container">


			<div id="sidebar" class="sidebar                  responsive                    ace-save-state">


			   </div>


                  			<div class="main-content">
                  				<div class="main-content-inner">

                  					<div class="page-content">







                               <div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->
								<div class="row">
									<div class="col-xs-12">
										<table id="simple-table" class="table  table-bordered table-hover">
											<thead>
												<tr>

													<th class="detail-col">Nom et Prénom</th>
													<th> Email</th>
													<th> Addresse</th>


													<th>

														 Longitude
													</th>
													<th class="hidden-480">  Latitude</th>


													<th class="hidden-480">  Mobile</th>
													<th class="hidden-480">  Action</th>
												</tr>
											</thead>

											<tbody>
												<tr>


													<td class="center">
														hhhh
													</td>

													<td>
														<a href="#">ace.com</a>
													</td>
													<td>$45</td>
													<td>Feb 12</td>
													<td>Feb 12</td>

													<td class="hidden-480">
														<span class="label label-sm label-warning">Expiring</span>
													</td>

													<td>
														<div class="hidden-sm hidden-xs btn-group">
															<button class="btn btn-xs btn-success">
																<i class="ace-icon fa fa-check bigger-120"></i>
															</button>

															<button class="btn btn-xs btn-info">
																<i class="ace-icon fa fa-pencil bigger-120"></i>
															</button>

															<button class="btn btn-xs btn-danger">
																<i class="ace-icon fa fa-trash-o bigger-120"></i>
															</button>

															<button class="btn btn-xs btn-warning">
																<i class="ace-icon fa fa-flag bigger-120"></i>
															</button>
														</div>

														<div class="hidden-md hidden-lg">
															<div class="inline pos-rel">
																<button class="btn btn-minier btn-primary dropdown-toggle" data-toggle="dropdown" data-position="auto">
																	<i class="ace-icon fa fa-cog icon-only bigger-110"></i>
																</button>

																<ul class="dropdown-menu dropdown-only-icon dropdown-yellow dropdown-menu-right dropdown-caret dropdown-close">
																	<li>
																		<a href="#" class="tooltip-info" data-rel="tooltip" title="View">
																			<span class="blue">
																				<i class="ace-icon fa fa-search-plus bigger-120"></i>
																			</span>
																		</a>
																	</li>

																	<li>
																		<a href="#" class="tooltip-success" data-rel="tooltip" title="Edit">
																			<span class="green">
																				<i class="ace-icon fa fa-pencil-square-o bigger-120"></i>
																			</span>
																		</a>
																	</li>

																	<li>
																		<a href="#" class="tooltip-error" data-rel="tooltip" title="Delete">
																			<span class="red">
																				<i class="ace-icon fa fa-trash-o bigger-120"></i>
																			</span>
																		</a>
																	</li>
																</ul>
															</div>
														</div>
													</td>
												</tr>

					<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->
								<div class="row">
									<div class="col-xs-12">
										<table id="simple-table" class="table  table-bordered table-hover">
											<thead>
												<tr>


													<th> Modifier Catégorie</th>
												</tr>
											</thead>

											<tbody>
												<tr>




													<td>



													</td>
												</tr>





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
