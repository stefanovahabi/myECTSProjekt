@extends('layouts.default')

@section('css')
<link rel="stylesheet" href="css/register.css">
@endsection

@section('content')
    <h1 id="registrieren">Registration</h1>

    <div id="register">
        <form action="www.google.de">

            <div class="container-fluid">

                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                        <input type="text" id="vorname" placeholder="vorname">
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <input type="text" id="name" placeholder="name">
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <input type="text" id="email" placeholder="email">
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" >
                        <input type="text" id="username" placeholder="username">
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <input type="password" id="password" placeholder="password">
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <p id="gestossen">Wie bist du auf myECTS gestossen?</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <textarea id="text"></textarea>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <input type="submit" value="register" id="ticket">
                    </div>
                </div>

            </div>


        </form>
    </div>

@endsection
