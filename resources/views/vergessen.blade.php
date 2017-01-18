@extends('layouts.default')

@section('css')
    <link rel="stylesheet" href="css/style_Startseite.css" type="text/css">
@endsection





@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Reset Password</div>

                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="POST" action="{{ url('/password/reset') }}">
                            {{ csrf_field() }}

                            <input type="hidden" name="token" value="{{ $token }}">

                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control" name="email" value="{{ $email or old('email') }}" required autofocus>

                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <label for="password" class="col-md-4 control-label">Password</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control" name="password" required>

                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                                <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>
                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>

                                    @if ($errors->has('password_confirmation'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        Reset Password
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>




<div class="row" id="reiheVergessen1">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <h1>LogIn-Daten vergessen</h1>
            <div id="kleinerText" class="center-block col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <p>Wenn Sie Ihr Passwort oder Ihren Nutzernamen vergessen haben, können Sie mittels Ihrer e-Mail, welche Sie bei der Registrierung angegeben haben, die Daten zurücksetzen.</p>
            </div>
        </div>
    </div>
    <form action="#" method="post">
        <div class="row" id="reihevergessenmail">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div id="ker">
                    <input type="text" id="vergessenemail" placeholder="e-Mail">
                </div>
            </div>
        </div>

        <div class="row" id="reihevergessenbutton">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div id="ker1">
                    <input type="submit" id="vergessenbutton" value="Senden">
                </div>
            </div>
        </div>
    </form>
@endsection
