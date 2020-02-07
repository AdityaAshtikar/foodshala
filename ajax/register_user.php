<?php

	function clean($string) {
		return strip_tags($string);
	}

	function clean_name($string) {
		$str = strip_tags($string);
		$string = preg_replace('/\s+/', '', $str);
		return $string;
	}

	if (isset($_POST['submit'])) {
		$name = clean_name($_POST['name']);

        $is_customer = isset($_POST['is_partner']) ? 0 : 1;
        $food_preferences = isset($_POST['preference']) ? $_POST['preference'] : null;

		$email = clean($_POST['email']);
		$phone = clean($_POST['phone']);
		$password = clean($_POST['pw']);
		$c_password = clean($_POST['pw1']);
		$success = $account->validate($name, $email, $phone, $password, $c_password, $is_customer, $food_preferences);

		if ($success) {
            $_SESSION['email'] = $email;
            $_SESSION['is_customer'] = $is_customer;
            // echo "success: " . $food_preferences;
			header("Location: ../index.php");
		} // else {
			?>
			<div class="alert alert-success alert-dismissible" id="errorDiv">
				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				<strong>Could Not Register User, Try Again</strong>
			</div>
			<?php 
		// }
	}
?>