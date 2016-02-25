<!--This php script uploads and saves the desired file to the correct location -->

<?php
//Reads in file 
$filename = basename($_FILES['uploadedfile']['name']);
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
 //Uploads and saves file to $full_path
if( move_uploaded_file($_FILES['uploadedfile']['tmp_name'], $full_path) ){ 
    header('Location: ' . $_SERVER['HTTP_REFERER']);	    
    exit;	     
}else{
    header("Location: upload_failure.html");
    exit;
}
 
?>