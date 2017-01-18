<header>

    <div class="row">

        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <nav class="navbar navbar-inverse navbar-fixed-top" id="head">
                <div class="container-fluid">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <!-- <a class="navbar-brand" href="#">Brand</a>-->
                    </div>

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav">
                            <li class="active page-scroll"><a href="{{ url('/loggedin') }}">Home <span class="sr-only">(current)</span></a></li>
                            <li class="page-scroll" id="navibar"><a href="{{ url('/about') }}">about</a></li>
                            <li class="page-scroll"><a href="{{ url('/howtouse') }}">howtouse</a></li>
                            <li class="page-scroll"><a href="support.html">support</a></li>
                            <li class="page-scroll"><a href="{{ url('/register1') }}">register</a></li>
                            <li class="page-scroll"><a href="{{ url('/vergessen') }}">forgot password</a></li>
                           <li> <a href="{{ url('/logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                Logout
                            </a>
                           </li>


                        </ul>

                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>


                    </div><!-- /.navbar-collapse -->
                </div><!-- /.container-fluid -->
            </nav>
        </div>

    </div>

</header>