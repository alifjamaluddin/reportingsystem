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
  
  $successMessage = "<script>alert('User succesfully added');window.location = './pengguna.php';</script>";
  $failedMessage = "<script>alert('User registration failed');</script>";
  $passwordNotMatchMessage = "<script>alert('Password not match');</script>";
  $fillFormMessage = "<script>alert('Please fill all the required fields');</script>";


if (isset($_POST['submit'])) {
  $noid = $_POST['noid'];
  $level = $_POST['level'];
  $password = $_POST['pass'];
  $cpassword = $_POST['cpass'];
  

  if($noid == "" || $password == "" || $cpassword == ""){
    echo $fillFormMessage;
  }
  else{
    if($password == $cpassword){
    $md5Password=md5($password);
    $avatarURL = AVATAR_PIC;
    $Daftar__query="INSERT INTO `slkpkh2`.`t142_akaun` (`f142idakaun`, `f142noID`, `f142password`, `f142email`, `f142Name`, `f142idlevel`, `f142photo`, `f142ipadd`, `f142thupdate`, `f142updateby`, `f142catatan`) VALUES (NULL, '$noid', '$md5Password', 'your@email.com', 'Your name', '$level', '$avatarURL', NULL, NULL, NULL, NULL);";
    $DaftarRS = $connection->query($Daftar__query);
      if($DaftarRS){
       echo $successMessage;
      }else{
       echo $failedMessage;
      }
  }else{
    echo $passwordNotMatchMessage;
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
        <h3>Daftar Pengguna</h3>
        </div>
        <div class="row">
          <form method="post">
            <div class="col-xs-12 col-md-6">
             
          <div class="form-group">
            <label for="noid">Nombor Staff / tentera:</label>
            <input type="text" name="noid" value="" placeholder="Nombor tentera" class="form-control" />
            <label for="level">Peranan:</label>
            <select name="level" class="form-control" >
                  <option value="1">Administrator</option>
                  <option value="2">Pensyarah</option>
                  <option value="3">Ketua Batalion</option>
                  <option value="4">Dekan</option>
          </select>
            <label for="pass">Katalaluan:</label>
            <input type="password" name="pass" value="" placeholder="Katalaluan" class="form-control" />
            <label for="cpass">Sahkan katalaluan:</label>
            <input type="password" name="cpass" value="" placeholder="Sahkan katalaluan" class="form-control" />
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