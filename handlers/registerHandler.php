<?php

	// Array ( [name] => pp [email] => ashtikar.aditya97@gmail.com [pw] => 12345 [pw1] => 12345 [preference] => Array ( [0] => 1 [1] => 2 ) [submit] => Register )

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

		$is_customer = isset($_POST['is_partner']) ? 1 : 0;

		$email = clean($_POST['email']);
		$phone = clean($_POST['phone']);
		$password = clean($_POST['password']);
		$c_password = clean($_POST['c_password']);

		$success = $account->validate($name, $email, $phone, $password, $c_password);

		if ($success) {
			$_SESSION['user_id'] = $username;
			header("Location: index.php");
		} else {
			?>
			<div class="alert alert-success alert-dismissible" id="errorDiv">
				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				<strong>Check your form for Errors</strong>
			</div>
			<?php
		}

	}

?>