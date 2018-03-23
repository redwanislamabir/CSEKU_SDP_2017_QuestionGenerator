

<?php
$db_host = 'localhost'; 
$db_user = 'root';
$db_pass = ''; 
$db_name = 'questionbank'; 
$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
if (!$conn) {
	die ('Failed to connect to MySQL: ' . mysqli_connect_error());	
}

    $subadmin= $_GET['subadmin'];
    
    $query= "UPDATE user SET subadmin=1 WHERE id='$subadmin' "; 
       
    if(mysqli_query($conn, $query)){
        
        header("Location:superadmin_view.php");
        echo 'Successfully approved';
    }


?>
