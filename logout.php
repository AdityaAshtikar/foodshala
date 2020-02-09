<?php 
    session_start();
    
    if (!isset($_SESSION['email']))
        header("Location: index.php");
        // header("Location: registration/register.php?tab=login&type=user");

    session_destroy();
    header("Location: index.php");

?>