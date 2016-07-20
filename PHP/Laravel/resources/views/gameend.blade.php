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
                    <h1 align="center" id="player1-div">{{Session::get('username')}}</h1>
                </div>
                <div class="col-md-4 col-xs-2 col-centered"></div>
                <div class="col-md-4 col-sm-5 col-xs-6 col-centered">
                    <h1 align="center" id="player2-div">Gegner</h1>
                </div>
            </div>
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
                        <div class="auswahl" id="Schere1_win"><img  display="table" class="img-responsive" src="images/auswahlIcons/schere/gif/links_schere_win.gif" ></div>
                        <div class="auswahl" id="Schere1_lose"><img  display="table" class="img-responsive" src="images/auswahlIcons/schere/gif/links_schere_lose.gif" ></div>
                        <div class="auswahl" id="Schere1_remis"><img  display="table" class="img-responsive" src="images/auswahlIcons/schere/gif/links_schere_remis.gif" ></div>

                        <div class="auswahl" id="Papier1_win"><img  display="table" class="img-responsive" src="images/auswahlIcons/papier/gif/links_papier_win.gif" ></div>
                        <div class="auswahl" id="Papier1_lose"><img  display="table" class="img-responsive" src="images/auswahlIcons/papier/gif/links_papier_lose.gif" ></div>
                        <div class="auswahl" id="Papier1_remis"><img  display="table" class="img-responsive" src="images/auswahlIcons/papier/gif/links_papier_remis.gif" ></div>

                        <div class="auswahl" id="Stein1_win"><img  display="table" class="img-responsive" src="images/auswahlIcons/stein/gif/links_stein_win.gif" ></div>
                        <div class="auswahl" id="Stein1_lose"><img  display="table" class="img-responsive" src="images/auswahlIcons/stein/gif/links_stein_lose.gif" ></div>
                        <div class="auswahl" id="Stein1_remis"><img  display="table" class="img-responsive" src="images/auswahlIcons/stein/gif/links_stein_remis.gif" ></div>
                    </div>
                    <div class="col-sm-1 col-xs-1">
                        <div class="auswahl"><h1 align="center" display="table">VS</h1></div>
                    </div>
                    <div class="col-md-5 col-sm-5 col-xs-5">
                        <div class="auswahl" id="Schere2_win"><img  display="table" class="img-responsive" src="images/auswahlIcons/schere/gif/rechts_schere_win.gif" ></div>
                        <div class="auswahl" id="Schere2_lose"><img  display="table" class="img-responsive" src="images/auswahlIcons/schere/gif/rechts_schere_lose.gif" ></div>
                        <div class="auswahl" id="Schere2_remis"><img  display="table" class="img-responsive" src="images/auswahlIcons/schere/gif/rechts_schere_remis.gif" ></div>

                        <div class="auswahl" id="Papier2_win"><img  display="table" class="img-responsive" src="images/auswahlIcons/papier/gif/rechts_papier_win.gif" ></div>
                        <div class="auswahl" id="Papier2_lose"><img  display="table" class="img-responsive" src="images/auswahlIcons/papier/gif/rechts_papier_lose.gif" ></div>
                        <div class="auswahl" id="Papier2_remis"><img  display="table" class="img-responsive" src="images/auswahlIcons/papier/gif/rechts_papier_remis.gif" ></div>

                        <div class="auswahl" id="Stein2_win"><img  display="table" class="img-responsive" src="images/auswahlIcons/stein/gif/rechts_stein_win.gif" ></div>
                        <div class="auswahl" id="Stein2_lose"><img  display="table" class="img-responsive" src="images/auswahlIcons/stein/gif/rechts_stein_lose.gif" ></div>
                        <div class="auswahl" id="Stein2_remis"><img  display="table" class="img-responsive" src="images/auswahlIcons/stein/gif/rechts_stein_remis.gif" ></div>
                    </div>
                </div>
            </div>

            <form action="gamestart" method="post" id="nochmalform" name="nochmalform">


                <input type="hidden" name="_token" value="{{ csrf_token()}}">
            </form>

    
        
        
            <!-- Noch mal?-->


            <div class="container" style="text-align:center;margin-top:-3%;">
                <div>
                    <h3>Es Steht: <span id="p1Points">0</span> zu <span id="p2Points">0</span> !</h3>

                        <button type="button" name="nochmal" id="nochmal" class="btn btn-primary btn-lg">Nochmal?</button>
                    

                    <br><br>
                </div>
            </div>
        </div>
    </div>


        <script>
            var p2Choice = '{{$p2choice}}';
            var p1Choice = '{{$choice}}';
            var match_id = '{{$match->id}}';

            var hoster = '{{$ishost}}';
            var player1 = 'player1';
            var player2 = 'player2';



        </script>


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="JS/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="JS/bootstrap.min.js"></script>

@stop