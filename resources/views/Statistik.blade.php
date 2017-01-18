@extends('layouts.default')

@section('css')
    <link rel="stylesheet" href="css/style_Startseite.css" type="text/css">
    <link rel="stylesheet" href="css/statistik.css" type="text/css">
    <title>Statistik</title>
@endsection

@section('content')
    <div class="row" id="Statistik">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <h1 id="ustatistik">Statistik</h1>
        </div>
    </div>


    <div class="row" id="tabellereihe">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 table-responsive">


                <table class="table table-striped">

                    <thead>

                    <tr>
                        <th>Veranstaltung</th><th>Notendurchschnitt</th><th>Durchschnittlicher Aufwand (h)</th><th>Mein Aufwand (h)</th><th>Aufwand laut ECTS (h)</th>
                    </tr>

                    </thead>

                    <tbody>


                    @foreach($s as $x)
                        @foreach($users as $u)
                            @foreach($fachs as $f)
                                @if($u->id == $x->userid && $x->subjectid == $f->id)
                                    <tr><td>{{$f->name}}</td><td>
                                            @foreach($dNote as $dn)
                                                @if($dn->id == $f->id)
                                                    {{round($dn->dNote,2)}}</td>
                                                    @endif
                                                @endforeach
                                      @foreach($results as $r)
                                          @if($f->id == $r->id)
                                                    <td>{{round($r->durchschnitt/60,2)}}
                                              @endif
                                          @endforeach


                                        </td><td>{{round($x->meinAufwand/60,2)}}</td><td>{{$f->ects*30}}</td></tr>
                                @endif
                                    @endforeach
                            @endforeach

                        @endforeach



                    </tbody>

                </table>



        </div>

    </div>
    <div id = "ectsButton">
        <a class="btn btn-primary" href="{{ url('/konto') }}" role="button">ECTS-Konto</a>
    </div>







@endsection
