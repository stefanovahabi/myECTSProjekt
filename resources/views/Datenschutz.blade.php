@extends('layouts.default')
@section('css')
<link rel="stylesheet" href="css/style_Startseite.css" type="text/css">
<title>Controlpanel</title>

@endsection

@section('content')
    <div class="row">




        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id="mitte">

            <header>
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
                                <li class="page-scroll" id="navibar"><a href="myECTS_Startseite.html">Home</a></li>
                                <li class="active page-scroll"><a href="about.html">about <span class="sr-only">(current)</span></a></li>
                                <li class="page-scroll"><a href="howtouse.html">howtouse</a></li>
                                <li class="page-scroll"><a href="support.html">support</a></li>
                                <li class="page-scroll"><a href="register.html">register</a></li>
                                <li class="page-scroll"><a href="vergessen.html">forgot password</a></li>


                            </ul>


                        </div><!-- /.navbar-collapse -->
                    </div><!-- /.container-fluid -->
                </nav>
            </header>


            <div id="aboutRand">
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">

                    </div>

                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                        <section>
                            <h2 id="x">Datenschutzhinweise</h2>
                            <p>Lorem Ipsum<br >
                                Lorem Ipsum<br >Lorem Ipsum</p>
                            <p>Lorem Ipsum<br >
                                Lorem Ipsum<br >
                            </p>

                        </section>
                    </div>


                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">

                    </div>
                </div>
                <footer class="navbar navbar-inverse navbar-fixed-bottom col-xs-12 col-sm-12 col-md-12 col-lg-12" id="abfuss">

                    <nav>
                        <div class="container-fluid">
                            <!-- Brand and toggle get grouped for better mobile display -->
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-2" aria-expanded="false">
                                    <span class="sr-only">Toggle navigation</span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                                <!-- <a class="navbar-brand" href="#">Brand</a>-->
                            </div>

                            <!-- Collect the nav links, forms, and other content for toggling -->
                            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-2">
                                <ul class="nav navbar-nav">
                                    <li class="page-scroll" id="navibar1"><a href="impressum.html">Impressum</a></li>
                                    <li class="page-scroll"><a href="Datenschutz.html">Datenschutz</a></li>



                                </ul>


                            </div><!-- /.navbar-collapse -->
                        </div><!-- /.container-fluid -->
                    </nav>


                </footer>

            </div>

        </div>











    </div>
@endsection
