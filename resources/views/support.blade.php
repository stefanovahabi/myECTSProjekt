@extends('layouts.default')

@section('css')
    <link rel="stylesheet" href="css/style_Startseite.css" type="text/css">
@endsection

@section('content')
    <div id="supportAll">

        <form action="www.google.de" id="form">
            <div class="row" id="supportthird">

                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <input type="text" id="email" placeholder="email" class="zentral">
                </div>

            </div>
            <div class="row" id="supportfirst">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                    <input type="text" id="name" placeholder="name" class="zentral">
                </div>

                <div class="dropdown col-lg-6 col-md-6 col-sm-6 col-xs-6">
                    <button class="btn btn-default dropdown-toggle" type="button" id="menu1" data-toggle="dropdown">Geschlecht
                        <span class="caret"></span></button>
                    <ul class="dropdown-menu" role="menu" aria-labelledby="menu1">
                        <li role="presentation"><a role="menuitem" href="#">Weiblich</a></li>
                        <li role="presentation"><a role="menuitem" href="#">Männlich</a></li>
                    </ul>
                </div>

            </div>

            <div class="row" id="supportsecond">


                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <textarea name="comment" id="textarea">Enter...</textarea>
                </div>



            </div>

            <div class="row" id="supportfourth">

                <div class="col-lg-12 col-md-12-col col-sm-12 col-xs-12">

                    <input type="submit" name="supbutton" value="Senden" id="supsubmit"/>

                </div>

            </div>





        </form>
    </div>
@endsection
