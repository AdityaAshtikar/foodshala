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
        <!-- <input name='preference[]' value="non-veg" type="checkbox" class="form-check-input" id="non-veg">
        <label class="form-check-label" for="non-veg">Non-Veg.</label> -->

        <small class="form-text text-muted">You can change these later.</small>
    </div>

    <input type="submit" name="submit" value="Register" class="btn btn-inline btn-primary">
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <a href="#" id="partner-register-link">
        <small>Partner/Restaurant Register</small>
    </a>

</form>