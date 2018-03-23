<?php

session_start();
$id = $_POST['check'];
echo $id;
$db_host = 'localhost'; 
$db_user = 'root';
$db_pass = ''; 
$db_name = 'questionbank'; 
$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
if (!$conn) {
  die ('Failed to connect to MySQL: ' . mysqli_connect_error());  
}


    $query= "UPDATE user SET  subadmin=0 WHERE id='$id'"; 

    $result= mysqli_query($conn, $query);
    if(!$result){
        die(mysqli_errno($conn));
    }
    header("Location: superadmin_view.php");

?>
