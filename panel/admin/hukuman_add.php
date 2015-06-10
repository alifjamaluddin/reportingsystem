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
  
  $successMessage = "<script>alert('Jenis Hukuman Berjaya Ditambah');window.location = './hukuman.php';</script>";
  $failedMessage = "<script>alert('Jenis Hukuman Gagal Ditambah'');</script>";
  $fillFormMessage = "<script>alert('Please fill all the required fields');</script>";


if (isset($_POST['submit'])) {
  $nama = $_POST['nama'];

  if($nama == ""){
    echo $fillFormMessage;
  }else{
    $Daftar__query="INSERT INTO `slkpkh2`.`hukuman` (`id`, `nama`) VALUES (NULL, '$nama')";
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
<?php include('navbar-admin.php'); ?>
 <!-- end navbar -->
 <div class="container">
        <div class="row">
        <h3>Tambah Jenis Hukuman</h3>
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