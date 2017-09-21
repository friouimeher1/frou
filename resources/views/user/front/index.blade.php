@extends('user.layout.app')
@section('content')

 <br><br>
 <div class="col-md-6 portlets">
                 <div class="panel panel-default">
                   <div class="panel-heading">
                     <div class="pull-left"><b>Liste des produits</b></div>

                     <div class="clearfix"></div>
                   </div>
                   <div class="panel-body">
                     <div class="padd">

                        <div class="product-carousel">
                        @forelse($c->produit as $p)

                            <div class="single-product">
                                <div class="product-f-image">

                                    <img src="/images/{{$p->image}}"  >
                                    <div class="product-hover">
                                        <a href="{{route('produit.addToCart',$p->id)}}" class="add-to-cart-link"><i class="fa fa-shopping-cart"></i> Ajouter au panier</a>
                                        <a href="{{route('front.show',$p->id)}}" class="view-details-link"><i class="fa fa-link"></i> Description</a>
                                    </div>
                                </div>

                                <h2>{{$p->nom}}</h2>

                                <div >

                                    @foreach($p->promotion as $promo)
                                    {{$promo->prixpromo}}
                                    @endforeach
                                   <del>{{$p->prix}} DT</del>
                                </div>

                            </div>


        @empty
            <h3 class="btn btn-primary">Pas de produits disponibles</h3>
        @endforelse

                        </div>

                    </div>
                </div>

                     </div>
                     </div>


   <div class="col-md-6 portlets panel panel-primary">

        <div class="panel-heading">

            Calendrier de travail

        </div>

        <div class="panel-body" >


          <div class="main-container ace-save-state" id="main-container">


          			<div id="sidebar" class="sidebar                  responsive                    ace-save-state">






          				<div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">

          				</div>
          			</div>



          					<div class="page-content">
          						<div class="ace-settings-container" id="ace-settings-container">



          						</div><!-- /.ace-settings-container -->


          						<div class="row">
          							<div class="col-xs-18">
          								<!-- PAGE CONTENT BEGINS -->
          								<div class="row">
          									<div class="col-sm-16">
          										<div class="space"></div>

          										<div id="calendar"></div>
          									</div>



          								<!-- PAGE CONTENT ENDS -->
          							</div><!-- /.col -->
          						</div><!-- /.row -->
          					</div><!-- /.page-content -->
          				</div>
          			</div><!-- /.main-content -->



          		</div><!-- /.main-container -->

          		<!-- basic scripts -->

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

          		<!-- page specific plugin scripts -->
          		<script src="{{URL::asset('assets/js/jquery-ui.custom.min.js')}}"></script>
          		<script src="{{URL::asset('assets/js/jquery.ui.touch-punch.min.j')}}s"></script>
          		<script src="{{URL::asset('assets/js/moment.min.js')}}"></script>
          		<script src="{{URL::asset('assets/js/fullcalendar.min.js')}}"></script>
          		<script src="{{URL::asset('assets/js/bootbox.js')}}"></script>

          		<!-- ace scripts -->
          		<script src="{{URL::asset('assets/js/ace-elements.min.js')}}"></script>
          		<script src="{{URL::asset('assets/js/ace.min.js')}}"></script>

          		<!-- inline scripts related to this page -->
          		<script type="text/javascript">
          			jQuery(function($) {

          /* initialize the external events
          	-----------------------------------------------------------------*/






          	/* initialize the calendar
          	-----------------------------------------------------------------*/

          	var date = new Date();
          	var d = date.getDate();
          	var m = date.getMonth();
          	var y = date.getFullYear();


          	var calendar = $('#calendar').fullCalendar({
          		//isRTL: true,
          		//firstDay: 1,// >> change first day of week

          		buttonHtml: {
          			prev: '<i class="ace-icon fa fa-chevron-left"></i>',
          			next: '<i class="ace-icon fa fa-chevron-right"></i>'
          		},

          		header: {
          			left: 'prev,next today',
          			center: 'title',
          			right: 'moin,agendaWeek,agendaDay'
          		},





          	});


          })
          		</script>



        </div>

    </div>





<!-- Latest jQuery form server -->
    <script src="https://code.jquery.com/jquery.min.js"></script>

    <!-- Bootstrap JS form CDN -->
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

    <!-- jQuery sticky menu -->
    <script src="{{URL::asset('/js1/owl.carousel.min.js')}}"></script>
    <script src="{{URL::asset('/js1/jquery.sticky.js')}}"></script>

    <!-- jQuery easing -->
    <script src="{{URL::asset('/js1/jquery.easing.1.3.min.js')}}"></script>

    <!-- Main Script -->
    <script src="{{URL::asset('/js1/main.js')}}"></script>

    <!-- Slider -->
    <script type="text/javascript" src="{{URL::asset('/js1/bxslider.min.js')}}"></script>
    <script type="text/javascript" src="{{URL::asset('/js1/script.slider.js')}}"></script>
 @stop
