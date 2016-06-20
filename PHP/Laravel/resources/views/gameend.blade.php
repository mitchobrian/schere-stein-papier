@extends('master')

@section('title', 'Gameend')
{{ Html::style('css/style.css') }}
{{ Html::style('css/bootstrap.min.css') }}
{{ HTML::script('JS/jquery.min.js') }}
{{ HTML::script('JS/auswertung.js') }}


@section('content')

    <div class="jumbotron">
        <div class="container-fluid">

            <div id="player-outer-div">
                <div id="player1-div">Player 1</div>
                <div id="player2-div">Player 2</div>
            </div>
            <p id="rundeundspielauswertung">
            <h1 align="center">Spielauswertung!</h1>
            </p>


            <!-- Auswertung -->
            <!-- Choise of Player1 -->
            <input type="hidden" id="p1Choice" value="{{$choice}}">


            <div id="wählenundauswertung-div">
                <h2 id="winner"></h2>
            </div>
            <br><br><br>
            <div id="auswahl-div" style="margin-top:-60px;">
                <div class="auswahl">
                    <img class="sym" src="images/auswahlIcons/schere/schere_links.png" id="Schere1" style="margin-top:20px;">
                    <img class="sym" src="images/auswahlIcons/stein/stein_links.png" style="margin-top:20px;" id="Stein1">
                    <img class="sym" src="images/auswahlIcons/papier/papier_links.png" style="margin-top:20px;" id="Papier1">
                </div>
                <div class="auswahl"><span>VS</span></div>
                <div class="auswahl">
                    <img class="sym" src="images/auswahlIcons/schere/schere_links.png" id="Schere2" style="margin-top:20px;">
                    <img class="sym" src="images/auswahlIcons/stein/stein_links.png" style="margin-top:20px;" id="Stein2">
                    <img  class="sym" src="images/auswahlIcons/papier/papier_links.png" style="margin-top:20px;" id="Papier2">
                </div>
            </div>


            <!-- Noch mal?-->
            <div class="container" style="text-align:center;">
                <div>
                    <h3>Zur Zeit steht es <span id="p1Points">0</span> zu <span id="p2Points">0</span> !</h3>
                    <a class="btn btn-primary btn-lg" href="{{URL::route('gamepage')}}"
                       style="background:Green;"
                       role="button">Nochmal?</a>
                </div>
            </div>
        </div>
    </div>


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="JS/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="JS/bootstrap.min.js"></script>

@stop