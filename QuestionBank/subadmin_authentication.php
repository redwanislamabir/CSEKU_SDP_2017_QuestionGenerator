<?php

    if(!isset($_SESSION))
    {
        session_start();
    }

    if(isset($_SESSION['authenticSubadmin']))
    {
        $id = $_SESSION['authenticSubadmin'];
        
    }
    else
    {
        //echo "not found";
        header('Location:index.php');
    }
?>