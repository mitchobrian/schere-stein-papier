@extends('master')

@section('title', 'Impressum')


@section('content')
    {{ Html::style('css/hostwait.css') }}

    <div class="col-lg-12 main">
        <h1>---USERNAME---...</h1> <h4>...bitte warte, bis dein Partner das Spiel betritt.</h4>

        <p id="usrimg"><img src="images/usr.png"> </p>

        <p class="alert alert-info">
            <span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span>
            <span class="sr-only">Info:</span>
            Das Spiel wird in <strong><span id="time">15:00</span></strong> Minuten beendet, falls der Partner nicht
            einsteigt. Bitte schicke ihm den GameCode, damit er dem Spiel beitreten kann.</p>

        <div class="input-group">
            <input type="text" class="form-control input-lg txtGameCode" placeholder="Gamecode" value="11111111111111">
      <span class="input-group-btn">
        <button class="btn btn-primary btn-lg copybtn" type="button">Kopieren</button>
      </span>
        </div><!-- /input-group --><br><br>

        <img src="images/facebook.png">
        <img src="images/google-plus.png">
        <img src="images/instagram.png">
        <img src="images/tumblr.png">
        <img src="images/youtube.png">
        <img src="images/twitter.png">


    </div><!-- /.col-lg-6 -->



    <script>

        //Countdown
        function startTimer(duration, display) {
            var timer = duration, minutes, seconds;
            setInterval(function () {
                minutes = parseInt(timer / 60, 10)
                seconds = parseInt(timer % 60, 10);

                minutes = minutes < 10 ? "0" + minutes : minutes;
                seconds = seconds < 10 ? "0" + seconds : seconds;

                display.textContent = minutes + ":" + seconds;

                if (--timer < 0) {
                    timer = duration;
                }
            }, 1000);
        }

        window.onload = function () {
            var fifteenMinutes = 60 * 15,
                    display = document.querySelector('#time');
            startTimer(fifteenMinutes, display);
        };


        //Copy-Funktion
        var copyTextareaBtn = document.querySelector('.copybtn');

        copyTextareaBtn.addEventListener('click', function (event) {
            var copyTextarea = document.querySelector('.txtGameCode');
            copyTextarea.select();

            try {
                var successful = document.execCommand('copy');
                var msg = successful ? 'successful' : 'unsuccessful';
                alert('Der Gamecode wurde kopiert!');
            } catch (err) {
                alert('Konnte Gamecode nicht kopieren...');
            }
        });
    </script>

@stop
