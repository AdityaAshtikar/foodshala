<?php 
	include("../conn.php");

	if (isset($_POST['loginSubmit'])) {
		$string = strip_tags($_POST['login_email']);
		$password = strip_tags($_POST['login_pw']);

		$query = "SELECT * FROM user WHERE email='$string' AND pw='$password'";

		$user = $conn->query($query)->fetch();
		$num_rows = $conn->query($query)->fetchColumn();

		if ($num_rows <= 0) {
			header("Location: register.php?tab=sign&type=user&error=You are Not Registered Yet");
			die();
		}

		$pw = $user['pw'];
		if (md5($password) == $pw) {
			$username = $user['full_name'];
			$_SESSION[Globals::$SESSION_EMAIL] = $user['email'];
			$_SESSION[Globals::$SESSION_IS_CUSTOMER] = $user['is_customer'];

			// checking for remember me button and setting cookie
			// if (isset($_POST['rememberLogin'])) {
			// 	$cookie_token = str_shuffle(md5("qpwoeirutylaksjdhggdmznxbcvvpp_+_+_+_+"));
			// 	$UpdateUserSetCookie = mysqli_query($con, "UPDATE users SET cookieToken='$cookie_token' WHERE username='$username'");
			// 	setcookie("cookieToken", $cookie_token, time() + 60*60*24*7);
			// }
				
			header("Location: index.php");
		} else {
			header("Location: register.php?tab=login&type=user&error=Invalid Login Creds");
		}

	}


?>