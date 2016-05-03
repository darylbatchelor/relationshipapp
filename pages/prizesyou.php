<?php
session_start();
$Err = "";
$comments = "";
$dateset = 0;
// need to make this a session variable
$player_id = '7';
// change the form based on whether the prize is approved If pending make it editable. 
//if approved not editable, if not approved make it editable
// need a query to see if a prize has been set for this week?

include('connect.php');

//finds prize for player that does not equal completed.
$query = "SELECT * FROM `prizes` WHERE `player_id` = " . $player_id . " AND NOT `status` = 'completed'";


$result = mysqli_query($con, $query);
$row = mysqli_fetch_assoc($result);

//if there are no prizes that are not completed then create an empty one and set it to pending
if (mysqli_num_rows($result) == 0) {
    $query = "INSERT INTO `prizes` (`prize_id`, `player_id`, `description`, `status`, `Created_at`, `comments`, `enddate`, `game_status`) VALUES (NULL, '". $player_id . "', '', 'pending', CURRENT_TIMESTAMP, '', '0000-00-00', 'pending')";
    $result = mysqli_query($con, $query);
    
    $query = "SELECT * FROM `prizes` WHERE `player_id` = " . $player_id . " AND `status` = 'pending'";
    
    $result = mysqli_query($con, $query);
    $row = mysqli_fetch_assoc($result);
    
   
    $prizeid = $row['prize_id'];
    $date = $row['enddate'];

  } else {
      //if there is a result which means that there is a pending prize or approved or not approved
    $query = "SELECT * FROM `prizes` WHERE `player_id` = " . $player_id . " AND NOT `status` = 'completed'";
    
    $result = mysqli_query($con, $query);
    $row = mysqli_fetch_assoc($result);
    
 
    $prizeid = $row['prize_id'];
    $comments = $row['comments'];
    $date = $row['enddate'];
  }

$prizestatus = $row['status'];

$weeklyprize = $row['description'];


if ($_POST) {

$prizeid = $_POST['prizeid'];

if (empty($_POST['weeklyprize'])) {
  $Err = "Weekly prize not entered";
} else {

$weeklyprize = $_POST['weeklyprize'];

$enddate = $_POST['date'];

  

$query = "UPDATE `prizes` SET `description` = '" . $weeklyprize . "', `game_status` = 'pending', `enddate` = '" . $enddate . "' WHERE `prizes`.`prize_id` =" . $prizeid;
echo $query;
$result = mysqli_query($con, $query);

$dateset = 1;




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
          <h2>Prize</h2>
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
            <li class="active"><a href="prizesyou.php">Weekly Prize</a></li> 
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
          <a class="tab" href="prizesyou.php">Your Prize</a>
          <div class="tab-child tab-active"></div>
        </div>
        <div class="col-xs-6 tab-parent">
          <a class="tab" href="prizespartner.php">Partner's Prize</a>
          <div class="tab-child"></div>
        </div>

      </div>
    </div>

    <div class="container">
      <!-- Main content area -->
      <div class="row">
        <div class="col-xs-12 main-content-area-subpages">
          
          <h2>Your Weekly Prize</h2>
         
       
         <?php 
         
//need to add $enddate input to all forms so that update query will work.

          if ($prizestatus == 'pending') {
              echo "<form role='form' method='post' >
              
                      <div class='form-group'>
                      <input type=hidden name='prizeid' value='" . $prizeid . "'>";
                      if (empty($row['description'])) {
                        echo "<label for='yourprize'>Choose a prize</label>";
                      } else {
                      echo "<label for='yourprize'>Your prize is awaiting approval</label>";
                    }
                       echo "<textarea type='text' class='form-control' id='yourprize' rows='5' name='weeklyprize'> " . $weeklyprize ." </textarea>
                        <p> " .  $Err . "</p>";
                        if ($dateset == 0) {
                             echo "<label for='date'>Select end date for game</label>
                            <input id='date' type='date' name='date' required>";
                        } else {
                          echo "<label for='date'>Prize suggested for</label>
                        <p>" . $date . "</p>";
                         echo "<label for='date'>To change select another date for game</label>
                            <input id='date' type='date' name='date' required>";
                        }
                        
                      echo "</div>
                      
                     
                     <br>
           
                      <button type='submit' class='btn btn-default'>update</button>
            
                    </form>";

         }

          if ($prizestatus == 'not approved') {
              echo "<form role='form' method='post' >
              
                      <div class='form-group'>
                        <label for='yourprize'>Your prize was not approved :( Try again</label>
                        <textarea type='text' class='form-control' id='yourprize' rows='5' name='weeklyprize'>" . $weeklyprize . "</textarea>
                        <p> " .  $Err . "</p>
                        <label for='date'>Select end date for game</label>
                        <input id='date' type='date' name='date' required>
                      </div>
                      
                     
                     <br>
           
                      <button type='submit' class='btn btn-default'>update</button>
            
                    </form>
                    <p>" . $comments . "</p>";
         }
// need to synch this with the javascript countdown timer.
          if ($prizestatus == 'approved') {
              echo "<form role='form' method='post'>
              
                      <div class='form-group'>
                        <label for='yourprize'>Your prize was approved!!!</label>
                        <textarea type='text' class='form-control' id='yourprize' readonly rows='5' name='weeklyprize'>" . $weeklyprize ."</textarea>
                        <p> " .  $Err . "</p>
                      </div>
                        <label for='date'>Prize will be awarded on</label>
                        <p>" . $date . "</p>
 
            
                    </form>";
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
