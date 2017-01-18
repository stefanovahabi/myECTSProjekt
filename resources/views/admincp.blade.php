@extends('layouts.default')
@section('css')
    <title>Controlpanel</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>

    <script type="text/javascript" src="js/admin.js"></script>


    <link type="text/css" href="css/admincp.css" rel="stylesheet">

@endsection

@section('content')

    <div id="all">
        <h1>Admin Controlpanel</h1>
        <hr>
        <p>Hier kannst du Hochschulen, Studiengänge und Fächer der Datenbank hinzufügen.</p>
        <hr>
        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 center-block">
                <button id="hochschule" class="btn" onclick="hochschule()">Hochschule anlegen</button>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 center-block">
                <button id="studiengang" class="btn" onclick="studiengang()">Studiengang anlegen</button>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 center-block">
               <button id="fach" class="btn" onclick="fach()">Fach anlegen</button>
            </div>

            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 center-block">
                <button id="search" class="btn" onclick="search()">User suchen</button>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                <div id="result4">

                </div>
            </div>

            <div id="hier" class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                <div id="mitte">
                <form id ="form" method="post" action="/">
                        {{Csrf_field()}}
                <div id="result">


                </div>
                    <div id="box">
                   <select id="selection" style='display: none' name="selection" >
                        <option value="" selected="selected" disabled>--wähle eeeeeeine Hochschule aus</option>
                        @foreach($s as $x)
                            <option value="{{$x->id}}">{{$x->name}}</option>
                        @endforeach
                        </optgroup>
                    </select>
                    </div>

                    <div id="contUmZuordnung">
                        <select id="selectionZuordnung" style='display: none' name="selectionZuordnung[]" multiple="multiple" >
                            <option value="" selected="selected" disabled>--wähle Studiengänge aus--</option>
                            @foreach($gange as $g)
                                @foreach($s as $v)
                                    @if($v->id == $g->hochschule)
                                        <option value="{{$g->id}}">{{$g->name}}, {{$v->name}}</option>

                                    @endif
                                    @endforeach
                                @endforeach
                                </optgroup>
                        </select>
                    </div>

                </form>
                </div>
             </div>
            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                <div id="result3">

                </div>

        </div>

    </div>
    </div>




@endsection