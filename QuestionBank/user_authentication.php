<?php

    if(!isset($_SESSION))
    {
        session_start();
    }

    if(isset($_SESSION['authenticUser']))
    {
        $id = $_SESSION['authenticUser'];
        
    }
    else
    {
        //echo "not found";
        //header('Location:index.php');
    }
?>