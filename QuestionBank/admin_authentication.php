<?php


    
    if(!isset($_SESSION))
    {
        session_start();
    }

    if(isset($_SESSION['authenticAdmin']))
    {
        $id = $_SESSION['authenticAdmin'];
        
    }
    else
    {
        $error = 'You are not an admin..  Please log in or registered as an Admin ';
        //echo " You are not an admin..  Please log in or registered as an Admin ";

        header('Location:index.php');
    }
?>