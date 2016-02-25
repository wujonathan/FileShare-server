<!-- This is the main page of the website
  This page displays the files under the user's directory
  as well as the options for the user to interact with files -->
<!DOCTYPE html>
<head>
        <meta charset="UTF-8" />
        <title>File Sharing Site</title>

</head>

<body>
<div id="tst">Files under User:<br>
</div>
<br>
<div>
  <!-- This php script displays the files under the directory-->
<?php
   session_start();
   $username = $_SESSION['login_user'];
   if( !preg_match('/^[\w_\-]+$/', $username) ){
     echo "Invalid username";
     exit;
   }
   $cmd = "ls /home/mbastola/CSE330/".$username;
   $output = shell_exec( $cmd );
   echo $output;
?>
</div>
<br>
<br>
<div>
<div>Actions:</div>
<br>
  <!-- File viewer-->
  <form action="viewfile.php" method="get">
    <div>Enter filename to view: </div>
    <input type="text"  name="filename1"> 
    <input type="submit" name="submit1" value="View"/>
  </form>
  <br>
  <!-- File deleter-->
  <form action="deletefile.php" method="get">
    <div>Enter filename to delete: </div>
    <input type="text"  name="filename2"> 
    <input type="submit" name="submit2" value="Delete"/>
  </form>
  <br>
  <!-- Uploader-->
  <form enctype="multipart/form-data" action="uploader.php" method="POST">
    <p>
      <input type="hidden" name="MAX_FILE_SIZE" value="20000000" />
      <label for="uploadfile_input">Or choose a file to upload:</label> <input name="uploadedfile" type="file" id="uploadfile_input" />
      </p>
    <p>
      <input type="submit" value="Upload" />
      </p>
    </form>
  <div>
    <!--Logout button-->
    <form action="logout.php" method="get">
      <input type="submit" name="submit" value="logout"/>
    </form>
  </div>
</div>
</body>
</html>
