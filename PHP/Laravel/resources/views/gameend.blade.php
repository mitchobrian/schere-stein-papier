@extends('master') 

@section('title', 'Gameend') 
{{ Html::style('css/style.css') }}           
{{ Html::style('css/bootstrap.min.css') }}


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
 <div id="wählenundauswertung-div">
    <h2>Schere schlägt Papier (Player 1 gewinnt)</h2> 
 </div>
<br><br><br>
 <div id="auswahl-div" style="margin-top:-60px;">
    <div class="auswahl"><img src="images/auswahlIcons/schere/gruen/schere_gruen_links.png" style="margin-top:20px;"</img><span></span></div>
    <div class="auswahl"><span>VS</span></div>
    <!-- <div class="auswahl"><span>Stein</span></div> -->
    <div class="auswahl"><img src="images/auswahlIcons/papier/gif/papier_rechts_rot.gif" style="margin-top:20px;"</img><span></span></div>
 </div>
          
          
 <!-- Noch mal?--> 
     <div class="container" style="text-align:center;" >
        <div>
            <h3>Zur Zeit steht es X zu X!</h3>
            <a class="btn btn-primary btn-lg" href="{{URL::route('gamepage')}}" style="background:Green;" role="button">Nochmal?</a>
        </div>  
      </div>
</div>
</div>        



    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="../../public/JS/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="../../public/JS/bootstrap.min.js"></script>

@stop