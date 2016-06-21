<!DOCTYPE html>
<html lang="en">

<head>
    <title>Schnick Schnack Schnuck - @yield('title')</title>

    <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	<link href="CSS/style.css" rel="stylesheet">
</head>

<body>   
    
<nav class="navbar navbar-default">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
              <!-- <a class="navbar-brand" href="#">Schnick Schnack Schnuck</a> -->
             <a class="navbar-brand" href="{{ URL::route('landingPage')}}" id="navbar-brand"><img src="images/sss_logo_small.png"></a> 
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li class="active"><a href="{{ URL::route('landingPage')}}">Startseite <span class="sr-only">(current)</span></a></li>
                <li><a href="{{ URL::route('contact')}}">Kontakt</a></li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>

<div class="container">
@yield('content')
    </div>

        
    
      <footer style="text-align:center;">
          <strong><p>&copy; 2016 Beuthbros</p></strong>
		{{ Html::link('contact','Kontakt')}}
        <!--<button type="button" class="btn btn-link" style="margin-left:-13px;">Kontakt</button>  -->
		{{ Html::link('impressum','Impressum')}}
        <!--<button type="button" class="btn btn-link">Impressum</button> --> 
      </footer>
    

	
</body>

</html>
