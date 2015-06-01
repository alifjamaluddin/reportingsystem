<?php
$level = $_SESSION['MM_Level'];
  $MM_redirectLoginSuccessAdmin = "../../panel/admin";
  $MM_redirectLoginSuccessPensyarah = "../../panel/pensyarah";
  $MM_redirectLoginSuccessKB = "../../panel/kb";
  $MM_redirectLoginSuccessDekan = "../../panel/dekan";
  $MM_signInFirst = "../../";

switch($level){
          case 1: //header("Location: " . $MM_redirectLoginSuccessAdmin );
          break;
          case 2: header("Location: " . $MM_redirectLoginSuccessPensyarah );
          break;
          case 3: header("Location: " . $MM_redirectLoginSuccessKB );
          break;
          case 4: header("Location: " . $MM_redirectLoginSuccessDekan );
          break; 
          default: 
              echo "<script>alert('Please sign in.'); window.location = '../../';</script>";
              header("Location: " . $MM_signInFirst ); 
          break;
        }
?> 