@extends('master')
@section('title', 'LandingPage')

{{ Html::style('css/bootstrap.min.css') }}
{{ Html::style('css/style.css') }}
{{ Html::style('css/font-awesome-animation.min.css') }}


@section('content')
{{Html::script('JS/jquery.min.js')}}
{{Html::script('JS/notify.js')}}
        <!-- Main jumbotron for a primary marketing message or call to action -->
<div class="jumbotron">
    <div class="container-fluid" style="margin-bottom: 30px;margin-top:-20px;" align="center">
        <h2 style="margin-top:50px;">Bitte warte {{$users->username}}, bis dein Partner das Spiel betritt.</h2>
        <hr>
        <img src="images/arrow.png" class="arrow" alt="Wartegif">
        <br><br>
        
        <div class="input-group">
            <br>
            <input type="text" class="form-control input-lg txtGameCode" id="gamecode" placeholder="CODE"
                   value="{{url('/')}}/{{$users->gamecode}}"
                   style="text-align:center;width: 100%;">
            <button class="btn btn-primary btn-lg copybtn" type="button">Kopieren</button>
        </div>
        <!-- /input-group -->

        <!--        <div class="social-network" style="text-align:left;">

                    <img src="images/facebook.png" style="height: 70px;">
                    <img src="images/google-plus.png" style="height: 70px;">
                    <img src="images/twitter.png" style="height: 70px;">

                </div>-->
        <form action="gamestart" method="post" id="hostsubmit" name="hostsubmit">
            <input type="hidden" name="id" id="id" value="{{$users->id}}">
            <input type="hidden" name="code" id="code" value="{{$users->gamecode}}">
            <input type="hidden" name="_token" value="{{ csrf_token()}}">
        </form>

        <script>

            //Generate Gamecode

            window.addEventListener('load', function () {
                /* var gamecode = document.querySelector('.txtGameCode');

                 var text = "";
                 var possible = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";

                 for (var i = 0; i < 6; i++)
                 text += possible.charAt(Math.floor(Math.random() * possible.length));

                 gamecode.value = text;*/

            });


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

            function Chatter() {
                this.getMessage = function () {
                    var t = this;
                    var latest = null;


                    $.ajax({
                        'url': 'hostwaitpolling',
                        'type': 'get',
                        'dataType': 'json',

                        'data': {
                            'mode': 'post',
                            'gamecode': "{{$users->gamecode}}",
                            'host_id': '{{$users->id}}',
                        },
                        'timeout': 3000000,
                        'cache': false,
                        'success': function (result) {
                            if (result.result) {
                                $('#hostsubmit').submit();
                                callback(result.message);
                                latest = result.latest;

                            }
                        },
                        'error': function (e) {
                            console.log(e);
                        },
                        'complete': function () {
                            t.getMessage();
                        }
                    });
                };


            }
            ;

            var c = new Chatter();


            window.onload = function () {


                var fifteenMinutes = 60 * 15,
                        display = document.querySelector('#time');
                startTimer(fifteenMinutes, display);


                c.getMessage(function (message) {


                });


            };

            $('.copybtn').notify("Access granted", "success");
            //Copy-Funktion
            var copyTextareaBtn = document.querySelector('.copybtn');

            copyTextareaBtn.addEventListener('click', function (event) {
                var copyTextarea = document.querySelector('.txtGameCode');
                copyTextarea.select();

                try {
                    var successful = document.execCommand('copy');
                    var msg = successful ? 'successful' : 'unsuccessful';


                } catch (err) {
                    alert('Konnte Gamecode nicht kopieren...');

                }
            });

            function test() {
                alert("ok");

            }

        </script>
<p class="alert alert-info" id="alert" style="width: 100%;">
            <span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span>
            <span class="sr-only">Info:</span>
            <strong id="time">15:00</strong> <strong>Verschicke diesen Link an einen Freund!</strong>



    </div>
</div>


<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="../../public/JS/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
<script src="../../public/JS/bootstrap.min.js"></script>

@stop