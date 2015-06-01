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
  
  $successMessage = "<script>alert('User succesfully added');</script>";
  $failedMessage = "<script>alert('User registration failed');</script>";
  $fillFormMessage = "<script>alert('Please fill all the required fields');</script>";


if (isset($_POST['submit'])) {
  $noid = $_POST['noid'];
  $nama = $_POST['nama'];
  $nomatrik = $_POST['nomatrik'];
  $pengambilan = $_POST['pengambilan'];
  $pa = $_POST['pa'];
  $batalion = $_POST['batalion'];
  $fakulti = $_POST['fakulti'];


  if($noid == "" || $nama == "" || $nomatrik == "" || $pengambilan == "" || $pa == ""){
    echo $fillFormMessage;
  }
 
$Daftar__query="INSERT INTO `slkpkh2`.`pkdt` (`no_matrik`, `nama`, `no_tentera`, `pengambilan`, `batalion`, `fakulti`, `penyelia_akademik`) VALUES ('$nomatrik', '$nama', '$noid', '$pengambilan', '$batalion', '$fakulti', '$pa');";
// echo $Daftar__query;
$DaftarRS = $connection->query($Daftar__query);

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
        <h3>Daftar Pegawai Kadet</h3>
        </div>
        <div class="row">
          <form method="post">
            <div class="col-xs-12 col-md-6">
             
          <div class="form-group">
            <label for="noid">Nombor tentera:</label>
            <input type="text" name="noid" value="" placeholder="Nombor tentera" class="form-control" />
            
            <label for="nama">Nama:</label>
            <input type="text" name="nama" value="" placeholder="Nama" class="form-control" />
            
            <label for="nomatrik">Nombor matrik:</label>
            <input type="text" name="nomatrik" value="" placeholder="Nombor matrik" class="form-control" />
            
           <label for="pengambilan">Pengambilan:</label>
            <select name="pengambilan" class="form-control" >
              <option value="2015">2015</option>
              <option value="2014">2014</option>
              <option value="2013">2013</option>
              <option value="2012">2012</option>
              <option value="2011">2011</option>
              <option value="2010">2010</option>
              <option value="2009">2009</option>
              <option value="2008">2008</option>
              <option value="2007">2007</option>
              <option value="2006">2006</option>
              <option value="2005">2005</option>
              <option value="2004">2004</option>
              <option value="2003">2003</option>
              <option value="2002">2002</option>
              <option value="2001">2001</option>
              <option value="2000">2000</option>
              <option value="1999">1999</option>
              <option value="1998">1998</option>
              <option value="1997">1997</option>
              <option value="1996">1996</option>
              <option value="1995">1995</option>
              <option value="1994">1994</option>
              <option value="1993">1993</option>
              <option value="1992">1992</option>
              <option value="1991">1991</option>
              <option value="1990">1990</option>
              <option value="1989">1989</option>
              <option value="1988">1988</option>
              <option value="1987">1987</option>
              <option value="1986">1986</option>
              <option value="1985">1985</option>
              <option value="1984">1984</option>
              <option value="1983">1983</option>
             
               </select>
          <label for="batalion">Batalion:</label>
            <input type="text" name="batalion" value="" placeholder="Batalion" class="form-control" />
            <label for="fakulti">Fakulti:</label>
            <input type="text" name="fakulti" value="" placeholder="Fakulti" class="form-control" />
            <label for="pa">Penasihat Akademik:</label>
            <input type="text" name="pa" value="" placeholder="Penasihat akademik" class="form-control" />
            
            <hr>
            <input type="submit" name="submit" value="Daftar" class="btn btn-primary">


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