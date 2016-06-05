@extends('master')

@section('title', 'Gamepage')
{{ Html::style('css/style.css') }}
{{ Html::style('css/bootstrap.min.css') }}
{{ Html::style('css/hover.css') }}
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
                <h2>Wähle deine Hand!
                    <div id="time">10</div>
                </h2>
            </div>
        
            
            <div id="auswahl-div">
	         <div class="column">
              <div class="hover14 column">  
       
                <div class="auswahl"><figure><img src="images/auswahlIcons/schere/schere_grau.png" id="Schere"
                                                  style="margin-top:20px;"></figure></div>
                <div class="auswahl"><img src="images/auswahlIcons/stein/stein_grau.png" style="margin-top:20px;"
                                          id="Stein"></div>
                <div class="auswahl"><img src="images/auswahlIcons/papier/papier_grau.png" style="margin-top:20px;"
                                          id="Papier"></div>
                 </div>
                </div>
                <div class="mySel"> Deine Auswahl:
                    <div id="getAuswahl"></div>
                </div>
            </div>
        
            {!! Form::open(array('name' => 'choiceForm', 'id' => 'choiceForm','action' => array('GameEndController@index'))) !!}
            <input type="hidden" name="txtSel" id="txtSel">
            {!! Form::close() !!}

                    <!-- <div class="container" style="text-align:center;" >
			<button class="btn btn-primary btn-lg">Auswählen</button>
        -->
        </div>
    </div>
    </div>
    <script>
        var gameEnd = "{{ route('gameend')}}";
    </script>
@stop