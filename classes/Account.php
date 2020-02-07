<?php 

	include_once('../keys.php');

	class Account {
		private $con;
		private $errors;

		public function __construct($con) {
			$this->con = $con;
			$this->errors = array();
		}

		public function validate($name, $em, $phone, $pw1, $pw2) {
			$this->checkName($name);
			$this->checkEmail($em);
			$this->checkPhone($phone);
			$this->checkPassword($pw1, $pw2);

			if (empty($this->errors)) {
				// insert user
				return $this->insertUser($name, $em, $phone, $pw1);
			} else {
				return false;
			}
		}

		// inserts and sends email
		private function insertUser($name, $em, $phone, $pw1) {
			// $pw = password_hash($pw1, PASSWORD_BCRYPT);
			$pw = md5($pw1);
			$profilePic = "assets/images/profilePic/default.png";-

			$created = date($CURRENT_TIMESTAMP_FORMAT);
			
			$isfaculty = 1;
			
			$insert = mysqli_query($this->con, "INSERT INTO users () VALUES ('$name', '$em', '$phone', '$pw', '$profilePic', '$created')");
				
			if ($insert) {
				return true;
			} else {
				return false;
			}
		}

		// to be used in form - server side errors
		public function getErrors($error) {
			if (!in_array($error, $this->errors)) {
				$error = "";
			} else {
				return "<span style='color: red;'>$error</span><br>";
			}
		}

		private function checkName($string) {
			// length
			if (strlen($string) <=2 || strlen($string) >= 60) {
				array_push($this->errors, Constants::$nmLength);
				return;
			}
		}

		private function checkUserName($string) {
			// length
			if (strlen($string) <=2 || strlen($string) >= 60) {
				array_push($this->errors, Cons-tants::$nmLength);
				return;
			}

			// pattern
			if (!preg_match('/[A-Za-z]/', $string)) {
				array_push($this->errors, Constants::$onlyLettersAllowed);
				return;
			}

			// already exists
			$result = mysqli_query($this->con, "SELECT username FROM users WHERE username='$string'");
			if (mysqli_num_rows($result)) {
				array_push($this->errors, Constants::$unExists);
				return;
			}
		}

		private function checkEmail($string) {
			// valid email address
			if (!filter_var($string, FILTER_VALIDATE_EMAIL)) {
				array_push($this->errors, Constants::$emLength);
				return;
			}

			// already exists
			$result = mysqli_query($this->con, "SELECT email FROM users WHERE email='$string'");
			if (mysqli_num_rows($result) >0) {
				array_push($this->errors, Constants::$emExists);
				return;
			}
		}

		private function checkPhone($string) {
			// length
			if (strlen($string)!=10) {
				array_push($this->errors, Constants::$phoneInv);
				return;
			}

			// only numbers
			if (!preg_match('/[0-9]/', $string)) {
				array_push($this->errors, Constants::$phoneInv);
				return;
			}
		}

		private function checkPassword($pw1, $pw2) {
			// checking if the paswords match
			if ($pw1 != $pw2) {
				array_push($this->errors, Constants::$pwDontMatch);
				return;
			}

			// checking if the password contains anything other than A-Z or a-z or 0-9
			if (!preg_match('/[A-Za-z0-9]/', $pw1)) {
				array_push($this->errors, Constants::$pwOnlyNumbersOrLetters);
				return;
			}

			// checking if length is atleast 8
			if (strlen($pw1)<8) {
				array_push($this->errors, Constants::$pw8chars);
				return;
			}
		}

	}

?>