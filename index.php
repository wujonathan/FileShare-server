<!DOCTYPE html>
<head>
  <meta charset="UTF-8" />
  <title>File Sharing Site</title>

</head>

<body>
  <div>
    <form action="#" method="get">
      <input type="text"  name="username"> User <br>
      <input type="submit" name="submit" value="Login"/>
    </form>
  </div>
  <div>
    <!-- This php script gives the instruction for logging in -->
    <?php
   // This function checks if the username matches one in the users.txt file
    function loginCheck($s){
     $h = fopen("/home/mbastola/CSE330/users.txt", "r") or dieWithError("Unable to open file.");
     while(($line = fgets($h)) !== false){
       if($s===substr($line, 0, -1)){
        fclose($h);
        return true;
      }
    }
    fclose($h);
    return false;
  }

  if(isset($_GET['submit'])){
   $usrname = $_GET['username'];
  //Log in
  if(loginCheck($usrname))
  {
    session_start();
    $_SESSION['login_user']= $usrname; 
    header("Location: mainpage.php");
    exit;
  }
   //Fail to log in
  else{
    echo "Login Fail";
  }

}

?>
</div>
<!--Allows the user to add a new user-->
  <form action="createUser.php" method="post">
    <input name="newUser" type="text"  />
    <input type="submit" name="createUser" value="Create User" />
  </form>
</body>
</html>
