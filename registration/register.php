<?php
    $title = "Registration";
    $css = 'auth.css';
    include("../baseView/header.php");
    if (isset($_SESSION[Globals::$SESSION_EMAIL])) {
        header("Location: ../index.php");
    }

    // tab=login&type=user
    if (isset ($_GET['tab'])) {
        $tab = $_GET['tab'];
        // $type = $_GET['type'];
    }

    include("../classes/Account.php");
    include("../classes/Constants.php");
    $account = new Account($conn);
    
    function getValues($string) {
        if (isset($_POST[$string])) {
            return $_POST[$string];
		}
	}
    include("../ajax/register_user.php");
?>

<?php if (isset($_GET['error'])) {
    $error = $_GET['error'];
    if ($error == 'invLogin') $errorMsg = "Login First";
?>
    <div class="alert alert-success alert-dismissible" id="errorDiv">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong><?php echo $errorMsg ?></strong>
    </div>
<?php } ?>

<div class="d-none">
    <input type="text" id="auth_tab" value=<?php echo $tab; ?>>
</div>

<div class="h-100 row align-items-center auth-form-div">

    <div class="row auth-tabs">
        <div class="col-md-6 tab reg-tab active-auth-tab">Sign Up</div>
        <div class="col-md-6 tab login-tab">Login</div>
    </div>

    <div class="col">
        <div class="auth-forms">
            
            <div class="register-form">
                <?php include("user_register_form.php"); ?>
            </div>

            <div class="login-form d-none">
                <?php include("login.php"); ?>
            </div>

        </div>
    </div>
</div>

<?php
    $js = 'auth.js';
    include("../baseView/footer.php");
?>