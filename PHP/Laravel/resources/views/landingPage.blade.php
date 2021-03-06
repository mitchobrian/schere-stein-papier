@extends('master') @section('title', 'LandingPage') {{ Html::style('css/bootstrap.min.css') }} {{ Html::style('css/style.css') }} @section('content')

<!-- Main jumbotron for a primary marketing message or call to action -->
<div class="jumbotron">
    <div class="container-fluid" style="margin-bottom: 40px;margin-top:-20px;" align="center">
        <div class="logo-groß">
            <a href=""><img class="img-responsive" src="images/sss_logo_large.png" alt="Movie Places" /></a>
        </div>
        <p style="margin-top:30px;">Spiele Schere-Stein-Papier gegen einen Freund! Schaffst du es auf der Rangliste nach ganz oben?</p>
        <!-- <p><a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a></p> -->
        <hr>
        <!-- ANMELDEFORM Ertellen-->
        {{--
        <div class="container" style="text-align:center;">
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
        </div> --}}


        <!-- BUTTONS-->
        <div id="LoginFeld">
            <!--          Spiel Erstellen-->
            <div class="container" id="erstellen" style="text-align:center;">
                <p><b> - Spiel erstellen - </b></p>
                <form action="store" method="post">

                    <input type="text" style=" font-size:18px; border:1px solid #000080; height: 3rem" name="name" placeholder=" Gib einen Namen ein!" maxlength="12" required pattern="[A-Za-zäöüÄÖÜ]+" id="name">
                    <br>
                    <br>
                    <input style="width: 11em;" type="submit" name="erstellen" id="submit" class="btn btn-primary btn-lg" value="Spiel erstellen!">
                    <br>
                    <input type="hidden" name="_token" value="{{ csrf_token()}}">

                </form>
            </div>

        </div>
    </div>
    <hr>
</div>

<script type="text/javascript">
    window.onload = function() {

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

    };

    
    (function() {

  var loadScript = function(src, loadCallback) {
    var s = document.createElement('script');
    s.type = 'text/javascript';
    s.src = src;
    s.onload = loadCallback;
    document.body.appendChild(s);
  };

  // http://stackoverflow.com/questions/9847580/how-to-detect-safari-chrome-ie-firefox-and-opera-browser
  var isSafari = Object.prototype.toString.call(window.HTMLElement).indexOf('Constructor') > 0;
  var isOpera = !!window.opera || navigator.userAgent.indexOf(' OPR/') >= 0;

  if (isSafari || isOpera) {

    loadScript('//code.jquery.com/jquery-2.1.4.min.js', function () {
      loadScript('//cdnjs.cloudflare.com/ajax/libs/webshim/1.15.10/dev/polyfiller.js', function () {

        webshims.setOptions('forms', {
          overrideMessages: true,
          replaceValidationUI: false
        });
        webshims.setOptions({
          waitReady: true
        });
        webshims.polyfill();
      });
    });
  }

})();
    
    
</script>


<!-- Bootstrap core JavaScript
    ================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
{{Html::script('JS/jquery.min.js')}}
<script>
    window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')

</script>
{{Html::script('JS/bootstrap.min.js')}} @stop
