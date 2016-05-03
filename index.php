<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Relationship Hacker</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="apple-touch-icon" href="apple-touch-icon.png">

        <link rel="stylesheet" href="css/bootstrap.min.css">
        <style>
            body {
                padding-top: 50px;
                padding-bottom: 20px;
            }
        </style>
        <link rel="stylesheet" href="css/bootstrap-theme.min.css">
        <link rel="stylesheet"href="css/jquery.countdown.css">
        <link rel="stylesheet" href="css/main.css">

        <!--[if lt IE 9]>
            <script src="js/vendor/html5-3.6-respond-1.4.2.min.js"></script>
        <![endif]-->
    </head>
    <body>
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    <nav class="navbar navbar-inverse navbar-fixed-top color-scheme" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed color-scheme" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
         
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <!-- only display this if logged in -->
          <ul class="nav navbar-nav color-scheme">
            <li class="active"><a href="#">Home</a></li>
            <li><a href="pages/pointsgive.php">Points</a></li>
            <li><a href="pages/questionsyou.php">Questions</a></li> 
            <li><a href="pages/prizesyou.php">Weekly Prize</a></li> 
            <li><a href="pages/favoursget.php">Favours</a></li>
            <li><a href="pages/detailsyou.php">Details</a></li> <hr>
            <li><a href="#">Log Out</a></li> 
          </ul>
         
        </div><!--/.navbar-collapse -->
      </div>
    </nav>

    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron color-scheme">
      <div class="container">
        <img  src="img/logo.png">
        
      </div>
    </div>

    <div class="container">
      <!-- Main content area -->
      <div class="row">
        <div class="col-xs-12  counter">
          <img src="img/counter.png">
        </div>
        <div class="col-xs-12 main-content-area">
          <!-- need to add php code here -->
          <h2>John Doe</h2>
          <h3>You're Behind!</h3>
          <br>
          <br>
          <h1>Time Left:</h1>
          <!-- PHP code here-->
          
          <div id="countdown"></div>
          <br>
          <br>
          <h1>Your Prize:</h1>
          <br>
          <!--php code here-->
          <h3>Description of the favour 
              goes here. Description of 
              the favour goes here. 
              Description of the favour 
              goes here.</h3>
          <br>
          <br>
          <h1>Partner's Prize:</h1>
          <br>
          <!--php code here-->
          <h3>Description of the favour 
              goes here. Description of 
              the favour goes here. 
              Description of the favour 
              goes here.</h3>
       </div>
        
      </div>

      <hr>

      <footer>
        <div class="container"><p>&copy; Batchelor 2016</p></div>

        
      </footer>
    </div> <!-- /container -->        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.2.min.js"><\/script>')</script>

        <script src="js/vendor/bootstrap.js"></script>
        <script src="js/vendor/jquery.plugin.min.js"></script>
        <script src="js/vendor/jquery.countdown.min.js"></script>
        <script src="js/main.js"></script>
          <script>
          var favourdate = new Date();
          //need to insert php code here to change date
          favourdate.setFullYear(2016, 4, 1);
          favourdate.setHours(18);
          favourdate.setMinutes(00);
          favourdate.setSeconds(00);
          $('#countdown').countdown({until: favourdate});
        </script>
        

        <!-- Google Analytics: change UA-XXXXX-X to be your site's ID.
        <script>
            (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
            function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
            e=o.createElement(i);r=o.getElementsByTagName(i)[0];
            e.src='//www.google-analytics.com/analytics.js';
            r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
            ga('create','UA-XXXXX-X','auto');ga('send','pageview');
        </script> -->
    </body>
</html>
