@extends('layouts.default')
@section('css')
<link rel="stylesheet" href="css/style_Startseite.css" type="text/css">
    <title>Startseite</title>
@endsection

@section('content')



    <div>
    <div class="row" id="kek">

        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id="logo">
            <img src="img/Unbenannt.png" alt="Browser nicht aktuell genug" class="center-block"/>
        </div>

    </div>


        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-cs-12" id="htwgbild">
                <img src="img/htwg.jpg" alt="Browser nicht aktuell genug" class="center-block"/>
            </div>
        </div>

    </div>

    <div id="einloggen" class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Einloggen</div>
                    <div class="panel-body">
                        <form class="form-horizontal" method="POST" action="{{ url('/login') }}">
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="email1" class="col-md-4 control-label">E-Mail Adresse</label>

                                <div class="col-md-6">
                                    <input id="email1" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <label for="password" class="col-md-4 control-label">Passwort</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control" name="password" required>

                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>


                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="remember"> Remember Me
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-8 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        Login
                                    </button>

                                    <a class="btn btn-link" href="{{ url('/vergessen1') }}">
                                        Passwort vergessen?
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
