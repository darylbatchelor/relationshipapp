<?php
session_start();
$prizedescription = "";
$prize_enddate = "";
$approve = 0;
// need to make this a session variable
$player_id = '8';
$partner_id = '7';
// change the form based on whether the prize is approved If pending make it editable. 
//if approved not editable, if not approved make it editable
// need a query to see if a prize has been set for this week?

include('connect.php');

//finds prize for player that does not equal completed.
$query = "SELECT * FROM `prizes` WHERE `player_id` = " . $partner_id . " AND NOT `status` = 'completed'";
$result = mysqli_query($con, $query);

if (mysqli_num_rows($result) == 0) {

  $prizedescription = "you have no prize pending";
  $prizeid = "";
} else {
  $row = mysqli_fetch_assoc($result);
  $prizedescription = $row['description'];
  $prizeid = $row['prize_id'];
  $prize_enddate = $row['enddate'];

}

if ($row['status'] == 'approved') {
  $approve = 1;
} else {
  $approve = 0;
}

if ($_POST) {
  $description = $_POST['description'];
  $approve = $_POST['approve'];
  $comments = $_POST['comments'];
  $prizeid =$_POST['prizeid'];

if ($approve == 1) {
  $query = "UPDATE `prizes` SET `status` = 'approved', `comments` = '". $comments ."'  WHERE `prizes`.`prize_id` =" . $prizeid;

  $result = mysqli_query($con, $query);

//need to find out if partners game is approved 
  $query = "SELECT * FROM `prizes` WHERE `player_id` = " . $player_id . " AND NOT `status` = 'completed'";
  $result = mysqli_query($con, $query);
  $row = mysqli_fetch_assoc($result);
if ($row['status'] == 'approved') {
  // need to change game status to active set start date
  $query = "UPDATE `prizes` SET `game_status` = 'active' WHERE `prizes`.`prize_id` =" . $prizeid;

  $result = mysqli_query($con, $query);
}


} else {
  $query = "UPDATE `prizes` SET `status` = 'not approved', `comments` = '". $comments ."'  WHERE `prizes`.`prize_id` =" . $prizeid;
 
   $result = mysqli_query($con, $query);

}

  $query = "SELECT * FROM `prizes` WHERE `prize_id` = " . $prizeid;
$result = mysqli_query($con, $query);
   $row = mysqli_fetch_assoc($result);
  $prizedescription = $row['description'];

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
          <div class="tab-child"></div>
        </div>
        <div class="col-xs-6 tab-parent">
          <a class="tab" href="prizespartner.php">Partner's Prize</a>
          <div class="tab-child tab-active"></div>
        </div>

      </div>
    </div>

    <div class="container">
      <!-- Main content area -->
      <div class="row">
        <div class="col-xs-12 main-content-area-subpages">
          <!-- need to add php code here -->
          <h2>Your Partner's Weekly Prize</h2>
          
         
         

           <form role="form" method="post">
              <!-- need to loop through questions that have not been answered here-->
                <div class="form-group">
                  <label for="yourprize">If you partner wins this is what they want:</label>
                  <textarea type="text" class="form-control" id="yourprize" readonly rows="5" name="description"><?php  echo $prizedescription ?></textarea>
                </div>
<!-- need to change this to javascript countdown timer\ -->
                <label for='date'>Prize will be awarded on</label>
                <p><?php echo  $prize_enddate; ?></p>
<?php if (isset($approve) && $approve == 0) { ?>
                <div class="form-group">
                  <label for="approve">Do you approve?</label><br>
                  <input type="hidden" name="approve" value="0" />
                  <input type="checkbox" id="approve" data-toggle="toggle" data-on="Yes" data-off="No" data-onstyle="primary" data-offstyle="default" value="1"name="approve">
                </div>

                <div class="form-group">
                  <label for="comment">If not, why?</label><br>
                  <input type="text" class="form-control" id="comment" name="comments">
                </div>
                <input type="hidden" class="form-control"  name="prizeid" value= <?php echo "'" . $prizeid . "'";?>>
               
              
     
                <button type="submit" class="btn btn-default">Submit</button>
<?php  }  ?>
          </form>
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
