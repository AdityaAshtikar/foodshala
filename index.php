<?php
    $title = "Catch Up";
    $css = 'index.css';
    $absPath = true;
    include("baseView/header.php");

    // if ( !isset($_SESSION[Globals::$SESSION_EMAIL]) ) {
    //     header("Location: registration/register.php?tab=login&type=user");
    // }
    
    $logged = false;
    if (isset($_SESSION['email'])) {
        $logged = true;
        $session_email = $_SESSION["is_customer"];
        $session_email = $_SESSION["email"];
        $partner_id = $conn->query("SELECT id FROM user WHERE email='$session_email' AND is_customer=0")->fetch()['id'];
    }

    if (isset($_GET['order'])) {
        ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Order successfully created.</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php
            }

    include("logged/addMenuModal.php");
    include("logged/showAllMenu.php");
?>

<?php
    $js = 'index.js';
    include("baseView/footer.php");
?>