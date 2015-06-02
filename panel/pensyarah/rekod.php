<?php
// *** Validate request to login to this site.
if (!isset($_SESSION)) {
  session_start();
}
include("check_access.php");
require( "../../process/config.php" );

$connection = mysqli_connect(DB_HOST,DB_USERNAME,DB_PASSWORD,DB_NAME);
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
  
$userID = $_SESSION['MM_NoID'];
$View__query="SELECT * FROM laporan l LEFT JOIN hukuman h ON l.hukuman=h.id LEFT JOIN kesalahan k ON l.kesalahan=k.id LEFT JOIN pkdt p ON l.kadet=p.no_tentera  WHERE pelapor='".$userID."'";

// $View__query="SELECT * FROM `laporan` WHERE pelapor='$userID'";
// echo $View__query;
$ViewRS = $connection->query($View__query);


  // $successMessage = "<script>alert('User succesfully deleted');window.location = './pengguna.php';</script>";
  // $failedMessage = "<script>alert('Something wrong');</script>";

// if($_GET["action"]=="delete" && $_GET['id'] != "" ){
//   $id = $_GET['id'];
//   $Delete__query="DELETE FROM `slkpkh2`.`t142_akaun` WHERE `t142_akaun`.`f142idakaun` = $id";
//   $DeleteRS = $connection->query($Delete__query);
//   echo $successMessage;
// }

?>


<!DOCTYPE html>
<html>
<head>
	<title>Rekod Kesalahan</title>
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
      <h3>Rekod Kesalahan</h3>
    </div>
    <div class="row">
      <div class="panel panel-info">
      <!-- Default panel contents -->
      <div class="panel-heading">Senarai Rekod Laporan</div>
      <div class="panel-body">
        <!-- <p>Some default panel content here. Nulla vitae elit libero, a pharetra augue. Aenean lacinia bibendum nulla sed consectetur. Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis vestibulum. Nullam id dolor id nibh ultricies vehicula ut id elit.</p> -->
      </div>

      <!-- Table -->
      <table class="table">
        <thead>
          <tr>
            <th>#</th>
            <th>ID Laporan</th>
            <th>Tarikh</th>
            <th>Masa</th>
            <th>Pengesahan Dekan</th>
            <th>Hukuman</th>
            <th>Status</th>
            <!-- <th>Catatan</th> -->

          </tr>
        </thead>
        <tbody>
         <?php 
        $counter = 0;

         while($row = mysqli_fetch_array($ViewRS)){ 
            $counter++;
           echo ' <tr>
            <th scope="row">1</th>
            <td><a href="viewreport.php?id='.$row["id_laporan"].'">ALK'.$row["id_laporan"].'</td>
            <td>'.$row["tarikh"].'</td>
            <td>'.$row["masa"].'</td>
            <td>'.$row["dekansah"].'</td>
            <td>'.$row[12].'</td>
            <td>'.$row["status"].'</td>

          </tr>';
          
         }
        ?>

         
          
        </tbody>
      </table>
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