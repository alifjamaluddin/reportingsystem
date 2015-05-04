<?php
unset($_SESSION['MM_UserName']); 
unset($_SESSION['MM_NoID']); 
unset($_SESSION['MM_UserGroup']);  
session_destroy();
 
header("Location: ./");
?>