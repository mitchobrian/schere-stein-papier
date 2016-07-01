@extends('master')

@section('title', 'Gameend')
{{ Html::style('css/style.css') }}
{{ Html::style('css/bootstrap.min.css') }}
{{ HTML::script('JS/jquery.min.js') }}
{{ HTML::script('JS/auswertung.js') }}


@section('content')



        <div class="container-fluid">
        <div class="jumbotron">
        <div class="row row-centered">
            <div id="player-outer-div">
                <div class="col-md-4 col-sm-5 col-xs-6 col-centered">
                    <h1 align="center" id="player1-div">Player 1</h1>
                </div>
                <div class="col-md-4 col-xs-2 col-centered"></div>
                <div class="col-md-4 col-sm-5 col-xs-6 col-centered">
                    <h1 align="center" id="player2-div">Player 2</h1>
                </div>
            </div>
        </div>
            <div class="row row-centered">
                <p id="rundeundspielauswertung">
                    <h1 align="center" id="spielauswertung">Spielauswertung!</h1>
                </p>
            </div>
        

            <!-- Auswertung -->
            <!-- Choise of Player1 -->
            <div class="row row-centered">
                <input type="hidden" id="p1Choice" value="{{$choice}}">

                <div id="wählenundauswertung-div">
                    <h2 id="winner"></h2>
                </div>
            </div>
         
            
            <div class="row row-centered">
                <div id="auswahl-div" >
                    <div class="col-md-5 col-sm-5 col-xs-5">
                        <div class="auswahl"><img display="table" class="img-responsive" src="images/auswahlIcons/schere/gif/links_schere_win.gif" ></div>
                    </div>
                    <div class="col-sm-2 col-xs-2">
                        <div class="auswahl"><h1 align="center" display="table">VS</h1></div>
                    </div>
                    <div class="col-md-5 col-sm-5 col-xs-5">
                        <div class="auswahl"><img display="table" class="img-responsive" src="images/auswahlIcons/papier/gif/papier_rot_lose.gif"></div>
                    </div>
                </div>
            </div>

    
        
        
            <!-- Noch mal?-->


            <div class="container" style="text-align:center;margin-top:-3%;">
                <div>
                    <h3>Zur Zeit steht es <span id="p1Points">0</span> zu <span id="p2Points">0</span> !</h3>
                    <a class="btn btn-primary btn-lg" href="/"
                       style="background:Green;"
                       role="button">Nochmal?</a>
                    <br><br>
                </div>
            </div>
        </div>
    </div>

        <script>
            var p2Choice = '{{$p2choice}}';
            var p1Choice = '{{$choice}}';

            console.log(p2Choice);
            console.log('{{$choice}}')

        </script>


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="JS/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="JS/bootstrap.min.js"></script>

@stop