<!DOCTYPE html>
<html lang="en">

<head>
    <title>Schnick Schnack Schnuck - @yield('title')</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>

<body>
    
    @yield('content')

	    <div class="container" style="margin-top:-30px;">

        
    <hr>
      <footer>
        <p>&copy; 2016 Beuthbros</p>
		{{ Html::link('contact','Kontakt')}}
        <!--<button type="button" class="btn btn-link" style="margin-left:-13px;">Kontakt</button>  -->
		{{ Html::link('impressum','Impressum')}}
        <!--<button type="button" class="btn btn-link">Impressum</button> --> 
      </footer>
    
    </div> 
</body>

</html>
