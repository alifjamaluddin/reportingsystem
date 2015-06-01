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
  
  $successMessage = "<script>alert('User succesfully updated');window.location = './kadet.php';</script>";
  $failedMessage = "<script>alert('User update failed');</script>";
  $passwordNotMatchMessage = "<script>alert('Password not match');</script>";
  $fillFormMessage = "<script>alert('Please fill all the required fields');</script>";

  $id = $_GET['id'];
  $View_query = "SELECT * FROM `pkdt` where `id` = '$id'";

  // echo $View_query;
  $ViewRS = $connection->query($View_query);
  $row = mysqli_fetch_assoc($ViewRS);
  

        

  if (isset($_POST['submit'])) {
  $noid = $_POST['noid'];
  $nama = $_POST['nama'];
  $nomatrik = $_POST['nomatrik'];
  $pengambilan = $_POST['pengambilan'];
  $pa = $_POST['pa'];
  $batalion = $_POST['batalion'];
  $fakulti = $_POST['fakulti'];


  if($noid == "" || $nama == "" || $nomatrik == "" || $pengambilan == "" || $pa == "" || $batalion == "" || $fakulti == ""){
    echo $fillFormMessage;
  }else{

      $Update__query="UPDATE `slkpkh2`.`pkdt` 
      SET `no_matrik` = '$nomatrik', `nama` = '$nama', `no_tentera` = '$noid', 
      `pengambilan` = '$pengambilan', `batalion` = '$batalion', `fakulti` = '$fakulti', 
      `penyelia_akademik` = '$pa' 
      WHERE `pkdt`.`id` = '$id'";

      $UpdateRS = $connection->query($Update__query);

      if($UpdateRS){
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
 <div class="container">
        <div class="row">
        <h3>Kemaskini Pegawai Kadet</h3>
        </div>
        <div class="row">
          <form method="post">
            <div class="col-xs-12 col-md-6">
             
          <div class="form-group">
            <label for="noid">Nombor tentera:</label>
            <input type="text" name="noid" value="<?php echo $row['no_tentera'];?>" placeholder="Nombor tentera" class="form-control" />
            
            <label for="nama">Nama:</label>
            <input type="text" name="nama" value="<?php echo $row['nama'];?>" placeholder="Nama" class="form-control" />
            
            <label for="nomatrik">Nombor matrik:</label>
            <input type="text" name="nomatrik" value="<?php echo $row['no_matrik'];?>" placeholder="Nombor matrik" class="form-control" />
            
           <label for="pengambilan">Pengambilan:</label>
            <input type="text" name="pengambilan" value="<?php echo $row['pengambilan'];?>" placeholder="Pengambilan" class="form-control" />

            <label for="pa">Batalion:</label>
            <input type="text" name="batalion" value="<?php echo $row['batalion'];?>" placeholder="Batalion" class="form-control" />
            
            <label for="pa">Fakulti:</label>
            <input type="text" name="fakulti" value="<?php echo $row['fakulti'];?>" placeholder="Fakulti" class="form-control" />


            <label for="pa">Penasihat Akademik:</label>
            <input type="text" name="pa" value="<?php echo $row['penyelia_akademik'];?>" placeholder="Penasihat akademik" class="form-control" />
            
            <hr>
            <input type="submit" name="submit" value="Update" class="btn btn-primary">


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