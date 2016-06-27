@extends('master')

@section('title', 'Gamepage')
{{ Html::style('css/style.css') }}
{{ Html::style('css/bootstrap.min.css') }}
{{ HTML::script('JS/jquery.min.js') }}
{{ HTML::script('JS/gamelogic.js') }}


@section('content')

    <div class="jumbotron">
        <div class="row">
            <div  id="player-outer-div">
                <div class="col-md-6 col-sm-6 col-xs-6">
                    <h2>Player1</h2>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-6">
                    <h2>Player2</h2>
                </div>
            </div>
        </div>

            <p id="rundeundspielauswertung">
            <h1 align="center">Runde X</h1>
            </p>

            <!-- Auswertung -->
            <div id="wählenundauswertung-div">
                <h2>Wähle deine Hand!
                    <div id="time">30</div>
                    <img id="hurry" src="/images/hurry.gif">
                </h2>
            </div>

            <div id="auswahl-div">

	         
              <div class="hover14 column"> 
                
                <div class="auswahl"><img  src="images/auswahlIcons/schere/schere_grau.png" class="img-fluid" id="Schere"
                                                  style="margin-top:20px;"></div>
                <div class="auswahl"><img  src="images/auswahlIcons/stein/stein_grau.png" style="margin-top:20px;"
                                          id="Stein"></div>
                <div class="auswahl"><img  src="images/auswahlIcons/papier/papier_grau.png" style="margin-top:20px;"
                                          id="Papier"></div>
                  
                 </div>


                <div style="text-align: center"><button id="btnRandom" class="btn btn-primary btn-lg">Zufällige Wahl</button> </div>


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