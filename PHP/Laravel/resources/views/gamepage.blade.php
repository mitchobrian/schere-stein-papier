@extends('master') @section('title', 'Gamepage') {{ Html::style('css/style.css') }} {{ Html::style('css/bootstrap.min.css') }} {{ HTML::script('JS/jquery.min.js') }} {{ HTML::script('JS/gamelogic.js') }} @section('content')

<div class="jumbotron">
    <div class="row-fluid">
        <div id="player-outer-div">
            <div class="col-md-4 col-sm-5 col-xs-6">
                <h1 align="center" id="player1-div">Player 1</h1>
            </div>
            <div class="col-md-4 col-xs-2"></div>
            <div class="col-md-4 col-sm-5 col-xs-6">
                <h1 align="center" id="player2-div">Player 2</h1>
            </div>
        </div>
    </div>

<!--
    <p id="rundeundspielauswertung">
        <h1 align="center">Runde X</h1>
    </p>
-->

    <!-- Auswertung -->
    <div id="wählenundauswertung-div">
        <h2>Wähle deine Hand!
                    <div id="time">30</div>
                    <img id="hurry" src="/images/hurry.gif">
                </h2>
    </div>


    <div id="auswahl-div">

        <div class="row-fluid">
            <div class="col-md-4 col-sm-4 col-xs-4">
                <div class="auswahl"><img display="table" class="img-responsive" src="images/auswahlIcons/schere/schere_grau.png" id="Schere" style="margin-bottom: 20px;"></div>
            </div>
            <div class="col-md-4 col-sm-4 col-xs-4">
                <div class="auswahl"><img display="table" class="img-responsive" src="images/auswahlIcons/stein/stein_grau.png" id="Stein" style="margin-bottom: 20px;"></div>
            </div>
            <div class="col-md-4 col-sm-4 col-xs-4">
                <div class="auswahl"><img display="table" class="img-responsive" src="images/auswahlIcons/papier/papier_grau.png" id="Papier" style="margin-bottom:20px;"></div>
            </div>
        </div>
    </div>
    <br>
</div>
<form action="gameend" method="post" id="gameend" name="gameend">
    <input type="hidden" name="id" id="id" value="{{$id}}">
    <input type="hidden" name="_token" value="{{ csrf_token()}}">
</form>
<!-- <div class="container" style="text-align:center;" >
			<button class="btn btn-primary btn-lg">Auswählen</button>
        -->
</div>
</div>
</div>
<script>
    var id = '{{Session::get('id')}}';
    var gameid = '{{$newgame->id}}'
    var gameEnd = "{{ route('gameend')}}";

</script>
@stop
