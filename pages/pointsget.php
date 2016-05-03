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

        <link rel="stylesheet" href="../css/bootstrap.min.css">
        <style>
            body {
                padding-top: 50px;
                padding-bottom: 20px;
            }
        </style>
        <link rel="stylesheet" href="../css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="../css/main.css">

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
        <span class="nav-title">
          <h2>Points</h2>
        </span>
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed color-scheme" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
         
        </div>
        <div id="navbar" class="navbar-collapse navbar-right collapse">
          <!-- only display this if logged in -->
          <ul class="nav navbar-nav color-scheme">
            <li><a href="../index.php">Home</a></li>
            <li class="active"><a href="pointsgive.php">Points</a></li>
            <li><a href="questionsyou.php">Questions</a></li> 
            <li><a href="prizesyou.php">Weekly Prize</a></li> 
            <li><a href="favoursget.php">Favours</a></li>
            <li><a href="detailsyou.php">Details</a></li> <hr>
            <li><a href="#">Log Out</a></li> 
          </ul>
         
        </div><!--/.navbar-collapse -->
      </div>
    </nav>

    <!-- Main jumbotron for a primary marketing message or call to action 
    <div class="jumbotron color-scheme">
      <div class="container">
        <img  src="../img/logo.png">
        
      </div>
    </div> -->

    <!-- tabs -->
    <div class="color-scheme">
      <div class="row">
        <div class="col-xs-6 tab-parent">
          <a class="tab" href="pointsgive.php">Give Points</a>
          <div class="tab-child"></div>
        </div>
        <div class="col-xs-6 tab-parent">
          <a class="tab" href="pointsget.php">Get Points</a>
          <div class="tab-child tab-active"></div>
        </div>
      </div>
    </div>

    <div class="container">
      <!-- Main content area -->
      <div class="row">
        <div class="col-xs-12 main-content-area-subpages">
          <!-- need to add php code here -->
          <h2>Get Points</h2>
          

           <form role="form">
                <h3>What for?</h3>
                <div class="form-group">
                  <label for="reason">Reason:</label>
                  <input type="text" class="form-control" id="reason">
                </div>
     
                <button type="submit" class="btn btn-default">Get Some!</button>
            
          </form>

          <h2>Point Ideas</h2>
          <h3>What has worked in the past?</h3>
          <h4>Order by:</h4>
          <form class="form-inline point-ideas" role="form">
            <div class="form-group">
              <label for="category">Select list (select one):</label>
              <select class="form-control drop-down" id="category">
                <option>Quality Time</option>
                <option>Words of Affirmation</option>
                <option>Physical Touch</option>
                <option>Receiving Gifts</option>
                <option>Acts of Service</option>
              </select>
            </div>
            <br>
            <div class="form-group">
              <input type='radio' name='thing' value='valuable' id="point-points" /><label for="point-points">&nbsp;Points</label>
              <input type='radio' name='thing' value='valuable' id="point-date" /><label for="point-date">&nbsp;Date</label>
            </div>
     
                <button type="submit" class="btn btn-default">Find Ideas</button>
          </form>

          <div class="point-ideas">
            <hr>
            <!--everything in here needs to be a loop result -->
            <div class="row">
              <div class="col-xs-8">
                <h3>Points for:</h3>
                <p>Flowers - roses</p>
                <h3>Given:</h3>
                <p>24/01/16</p>
              </div>
              <div class="col-xs-4 hearts-col">
                <img src="../img/hearts_02.png">
              </div>
            </div>
            <hr>
            <!-- end loop result -->
            <div class="row">
              <div class="col-xs-8">
                <h3>Points for:</h3>
                <p>15 Min massage</p>
                <h3>Given:</h3>
                <p>27/01/16</p>
              </div>
              <div class="col-xs-4 hearts-col">
                <img src="../img/hearts_03.png">
              </div>
            </div>
            <hr>
          </div>
          
       </div>
        
      </div>

      <hr>

      <footer>
        <div class="container"><p>&copy; Batchelor 2016</p></div>

        
      </footer>
    </div> <!-- /container -->        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.2.min.js"><\/script>')</script>

        <script src="../js/vendor/bootstrap.min.js"></script>

        <script src="../js/main.js"></script>

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
