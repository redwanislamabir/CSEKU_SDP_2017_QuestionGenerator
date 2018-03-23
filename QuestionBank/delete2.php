<?php

/*

DELETE.PHP

Deletes a specific entry from the 'players' table

*/



// connect to the database


$db_host = 'localhost'; 
$db_user = 'root';
$db_pass = ''; 
$db_name = 'questionbank'; 
$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
if (!$conn) {
	die ('Failed to connect to MySQL: ' . mysqli_connect_error());	
}


// check if the 'id' variable is set in URL, and check that it is valid

if (isset($_GET['id']) && is_numeric($_GET['id']))

{

// get id value

$id = $_GET['id'];



// delete the entry

$result = mysqli_query($conn,"DELETE FROM question WHERE id=$id")

or die(mysqli_error());



// redirect back to the view page

header("Location: moderatorquestionlist.php");

}

else

// if id isn't set, or isn't valid, redirect back to view page

{

header("Location: moderatorquestionlist.php");

}



?>