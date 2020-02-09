<?php
    $title = "Order Now";
    $css = 'order.css';
    $absPath = false;
    include("../baseView/header.php");

    $item_id = $_GET['id'];

    if ( !isset($_SESSION[Globals::$SESSION_EMAIL]) ) {
        header("Location: ../registration/register.php?tab=login&type=user&nextLink=order&id=$item_id");
    }

    if (isset($_SESSION['email'])) {
        $session_email = $_SESSION["is_customer"];
        $session_email = $_SESSION["email"];
        $customer = $conn->query("SELECT * FROM user WHERE email='$session_email' AND is_customer=1")->fetch();
    }

    // <!-- TODO: SHOW MENU ITEM -->
    include("../logged/showMenuItem.php");
?>

<?php
    // $js = 'index.js';
    include("../baseView/footer.php");
?>