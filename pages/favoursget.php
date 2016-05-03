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
        <link rel="stylesheet" href="../css/bootstrap-toggle.min.css">
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
          <h2>Favours</h2>
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
            <li><a href="pointsgive.php">Points</a></li>
            <li><a href="questionsyou.php">Questions</a></li> 
            <li><a href="prizesyou.php">Weekly Prize</a></li> 
            <li class="active"><a href="favoursget.php">Favours</a></li>
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
    <div class="color-scheme">
      <div class="row">
        <div class="col-xs-6 tab-parent">
          <a class="tab" href="favoursget.php">Cash in favour</a>
          <div class="tab-child tab-active"></div>
        </div>
        <div class="col-xs-6 tab-parent">
          <a class="tab" href="favourgive.php">Favour owed</a>
          <div class="tab-child"></div>
        </div>
      </div>
    </div>

    <div class="container">
      <!-- Main content area -->
      <div class="row">
        <div class="col-xs-12 main-content-area-subpages">
          <!-- need to add php code here -->
          <h2>Cash in some points for a favour!</h2>
          <br>
          <h3>How many points?</h3>
          <br>

           <form role="form">
              
                <div class="form-group heart-form">
                  <input type='radio' name='thing' value='valuable' id="one-point" class="heart"/><label for="one-point"></label>
                  <input type='radio' name='thing' value='valuable' id="two-point" class="heart"/><label for="two-point"></label>
                  <input type='radio' name='thing' value='valuable' id="three-point" class="heart"/><label for="three-point"></label>
                </div> 
          <h3>What type of favour?</h3>

                <div class="form-group">
                  
                  <input type="checkbox" id="gift" data-toggle="toggle" data-on="Yes" data-off="No" data-onstyle="primary" data-offstyle="default"><label class="favour-label" for="gift">Gift</label>
                </div>

                <div class="form-group">
                  <input type="checkbox" id="chores" data-toggle="toggle" data-on="Yes" data-off="No" data-onstyle="primary" data-offstyle="default"><label class="favour-label" for="chores">  Chores</label>
                </div>

                <div class="form-group">
                  
                  <input type="checkbox" id="massage" data-toggle="toggle" data-on="Yes" data-off="No" data-onstyle="primary" data-offstyle="default"><label class="favour-label" for="massage">Massage</label>
                </div>

                <div class="form-group">
                  
                  <input type="checkbox" id="sexual" data-toggle="toggle" data-on="Yes" data-off="No" data-onstyle="primary" data-offstyle="default"><label class="favour-label" for="sexual">Sexual</label>
                </div>

                <div class="form-group">
                  
                  <input type="checkbox" id="wildcard" data-toggle="toggle" data-on="Yes" data-off="No" data-onstyle="primary" data-offstyle="default"><label class="favour-label" for="wildcard">Wild Card</label>
                </div>

                <button type="submit" class="btn btn-default">Submit</button>
            
          </form>
       </div>
        
      </div>

      <hr>

      <footer>
        <div class="container"><p>&copy; Batchelor 2016</p></div>

        
      </footer>
    </div> <!-- /container -->        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="../js/vendor/jquery-1.11.2.min.js"><\/script>')</script>

        <script src="../js/vendor/bootstrap.min.js"></script>
        <script src="../js/bootstrap-toggle.min.js"></script>
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
