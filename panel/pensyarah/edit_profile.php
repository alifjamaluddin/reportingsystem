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
  
  $successMessage = "<script>alert('User succesfully updated');window.location = './edit_profile.php';</script>";
  $failedMessage = "<script>alert('User update failed');</script>";
  $passwordNotMatchMessage = "<script>alert('Password not match');</script>";
  $fillFormMessage = "<script>alert('Please fill all the required fields');</script>";
  $idakaun = $_SESSION['MM_AkaunID'] ;
  echo $id;
  $View_query = "SELECT * FROM `t142_akaun` where `f142idakaun`= '$idakaun'";
  // echo $View_query;
  $ViewRS = $connection->query($View_query);
  $row = mysqli_fetch_assoc($ViewRS);
  



if (isset($_POST['submit'])) {
        $noid = $_POST['noid'];
        // $level = $_POST['level'];
        $password = $_POST['pass'];
        $cpassword = $_POST['cpass'];
        

        if($noid == "" || $password == "" || $cpassword == ""){
          echo $fillFormMessage;
        }else{
          if($password == $cpassword){
          $md5Password=md5($password);
          $Update__query="UPDATE `slkpkh2`.`t142_akaun` 
          SET `f142noID` = '$noid', `f142password` = '$md5Password'
          WHERE `t142_akaun`.`f142idakaun` = $idakaun";

          $UpdateRS = $connection->query($Update__query);
          if($UpdateRS){
        echo $successMessage;

        header('Location: '."./edit_profile.php");
      }else{
        echo $failedMessage;
      }

        }else{
          echo $passwordNotMatchMessage;
        }
        }
}

if (isset($_POST['update'])) {
        $name = $_POST['name'];
        // $level = $_POST['level'];
        $email = $_POST['email'];
        

        if($name == "" || $email == ""){
          echo $fillFormMessage;
        }else{
          $Update__query="UPDATE `slkpkh2`.`t142_akaun` 
         SET `f142Name` = '$name', `f142email` = '$email'
        WHERE `t142_akaun`.`f142idakaun` = $idakaun";

        $UpdateRS = $connection->query($Update__query);

        if($UpdateRS){
          echo $successMessage;
          header('Location: '."./edit_profile.php");
        }else{
          echo $failedMessage;
        }
      }
}

?>



<!DOCTYPE html>
<html>
<head>
  <title>Pensyarah</title>
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
        <h3>Kemaskini Akaun</h3>
        </div>
        <div class="row">
          <form method="post">
            <div class="col-xs-12 col-md-6">
             
          <div class="form-group">
            <label for="noid">Nombor Staff / tentera:</label>
            <input type="text" name="noid" value="<?php  echo $row['f142noID']; ?>" placeholder="Nombor tentera" class="form-control" />
            
           
            <label for="pass">Katalaluan:</label>
            <input type="password" name="pass" value="" placeholder="Katalaluan" class="form-control" />
            <label for="cpass">Sahkan katalaluan:</label>
            <input type="password" name="cpass" value="" placeholder="Sahkan katalaluan" class="form-control" />
            <hr>
            <input type="submit" name="submit" value="Kemaskini Akaun" class="btn btn-primary">


          </div>
        </div>
          </form>
        </div>
        <hr>
                <div class="row">
        <h3>Kemaskini Profile</h3>
        </div>
        <div class="row">
          <form method="post">
            <div class="col-xs-12 col-md-6">
             
          <div class="form-group">
            <label for="noid">Nama:</label>
            <input type="text" name="name" value="<?php  echo $row['f142Name']; ?>" placeholder="Nama" class="form-control" />
             <label for="noid">Email:</label>
            <input type="text" name="email" value="<?php  echo $row['f142email']; ?>" placeholder="Email" class="form-control" />
            
           
           
            <hr>
            <input type="submit" name="update" value="Kemaskini Profile" class="btn btn-primary">


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