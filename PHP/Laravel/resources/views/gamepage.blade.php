@extends('master') 

@section('title', 'Gamepage') 
{{ Html::style('css/gamepage.css') }}

@section('content')

	 <div class="jumbotron">
        <div id="player-outer-div">
            <div id="player1-div">Player 1</div>
            <div id="player2-div">Player 2</div>
        </div>
        
        
        <div id="auswahl-div">
            <div class="auswahl"><span><a href="{{URL::route('gameend')}}" >Schere</a></span></div>
            <div class="auswahl"><span><a href="{{URL::route('gameend')}}" >Stein</a></span></div>
            <div class="auswahl"><span><a href="{{URL::route('gameend')}}" >Papier</a></span></div>
        </div>
      
		<div class="container" style="text-align:center;" >
			<button class="btn btn-primary btn-lg">Auswählen</button>
		</div>
	</div>
@stop