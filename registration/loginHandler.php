<?php 
	include("../conn.php");
	include("../keys.php");
	$linkActivated = false;

	if (isset($_POST['loginSubmit'])) {
		$string = strip_tags($_POST['login_email']);
		$password = md5(strip_tags($_POST['login_pw']));

		if (isset($_POST['nextLink'])) {
			$linkActivated = true;
			$orderItemId = strip_tags($_POST['orderItemId']);
			$nextLink = strip_tags($_POST['nextLink']);
		}

		$query = "SELECT * FROM user WHERE email='$string' AND pw='$password'";
		$user = $conn->query($query)->fetch();
		$num_rows = $conn->query($query)->fetchColumn();

		if ($num_rows <= 0) {
			header("Location: register.php?tab=sign&type=user&error=You are Not Registered Yet");
			die();
		} else {
			$username = $user['full_name'];
			$_SESSION[Globals::$SESSION_EMAIL] = $user['email'];
			$_SESSION[Globals::$SESSION_IS_CUSTOMER] = $user['is_customer'];

			$is_customer = $user['is_customer'];

			// checking for remember me button and setting cookie
			// if (isset($_POST['rememberLogin'])) {
			// 	$cookie_token = str_shuffle(md5("qpwoeirutylaksjdhggdmznxbcvvpp_+_+_+_+"));
			// 	$UpdateUserSetCookie = mysqli_query($con, "UPDATE users SET cookieToken='$cookie_token' WHERE username='$username'");
			// 	setcookie("cookieToken", $cookie_token, time() + 60*60*24*7);
			// }
			if ($is_customer && $linkActivated) {
				header("Location: ../ajax/order.php?id=$orderItemId");
			} else {
				header("Location: ../index.php");
			}
		} /* else {
			if ($linkActivated) {
				header("Location: register.php?tab=login&type=user&error=Invalid Login Creds&nextLink=order&id='$item_id'");
			} else {
				header("Location: register.php?tab=login&type=user&error=Invalid Login Creds");
			}
		} */

	}


?>