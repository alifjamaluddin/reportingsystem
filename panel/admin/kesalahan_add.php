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
  
  $successMessage = "<script>alert('Jenis Kesalahan Berjaya Ditambah');</script>";
  $failedMessage = "<script>alert('Jenis Kesalahan Gagal Ditambah'');</script>";
  $fillFormMessage = "<script>alert('Please fill all the required fields');</script>";


if (isset($_POST['submit'])) {
  $nama = $_POST['nama'];

  if($nama == ""){
    echo $fillFormMessage;
  }else{
      $Daftar__query="INSERT INTO `slkpkh2`.`kesalahan` (`id`, `nama`) VALUES (NULL, '$nama')";
// echo $Daftar__query;
      $DaftarRS = $connection->query($Daftar__query);

      if($DaftarRS){
        echo $successMessage;

      }else{
        echo $failedMessage;
      }

  }
 

}

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
                <li><a href="laporan.php">LAPORAN</a></li>
                <li class="active"><a href="kesalahan.php">KESALAHAN</a></li>
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
                    <li><a href="#LINK-TO-LOGOUT">Logout</a></li>
                  </ul>
                </li>
              </ul>

            </div><!-- /.navbar-collapse -->
          </nav><!-- /navbar -->
        </div>
      </div> <!-- /row -->
<!-- end navbar -->
 <!-- end navbar -->
 <div class="container">
        <div class="row">
        <h3>Tambah Jenis Kesalahan</h3>
        </div>
        <div class="row">
          <form method="post">
            <div class="col-xs-12 col-md-6">
             
          <div class="form-group">
            
            
            <label for="nama">Nama:</label>
            <input type="text" name="nama" value="" placeholder="Nama" class="form-control" />
            
            
            <hr>
            <input type="submit" name="submit" value="Tambah" class="btn btn-primary">


          </div>
        </div>
          </form>
        </div>
      </div>
 <!-- jQuery (necessary for Flat UI's JavaScript plugins) -->
    <script src="../../js/vendor/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../../js/vendor/video.js"></script>
    <script src="../../js/flat-ui.min.js"></script>
</body>
</html>