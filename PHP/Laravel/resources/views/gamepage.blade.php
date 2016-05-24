@extends('master') 

@section('title', 'Gamepage') 
{{ Html::style('css/style.css') }}
{{ Html::style('css/bootstrap.min.css') }}

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
            <h2>Wähle deine Hand!</h2> 
        </div>
        
        
        <div id="auswahl-div">
    <div class="auswahl"><a href="{{URL::route('gameend')}}"> <img src="images/auswahlIcons/schere/schere_links.png"  style="margin-top:20px;" </img><span></a></span></div>
    <div class="auswahl"><a href="{{URL::route('gameend')}}"> <img src="images/auswahlIcons/stein/stein_links.png"  style="margin-top:20px;" </img><span></a></span></div>
    <div class="auswahl"><a href="{{URL::route('gameend')}}"> <img src="images/auswahlIcons/papier/papier_links.png"  style="margin-top:20px;" </img><span></a></span></div>
        </div>
      
		<!-- <div class="container" style="text-align:center;" >
			<button class="btn btn-primary btn-lg">Auswählen</button>
        -->
		</div>
         </div>
	</div>
@stop