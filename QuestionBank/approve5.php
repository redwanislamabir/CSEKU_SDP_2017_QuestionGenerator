<?php
$db_host = 'localhost'; 
$db_user = 'root';
$db_pass = ''; 
$db_name = 'questionbank'; 
$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
if (!$conn) {
	die ('Failed to connect to MySQL: ' . mysqli_connect_error());	
}

    $approve= $_GET['approve'];
    
    $query= "UPDATE question SET approval=1 WHERE id='$approve'"; 
       
    if(mysqli_query($conn, $query)){
        echo 'Successfully approved';
        header("Location: questionlist.php");
    }


?>