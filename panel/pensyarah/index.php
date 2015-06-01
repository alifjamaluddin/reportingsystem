<?php
if (!isset($_SESSION)) {
  session_start();
}
include("check_access.php");
$id = $_SESSION['MM_NoID'];
$name = $_SESSION['MM_UserName'];


require( "../../process/config.php" );

$connection = mysqli_connect(DB_HOST,DB_USERNAME,DB_PASSWORD,DB_NAME);
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
  

// $View__query="SELECT * FROM `laporan`";
$View__query="SELECT * FROM `t142_akaun` WHERE f142noID ='$id'";
$ViewRS = $connection->query($View__query);
$row = mysqli_fetch_array($ViewRS);


?>
<!DOCTYPE html>
<html>
<head>
	<title>Panel Pensyarah</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Loading Bootstrap -->
    <link href="../../css/vendor/bootstrap.min.css" rel="stylesheet">

    <!-- Loading Flat UI -->
    <link href="../../css/flat-ui.min.css" rel="stylesheet">
    <link href="../../css/custom.css" rel="stylesheet">
</head>
<body>
<?php include('navbar-ps.php'); ?>
<div class="container">
      <div class="row">
      <div class="col-md-5  toppad  pull-right col-md-offset-3 ">
           <!-- <A href="edit.html" >Edit Profile</A> -->

        <!-- <A href="edit.html" >Logout</A> -->
       <!-- <br> -->
<!-- <p class=" text-info">May 05,2014,03:00 pm </p> -->
      </div>
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3 toppad" >
   
   
          <div class="panel panel-info">
            <div class="panel-heading">
              <h3 class="panel-title">Maklumat Pengguna</h3>
            </div>
            <div class="panel-body">
              <div class="row">
                <div class="col-md-3 col-lg-3 " align="center"> <img alt="User Pic" src="../../<?php echo $row['f142photo'] ?>" class="img-circle" height="120px" width="120px"> </div>
                
                <div class=" col-md-9 col-lg-9 "> 
                  <table class="table table-user-information">
                    <tbody>
                      <tr>
                        <td>Nama:</td>
                        <td><?php echo ucwords($name); ?></td>
                      </tr>
                      <tr>
                        <td>Email:</td>
                        <td><?php echo $row['f142email']; ?></td>
                      </tr>
                      
                      
                     
                    </tbody>
                  </table>
                  
                  

                </div>
              </div>
            </div>
                
            
          </div>
        </div>
      </div>
    </div>
 <!-- jQuery (necessary for Flat UI's JavaScript plugins) -->
    <script src="../../js/vendor/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../../js/vendor/video.js"></script>
    <script src="../../js/flat-ui.min.js"></script>
</body>
</html>