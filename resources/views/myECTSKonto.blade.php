@extends('layouts.default')
@section('css')
    <title>ECTS-Konto</title>
    <link rel="stylesheet" href="css/konto.css" type="text/css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/bootstrap-responsive.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/stylesGENERAL.css" type="text/css">
    <script type="text/javascript" src="js/konto.js"></script>




    <link rel="stylesheet" href="http://cdn.oesmith.co.uk/morris-0.4.3.min.css">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="http://cdn.oesmith.co.uk/morris-0.4.3.min.js"></script>

@endsection
@section('content')

    <div class="row">
        <div id="ubkonto" class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <h1 id="ubectskonto">ECTS-Konto</h1>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div id="superchart">
                <div id="chart" style="height: 250px;"></div>
            </div>
            <input type="hidden" value="" name="wertDrinnen" id="wertDrinnen">
        </div>
    </div>


















    <div class="row" id="buchen">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">



            <form id="form" action="/platzhalter" method="post">

                <div id="contUmBuchen">
                    <div id="ergebnis">Hier bitte result</div>

                    <div>
                        @if(is_null($x) || empty($x))
                            <input type="number" step="0.01" name="zeitbuchen" id="zeitbuchen" placeholder="Zeit buchen [min]" required>
                            {{Csrf_field()}}

                        @endif
                            @if(!(is_null($x) || empty($x)))
                                <input type="text" name="zeitbuchen" id="zeitbuchen" placeholder="Zeit buchen [min]" value="{{$x}}" required>
                                {{Csrf_field()}}

                            @endif




                    </div>

                    <select id="selection" name="selection" required>

                         <option selected disabled hidden style='display: none' value=''>--wähle Fach aus--</option>

                        @foreach($relation as $r)
                            @if(Auth::user()->id == $r->userid)
                                @foreach($facher as $f)
                                    @if($f->id == $r->subjectid)
                                        <option value="{{$f->id}}" onclick="gibWert({{$f->ects}})">{{$f->name}}</option>
                                    @endif
                                @endforeach
                            @endif
                        @endforeach

                    </select>

                    <div>
                        <input type="hidden" name="user" id="user" value="{{{Auth::user()->id}}}">

                        <input class="btn btn-primary" type="button" id="zeitbuchenbutton" value="buchen" onclick="ajaxKonto()">
                    </div>
                </div>
            </form>




        </div>
    </div>
@endsection
