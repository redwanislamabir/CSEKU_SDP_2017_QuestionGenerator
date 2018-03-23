<?php

    if(!isset($_SESSION))
    {
        session_start();
    }

    if(isset($_SESSION['authenticSuperadmin']))
    {
        $id = $_SESSION['authenticSupradmin'];
        
    }
    else
    {
        //echo "not found";
        //header('Location:index.php');
    }
?>