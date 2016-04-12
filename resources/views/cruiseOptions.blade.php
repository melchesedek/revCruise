<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Cruise Options</title>
        <link rel="stylesheet" href="/css/app.css" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
        <link href='https://fonts.googleapis.com/css?family=Lato:400,100,100italic,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
    </head>
    <body>
        <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Titanic Cruise Line</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="#">Cruise Menu</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
        <div class="container">
            <div class="row">
                <h1>Choose Your Sailings<small>(Pick one for each box)</small></h1>
                <ul class="main"></ul>
               <script type="text/template" id="cruiseLines">
                    <div class="row">
                	    <h1>Choose Your Sailings<small>(Pick one for each box)</small></h1>
                		<div class="total col-sm-12  col-md-12  col-lg-12" id="cruiseFrame">
                		    <hr></hr>
                		    <h2>Your Selected Sailings Total <span>999999</span> </h2>
                	    </div>
                    </div>
                </script>
                <div class="total total col-sm-12  col-md-12  col-lg-12">
                    <hr>
                    <h2>Your Selected Sailings Total</h2>        
                </div>
            </div>
        </div>
        
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.8.3/underscore-min.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/backbone.js/1.3.3/backbone-min.js"></script>
        <script type="text/javascript" src="/js/main.js"></script>
        
        @yield('scripts.footer');
    
    </body>
</html>


