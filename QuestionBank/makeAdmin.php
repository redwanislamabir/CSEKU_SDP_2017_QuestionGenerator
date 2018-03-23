<?php
$db_host = 'localhost'; 
$db_user = 'root';
$db_pass = ''; 
$db_name = 'questionbank'; 
$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
if (!$conn) {
	die ('Failed to connect to MySQL: ' . mysqli_connect_error());	
}

    $admin= $_GET['admin'];
    
    $query= "UPDATE user SET admin=1 WHERE id='$admin' "; 
       
    if(mysqli_query($conn, $query)){
        echo 'Successfully approved';
        header("Location: superadmin_view.php");
    }


?>
