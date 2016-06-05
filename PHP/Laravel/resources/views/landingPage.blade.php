@extends('master') 

@section('title', 'LandingPage') 
{{ Html::style('css/bootstrap.min.css') }}
{{ Html::style('css/style.css') }}


@section('content')
    
    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron">
      <div class="container-fluid" style="margin-bottom: 150px;margin-top:-20px;" align="center">  
        <img src="images/sss_logo_large.png" id="Logo" style="width:900px;height:200px;"> 
        <p style="margin-top:50px;">Spiele Schere-Stein-Papier gegen einen Freund! Schaffst du es auf der Rangliste nach ganz oben?</p>
        <!-- <p><a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a></p> -->
  <hr>
 <br><br>
 <!-- ANMELDEFORM -->         
 {{--<div class="container" style="text-align:center;">
  <form class="form-inline" role="form">
    <div class="form-group">
      <label class="sr-only" for="Username">Name</label>
      <input type="Username" class="form-control input-lg" id="Username" placeholder="Username" style="text-align:center;">
    </div>
      
   <!-- <div class="form-group" style="margin-left: 20px;">
      <label class="sr-only" for="Gamecode">Spielcode</label>
      <input type="Gamecode" class="form-control input-lg" id="Gamecode" placeholder="Spielcode">
    </div>
    -->
  </form>
</div>        --}}
          
  
 <!-- BUTTONS--> 
     <div class="container" style="text-align:center;" >

         <form action="store" method="post">

             <input  type="text" name="name" id="name">

             <input  type="submit" name ="erstellen" id="submit" class="btn btn-primary btn-lg">

             <input type="hidden" name="_token" value="{{ csrf_token()}}">

         </form>
        <div>
            <a class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal" role="button">Ab ins Spiel!!</a>
        </div>
         {{--
          <div>
              <h4><i>Oder</i> </h4>

              <a class="btn btn-primary btn-lg" href="{{URL::route('hostwait')}}" role="button">...erstelle hier ein Spiel!</a>
          </div>  --}}
      </div>
          
    <!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h2 class="modal-title">Spielcode</h2>
      </div>
      <div class="modal-body">
        <p>Bitte gebe deinen Spielcode ein</p>
       {{-- <label class="sr-only" for="Gamecode">Spielcode</label>

        <input type="Gamecode" class="form-control input-lg" id="Gamecode" placeholder="Spielcode" style="width: 400px;">--}}
          <form onsubmit='return checkForm()' action="store" method="post">


              name<input  type="text" name="name" id="name">
              code<input  type="text" name="code" id="code">

              <input  type="submit" name ="erstellen" id="submit" class="btn btn-primary btn-lg" onclick="verbinde()">
          </form>





      </div>
      <div class="modal-footer">
        {{--<a class="btn btn-primary btn-lg" href="{{URL::route('gamepage')}}" style="margin-right:160px;" role="button">Verbinden</a>--}}
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
          
          
    </div>
</div>

<script>

    function verbinde() {
        var conn = new WebSocket('ws://127.0.0.1:8080');

        var chanelname = document.getElementById('code').value;

        conn.onmessage = function(e) {
            document.location.href="{!! route('gamepage') !!}";
        };
        conn.onopen = function(e) {
            console.log("Connection established!");
            conn.send(JSON.stringify({command: "subscribe", channel: chanelname}));
            conn.send(JSON.stringify({command: "message", message: "this is message"}));
        };
    }
</script>


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="../../public/JS/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="../../public/JS/bootstrap.min.js"></script>

@stop