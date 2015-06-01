<?php
// unset($_SESSION['MM_UserName']); 
// unset($_SESSION['MM_NoID']); 
// unset($_SESSION['MM_UserGroup']);  
// unset($_SESSION['MM_AkaunID']);
// unset($_SESSION['MM_Level']);
session_unset();
session_destroy();
 
echo "<script>window.location='./';</script>"
?>