@extends('master')

@section('title', 'Impressum')


@section('content')
    {{ Html::style('css/hostwait.css') }}

    <div class="jumbotron">
        
    <div class="col-lg-12 main">
        <h3>---USERNAME---...</h3> <h4>...bitte warte, bis dein Partner das Spiel betritt.</h4>

        <p id="usrimg"><img src="images/usr.png"> </p>

        <p class="alert alert-info" id="alert" style="width: 800px;">
            <span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span>
            <span class="sr-only">Info:</span>
            <strong id="time">15:00</strong> <strong>Verschicke diesen Link an einen Freund!</strong>

        <div class="input-group" style="display:inline;">
            <input type="text" class="form-control input-lg txtGameCode" placeholder="Gamecode" value="11111111111111" style="width: 800px;">
        <button class="btn btn-primary btn-lg copybtn" type="button">Kopieren</button>
        </div>
        <!-- /input-group -->

              
    <div>
        <br><br><br>
        <img src="images/facebook.png" style="height: 70px;">
        <img src="images/google-plus.png" style="height: 70px;">
        <img src="images/instagram.png" style="height: 70px;">
        <img src="images/tumblr.png" style="height: 70px;">
        <img src="images/youtube.png" style="height: 70px;">
        <img src="images/twitter.png" style="height: 70px;">


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
</div>

@stop
