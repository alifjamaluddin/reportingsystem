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
  

// $View__query="SELECT * FROM `laporan`";
$View__query="SELECT * FROM laporan LEFT JOIN hukuman ON laporan.hukuman=hukuman.id";
$ViewRS = $connection->query($View__query);

if(isset($_GET['action'])){
  switch($_GET['action']){
    case "approve": 
        $Update__query="UPDATE `slkpkh2`.`laporan` SET `dekansah` = 'Sah' WHERE `laporan`.`id_laporan` = ".$_GET['id'];
        $Update = $connection->query($Update__query);
        echo "<script>alert('Laporan disahkan');window.history.back();</script>";
    break;
    case "cancel": 
        $Update__query="UPDATE `slkpkh2`.`laporan` SET `dekansah` = 'Batal' WHERE `laporan`.`id_laporan` = ".$_GET['id'];
        $Update = $connection->query($Update__query);
        echo "<script>alert('Laporan dibatalkan');</script>";
    break;
  }
}



?>
<!DOCTYPE html>
<html>
<head>
  <title>Lapor Kesalahan</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Loading Bootstrap -->
    <link href="../../css/vendor/bootstrap.min.css" rel="stylesheet">

    <!-- Loading Flat UI -->
    <link href="../../css/flat-ui.min.css" rel="stylesheet">
    <link href="../../css/custom.css" rel="stylesheet">
</head>
<body>
<?php include("check_access.php"); include('navbar-dekan.php'); ?>
<div class="container">
    <div class="row">
      <h3>Pengesahan</h3>
    </div>
    <div class="row">
      <div class="panel panel-info">
      <!-- Default panel contents -->
      <div class="panel-heading">Senarai Laporan</div>
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
            <th>Hukuman</th>
            <th>Tindakan</th>
          </tr>
        </thead>
        <tbody>
         <?php 
        $counter = 0;
 

         while($row = mysqli_fetch_assoc($ViewRS)){ 
            $counter++;

           echo ' <tr>
            <th scope="row">'.$counter.'</th>
            <td><a href="viewreport.php?id='.$row["id_laporan"].'">ALK'.$row["id_laporan"].'</td>
            <td>'.$row["tarikh"].'</td>
            <td>'.$row["masa"].'</td>
            <td>'.$row["nama"].'</td>';
            if($row['dekansah']=="Dalam semakan"){
              echo '
              <td>
                    <a class="btn btn-primary" href="sah.php?id='.$row["id_laporan"].'&action=approve">Sah</a>
                    <a class="btn btn-danger" href="sah.php?id='.$row["id_laporan"].'&action=cancel">Batal</a>
              </td>';
            }else{

              echo '<td>'.$row['dekansah'].'</td>';
            }
            

            echo '</tr>';
          
         }
        ?>

         
        </tbody>
      </table>
    </div>
    </div>
  </div>
<!-- end navbar -->
 <!-- jQuery (necessary for Flat UI's JavaScript plugins) -->
    <script src="../../js/vendor/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../../js/vendor/video.js"></script>
    <script src="../../js/flat-ui.min.js"></script>
</body>
</html>