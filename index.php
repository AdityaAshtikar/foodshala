<?php
    $title = "Catch Up";
    // $css = 'index.css';
    $absPath = true;
    include("baseView/header.php");

    if ( !isset($_SESSION[Globals::$SESSION_EMAIL]) ) {
        header("Location: registration/register.php?tab=login&type=user&error=invLogin");
    }
?>

<h1>
    <?php echo $logged_user['full_name']; ?>
</h1>

<?php
    // $js = 'auth.js';
    include("baseView/footer.php");
?>


