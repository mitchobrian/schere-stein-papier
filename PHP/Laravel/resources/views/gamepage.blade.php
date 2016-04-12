@extends('master') 

@section('title', 'Gamepage') 
{{ Html::style('css/gamepage.css') }}

@section('content')


        <div id="player-outer-div">
            <div id="player1-div">Player 1</div>
            <div id="player2-div">Player 2</div>
        </div>
        
        
        <div id="auswahl-div">
            <div class="auswahl"><span>Schere</span></div>
            <div class="auswahl"><span>Stein</span></div>
            <div class="auswahl"><span>Papier</span></div>
        </div>
      
	</div>
        <button class="btn btn-primary form-control">Auswählen</button>

@stop