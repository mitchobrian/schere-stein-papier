@extends('master') 

@section('title', 'LandingPage') 
{{ Html::style('../../public/CSS/jumbotron.css') }}
{{ Html::style('css/bootstrap.min.css') }}
{{ Html::style('css/jumbotron.css') }}


@section('content')
    
    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron">
      <div class="container" style="margin-bottom: 150px;margin-top:-80px;" align="center">  
        <img src="images/ssp_logo3.png" alt="Logo" style="width:600px;height:500px;">  
        <p style=margin-top:-100px;>Spiele Schere-Stein-Papier gegen einen Freund! Schaffst du es auf der Rangliste nach ganz oben?</p>
        <!-- <p><a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a></p> -->
  <hr>
 <!-- ANMELDEFORM -->         
 <div class="container" style="text-align:center;">
  <form class="form-inline" role="form" style="margin-left: -16px;">
    <div class="form-group">
      <label class="sr-only" for="Username">Name</label>
      <input type="Username" class="form-control" id="Username" placeholder="Username">
    </div>
    <div class="form-group" style="margin-left: 20px;">
      <label class="sr-only" for="Gamecode">Spielcode</label>
      <input type="Gamecode" class="form-control" id="Gamecode" placeholder="Spielcode">
    </div>
  </form>
</div>         
          
          
 <!-- BUTTONS--> 
     <div class="container" style="text-align:center;" >
        <div>
            <h4>Ab ins Spiel!</h4>
            <button type="button" class="btn btn-primary btn-lg" style="background:Green;">Join</button>      
        </div> 
        <div>
            <h4><i>Oder erstelle hier ein Spiel! </i> </h4>
            <button type="button" class="btn btn-primary btn-lg" style="background:Red;">Create</button> 
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