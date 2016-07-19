@extends('master') 

@section('title', 'LandingPage') 
{{ Html::style('css/bootstrap.min.css') }}
{{ Html::style('css/style.css') }}


@section('content')
    
    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron">
      <div class="container-fluid" style="margin-bottom: 40px;margin-top:-20px;" align="center">
        <div class="logo-groß"> 
             <a href=""><img class="img-responsive" src="images/sss_logo_large.png" alt="Movie Places" /></a>
        </div> 
        <p style="margin-top:50px;">Spiele Schere-Stein-Papier gegen einen Freund! Schaffst du es auf der Rangliste nach ganz oben?</p>
        <!-- <p><a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a></p> -->
  <hr>
 <br>
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

             <input  type="text" name="name"  placeholder="Gib einen Namen an" required id="name">

             <input  type="submit" name ="erstellen" id="submit" class="btn btn-primary btn-lg" value="Spiel erstellen!">

             <input type="hidden" name="_token" value="{{ csrf_token()}}">

         </form>
        <div>
            <a class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal" role="button">Ab ins Spiel!</a>
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
        <p>Bitte gebe deinen Spielcode ein, den du erhalten hast!</p>
       {{-- <label class="sr-only" for="Gamecode">Spielcode</label>

        <input type="Gamecode" class="form-control input-lg" id="Gamecode" placeholder="Spielcode" style="width: 400px;">--}}
          <form action="joinstore" method="post">


              Dein Name  <input style="border:1px solid #000080" type="text" name="name" id="name" required placeholder="Gib einen Namen ein .."><br>
              Code  <input style="border:1px solid #000080" type="text" name="code" id="code" required maxlength="10" placeholder="Der erhaltene Code"><br><br>
              <input type="hidden" name="_token" value="{{ csrf_token() }}">

              <input  type="submit" name ="erstellen" id="submit" class="btn btn-primary btn-lg" value="Los geht's!">
          </form>





      </div>
      <div class="modal-footer">
        {{--<a class="btn btn-primary btn-lg" href="{{URL::route('gamepage')}}" style="margin-right:160px;" role="button">Verbinden</a>--}}
        <button type="button" class="btn btn-default" data-dismiss="modal">Abbrechen</button>
      </div>
    </div>

  </div>
</div>
          
          
    </div>
</div>

<script type="text/javascript">

    window.onload = function () {

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });









    };

</script>


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
{{Html::script('JS/jquery.min.js')}}
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
{{Html::script('JS/bootstrap.min.js')}}

@stop