@extends('layouts.default')
@section('css')
<link rel="stylesheet" href = "css/stoppuhr.css">
<title>Stoppuhr</title>
<link rel="stylesheet" href="css/style_Startseite.css" type="text/css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="css/bootstrap.css">
<link rel="stylesheet" href="css/bootstrap-responsive.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<link rel="stylesheet" href="css/stylesGENERAL.css" type="text/css">
<style type="text/css">

    #Anzeige{
        font-size: 50px;
    }
    .test{
        float:right;
    }
</style>
@endsection
@section('content')



    <script>
        var insgesamt=0;
        var _currentSeconds=0;
        var _FontSize=10;
        var _AnzElm=0;
        var _timerID=0;
        var _starttime=0;
        var _pausetime=0;

        function gotoECTSKonto(){
            $('#dummy').html("<form method='get' action='/konto' name='formToECTSKonto'><input type='hidden' name='stoppuhrWert' value="+Math.round((insgesamt/60)*100)/100+"></form>");
            document.formToECTSKonto.submit();
        }

        function init() {
            _AnzElm = document.getElementById("Anzeige");
        }

        function SchriftGroesse(str_operator) {
            var newFontSize=0;
            eval("newFontSize = _FontSize" + str_operator + "1");
            _AnzElm.style.fontSize = newFontSize + "em";
            _FontSize = newFontSize;
        }

        function ResetText() {
            SetCountdownText(0);
        }

        function StartClock() {
            if (_timerID == 0) {
                ResetText();
                _timerID = window.setInterval("Tick()", 1000);
                _starttime = parseInt(new Date().getTime()/1000);
            }
        }

        function ResetClock() {
            ResetText();
            StopClock();
            _currentSeconds=0;
            _starttime=0;
            _pausetime=0;
        }

        function StopClock() {
            if (_timerID > 0) {
                window.clearInterval(_timerID);
                _timerID = 0;
                _pausetime = parseInt(new Date().getTime()/1000);
            }
            alert("insgesamt " + insgesamt + " s. also + " + Math.round((insgesamt/60)*100)/100 + " min ");
        }

        function ContinueClock() {
            if (_timerID == 0) {
                _timerID = window.setInterval("Tick()", 1000);
                _starttime = _starttime + parseInt(new Date().getTime()/1000) - _pausetime + 1;
            }
        }

        function Tick() {
            var currTime = parseInt(new Date().getTime()/1000);
            if (_currentSeconds >= 36000) { //100h max
                StopClock();
                return;
            }
            SetCountdownText(_currentSeconds - _starttime + currTime);
            insgesamt=_currentSeconds - _starttime + currTime;
        }

        function SetCountdownText(seconds) {
            var deltaseconds = seconds;
            if (seconds < 0)
            {
                deltaseconds = 0;
            }
            var minutes=parseInt(deltaseconds/60);
            seconds = parseInt (deltaseconds % 60);
            var hours=parseInt(minutes / 60);
            minutes = parseInt(minutes % 60);
            var strText = AddNull(hours) + ":" + AddNull(minutes) + ":" + AddNull(seconds);
            _AnzElm.innerHTML = strText;
        }

        function AddNull(num) {
            return ((num >= 0)&&(num < 10))?"0"+num:num+"";
        }

        function MM_goToURL() {
            var i, args=MM_goToURL.arguments; document.MM_returnValue = false;
            for (i=0; i<(args.length-1); i+=2) eval(args[i]+".location='"+args[i+1]+"'");
        }



    </script>


    <div id="contUmUhr">

        <form action="#">
            <div>
                <div class="anzeige" id="Anzeige">00:00:00</div>

                        <input class="button" name="reset" type="button" id="reset" value="Reset" onclick="ResetClock();"/>
                        <input class="button" name="start" type="button" id="start" value="Start" onclick="StartClock();" />

                        <input class="button" name="stop" type="button" id="stop" value="Stop" onclick="StopClock();" />
                        <input class="button" name="continue" type="button" id="continue" value="Weiter" onclick="ContinueClock();" />

                        <input class="button" name="zuKonto" type="button" id="zuKonto" value="Zum ECTS-Konto" onclick="gotoECTSKonto()" />

                </div>

            </div>
        </form>
    </div>

    <div id="dummy"></div>

    <noscript>
        <div>(Die Stoppuhr erfordert JavaScript.)</div>
    </noscript>

@endsection
