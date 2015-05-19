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
  
  $successMessage = "<script>alert('Laporan Berjaya');</script>";
  $failedMessage = "<script>alert('Laporan Gagal');</script>";
  $fillFormMessage = "<script>alert('Please fill all the required fields');</script>";

  
$userID = $_SESSION['MM_NoID'];
$status = "Dihantar";
$hukuman = NULL;
if (isset($_POST['cari'])) {
    $nomatrik = $_POST['nomatrik'];
    $View_query = "SELECT * FROM `pkdt` WHERE `no_matrik` LIKE '$nomatrik'";
    // echo $View_query;
    $ViewRS = $connection->query($View_query);
    $row = mysqli_fetch_assoc($ViewRS);
    echo $userID;
}


if (isset($_POST['submit'])) {
$nomatrik = $_POST['nomatrik'];
$notentera = $_POST['notentera'];
$kos = $_POST['kos'];
$tarikh = $_POST['tarikh'];
$masa = $_POST['masa'];
$kesalahan = $_POST['kesalahan'];
$keterangan = $_POST['keterangan'];

  if($nomatrik == "" || $notentera == "" || $kos == ""){
    echo $fillFormMessage;
  }
  
$Daftar__query="INSERT INTO `slkpkh2`.`laporan` (`id_laporan`, `kadet`, `tarikh`, `masa`, `pelapor`, `matapelajaran`, `status`, `kesalahan`, `hukuman`, `catatan`) 
VALUES ('', '$notentera', '$tarikh', '$masa', '$userID', '$kos ', '$status', '$kesalahan', '$hukuman', '$keterangan');";
$DaftarRS = $connection->query($Daftar__query);
// echo $Daftar__query;

if($DaftarRS){
  echo $successMessage;
}else{
  echo $failedMessage;
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
                <li  class="active"><a href="#">LAPOR KESALAHAN</a></li>
                <li><a href="rekod.php">REKOD KESALAHAN</a></li>
              </ul>
               <ul class="nav navbar-nav navbar-right">
                 <li class="dropdown">
                  <a href="#LINK-TO-VIEW-PROFIL" class="dropdown-toggle" data-toggle="dropdown">Nama Pensyarah <b class="caret"></b></a>
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
      <div class="container">
        <div class="row">
        <h3>Lapor Kesalahan</h3>
        </div>
        <div class="row">
          <form method="post">
            <div class="col-xs-12 col-md-6">
             
          <div class="form-group">
            <label for="nomatrik">Cari Pelajar:</label>
            <div class="input-group">
              <input type="text" name="nomatrik" value="<?php echo $row['no_matrik']; ?>" class="form-control" placeholder="Nombor matrik">
              <span class="input-group-btn">
                <button class="btn btn-default" type="submit" name="cari">Cari</button>
              </span>
            </div><!-- /input-group -->
            <label for="nama">Nama:</label>
            <input type="text" name="nama" value="<?php echo $row['nama']; ?>" placeholder="Nama Pelajar" class="form-control" />
            <label for="notentera">Nombor tentera:</label>
            <input type="text" name="notentera" value="<?php echo $row['no_tentera']; ?>" placeholder="Nombor tentera" class="form-control" />
            <label for="pengambilan">Pengambilan:</label>
            <input type="text" name="pengambilan" value="<?php echo $row['pengambilan']; ?>" placeholder="Pengambilan" class="form-control" />
            <label for="kos">Mata Pelajaran:</label>
            <input type="text" name="kos" value="" placeholder="Mata pelajaran" class="form-control" />
            <label for="tarikh">Tarikh:</label>
            <input type="date" name="tarikh" value="" class="form-control" />
            <label for="masa">Masa:</label>
            <input type="time" name="masa" value="" class="form-control" />
            <label for="penasihat">Nama Penasihat Akademik:</label>
            <input type="text" name="penasihat" value="<?php echo $row['penyelia_akademik']; ?>" placeholder="Nama Penasihat Akademik" class="form-control" />
            <label for="kesalahan">Kesalahan:</label>
            <select name="kesalahan" class="form-control" >


            <?php
                  $Kesalahan__query="SELECT * FROM `kesalahan`";
                  $KesalahanRS = $connection->query($Kesalahan__query);

                    while($row = mysqli_fetch_assoc($KesalahanRS)){ 
                         echo ' <option value="'.$row["id"].'">'.$row["nama"].'</option>';
                    }
            ?>
                  
          </select>
            <label for="keterangan">Keterangan/Catatan:</label>
            <input type="text" name="keterangan" value="" placeholder="Keterangan" class="form-control" />
            <hr>
            <input type="checkbox" name="pengesahan" value="Pengesahan">
            Saya akui bahawa laporan yang dibuat adalah benar.<br>
            <input type="submit" name="submit" value="Submit" class="btn btn-primary">

          </div>
        </div>
          </form>
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