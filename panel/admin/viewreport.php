<?php
// *** Validate request to login to this site.
if (!isset($_SESSION)) {
  session_start();
}

require( "../../process/config.php" );

$connection = mysqli_connect(DB_HOST,DB_USERNAME,DB_PASSWORD,DB_NAME);
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
  

// $View__query="SELECT * FROM `laporan`";
$View__query="SELECT * FROM laporan l LEFT JOIN hukuman h ON l.hukuman=h.id LEFT JOIN kesalahan k ON l.kesalahan=k.id";
$ViewRS = $connection->query($View__query);
$row = mysqli_fetch_array($ViewRS);



?>

<!DOCTYPE html>
<html>
<head>
	<title>Administrator</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Loading Bootstrap -->
    <link href="../../css/vendor/bootstrap.min.css" rel="stylesheet">

    <!-- Loading Flat UI -->
    <link href="../../css/flat-ui.min.css" rel="stylesheet">
    <link href="../../css/custom.css" rel="stylesheet">
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
              <ul class="nav navbar-nav navbar-left">
                <li><a href="pengguna.php">PENGGUNA</a></li>
                <li><a href="kadet.php">PEGAWAI KADET</a></li>
                <li class="active"><a href="laporan.php">LAPORAN</a></li>
                <li><a href="kesalahan.php">KESALAHAN</a></li>
                <li><a href="hukuman.php">HUKUMAN</a></li>
              </ul>
               <ul class="nav navbar-nav navbar-right">
                 <li class="dropdown">
                  <a href="#LINK-TO-VIEW-PROFIL" class="dropdown-toggle" data-toggle="dropdown">Nama ADMIN <b class="caret"></b></a>
                  <span class="dropdown-arrow"></span>
                  <ul class="dropdown-menu">
                    <li><a href="#LINK-TO-VIEW-PROFILE">View Profile</a></li>
                    <li><a href="#LINK-TO-EDIT-ACCOUNT">Edit Account</a></li>
                    <li class="divider"></li>
                    <li><a href="../../logout.php">Logout</a></li>
                  </ul>
                </li>
              </ul>

            </div><!-- /.navbar-collapse -->
          </nav><!-- /navbar -->
        </div>
      </div> <!-- /row -->
<!-- end navbar -->
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
      


    </div>
  </div>
 <!-- jQuery (necessary for Flat UI's JavaScript plugins) -->
    <script src="../../js/vendor/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../../js/vendor/video.js"></script>
    <script src="../../js/flat-ui.min.js"></script>
</body>
</html>