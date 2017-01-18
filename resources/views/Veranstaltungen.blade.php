@extends('layouts.default')

@section('css')
    <title>Veranstaltungsplan</title>
    <link rel="stylesheet" href="css/style_Startseite.css" type="text/css">
    <link rel="stylesheet" href="css/veranstaltungcss.css" type="text/css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script type="text/javascript" src="js/veranstaltungen.js"></script>
@endsection

@section('content')
    <div class="row" id="veranstaltung">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <h1 id="ubveranstaltung">Veranstaltungsplan</h1>
        </div>
    </div>






    <div class="row" id="tabellereihe">
        <h2>Fächer:</h2>
        <hr>


        <div id="div2" ondrop="drop(event)" ondragover="allowDrop(event)">
            @foreach($rel as $r)
                @if($r->userid == Auth::user()->id)
                    @foreach($facher as $f)
                        @if($r->subjectid == $f->id)

                            <div draggable="true" ondragstart="drag(event)" id="{{"y".$f->id}}" ondblclick="deleteClick(this)">{{$f->kuerzel}}</div>
                        @endif
                    @endforeach
                @endif

            @endforeach
        </div>

        <hr>
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 table-responsive">

            <table class="table table-striped">

                    <thead>

                    <tr>
                        <th>Uhrzeit</th><th>Montag</th><th>Dienstag</th><th>Mittwoch</th><th>Donnerstag</th><th>Freitag</th><th>Samstag</th>
                    </tr>

                    </thead>

                    <tbody>

                   <p> {{ $check = false }}
                    {{  $variable = 1 }}
                    {{ $rowCount = 1 }}
                    {{ $var = "td".$variable }}
                       {{ $load = "loaded".$variable }}</p>
                    @foreach($stundenplan as $s)
                        @if($s->userid == Auth::user()->id)
                            <p> {{ $check = true }} </p>
                            @if($rowCount == 1)
                                <div style="display:none"> hhh {{ $rowCount++ }} </div>
                                <tr><td>08:00 - 09:30</td><td id="{{"td" . $variable}}" ondrop="drop(event)" ondragover="allowDrop(event)"><div id='{{$load}}' draggable='true' ondragstart='drag(event)' ondblclick='deleteClick(this)'>{{$s->$var}}</div></td><p>{{  ++$variable }} {{ $var = "td".$variable }} {{ $load = "loaded".$variable }}</p><td id="{{"td" . $variable}}" ondrop="drop(event)" ondragover="allowDrop(event)"><div id='{{$load}}' draggable='true' ondragstart='drag(event)' ondblclick='deleteClick(this)'>{{$s->$var}}</div></td><p>{{  ++$variable }} {{ $var = "td".$variable }} {{ $load = "loaded".$variable }}</p><td id="{{"td" . $variable}}" ondrop="drop(event)" ondragover="allowDrop(event)"><div id='{{$load}}' draggable='true' ondragstart='drag(event)' ondblclick='deleteClick(this)'>{{$s->$var}}</div></td><p>{{  ++$variable }} {{ $var = "td".$variable }} {{ $load = "loaded".$variable }}</p><td id="{{"td" . $variable}}" ondrop="drop(event)" ondragover="allowDrop(event)"><div id='{{$load}}' draggable='true' ondragstart='drag(event)' ondblclick='deleteClick(this)'>{{$s->$var}}</div></td><p>{{  ++$variable }} {{ $var = "td".$variable }} {{ $load = "loaded".$variable }}</p><td id="{{"td" . $variable}}" ondrop="drop(event)" ondragover="allowDrop(event)"><div id='{{$load}}' draggable='true' ondragstart='drag(event)' ondblclick='deleteClick(this)'>{{$s->$var}}</div></td><p>{{  ++$variable }} {{ $var = "td".$variable }} {{ $load = "loaded".$variable }}</p><td id="{{"td" . $variable}}" ondrop="drop(event)" ondragover="allowDrop(event)"><div id='{{$load}}' draggable='true' ondragstart='drag(event)' ondblclick='deleteClick(this)'>{{$s->$var}}</div></td><p>{{  ++$variable }} {{ $var = "td".$variable }} {{ $load = "loaded".$variable }}</p></tr>
                            @endif
                            @if($rowCount == 2)
                                <div style="display:none"> hhh {{ $rowCount++ }} </div>
                                <tr><td>09:45 - 11:15</td><td id="{{"td" . $variable}}" ondrop="drop(event)" ondragover="allowDrop(event)"><div id='{{$load}}' draggable='true' ondragstart='drag(event)' ondblclick='deleteClick(this)'>{{$s->$var}}</div></td><p>{{  ++$variable }} {{ $var = "td".$variable }} {{ $load = "loaded".$variable }}</p><td id="{{"td" . $variable}}" ondrop="drop(event)" ondragover="allowDrop(event)"><div id='{{$load}}' draggable='true' ondragstart='drag(event)' ondblclick='deleteClick(this)'>{{$s->$var}}</div></td><p>{{  ++$variable }} {{ $var = "td".$variable }} {{ $load = "loaded".$variable }}</p><td id="{{"td" . $variable}}" ondrop="drop(event)" ondragover="allowDrop(event)"><div id='{{$load}}' draggable='true' ondragstart='drag(event)' ondblclick='deleteClick(this)'>{{$s->$var}}</div></td><p>{{  ++$variable }} {{ $var = "td".$variable }} {{ $load = "loaded".$variable }}</p><td id="{{"td" . $variable}}" ondrop="drop(event)" ondragover="allowDrop(event)"><div id='{{$load}}' draggable='true' ondragstart='drag(event)' ondblclick='deleteClick(this)'>{{$s->$var}}</div></td><p>{{  ++$variable }} {{ $var = "td".$variable }} {{ $load = "loaded".$variable }}</p><td id="{{"td" . $variable}}" ondrop="drop(event)" ondragover="allowDrop(event)"><div id='{{$load}}' draggable='true' ondragstart='drag(event)' ondblclick='deleteClick(this)'>{{$s->$var}}</div></td><p>{{  ++$variable }} {{ $var = "td".$variable }} {{ $load = "loaded".$variable }}</p><td id="{{"td" . $variable}}" ondrop="drop(event)" ondragover="allowDrop(event)"><div id='{{$load}}' draggable='true' ondragstart='drag(event)' ondblclick='deleteClick(this)'>{{$s->$var}}</div></td><p>{{  ++$variable }} {{ $var = "td".$variable }} {{ $load = "loaded".$variable }}</p></tr>

                            @endif
                            @if($rowCount == 3)
                                <div style="display:none"> hhh {{ $rowCount++ }} </div>
                                <tr><td>11:30 - 13:00</td><td id="{{"td" . $variable}}" ondrop="drop(event)" ondragover="allowDrop(event)"><div id='{{$load}}' draggable='true' ondragstart='drag(event)' ondblclick='deleteClick(this)'>{{$s->$var}}</div></td><p>{{  ++$variable }} {{ $var = "td".$variable }} {{ $load = "loaded".$variable }}</p><td id="{{"td" . $variable}}" ondrop="drop(event)" ondragover="allowDrop(event)"><div id='{{$load}}' draggable='true' ondragstart='drag(event)' ondblclick='deleteClick(this)'>{{$s->$var}}</div></td><p>{{  ++$variable }} {{ $var = "td".$variable }} {{ $load = "loaded".$variable }}</p><td id="{{"td" . $variable}}" ondrop="drop(event)" ondragover="allowDrop(event)"><div id='{{$load}}' draggable='true' ondragstart='drag(event)' ondblclick='deleteClick(this)'>{{$s->$var}}</div></td><p>{{  ++$variable }} {{ $var = "td".$variable }} {{ $load = "loaded".$variable }}</p><td id="{{"td" . $variable}}" ondrop="drop(event)" ondragover="allowDrop(event)"><div id='{{$load}}' draggable='true' ondragstart='drag(event)' ondblclick='deleteClick(this)'>{{$s->$var}}</div></td><p>{{  ++$variable }} {{ $var = "td".$variable }} {{ $load = "loaded".$variable }}</p><td id="{{"td" . $variable}}" ondrop="drop(event)" ondragover="allowDrop(event)"><div id='{{$load}}' draggable='true' ondragstart='drag(event)' ondblclick='deleteClick(this)'>{{$s->$var}}</div></td><p>{{  ++$variable }} {{ $var = "td".$variable }} {{ $load = "loaded".$variable }}</p><td id="{{"td" . $variable}}" ondrop="drop(event)" ondragover="allowDrop(event)"><div id='{{$load}}' draggable='true' ondragstart='drag(event)' ondblclick='deleteClick(this)'>{{$s->$var}}</div></td><p>{{  ++$variable }} {{ $var = "td".$variable }} {{ $load = "loaded".$variable }}</p></tr>

                            @endif
                            @if($rowCount == 4)
                                <div style="display:none"> hhh {{ $rowCount++ }} </div>
                                <tr><td>13:00 - 14:00</td><td id="{{"td" . $variable}}" ondrop="drop(event)" ondragover="allowDrop(event)"><div id='{{$load}}' draggable='true' ondragstart='drag(event)' ondblclick='deleteClick(this)'>{{$s->$var}}</div></td><p>{{  ++$variable }} {{ $var = "td".$variable }} {{ $load = "loaded".$variable }}</p><td id="{{"td" . $variable}}" ondrop="drop(event)" ondragover="allowDrop(event)"><div id='{{$load}}' draggable='true' ondragstart='drag(event)' ondblclick='deleteClick(this)'>{{$s->$var}}</div></td><p>{{  ++$variable }} {{ $var = "td".$variable }} {{ $load = "loaded".$variable }}</p><td id="{{"td" . $variable}}" ondrop="drop(event)" ondragover="allowDrop(event)"><div id='{{$load}}' draggable='true' ondragstart='drag(event)' ondblclick='deleteClick(this)'>{{$s->$var}}</div></td><p>{{  ++$variable }} {{ $var = "td".$variable }} {{ $load = "loaded".$variable }}</p><td id="{{"td" . $variable}}" ondrop="drop(event)" ondragover="allowDrop(event)"><div id='{{$load}}' draggable='true' ondragstart='drag(event)' ondblclick='deleteClick(this)'>{{$s->$var}}</div></td><p>{{  ++$variable }} {{ $var = "td".$variable }} {{ $load = "loaded".$variable }}</p><td id="{{"td" . $variable}}" ondrop="drop(event)" ondragover="allowDrop(event)"><div id='{{$load}}' draggable='true' ondragstart='drag(event)' ondblclick='deleteClick(this)'>{{$s->$var}}</div></td><p>{{  ++$variable }} {{ $var = "td".$variable }} {{ $load = "loaded".$variable }}</p><td id="{{"td" . $variable}}" ondrop="drop(event)" ondragover="allowDrop(event)"><div id='{{$load}}' draggable='true' ondragstart='drag(event)' ondblclick='deleteClick(this)'>{{$s->$var}}</div></td><p>{{  ++$variable }} {{ $var = "td".$variable }} {{ $load = "loaded".$variable }}</p></tr>

                            @endif
                            @if($rowCount == 5)
                                <div style="display:none"> hhh {{ $rowCount++ }} </div>
                                <tr><td>14:00 - 15:30</td><td id="{{"td" . $variable}}" ondrop="drop(event)" ondragover="allowDrop(event)"><div id='{{$load}}' draggable='true' ondragstart='drag(event)' ondblclick='deleteClick(this)'>{{$s->$var}}</div></td><p>{{  ++$variable }} {{ $var = "td".$variable }} {{ $load = "loaded".$variable }}</p><td id="{{"td" . $variable}}" ondrop="drop(event)" ondragover="allowDrop(event)"><div id='{{$load}}' draggable='true' ondragstart='drag(event)' ondblclick='deleteClick(this)'>{{$s->$var}}</div></td><p>{{  ++$variable }} {{ $var = "td".$variable }} {{ $load = "loaded".$variable }}</p><td id="{{"td" . $variable}}" ondrop="drop(event)" ondragover="allowDrop(event)"><div id='{{$load}}' draggable='true' ondragstart='drag(event)' ondblclick='deleteClick(this)'>{{$s->$var}}</div></td><p>{{  ++$variable }} {{ $var = "td".$variable }} {{ $load = "loaded".$variable }}</p><td id="{{"td" . $variable}}" ondrop="drop(event)" ondragover="allowDrop(event)"><div id='{{$load}}' draggable='true' ondragstart='drag(event)' ondblclick='deleteClick(this)'>{{$s->$var}}</div></td><p>{{  ++$variable }} {{ $var = "td".$variable }} {{ $load = "loaded".$variable }}</p><td id="{{"td" . $variable}}" ondrop="drop(event)" ondragover="allowDrop(event)"><div id='{{$load}}' draggable='true' ondragstart='drag(event)' ondblclick='deleteClick(this)'>{{$s->$var}}</div></td><p>{{  ++$variable }} {{ $var = "td".$variable }} {{ $load = "loaded".$variable }}</p><td id="{{"td" . $variable}}" ondrop="drop(event)" ondragover="allowDrop(event)"><div id='{{$load}}' draggable='true' ondragstart='drag(event)' ondblclick='deleteClick(this)'>{{$s->$var}}</div></td><p>{{  ++$variable }} {{ $var = "td".$variable }} {{ $load = "loaded".$variable }}</p></tr>

                            @endif
                            @if($rowCount == 6)
                                <div style="display:none"> hhh {{ $rowCount++ }} </div>
                                <tr><td>15:45 - 17:15</td><td id="{{"td" . $variable}}" ondrop="drop(event)" ondragover="allowDrop(event)"><div id='{{$load}}' draggable='true' ondragstart='drag(event)' ondblclick='deleteClick(this)'>{{$s->$var}}</div></td><p>{{  ++$variable }} {{ $var = "td".$variable }} {{ $load = "loaded".$variable }}</p><td id="{{"td" . $variable}}" ondrop="drop(event)" ondragover="allowDrop(event)"><div id='{{$load}}' draggable='true' ondragstart='drag(event)' ondblclick='deleteClick(this)'>{{$s->$var}}</div></td><p>{{  ++$variable }} {{ $var = "td".$variable }} {{ $load = "loaded".$variable }}</p><td id="{{"td" . $variable}}" ondrop="drop(event)" ondragover="allowDrop(event)"><div id='{{$load}}' draggable='true' ondragstart='drag(event)' ondblclick='deleteClick(this)'>{{$s->$var}}</div></td><p>{{  ++$variable }} {{ $var = "td".$variable }} {{ $load = "loaded".$variable }}</p><td id="{{"td" . $variable}}" ondrop="drop(event)" ondragover="allowDrop(event)"><div id='{{$load}}' draggable='true' ondragstart='drag(event)' ondblclick='deleteClick(this)'>{{$s->$var}}</div></td><p>{{  ++$variable }} {{ $var = "td".$variable }} {{ $load = "loaded".$variable }}</p><td id="{{"td" . $variable}}" ondrop="drop(event)" ondragover="allowDrop(event)"><div id='{{$load}}' draggable='true' ondragstart='drag(event)' ondblclick='deleteClick(this)'>{{$s->$var}}</div></td><p>{{  ++$variable }} {{ $var = "td".$variable }} {{ $load = "loaded".$variable }}</p><td id="{{"td" . $variable}}" ondrop="drop(event)" ondragover="allowDrop(event)"><div id='{{$load}}' draggable='true' ondragstart='drag(event)' ondblclick='deleteClick(this)'>{{$s->$var}}</div></td><p>{{  ++$variable }} {{ $var = "td".$variable }} {{ $load = "loaded".$variable }}</p></tr>

                            @endif
                            @if($rowCount == 7)
                                <div style="display:none"> hhh {{ $rowCount++ }} </div>
                                <tr><td>17:30 - 19:00</td><td id="{{"td" . $variable}}" ondrop="drop(event)" ondragover="allowDrop(event)"><div id='{{$load}}' draggable='true' ondragstart='drag(event)' ondblclick='deleteClick(this)'>{{$s->$var}}</div></td><p>{{  ++$variable }} {{ $var = "td".$variable }} {{ $load = "loaded".$variable }}</p><td id="{{"td" . $variable}}" ondrop="drop(event)" ondragover="allowDrop(event)"><div id='{{$load}}' draggable='true' ondragstart='drag(event)' ondblclick='deleteClick(this)'>{{$s->$var}}</div></td><p>{{  ++$variable }} {{ $var = "td".$variable }} {{ $load = "loaded".$variable }}</p><td id="{{"td" . $variable}}" ondrop="drop(event)" ondragover="allowDrop(event)"><div id='{{$load}}' draggable='true' ondragstart='drag(event)' ondblclick='deleteClick(this)'>{{$s->$var}}</div></td><p>{{  ++$variable }} {{ $var = "td".$variable }} {{ $load = "loaded".$variable }}</p><td id="{{"td" . $variable}}" ondrop="drop(event)" ondragover="allowDrop(event)"><div id='{{$load}}' draggable='true' ondragstart='drag(event)' ondblclick='deleteClick(this)'>{{$s->$var}}</div></td><p>{{  ++$variable }} {{ $var = "td".$variable }} {{ $load = "loaded".$variable }}</p><td id="{{"td" . $variable}}" ondrop="drop(event)" ondragover="allowDrop(event)"><div id='{{$load}}' draggable='true' ondragstart='drag(event)' ondblclick='deleteClick(this)'>{{$s->$var}}</div></td><p>{{  ++$variable }} {{ $var = "td".$variable }} {{ $load = "loaded".$variable }}</p><td id="{{"td" . $variable}}" ondrop="drop(event)" ondragover="allowDrop(event)"><div id='{{$load}}' draggable='true' ondragstart='drag(event)' ondblclick='deleteClick(this)'>{{$s->$var}}</div></td><p>{{  ++$variable }} {{ $var = "td".$variable }} {{ $load = "loaded".$variable }}</p></tr>

                            @endif
                            @if($rowCount == 8)
                                <div style="display:none"> hhh {{ $rowCount++ }} </div>
                                <tr><td>19:15 - 20:45</td><td id="{{"td" . $variable}}" ondrop="drop(event)" ondragover="allowDrop(event)"><div id='{{$load}}' draggable='true' ondragstart='drag(event)' ondblclick='deleteClick(this)'>{{$s->$var}}</div></td><p>{{  ++$variable }} {{ $var = "td".$variable }} {{ $load = "loaded".$variable }}</p><td id="{{"td" . $variable}}" ondrop="drop(event)" ondragover="allowDrop(event)"><div id='{{$load}}' draggable='true' ondragstart='drag(event)' ondblclick='deleteClick(this)'>{{$s->$var}}</div></td><p>{{  ++$variable }} {{ $var = "td".$variable }} {{ $load = "loaded".$variable }}</p><td id="{{"td" . $variable}}" ondrop="drop(event)" ondragover="allowDrop(event)"><div id='{{$load}}' draggable='true' ondragstart='drag(event)' ondblclick='deleteClick(this)'>{{$s->$var}}</div></td><p>{{  ++$variable }} {{ $var = "td".$variable }} {{ $load = "loaded".$variable }}</p><td id="{{"td" . $variable}}" ondrop="drop(event)" ondragover="allowDrop(event)"><div id='{{$load}}' draggable='true' ondragstart='drag(event)' ondblclick='deleteClick(this)'>{{$s->$var}}</div></td><p>{{  ++$variable }} {{ $var = "td".$variable }} {{ $load = "loaded".$variable }}</p><td id="{{"td" . $variable}}" ondrop="drop(event)" ondragover="allowDrop(event)"><div id='{{$load}}' draggable='true' ondragstart='drag(event)' ondblclick='deleteClick(this)'>{{$s->$var}}</div></td><p>{{  ++$variable }} {{ $var = "td".$variable }} {{ $load = "loaded".$variable }}</p><td id="{{"td" . $variable}}" ondrop="drop(event)" ondragover="allowDrop(event)"><div id='{{$load}}' draggable='true' ondragstart='drag(event)' ondblclick='deleteClick(this)'>{{$s->$var}}</div></td><p>{{  ++$variable }} {{ $var = "td".$variable }} {{ $load = "loaded".$variable }}</p></tr>

                            @endif
                        @endif

                        @endforeach

                    @if($check == false)


                   <tr><td onclick="hallo(this)" >08:00 - 09:30</td><td id="td1" ondrop="drop(event)" ondragover="allowDrop(event)"></td><td id="td2" ondrop="drop(event)" ondragover="allowDrop(event)"></td><td id="td3" ondrop="drop(event)" ondragover="allowDrop(event)"></td><td id="td4" ondrop="drop(event)" ondragover="allowDrop(event)"></td><td id="td5" ondrop="drop(event)" ondragover="allowDrop(event)"></td><td id="td6" ondrop="drop(event)" ondragover="allowDrop(event)"></td></tr>
                    <tr><td>09:45 - 11:15</td><td id="td7" ondrop="drop(event)" ondragover="allowDrop(event)"></td><td id="td8" ondrop="drop(event)" ondragover="allowDrop(event)"></td><td id="td9" ondrop="drop(event)" ondragover="allowDrop(event)"></td><td id="td10" ondrop="drop(event)" ondragover="allowDrop(event)"></td><td id="td11" ondrop="drop(event)" ondragover="allowDrop(event)"></td><td id="td12" ondrop="drop(event)" ondragover="allowDrop(event)"></td></tr>
                    <tr><td>11:30 - 13:00</td><td id="td13" ondrop="drop(event)" ondragover="allowDrop(event)"></td><td id="td14" ondrop="drop(event)" ondragover="allowDrop(event)"></td><td id="td15" ondrop="drop(event)" ondragover="allowDrop(event)"></td><td id="td16" ondrop="drop(event)" ondragover="allowDrop(event)"></td><td id="td17" ondrop="drop(event)" ondragover="allowDrop(event)"></td><td id="td18" ondrop="drop(event)" ondragover="allowDrop(event)"></td></tr>
                    <tr><td>13:00 - 14:00</td><td id="td19" ondrop="drop(event)" ondragover="allowDrop(event)"></td><td id="td20" ondrop="drop(event)" ondragover="allowDrop(event)"></td><td id="td21" ondrop="drop(event)" ondragover="allowDrop(event)"></td><td id="td22" ondrop="drop(event)" ondragover="allowDrop(event)"></td><td id="td23" ondrop="drop(event)" ondragover="allowDrop(event)"></td><td id="td24" ondrop="drop(event)" ondragover="allowDrop(event)"></td></tr>
                    <tr><td>14:00 - 15:30</td><td id="td25" ondrop="drop(event)" ondragover="allowDrop(event)"></td><td id="td26" ondrop="drop(event)" ondragover="allowDrop(event)"></td><td id="td27" ondrop="drop(event)" ondragover="allowDrop(event)"></td><td id="td28" ondrop="drop(event)" ondragover="allowDrop(event)"></td><td id="td29" ondrop="drop(event)" ondragover="allowDrop(event)"></td><td id="td30" ondrop="drop(event)" ondragover="allowDrop(event)"></td></tr>
                    <tr><td>15:45 - 17:15</td><td id="td31" ondrop="drop(event)" ondragover="allowDrop(event)"></td><td id="td32" ondrop="drop(event)" ondragover="allowDrop(event)"></td><td id="td33" ondrop="drop(event)" ondragover="allowDrop(event)"></td><td id="td34" ondrop="drop(event)" ondragover="allowDrop(event)"></td><td id="td35" ondrop="drop(event)" ondragover="allowDrop(event)"></td><td id="td36" ondrop="drop(event)" ondragover="allowDrop(event)"></td></tr>
                    <tr><td>17:30 - 19:00</td><td id="td37" ondrop="drop(event)" ondragover="allowDrop(event)"></td><td id="td38" ondrop="drop(event)" ondragover="allowDrop(event)"></td><td id="td39" ondrop="drop(event)" ondragover="allowDrop(event)"></td><td id="td40" ondrop="drop(event)" ondragover="allowDrop(event)"></td><td id="td41" ondrop="drop(event)" ondragover="allowDrop(event)"></td><td id="td42" ondrop="drop(event)" ondragover="allowDrop(event)"></td></tr>
                    <tr><td>19:15 - 20:45</td><td id="td43" ondrop="drop(event)" ondragover="allowDrop(event)"></td><td id="td44" ondrop="drop(event)" ondragover="allowDrop(event)"></td><td id="td45" ondrop="drop(event)" ondragover="allowDrop(event)"></td><td id="td46" ondrop="drop(event)" ondragover="allowDrop(event)"></td><td id="td47" ondrop="drop(event)" ondragover="allowDrop(event)"></td><td id="td48" ondrop="drop(event)" ondragover="allowDrop(event)"></td></tr>

                        @endif


