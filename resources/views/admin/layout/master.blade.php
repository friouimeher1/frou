<!-- Fixed navbar -->

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
                                <a href="{{route('Categorie.create')}}"><i class="icon_mail_alt"></i>Catégorie </a>
                            </li>
                            <li>
                                <a href="{{url('/admin/User')}}"><i class="button expanded add-to-cart"></i> Client</a>
                            </li>

                            <li>
                                <a href="{{url('/admin/Customer')}}"><i class="icon_clock_alt"></i>Commerçant</a>
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
                                <a href="{{ url('/admin/logout') }}"
                                    onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                    Logout
                                </a>

                                <form id="logout-form" action="{{ url('/admin/logout') }}" method="POST" style="display: none;">
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