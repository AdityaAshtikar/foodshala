<?php
    $title = "Catch Up";
    $css = 'index.css';
    $absPath = true;
    include("baseView/header.php");

    if ( !isset($_SESSION[Globals::$SESSION_EMAIL]) ) {
        header("Location: registration/register.php?tab=login&type=user");
    }

    include("logged/addMenuModal.php");
?>

<!-- TODO: SHOW ALL MENU ITEMS -->

<?php
    $js = 'index.js';
    include("baseView/footer.php");
?>