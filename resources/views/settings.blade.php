@extends('layouts.default')

@section('css')
    <title>Einstellungen</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/settings.css" rel="stylesheet">

    <script src="js/bootstrap.min.js"></script>

    <script type="text/javascript" src="js/settings.js"></script>
@endsection

@section('content')
    <div id="alles">
        <h1>Einstellungen</h1>
        <div id="reihe" class="row">
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <button id="hs1" name="hs" onclick="displayHS()">Hochschule samt Studiengang auswählen</button>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <button id="hs2" name="hs" onclick="displayFacher()">Welche Fächer willst du aktuell belegen?</button>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <button id="hs3" name="hs" onclick="displayAbmelden()">Welche Fächer willst endgültig mit Note abmelden?</button>
            </div>

    @if(!(Auth::user()->kalender))
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <button id="activate" name="hs" onclick="activateKalender({{{Auth::user()->id}}})">Kalender auf Startseite aktivieren?</button>
            </div>
        @endif
        </div>


        <div id="divhs">
            <p>Folgende Hochschulen kannst du wählen.</p>
            <select id="selection">
                <option selected disabled hidden style='display: none' value=''>--wähle Hochschule aus--</option>
            @foreach($hochschulen as $h)
                    <option onclick="getStudiengang({{$h->id}}, {{{Auth::user()->id}}})">{{$h->name}}</option>
                    @endforeach


            </select>
        </div>


        <div id="divAbmelden">
            <p>Folgende Fächer kannst du abmelden.</p>
            <select id="selectionAb" required>
                <option selected disabled hidden style='display: none' value=''>--wähle Fach aus--</option>
                @foreach($userHas as $u)
                    @foreach($facher as $f)
                        @if($u->subjectid == $f->id && $u->userid == Auth::user()->id)
                            <option value="{{{$f->id}}}">{{$f->name}}</option>
                        @endif
                    @endforeach
                @endforeach
            </select>
            <br>
            <input id="note" type="number" step="0.1" placeholder="Note" required>
            <br>
            <button id="sendAb" onclick="abmeldenRelation({{{Auth::user()->id}}})">Send to DB!</button>
        </div>

        <div id="divfacher">
            <p>Folgende Fächer kannst du belegen.</p>
            <select id="selection1" multiple="multiple" size="10" required>
                <option selected disabled hidden style='display: none' value=''>--wähle Fach aus--</option>
                @foreach($st as $s)
                    @foreach($facher as $f)
                        @if($f->id == $s->id)
                            <option value="{{{$s->id}}}">{{$f->name}}</option>
                        @endif
                    @endforeach
                @endforeach
            </select>
            <br>
            <button id="sendbtn" onclick="saveRelation({{{Auth::user()->id}}})">Send to DB!</button>
        </div>

        <div>
            <form id ="form" method="post" action="/">
                {{Csrf_field()}}
                <div id="result">


                </div>
                <div id="result2">


                </div>


            </form>
        </div>





    </div>

@endsection
