<!--This php script allows the viewer to add a new user-->
<!DOCTYPE html>
<html>
<head><title>Create User</title></head>
<body>
	<?php
	
	function existingUserCheck($s){
		$h = fopen("/home/mbastola/CSE330/users.txt", "r");
		while(($line = fgets($h)) !== false){
			if($s===substr($line, 0, -1)){
				fclose($h);
				return true;
			}
		}
		fclose($h);
		return false;
	}

	$username = $_POST['newUser'];
	$filename = '/home/mbastola/CSE330/users.txt';
	if(!existingUserCheck($username)){
		if( !preg_match('/^[\w_\-]+$/', $username) ){
     	echo "Invalid username";
     	header("Location: usercreatefail.html");
     	exit;
   		}
		$h = fopen($filename, 'a+');
		fwrite ($h, $username);
		fclose ($h);
		$directoryPath = "/home/mbastola/CSE330/".$username;
		mkdir ($directoryPath, 0777);
		
		echo ("account created");
		header("Location: usercreated.html"); 
	}

	else{
		echo("account already exists");
		header("Location: usercreatefail.html");
	}
	?>
</body>
</html>
