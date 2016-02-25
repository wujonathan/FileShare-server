<!--This script logs out and destroys the session-->
<?php
   if(isset($_GET['submit'])){
        session_start();
        $_SESSION['login_user']= $usrname; 
        session_unset();   
        session_destroy();
        header("Location: index.php");
        exit;
  }
?>
