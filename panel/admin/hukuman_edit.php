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
  
  $successMessage = "<script>alert('Entri Hukuman Telah Dikemaskini');window.location = './hukuman.php';</script>";
  $failedMessage = "<script>alert('Kemaskini Gagal');</script>";
  $passwordNotMatchMessage = "<script>alert('Password not match');</script>";
  $fillFormMessage = "<script>alert('Please fill all the required fields');</script>";

  $id = $_GET['id'];
  $View_query = "SELECT * FROM `hukuman` where `id`= '$id'";
  // echo $View_query;
  $ViewRS = $connection->query($View_query);
  $row = mysqli_fetch_assoc($ViewRS);
  



if (isset($_POST['submit'])) {
        $nama = $_POST['nama'];
        

        if($nama == ""){
          echo $fillFormMessage;
        }

      $Update__query="UPDATE `slkpkh2`.`hukuman` SET `nama` = '$nama' WHERE `hukuman`.`id` = $id";

      $UpdateRS = $connection->query($Update__query);

      if($UpdateRS){
        echo $successMessage;

      }else{
        echo $failedMessage;
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

 <div class="container">
        <div class="row">
        <h3>Hukuman</h3>
        </div>
        <div class="row">
          <form method="post">
            <div class="col-xs-12 col-md-6">
             
          <div class="form-group">
            
            
            <label for="nama">Nama:</label>
            <input type="text" name="nama" value="<?php  echo $row['nama']; ?>" placeholder="Nama" class="form-control" />
            
            
            <hr>
            <input type="submit" name="submit" value="Kemaskini" class="btn btn-primary">


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