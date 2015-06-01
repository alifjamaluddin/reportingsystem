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
  
  $successMessage = "<script>alert('Laporan Berjaya Dikemaskini');window.location = './semak.php';</script>";
  $failedMessage = "<script>alert('Laporan Gagal Dikemaskini');</script>";

  $id = $_GET['id'];
 $View__query="SELECT * FROM laporan l LEFT JOIN hukuman h ON l.hukuman=h.id LEFT JOIN kesalahan k ON l.kesalahan=k.id LEFT JOIN pkdt p ON l.kadet=p.no_tentera WHERE id_laporan=$id";
 // echo $View__query;
$ViewRS = $connection->query($View__query);

  $row = mysqli_fetch_array($ViewRS);
  

        

  if (isset($_POST['submit'])) {
  $catatan = $_POST['catatan'];
  $hukuman = $_POST['hukuman'];
  $status = $_POST['status'];



  $Update__query="UPDATE `slkpkh2`.`laporan` 
  SET `status` = '$status', `hukuman` = '$hukuman', `catatan` = '$catatan' 
  WHERE `laporan`.`id_laporan` = $id ";
  // echo $Update__query;
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
        <h3>Kemaskini Semakan Laporan</h3>
        </div>
        <div class="row">
          <form method="post">
            <div class="col-xs-12 col-md-6">
             
          <div class="form-group">
            <label for="noid">ID Laporan:</label>
            <p>ALK<?php echo $row[0]; ?></p>
            
            <label for="nama">Nombor tentera</label>
            <p><?php echo $row[1]; ?></p>
            
            <label for="nomatrik">Nama:</label>
            <p><?php echo $row[16]; ?></p>
            
           <label for="kesalahan">Kesalahan:</label>
           <p><?php echo $row[13]; ?></p>

            <label for="pa">Status:</label>
            <select name="status" class="form-control" >
                  <option value="Diterima">Diterima</option>
                  <option value="Disemak">Disemak</option>
                  <option value="Dilaksanakan">Dilaksanakan</option>
          </select>
            <label for="hukuman">Hukuman:</label>
            <select name="hukuman" class="form-control" >
                   <?php
                  $Hukuman__query="SELECT * FROM `hukuman`";
                  $HukumanRS = $connection->query($Hukuman__query);

                    while($row1 = mysqli_fetch_assoc($HukumanRS)){ 
                         echo ' <option value="'.$row1["id"].'">'.$row1["nama"].'</option>';
                    }
            ?>
          </select>
            <label for="catatan">Catatan:</label>
            <input type="text" name="catatan" value="<?php echo $row[9]; ?>" placeholder="Catatan" class="form-control" />
            
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