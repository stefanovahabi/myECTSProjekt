@extends('layouts.default')

@section('css')
    <title>Eingeloggt</title>
<link rel="stylesheet" href="css/style_Startseite.css" type="text/css">
<link rel="stylesheet" href="css/style_After_Login.css" type="text/css">
<link href="https://code.jquery.com/ui/1.10.3/themes/redmond/jquery-ui.css" rel="stylesheet" media="screen">
<link href="css/bootstrap.min.css" rel="stylesheet">
<!-- styles -->
<link href="css/styles.css" rel="stylesheet">

<script src="https://code.jquery.com/jquery.js"></script>
<!-- jQuery UI -->
<script src="https://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.min.js"></script>

    <style type="text/css">
        #kalender{
            width:1000px;
            height:1000px;
            background:grey;
        }
        td{
            width:100px;
            height:100px;
            text-align:center;
            border:1px solid black;
            background:#556080;
            color:white;
            font-size:15px;

        }
        td div{
            background:green;
        }
        #bt1ns{
            position:absolute;
            top:30px;
            width:700px;
            height:300px;
            left:610px;
        }

        #kal{
            position:relative;
            top:100px;
        }
        #text{
            color:#556080;
        }

    </style>

@endsection
@section('content')
    <div class="row" id="bilderzeile">
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
            <a href="{{ url('/veranstaltungen') }}"><img src="img/stundenplan.png" alt="Browser kacke" class="img-responsive obereBilder" width="200" height="200"></a>
        </div>

        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
            <a href="{{ url('/stats') }}"><img src="img/stats.png" alt="Browser kacke" class="img-responsive obereBilder" width="200" height="200"></a>

        </div>

        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">

            <a href="{{ url('/settings') }}"><img src="img/settings.png" alt="Browser kacke" class="img-responsive obereBilder" width="200" height="200"></a>
        </div>

        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">

            <a href="{{ url('/stoppuhr') }}"><img src="img/stoppuhr.png" alt="Browser kacke" class="img-responsive obereBilder" width="200" height="200"></a>
        </div>
    </div>

    <div class="row" id="startseite">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div>
                <h3 id="willkommen">Willkommen auf der Startseite, {{{ Auth::user()->email }}} !</h3>





            </div>
        </div>
    </div>
    <div class="row" id="kal">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <script type="text/javascript">


                var textMonat = "";
                var anzTage = 0;
                var monat = 0;
                var jahr = 2017;
                $(document).ready(function(){

                    if(monat == 12 && jahr == 2017){
                        return;
                    }
                    //alert("in weiter");
                    if(monat == 12){
                        jahr++;
                        monat = 1;
                    }else{
                        monat++;
                    }
                    switch(monat){
                        case 1:
                            textMonat = "Januar";
                            anzTage = 31;
                            break;
                        case 2:
                            textMonat = "Februar";						anzTage = 28;

                            break;
                        case 3:
                            textMonat = "März";
                            anzTage = 31;
                            break;
                        case 4:
                            textMonat = "April";						anzTage = 30;

                            break;
                        case 5:
                            textMonat = "Mai";						anzTage = 31;

                            break;
                        case 6:
                            textMonat = "Juni";anzTage = 30;
                            break;
                        case 7:
                            textMonat = "Juli";						anzTage = 31;

                            break;
                        case 8:
                            textMonat = "August";						anzTage = 31;

                            break;
                        case 9:
                            textMonat = "September";	anzTage = 30;

                            break;
                        case 10:
                            textMonat = "Oktober";						anzTage = 31;

                            break;
                        case 11:
                            textMonat = "November";anzTage = 30;
                            break;
                        default:
                            textMonat = "Dezember";						anzTage = 31;

                            break;
                    }


                    $('#text').html(textMonat + ", " + jahr);
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

                    $('#dummy').load('http://localhost:8000/getMonth', {monat: monat, user:$('#HierUser').val()} ,function(result) {
                        $('#dummy').html(result);

                        var newString = result.split("-");
                        $('#dummy').html(newString[30]);


                        var string ="<table>";
                        var monatsZahl = 1;
                        if(monat == 1 || monat == 3 ||monat == 5 ||monat == 7 ||monat == 8 ||monat == 10 ||monat == 12){
                            for(var i = 1; i <= 5; i++){
                                string = string + "<tr>";

                                for(var y = 1; y <= 7; y++){
                                    if(monatsZahl <= 31) {


                                        var ID = "tag" + monatsZahl;

                                        string = string + "<td id=" + ID + " onclick='klicken(this)'>" + newString[monatsZahl - 1] + "</td>";
                                        monatsZahl++;
                                    }
                                }

                                string = string + "</tr>";
                            }
                        }
                        if(monat == 4 ||monat == 6 ||monat == 9 ||monat == 11){
                            for(var i = 1; i <= 5; i++){
                                string = string + "<tr>";

                                for(var y = 1; y <= 7; y++){
                                    if(monatsZahl <= 30) {
                                        var ID = "td" + monatsZahl;

                                        string = string + "<td id=" + ID + " onclick='klicken(this)'>" + newString[monatsZahl - 1] + "</td>";
                                        monatsZahl++;
                                    }
                                }

                                string = string + "</tr>";
                            }
                        }
                        if(monat == 2){
                            for(var i = 1; i <= 4; i++){
                                string = string + "<tr>";

                                for(var y = 1; y <= 7; y++){
                                    if(monatsZahl <= 28) {

                                        var ID = "td" + monatsZahl;
                                        string = string + "<td id=" + ID + " onclick='klicken(this)'>" + newString[monatsZahl - 1] + "</td>";
                                        monatsZahl++;
                                    }
                                }

                                string = string + "</tr>";
                            }
                        }




                        $('#text').append(string + "</table><br>");
                    });
                });


                function klicken(x){
                    //alert($(x).attr('id'));

                    var eingabe = prompt("Was steht an?");
                    if(eingabe.length < 1)
                        return;
                    x.innerHTML = eingabe;
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

                    $('#dummy').load('http://localhost:8000/saveKalender', {tagID: $(x).attr('id'), user:$('#HierUser').val(), monat: monat, wert:eingabe} ,function(result) {
                        $('#dummy').html(result);

                    });


                }
                function weiter(){

                    if(monat == 12 && jahr == 2017){
                        return;
                    }
                    //alert("in weiter");
                    if(monat == 12){
                        jahr++;
                        monat = 1;
                    }else{
                        monat++;
                    }
                    switch(monat){
                        case 1:
                            textMonat = "Januar";
                            anzTage = 31;
                            break;
                        case 2:
                            textMonat = "Februar";						anzTage = 28;

                            break;
                        case 3:
                            textMonat = "März";
                            anzTage = 31;
                            break;
                        case 4:
                            textMonat = "April";						anzTage = 30;

                            break;
                        case 5:
                            textMonat = "Mai";						anzTage = 31;

                            break;
                        case 6:
                            textMonat = "Juni";anzTage = 30;
                            break;
                        case 7:
                            textMonat = "Juli";						anzTage = 31;

                            break;
                        case 8:
                            textMonat = "August";						anzTage = 31;

                            break;
                        case 9:
                            textMonat = "September";	anzTage = 30;

                            break;
                        case 10:
                            textMonat = "Oktober";						anzTage = 31;

                            break;
                        case 11:
                            textMonat = "November";anzTage = 30;
                            break;
                        default:
                            textMonat = "Dezember";						anzTage = 31;

                            break;
                    }


                    $('#text').html(textMonat + ", " + jahr);
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

                    $('#dummy').load('http://localhost:8000/getMonth', {monat: monat, user:$('#HierUser').val()} ,function(result) {
                        $('#dummy').html(result);

                        var newString = result.split("-");
                        $('#dummy').html(newString[30]);


                        var string ="<table>";
                        var monatsZahl = 1;
                        if(monat == 1 || monat == 3 ||monat == 5 ||monat == 7 ||monat == 8 ||monat == 10 ||monat == 12){
                            for(var i = 1; i <= 5; i++){
                                string = string + "<tr>";

                                for(var y = 1; y <= 7; y++){
                                    if(monatsZahl <= 31) {


                                        var ID = "tag" + monatsZahl;

                                        string = string + "<td id=" + ID + " onclick='klicken(this)'>" + newString[monatsZahl - 1] + "</td>";
                                        monatsZahl++;
                                    }
                                }

                                string = string + "</tr>";
                            }
                        }
                        if(monat == 4 ||monat == 6 ||monat == 9 ||monat == 11){
                            for(var i = 1; i <= 5; i++){
                                string = string + "<tr>";

                                for(var y = 1; y <= 7; y++){
                                    if(monatsZahl <= 30) {
                                        var ID = "tag" + monatsZahl;

                                        string = string + "<td id=" + ID + " onclick='klicken(this)'>" + newString[monatsZahl - 1] + "</td>";
                                        monatsZahl++;
                                    }
                                }

                                string = string + "</tr>";
                            }
                        }
                        if(monat == 2){
                            for(var i = 1; i <= 4; i++){
                                string = string + "<tr>";

                                for(var y = 1; y <= 7; y++) {
                                    if (monatsZahl <= 28) {

                                        var ID = "tag" + monatsZahl;

                                        string = string + "<td id=" + ID + " onclick='klicken(this)'>" + newString[monatsZahl - 1] + "</td>";
                                        monatsZahl++;
                                    }
                                }

                                string = string + "</tr>";
                            }
                        }




                        $('#text').append(string + "</table><br>");
                    });
                }

                function back(){
                    if(monat == 1 && jahr == 2017){
                        return;
                    }
                    //alert("in weiter");
                    if(monat == 1){
                        jahr--;
                        monat = 12;
                    }else{
                        monat--;
                    }
                    switch(monat){
                        case 1:
                            textMonat = "Januar";
                            anzTage = 31;
                            break;
                        case 2:
                            textMonat = "Februar";						anzTage = 28;

                            break;
                        case 3:
                            textMonat = "März";
                            anzTage = 31;
                            break;
                        case 4:
                            textMonat = "April";						anzTage = 30;

                            break;
                        case 5:
                            textMonat = "Mai";						anzTage = 31;

                            break;
                        case 6:
                            textMonat = "Juni";anzTage = 30;
                            break;
                        case 7:
                            textMonat = "Juli";						anzTage = 31;

                            break;
                        case 8:
                            textMonat = "August";						anzTage = 31;

                            break;
                        case 9:
                            textMonat = "September";	anzTage = 30;

                            break;
                        case 10:
                            textMonat = "Oktober";						anzTage = 31;

                            break;
                        case 11:
                            textMonat = "November";anzTage = 30;
                            break;
                        default:
                            textMonat = "Dezember";						anzTage = 31;

                            break;
                    }


                    $('#text').html(textMonat + ", " + jahr);
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

                    $('#dummy').load('http://localhost:8000/getMonth', {monat: monat, user:$('#HierUser').val()} ,function(result) {
                        $('#dummy').html(result);

                        var newString = result.split("-");
                        $('#dummy').html(newString[30]);


                        var string ="<table>";
                        var monatsZahl = 1;
                        if(monat == 1 || monat == 3 ||monat == 5 ||monat == 7 ||monat == 8 ||monat == 10 ||monat == 12){
                            for(var i = 1; i <= 5; i++){
                                string = string + "<tr>";

                                for(var y = 1; y <= 7; y++){
                                    if(monatsZahl <= 31) {


                                        var ID = "tag" + monatsZahl;

                                        string = string + "<td id=" + ID + " onclick='klicken(this)'>" + newString[monatsZahl - 1] + "</td>";
                                        monatsZahl++;
                                    }
                                }

                                string = string + "</tr>";
                            }
                        }
                        if(monat == 4 ||monat == 6 ||monat == 9 ||monat == 11){
                            for(var i = 1; i <= 5; i++){
                                string = string + "<tr>";

                                for(var y = 1; y <= 7; y++){
                                    if(monatsZahl <= 30) {
                                        var ID = "tag" + monatsZahl;

                                        string = string + "<td id=" + ID + " onclick='klicken(this)'>" + newString[monatsZahl - 1] + "</td>";
                                        monatsZahl++;
                                    }
                                }

                                string = string + "</tr>";
                            }
                        }
                        if(monat == 2){
                            for(var i = 1; i <= 4; i++){
                                string = string + "<tr>";

                                for(var y = 1; y <= 7; y++){
                                    if(monatsZahl <= 28) {

                                        var ID = "tag" + monatsZahl;

                                        string = string + "<td id=" + ID + " onclick='klicken(this)'>" + newString[monatsZahl - 1] + "</td>";
                                        monatsZahl++;
                                    }
                                }

                                string = string + "</tr>";
                            }
                        }




                        $('#text').append(string + "</table><br>");
                    });

                }


            </script>



            @if(Auth::user()->kalender)
                <div id="btns">
                    <button class="btn btn-primary" onclick="back()">Zurück</button>
                    <button class="btn btn-primary" onclick="weiter()">Weiter</button>

                </div>

                <h1 id="text">Januar, 2017</h1>
            <div id="dummy">

            </div>
            <input type="hidden" name="HierUser" id="HierUser" value="{{{Auth::user()->id}}}">
                @endif
        </div>

    </div>

@endsection
