<?php
    $title = "Catch Up";
    $css = 'index.css';
    $absPath = true;
    include("baseView/header.php");

    if ( !isset($_SESSION[Globals::$SESSION_EMAIL]) ) {
        header("Location: registration/register.php?tab=login&type=user");
    }

    $session_email = $_SESSION["is_customer"];

    $session_email = $_SESSION["email"];
    $partner_id = $conn->query("SELECT id FROM user WHERE email='$session_email' AND is_customer=0")->fetch()['id'];

    include("logged/addMenuModal.php");
    // <!-- TODO: SHOW ALL MENU ITEMS -->
    include("logged/showAllMenu.php");
    
?>

<?php
    $js = 'index.js';
    include("baseView/footer.php");
?>