<?php
    $linkActivated = false;
    if (isset($_GET['nextLink'])) {
        $linkActivated = true;
        $nextLink = $_GET['nextLink'];
        $orderItemId = $_GET['id'];
    }

?>

<form action="loginHandler.php" method="post" id="login-form">

    <?php if ($linkActivated) { ?>
        <input type="hidden" name="nextLink" value="<?php echo $nextLink; ?>">
        <input type="hidden" name="orderItemId" value="<?php echo $orderItemId; ?>">
    <?php } ?>
    
    <div class="form-group">
        <label for="login_email">Email address</label>
        <input name="login_email" type="email" class="form-control" id="login_email" placeholder="Enter email">
    </div>
    
    <div class="form-group">
        <label for="login_pw">Password</label>
        <input name="login_pw" type="password" class="form-control" id="login_pw" placeholder="Password">
    </div>
    
    <input type="submit" name="loginSubmit" class="btn btn-block btn-primary" value="Login">

</form>