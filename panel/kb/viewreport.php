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
  

$id = $_GET['id'];
$View__query="SELECT * FROM laporan l LEFT JOIN hukuman h ON l.hukuman=h.id LEFT JOIN kesalahan k ON l.kesalahan=k.id where l.id_laporan=".$id;
$ViewRS = $connection->query($View__query);
$row = mysqli_fetch_array($ViewRS);



?>

<!DOCTYPE html>
<html>
<head>
	<title>Ketua Batalion</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Loading Bootstrap -->
    <link href="../../css/vendor/bootstrap.min.css" rel="stylesheet">

    <!-- Loading Flat UI -->
    <link href="../../css/flat-ui.min.css" rel="stylesheet">
    <link href="../../css/custom.css" rel="stylesheet">
</head>
<body>
<?php include('navbar-kb.php'); ?> 
  <div class="container">
    <div class="row">
      <h3>Rekod Kesalahan</h3>
    </div>
    <div class="row">
      <!-- Default panel contents -->
     

      
      <p><b>Nombor Laporan:</b></p>
      <p>ALK<?php echo $row[0]; ?> </p>
      <p><b>Nombor Tentera:</b></p>
      <p><?php echo $row[1]; ?> </p>
      <p><b>Pelapor:</b></p>
      <p><?php echo $row[4]; ?> </p>
      <p><b>Mata pelajaran:</b></p>
      <p><?php echo $row[5]; ?> </p>
      <p><b>Tarikh:</b></p>
      <p><?php echo $row[2]; ?> </p>
      <p><b>Masa:</b></p>
      <p><?php echo $row[3]; ?> </p>
      <p><b>Kesalahan:</b></p>
      <p><?php echo $row[13]; ?> </p>
      <p><b>Hukuman:</b></p>
      <p><?php echo $row[11]; ?> </p>
      <p><b>Catatan:</b></p>
      <p><?php echo $row[9]; ?> </p>
      <p><b>Status:</b></p>
      <p><?php echo $row[6]; ?> </p>
          <p><b>Pengesahan Dekan:</b></p>
      <p><?php echo $row[9]; ?> </p>
      


    </div>
  </div>
 <!-- jQuery (necessary for Flat UI's JavaScript plugins) -->
    <script src="../../js/vendor/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../../js/vendor/video.js"></script>
    <script src="../../js/flat-ui.min.js"></script>
</body>
</html>