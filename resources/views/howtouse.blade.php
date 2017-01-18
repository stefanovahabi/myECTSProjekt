@extends('layouts.default')
@section('css')
    <title>HowToUse</title>
    <link rel="stylesheet" href="css/style_Startseite.css" type="text/css">
@endsection
@section('content')
    <div class="row" id="howtousereihe">
        <h1>How To Use</h1>

        <div class="tabbable" > <!-- Only required for left/right tabs -->
            <ul class="nav nav-tabs">
                <li class="active"><a href="#tab1" data-toggle="tab">First Steps</a></li>
                <li><a href="#tab2" data-toggle="tab">Wo melde ich Bugs?</a></li>
                <li><a href="#tab3" data-toggle="tab">Wie geht das?</a></li>
                <li><a href="#tab4" data-toggle="tab">Lorem ipsum1</a></li>
                <li><a href="#tab5" data-toggle="tab">Lorem ipsum2</a></li>

            </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="tab1">
                    <p>Deine Ersten Schritte in myECTS sind grandios. Erstelle dir einen Account, verwalte deine Termin und organisiere deinen Vorlesungsplan!</p>
                </div>
                <div class="tab-pane" id="tab2">
                    <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.</p>
                </div>
                <div class="tab-pane" id="tab3">
                    <p>At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.</p>
                </div>
                <div class="tab-pane" id="tab4">
                    <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.</p>
                </div>
                <div class="tab-pane" id="tab5">
                    <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.</p>
                </div>
            </div>
        </div>



    </div>
@endsection
