<?php  

session_start();
$player_id = '8';
$partner_id = '7';
$date = date("Y") . "-" . date("m") . "-" . date("d");

include('connect.php');
$query ="SELECT * FROM `points` WHERE `player_getting` = '$partner_id' AND `game_status` = 'current game' AND `status` = 'pending'";
$result = mysqli_query($con, $query);
if (mysqli_num_rows($result) == 0) {
  $requestedpoints = "<h3> Currently no points requested</h3>";
} else {
  $requests = array();
   while ($row = mysqli_fetch_assoc($result)) {
    $requests[] = $row;

   }



}



if ($_POST) {
  
$points = $_POST['points'];
$reason = $_POST['reason'];
$category = $_POST['category'];



$query = "INSERT INTO `points` (`point_id`, `reason`, `date`, `category`, `status`, `player_giving`, `player_getting`, `type`, `game_status`) VALUES (NULL, '$reason', '$date', '$category', 'approved', '$player_id', '$partner_id', '$points', 'current game');";
$result = mysqli_query($con, $query);

if ($result) {
  $message = "<h3>Points requested </h3>";
}


}

?>

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
    <div class="color-scheme">
      <div class="row">
        <div class="col-xs-6 tab-parent">
          <a class="tab" href="pointsgive.php">Give Points</a>
          <div class="tab-child tab-active"></div>
        </div>
        <div class="col-xs-6 tab-parent">
          <a class="tab" href="pointsget.php">Get Points</a>
          <div class="tab-child"></div>
        </div>
      </div>
    </div>

    <div class="container">
      <!-- Main content area -->
      <div class="row">
        <div class="col-xs-12 main-content-area-subpages">
          <!-- need to add php code here -->
          <h2>Current Partner Point Requests</h2>
          <?php foreach ($requests as $request) {?>
            <h4><span class="heartplain"></span><?php echo $request["reason"]; ?></h4> <br>
            
            <!-- Need to hook these links up to a php get method that echos out the give point form
             and then runs an update to the database for the point resuest id -->

            <a href="#">Give points</a> | <a href="#">No points</a>

            <?php } ?>

            <!-- NEED TO CHANGE THE PAGE SO THAT THE FORM BELOW APPEARS ON THE CLICK OF A BUTTON 
                GIVE POINTS BUTTON THIS IS FOR GIVING POINTS WITHOUT RECIEVING A REQUEST-->

          <h2>Give Points</h2>
          <h3>How many points?</h3>
          <br>

           <form role="form" method="post">
              
                <div class="form-group heart-form">
                  <input type='radio' name='points' value='1' id="one-point" class="heart"/><label for="one-point"></label>
                  <input type='radio' name='points' value='2' id="two-point" class="heart"/><label for="two-point"></label>
                  <input type='radio' name='points' value='3' id="three-point" class="heart"/><label for="three-point"></label>
                </div>
                <h3>What for?</h3>
                <div class="form-group">
                  <label for="reason">Reason:</label>
                  <input type="text" class="form-control" id="reason" name="reason">
                </div>
                <br>
                <h3>Type of action?</h3>
                <div class="form-group">
                <label for="category">Select list (select one):</label>
                <select class="form-control drop-down" id="category" name="category">
                  <option>Quality Time</option>
                  <option>Compliments</option>
                  <option>Physical Touch</option>
                  <option>Gift</option>
                  <option>Chores</option>
                </select>
              </div>
     
                <button type="submit" class="btn btn-default">Give Some!</button>
            
          </form>

          <?php 

          if (isset($message)) {
            echo $message;
          }

          ?>
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
