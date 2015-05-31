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
  

$View__query="SELECT * FROM `pkdt`";
$ViewRS = $connection->query($View__query);


  $successMessage = "<script>alert('User succesfully deleted');window.location = './kadet.php';</script>";
  $failedMessage = "<script>alert('Something wrong');</script>";

if($_GET["action"]=="delete" && $_GET['id'] != "" ){
  $id = $_GET['id'];
  $Delete__query="DELETE FROM `slkpkh2`.`pkdt` WHERE `id` = '$id'";
  $DeleteRS = $connection->query($Delete__query);
  echo $successMessage;
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
      <h3>Pegawai Kadet</h3>
    </div>
    <div class="row">
      <div class="panel panel-info">
      <!-- Default panel contents -->
      <div class="panel-heading">Senarai Pegawai Kadet</div>
      <div class="panel-body">
          <a href="kadet_add.php" class="btn btn-primary">Tambah pegawai kadet</a>

        <!-- <p>Some default panel content here. Nulla vitae elit libero, a pharetra augue. Aenean lacinia bibendum nulla sed consectetur. Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis vestibulum. Nullam id dolor id nibh ultricies vehicula ut id elit.</p> -->
      </div>

      <!-- Table -->
      <table class="table">
        <thead>
          <tr>
            <th>#</th>
            <th>Nombor tentera</th>
            <th>Nama</th>
            <th>No matrik</th>
            <th>Pengambilan</th>
            <th>Batalion</th>
            <th>Fakulti</th>
            <th>Penasihat Akademik</th>
            <th>Tindakan</th>
          </tr>
        </thead>
        <tbody>
         <?php 
        $counter = 0;
 

         while($row = mysqli_fetch_assoc($ViewRS)){ 
            $counter++;
            // echo $counter;
   
           echo '
          <tr>
            <th scope="row">'.$counter.'</th>
            <th>'.$row["no_matrik"].'</th>
            <th>'.$row["nama"].'</th>
            <th>'.$row["no_tentera"].'</th>
            <th>'.$row["pengambilan"].'</th>
            <th>'.$row["batalion"].'</th>
            <th>'.$row["fakulti"].'</th>
            <th>'.$row["penyelia_akademik"].'</th>
            <th>
              <a href="kadet_edit.php?id='.$row["id"].'" class="btn btn-primary">Kemaskini</a>
              <a href="?action=delete&id='.$row["id"].'" class="btn btn-danger">Delete</a>
              

            </th>
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