@extends('master')

@section('title', 'Gamepage')
{{ Html::style('css/style.css') }}
{{ Html::style('css/bootstrap.min.css') }}
{{ HTML::script('JS/jquery.min.js') }}
{{ HTML::script('JS/gamelogic.js') }}

@section('content')

	 <div class="jumbotron">
        <div class="container">
        <div id="player-outer-div">
            <div id="player1-div">Player 1</div>
            <div id="player2-div">Player 2</div>
        </div>

         <p id="rundeundspielauswertung">
          <h1 align="center">Runde X</h1>
         </p>

          <!-- Auswertung -->
        <div id="wählenundauswertung-div">
            <h2>Wähle deine Hand! <div id="time">10</div> </h2>
        </div>

        <div id="auswahl-div">

            <div class="auswahl" > <img src="images/auswahlIcons/schere/schere_links.png" id="Schere"  style="margin-top:20px;"></div>
    <div class="auswahl" > <img src="images/auswahlIcons/stein/stein_links.png"  style="margin-top:20px;" id="Stein"></div>
    <div class="auswahl" > <img src="images/auswahlIcons/papier/papier_links.png"  style="margin-top:20px;" id="Papier"></div>

          <div class="mySel"> Deine Auswahl: <div id="getAuswahl"></div></div>
        </div>

		<!-- <div class="container" style="text-align:center;" >
			<button class="btn btn-primary btn-lg">Auswählen</button>
        -->
		</div>
         </div>
	</div>

@stop