<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Cruise Options</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <link rel="stylesheet" href="/css/app.css" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
        <link href='https://fonts.googleapis.com/css?family=Lato:400,100,100italic,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
        
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.8.3/underscore-min.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/handlebars.js/4.0.5/handlebars.min.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/backbone.js/1.3.3/backbone-min.js"></script>
        
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
        <div class="container-fluid">
        <div class="row">
        <div class="container cruiseWrap">
                <h1>Choose Your Sailings<small>(Pick one for each box)</small></h1>
                <ul class="salingsWrap">
<!--  OPTION TEMPLATE  -->
<script type="text/template" id="sailingOptionTpl">
  <div class="radio">
    <label>
      <input type="radio" name="sailingDate_@{{sailing_option_sailing_id}}" value="@{{sailing_date}}">
      <div class="title">@{{sailing_date}}</div>
    </label>
    <div class="price">$@{{sailing_price}}</div>
  </div>
  
</script>

<!--  CRUISE TEMPLATE  -->
<script type="text/template" id="sailingTpl">

  <div class="startingPrice">
    <p class="description">Starting at</p>
    <p class="price">$@{{smallestPrice}}</p>
    <span class="topleft"></span>
  </div>

  <article>

    <img src="@{{sailing_main_image}}" alt="@{{sailing_name}}">

    <footer class="cruiseFooter">
      <p>@{{cruise_line_name}} - @{{cruise_ship_name}}</p>
      <h3>@{{sailing_name}}</h3>

    </footer>

  </article>

</script>
               </ul>
                <hr>
                <div class="total">
                    <h2>Your Selected Sailings Total <span>$<i id="total_price"></i></span> </h2>        
                </div>
            </div>
        </div>
        </div>
        <script type="text/javascript" src="/js/main.js"></script>
    </body>
</html>


