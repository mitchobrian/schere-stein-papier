@extends('master') @section('title', 'LandingPage') {{ Html::style('css/bootstrap.min.css') }} {{ Html::style('css/style.css') }} @section('content')

    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron">
        <div class="container-fluid" style="margin-bottom: 40px;margin-top:-20px;" align="center">
            <div class="logo-groß">
                <a href=""><img class="img-responsive" src="images/sss_logo_large.png" alt="Movie Places" /></a>
            </div>
            <p style="margin-top:30px;">Du wurden zu Schere-Stein-Papier herausgefordert!</p>
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
            <div id="rahmen">

                <!--          Spiel Beitreten-->

                <div class="container" id="beitreten" style="text-align:center;">
                    <p><b> - Spiel Beitreten - </b></p>
                    {{--
                    <label class="sr-only" for="Gamecode">Spielcode</label>

                    <input type="Gamecode" class="form-control input-lg" id="Gamecode" placeholder="Spielcode" style="width: 400px;">--}}
                    <form action="joinstore" method="post">

                            <input type="hidden" name="code" id="code" value="{{$gamecode}}">
                        <input style="border:1px solid #000080; height: 3rem" type="text" name="name" id="name" required placeholder=" Gib einen Namen ein">
                        <br>
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                        <input type="submit" name="erstellen" id="submit" class="btn btn-primary btn-lg" value="Spiel beitreten!">
                    </form>
                    <div>

                    </div>
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

            console.log('{{$gamecode}}')

        };

    </script>


    <!-- Bootstrap core JavaScript
        ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    {{Html::script('JS/jquery.min.js')}}
    <script>
        window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')

    </script>
    {{Html::script('JS/bootstrap.min.js')}} @stop
