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
  

$View__query="SELECT * FROM `t142_akaun`";
$ViewRS = $connection->query($View__query);


  $successMessage = "<script>alert('User succesfully deleted');window.location = './pengguna.php';</script>";
  $failedMessage = "<script>alert('Something wrong');</script>";

if($_GET["action"]=="delete" && $_GET['id'] != "" ){
  $id = $_GET['id'];
  $Delete__query="DELETE FROM `slkpkh2`.`t142_akaun` WHERE `t142_akaun`.`f142idakaun` = $id";
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
      <h3>Pengguna</h3>
    </div>
    <div class="row">
      <div class="panel panel-info">
      <!-- Default panel contents -->
      <div class="panel-heading">Senarai Pengguna</div>
      <div class="panel-body">
          <a href="pengguna_add.php" class="btn btn-primary">Tambah pengguna</a>

        <!-- <p>Some default panel content here. Nulla vitae elit libero, a pharetra augue. Aenean lacinia bibendum nulla sed consectetur. Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis vestibulum. Nullam id dolor id nibh ultricies vehicula ut id elit.</p> -->
      </div>

      <!-- Table -->
      <table class="table">
        <thead>
          <tr>
            <th>#</th>
            <th>Nombor ID</th>
            <th>Tindakan</th>
          </tr>
        </thead>
        <tbody>
        <?php 
        $counter = 0;
 

         while($row = mysqli_fetch_assoc($ViewRS)){ 
            $counter++;
          echo '<tr>
            <th scope="row">'.$counter.'</th>
            <th>'.$row["f142noID"].'</th>
            <th>
              <a href="pengguna_edit.php?id='.$row["f142idakaun"].'" class="btn btn-primary">Kemaskini</a>
              <a href="?action=delete&id='.$row["f142idakaun"].'" class="btn btn-danger">Delete</a>

            </th>
          </tr>
           ';
          
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