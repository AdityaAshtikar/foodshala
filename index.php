<?php
    $title = "Catch Up";
    // $css = 'index.css';
    $absPath = true;
    include("baseView/header.php");

    if ( !isset($_SESSION[Globals::$SESSION_EMAIL]) ) {
        header("Location: registration/register.php?tab=login&type=user&error=invLogin");
    }

    $user_email = $_SESSION[Globals::$SESSION_EMAIL];
    $is_customer = $_SESSION[Globals::$SESSION_IS_CUSTOMER];
?>

<?php
    // $js = 'auth.js';
    include("baseView/footer.php");
?>


