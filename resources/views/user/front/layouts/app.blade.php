<!DOCTYPE html>
<!--
	ustora by freshdesignweb.com
	Twitter: https://twitter.com/freshdesignweb
	URL: https://www.freshdesignweb.com/ustora/
-->
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Application de Commerce</title>

    <!-- Google Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,200,300,700,600' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:400,700,300' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,100' rel='stylesheet' type='text/css'>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="{{URL::asset('/css1/bootstrap.min.css')}}">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{URL::asset('/css1/font-awesome.min.css')}}">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{URL::asset('/css1/owl.carousel.css')}}">
    <link rel="stylesheet" href="{{URL::asset('/css1/style4.css')}}">
    <link rel="stylesheet" href="{{URL::asset('/css1/responsive.css')}}">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>



    <div class="mainmenu-area">
        <div class="container">
            <div class="row">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
                <div class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                      <li class="active"><a href="{{route('profile',1)}}">Home</a></li>
                      <li><a href="{{url('single')}}">Single product</a></li>
                      <li><a href="{{url('cart')}}">Cart</a></li>


                        <li><a href="/user/login">s'authentifier</a></li>
                        <li><a href="#">s'inscrire</a></li>
                        <li>
          <a href="{{route('produit.shoppingCart')}}">
            <i class="fa fa-shopping-cart" aria-hidden="true"></i> Shopping Cart
            <span class="badge">{{Session::has('cart') ? Session::get('cart')->totalQty : ''}}</span>
          </a>
        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div> <!-- End mainmenu area -->

@yield('content')


<!-- stripe -->



 <!-- Latest jQuery form server -->
    <script src="https://code.jquery.com/jquery.min.js"></script>



    <!-- Main Script -->
    <script src="{{URL::asset('/js1/main.js')}}"></script>


    <!-- Slider -->
    <script type="text/javascript" src="{{URL::asset('/js1/bxslider.min.js')}}"></script>
    <script type="text/javascript" src="{{URL::asset('/js1/script.slider.js')}}"></script>



  </body>
</html>
