<?php
    $title = "Registration";
    $css = 'auth.css';
    include("../baseView/header.php");

    // tab=login&type=user
    if (isset ($_GET['tab'])) {
        $tab = $_GET['tab'];
        $type = $_GET['type'];
    }
?>

<div class="d-none">
    <input type="text" id="auth_tab" value=<?php echo $tab; ?>>
    <input type="text" id="auth_type" value=<?php echo $type; ?>>
</div>

<div class="h-100 row align-items-center auth-form-div">

    <div class="row auth-tabs">
        <div class="col-md-6 tab reg-tab">Sign Up</div>
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