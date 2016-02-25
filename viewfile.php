<!--This script opens the file for view -->
<?php
 if(isset($_GET['submit1'])){
   $filename = $_GET['filename1'];
   if( !preg_match('/^[\w_\.\-]+$/', $filename) ){
     echo "Invalid filename";
     exit;
   }
   session_start();
   $username = $_SESSION['login_user'];
   if( !preg_match('/^[\w_\-]+$/', $username) ){
     echo "Invalid username";
     exit;
   }
   $full_path = sprintf("/home/mbastola/CSE330/%s/%s", $username, $filename);
   $finfo = new finfo(FILEINFO_MIME_TYPE);
   $mime = $finfo->file($full_path);
header("Content-Type: ".$mime);
readfile($full_path);
}
?>
