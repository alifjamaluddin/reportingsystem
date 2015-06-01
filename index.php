<?php
// *** Validate request to login to this site.
if (!isset($_SESSION)) {
  session_start();
}

 $MM_redirectLoginSuccessAdmin = "panel/admin";
  $MM_redirectLoginSuccessPensyarah = "panel/pensyarah";
  $MM_redirectLoginSuccessKB = "panel/kb";
  $MM_redirectLoginSuccessDekan = "panel/dekan";

  $MM_redirectLoginFailed = "#LOGINFAILED";//TODO

if(isset($_SESSION['MM_UserGroup'])){
  switch($_SESSION['MM_UserGroup']){
          case 1: header("Location: " . $MM_redirectLoginSuccessAdmin );
          break;
          case 2: header("Location: " . $MM_redirectLoginSuccessPensyarah );
          break;
          case 3: header("Location: " . $MM_redirectLoginSuccessKB );
          break;
          case 4: header("Location: " . $MM_redirectLoginSuccessDekan );
          break;  
        }
}


require( "process/config.php" );

$connection = mysqli_connect(DB_HOST,DB_USERNAME,DB_PASSWORD,DB_NAME);
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
  
  $MM_redirectLoginSuccessAdmin = "panel/admin";
  $MM_redirectLoginSuccessPensyarah = "panel/pensyarah";
  $MM_redirectLoginSuccessKB = "panel/kb";
  $MM_redirectLoginSuccessDekan = "panel/dekan";

  $MM_redirectLoginFailed = "#LOGINFAILED";//TODO


if (isset($_POST['submit'])) {

  $loginID=$_POST['noid']; 
  $myPass=$_POST['password']; 

  $loginPassword=md5($myPass);


$LoginRS__query="SELECT * FROM t142_akaun WHERE f142noID='$loginID' AND f142password='$loginPassword'";

$LoginRS = $connection->query($LoginRS__query);

  $loginFoundUser = $LoginRS->num_rows;

  if ($loginFoundUser > 0) {
      $row = mysqli_fetch_assoc($LoginRS);
        $loginStrGroup  = $row['f142idlevel'];
        $userName = $row['f142Name'];
        $idakaun = $row['f142idakaun'];
        $level = $row['f142idlevel'];


        
      if (PHP_VERSION >= 5.1) {session_regenerate_id(true);} else {session_regenerate_id();}
        //declare two session variables and assign them
        $_SESSION['MM_UserName'] = $userName;       
        $_SESSION['MM_NoID'] = $loginID;
        $_SESSION['MM_AkaunID'] = $idakaun;
        $_SESSION['MM_UserGroup'] = $loginStrGroup;       
        $_SESSION['MM_Level'] = $level;       

        switch($loginStrGroup){
          case 1: header("Location: " . $MM_redirectLoginSuccessAdmin );
          break;
          case 2: header("Location: " . $MM_redirectLoginSuccessPensyarah );
          break;
          case 3: header("Location: " . $MM_redirectLoginSuccessKB );
          break;
          case 4: header("Location: " . $MM_redirectLoginSuccessDekan );
          break;  
        }
    }
  else {
    echo "<script>alert('Wrong ID or Password');</script>";
    header("Location: ". $MM_redirectLoginFailed );

    // echo $loginStrGroup;
  }
}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>SLKPKH</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Loading Bootstrap -->
    <link href="css/vendor/bootstrap.min.css" rel="stylesheet">

    <!-- Loading Flat UI -->
    <link href="css/flat-ui.min.css" rel="stylesheet">
    <link href="css/custom.css" rel="stylesheet">

    <!-- <link rel="shortcut icon" href="img/favicon.ico"> -->

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements. All other JS at the end of file. -->
    <!--[if lt IE 9]>
      <script src="js/vendor/html5shiv.js"></script>
      <script src="js/vendor/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
<!-- navbar -->
      <div class="row">
        <div class="col-xs-12">
          <nav class="navbar navbar-inverse navbar-embossed" role="navigation">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse-01">
                <span class="sr-only">Toggle navigation</span>
              </button>
              <a class="navbar-brand" href="#">SLKPKH</a>
            </div>
            <div class="collapse navbar-collapse" id="navbar-collapse-01">
              <ul class="nav navbar-nav navbar-right">
                <li><a href="#jumbo-home">HOME</a></li>
              </ul>
               
            </div><!-- /.navbar-collapse -->
          </nav><!-- /navbar -->
        </div>
      </div> <!-- /row -->
<!-- end navbar -->
  <div class="jumbotron" id="jumbo-banner"> 
  </div>
<div class="jumbotron" id="jumbo-home">
  <div class="container">
   <h3>Sistem Laporan Kesalahan</h3>
  <!-- <p>This is demo website for SLKPKH</p> -->
  <!-- <p><a class="btn btn-primary btn-lg" href="panel/admin" role="button">Administrator Panel</a></p>
  <p><a class="btn btn-primary btn-lg" href="panel/kb" role="button">Ketua Batalion Panel</a></p>
  <p><a class="btn btn-primary btn-lg" href="panel/pensyarah" role="button">Pensyarah Panel</a></p> -->
            
                      <form action="" method="post">
            <div class="col-xs-12 col-md-3">
             
          <div class="form-group">
            
            <label for="noid">ID:</label>
            <input type="text" name="noid" value="" placeholder="Nombor ID" class="form-control" />
            <label for="password">Password:</label>
            <input type="password" name="password" class="form-control" />
           <hr>
            <input type="submit" name="submit" value="Log masuk" class="btn btn-primary">

          </div>
        </div>
          </form>

  </div>
</div>
<!-- 
<footer>
      <div class="container">
        
        <div class="row">
          <div class="col-md-5">
            <h3 class="footer-title">Subscribe</h3>
            <p>Go to my website for enquiry <a href="http://www.kodegeek.net">KODEGEEK</a><br/>
              
            </p>
          </div> /col-xs-7

          <div class="col-md-7">
            <div class="footer-banner">
              <h3 class="footer-title">Contact us</h3>
              <ul>
                <li>alifjamaluddin92[at]gmail[dot]com</li>

              </ul>
            </div>
          </div>
        </div>
      </div>
 </footer> -->


    <!-- /.container -->

    <!-- jQuery (necessary for Flat UI's JavaScript plugins) -->
    <script src="js/vendor/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/vendor/video.js"></script>
    <script src="js/flat-ui.min.js"></script>

  </body>
</html>

