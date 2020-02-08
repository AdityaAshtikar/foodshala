<?php
    if (isset($_GET['type']) && $_GET['type'] == 'partner') {
        $is_partner = true;
    } else {
        $is_partner = false;
    }
?>

<form method="post" id="register-form">

    <div class="form-group">
        <label for="name">Full Name *</label>
        <?php echo $account->getErrors(Constants::$nmLength); ?>
        <?php echo $account->getErrors(Constants::$onlyLettersAllowed); ?>
        <input required 
            name="name"
            autofocus
            type="text" 
            class="form-control" 
            id="name" 
            aria-describedby="name" 
            placeholder="Enter Your full name"
            value=<?php echo getValues('name'); ?>
        >
    </div>

    <div class="form-group">
        <label for="phone">Phone *</label>
        <?php echo $account->getErrors(Constants::$phoneInv); ?>
        <input required 
            name="phone"
            type="number" 
            class="form-control" 
            id="phone"
            placeholder="Enter Your Phone Number"
            value=<?php echo getValues('phone'); ?>
        >
    </div>

    <div class="form-group">
        <label for="email">Email *</label>
        <?php echo $account->getErrors(Constants::$emLength); ?>
        <?php echo $account->getErrors(Constants::$emExists); ?>
        <input required 
            name="email"
            type="text" 
            class="form-control"
            id="email" 
            aria-describedby="emailHelp" 
            placeholder="Enter Your Email"
            value=<?php echo getValues('email'); ?>
        >
        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
    </div>

    <div class="form-group">
        <label for="pw">Password *</label>
        <?php echo $account->getErrors(Constants::$pwDontMatch); ?>
        <?php echo $account->getErrors(Constants::$pwOnlyNumbersOrLetters); ?>
        <?php echo $account->getErrors(Constants::$pw8chars); ?>
        <input required name="pw" type="password" class="form-control" id="pw" placeholder="Password">
    </div>

    <div class="form-group">
        <label for="pw1">Confirm Password *</label>
        <input required name="pw1" type="password" class="form-control" id="pw1" placeholder="Confirm Password">
    </div>

    <div class="preference-div <?php if ($is_partner) echo " d-none"; ?>">
        <p>Preferences</p>
        <div class="form-group form-check">

            <?php
                $pref = $conn->query("SELECT * FROM food_preference ORDER BY id")->fetchAll();
                foreach ($pref as $row) {
            ?>
                    <input name='preference[]' value="<?php echo $row['id'] ?>" type="checkbox" class="form-check-input" id="<?php echo $row['name'] ?>">
                    <label class="form-check-label" for="<?php echo $row['name']; ?>"><?php echo ucwords($row['name']); ?>.</label>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <?php
                }
            ?>

            <small class="form-text text-muted">You can change these later.</small>
        </div>
    </div>

    <?php if ($is_partner) { ?>
        <input type="hidden" name="is_partner" value="1">
    <?php } ?>

    <input type="submit" name="regSubmit" value="Register" class="btn btn-inline btn-primary">

    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <?php
        $current_uri = $_SERVER['REQUEST_URI'];
        if (strpos($current_uri, 'tab') != false) {
            if ($is_partner) {
                $url = str_replace('?tab=sign&type=partner', '?tab=sign&type=user', $current_uri);
                $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on' ? "https" : "http") . "://" . $_SERVER['HTTP_HOST'] . $url;
            } else {
                if ($_GET['tab'] == 'login') {
                    $url = str_replace('?tab=login&type=user', '?tab=sign&type=partner', $current_uri);
                    $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on' ? "https" : "http") . "://" . $_SERVER['HTTP_HOST'] . $url;
                } else {
                    $url = str_replace('?tab=sign&type=user', '?tab=sign&type=partner', $current_uri);
                    $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on' ? "https" : "http") . "://" . $_SERVER['HTTP_HOST'] . $url;
                }
            }
        } else {
            if ($is_partner) {
                $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on' ? "https" : "http") . "://" . $_SERVER['HTTP_HOST'] . $current_uri . "?tab=sign&type=user";
            } else {
                $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on' ? "https" : "http") . "://" . $_SERVER['HTTP_HOST'] . $current_uri . "?tab=sign&type=partner";
            }
        }
    ?>
    <a href=<?php echo $actual_link; ?> id="partner-register-link">
    <?php if ($is_partner) { ?>
            <small>User Register</small>
    <?php } else { ?>
        <small>Partner/Restaurant Register</small>
    <?php } ?>
    </a>

</form>