<!-- This script deletes the desired file-->
<?php
 if(isset($_GET['submit2'])){
   $filename = $_GET['filename2'];
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
   //Removes the file in the path
   $cmd = "rm ".$full_path;
   shell_exec ($cmd);
   header('Location: ' . $_SERVER['HTTP_REFERER']);
}
?>
