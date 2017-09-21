<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>Application</title>

<!-- Bootstrap -->
<link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
<!--Google Fonts-->
<!--Font Awesome Icons-->
<!--CSS FILE-->
<link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}">


<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>

<!-- Fixed navbar -->
<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <a class="navbar-brand" href="#"><span style="color:#000">Application</span><span style="color:#fff"></span></a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><img src="{{asset('image/avatar-01-2-128.png')}}" class="img-responsive" alt="Responsive image">  <i class="fa fa-angle-down" aria-hidden="true"></i></a>
                    <ul class="dropdown-menu extended logout">
                            <div class="log-arrow-up"></div>

                            <li class="eborder-top">
                                <a href="#"><i class="icon_profile"></i> My Profile</a>
                            </li>
                            <li>
                                <a href="{{route('produit.create')}}"><i class="icon_mail_alt"></i>Produit </a>
                            </li>
                            <li>
                                <a href="#"><i class="button expanded add-to-cart"></i> Produit Promotion</a>
                            </li>

                            <li>
                                <a href="#"><i class="icon_clock_alt"></i>Contact</a>
                            </li>
                            <li>
                                <a href="#"><i class="icon_chat_alt"></i> Réduction</a>
                            </li>
                            <li>
                                <a href="documentation.html"><i class="icon_key_alt"></i> Commande</a>
                            </li>
                            <li>
                                <a href="documentation.html"><i class="icon_key_alt"></i> Documentation</a>
                            </li>
                            <li>
                                <a href="{{ url('/customer/logout') }}"
                                    onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                    Logout
                                </a>

                                <form id="logout-form" action="{{ url('/commercant/logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>

                        </ul>
                </li>
            </ul>
        </div>
      
        <!--/.nav-collapse -->
    </div>
</nav>

@yield('content')

<script>

</script>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://code.jquery.com/jquery-3.0.0.js"></script>
<script src="https://code.jquery.com/jquery-migrate-3.0.0.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
<!--JAVASCRIPT FIEL-->
<script src="{{asset('js/script.js')}}"></script>
<!--Google Map JavaScript CDN-->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAPsoJPzIFTpVmpHO4G7Qfkzggmjg6phz4&callback=initMap&libraries=places"></script>
</body>
</html>