<!--
                   <tr><td>08:00 - 09:30</td><td id="td1" ondrop="drop(event)" ondragover="allowDrop(event)"></td><td id="td2" ondrop="drop(event)" ondragover="allowDrop(event)"></td><td id="td3" ondrop="drop(event)" ondragover="allowDrop(event)"></td><td id="td4" ondrop="drop(event)" ondragover="allowDrop(event)"></td><td id="td5" ondrop="drop(event)" ondragover="allowDrop(event)"></td><td id="td6" ondrop="drop(event)" ondragover="allowDrop(event)"></td></tr>
                    <tr><td>09:45 - 11:15</td><td id="td7" ondrop="drop(event)" ondragover="allowDrop(event)"></td><td id="td8" ondrop="drop(event)" ondragover="allowDrop(event)"></td><td id="td9" ondrop="drop(event)" ondragover="allowDrop(event)"></td><td id="td10" ondrop="drop(event)" ondragover="allowDrop(event)"></td><td id="td11" ondrop="drop(event)" ondragover="allowDrop(event)"></td><td id="td12" ondrop="drop(event)" ondragover="allowDrop(event)"></td></tr>
                    <tr><td>11:30 - 13:00</td><td id="td13" ondrop="drop(event)" ondragover="allowDrop(event)"></td><td id="td14" ondrop="drop(event)" ondragover="allowDrop(event)"></td><td id="td15" ondrop="drop(event)" ondragover="allowDrop(event)"></td><td id="td16" ondrop="drop(event)" ondragover="allowDrop(event)"></td><td id="td17" ondrop="drop(event)" ondragover="allowDrop(event)"></td><td id="td18" ondrop="drop(event)" ondragover="allowDrop(event)"></td></tr>
                    <tr><td>13:00 - 14:00</td><td id="td19" ondrop="drop(event)" ondragover="allowDrop(event)"></td><td id="td20" ondrop="drop(event)" ondragover="allowDrop(event)"></td><td id="td21" ondrop="drop(event)" ondragover="allowDrop(event)"></td><td id="td22" ondrop="drop(event)" ondragover="allowDrop(event)"></td><td id="td23" ondrop="drop(event)" ondragover="allowDrop(event)"></td><td id="td24" ondrop="drop(event)" ondragover="allowDrop(event)"></td></tr>
                    <tr><td>14:00 - 15:30</td><td id="td25" ondrop="drop(event)" ondragover="allowDrop(event)"></td><td id="td26" ondrop="drop(event)" ondragover="allowDrop(event)"></td><td id="td27" ondrop="drop(event)" ondragover="allowDrop(event)"></td><td id="td28" ondrop="drop(event)" ondragover="allowDrop(event)"></td><td id="td29" ondrop="drop(event)" ondragover="allowDrop(event)"></td><td id="td30" ondrop="drop(event)" ondragover="allowDrop(event)"></td></tr>
                    <tr><td>15:45 - 17:15</td><td id="td31" ondrop="drop(event)" ondragover="allowDrop(event)"></td><td id="td32" ondrop="drop(event)" ondragover="allowDrop(event)"></td><td id="td33" ondrop="drop(event)" ondragover="allowDrop(event)"></td><td id="td34" ondrop="drop(event)" ondragover="allowDrop(event)"></td><td id="td35" ondrop="drop(event)" ondragover="allowDrop(event)"></td><td id="td36" ondrop="drop(event)" ondragover="allowDrop(event)"></td></tr>
                    <tr><td>17:30 - 19:00</td><td id="td37" ondrop="drop(event)" ondragover="allowDrop(event)"></td><td id="td38" ondrop="drop(event)" ondragover="allowDrop(event)"></td><td id="td39" ondrop="drop(event)" ondragover="allowDrop(event)"></td><td id="td40" ondrop="drop(event)" ondragover="allowDrop(event)"></td><td id="td41" ondrop="drop(event)" ondragover="allowDrop(event)"></td><td id="td42" ondrop="drop(event)" ondragover="allowDrop(event)"></td></tr>
                    <tr><td>19:15 - 20:45</td><td id="td43" ondrop="drop(event)" ondragover="allowDrop(event)"></td><td id="td44" ondrop="drop(event)" ondragover="allowDrop(event)"></td><td id="td45" ondrop="drop(event)" ondragover="allowDrop(event)"></td><td id="td46" ondrop="drop(event)" ondragover="allowDrop(event)"></td><td id="td47" ondrop="drop(event)" ondragover="allowDrop(event)"></td><td id="td48" ondrop="drop(event)" ondragover="allowDrop(event)"></td></tr>
  -->

                    </tbody>

                </table>





        </div>
    </div>
    <button class="btn btn-primary" id="saveStunden" onclick="ajaxStundenplan()">Speichern</button>
    <input type="hidden" id="versteckt" name="versteckt" value="{{{Auth::user()->id}}}">
    <div id="result"></div>


@endsection
