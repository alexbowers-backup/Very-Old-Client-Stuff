<?php
	if(isset($_GET['process'])){
		require_once('register.class.php');
		$register = new Register();
		$register->firstname = mysql_real_escape_string($_POST['first_name']);
		$register->lastname = mysql_real_escape_string($_POST['last_name']);
		$register->email = mysql_real_escape_string($_POST['email']);
		$register->password = mysql_real_escape_string($_POST['password']);
		$register->password_confirm = mysql_real_escape_string($_POST['password_confirmation']);
		$register->address = mysql_real_escape_string($_POST['address']);
		$register->dob = mysql_real_escape_string($_POST['dob']);
		$errors = array();

		if($register->user_exists()){
			$errors[] = "That user already exists";	
		} else {
			if($register->password_validate() === false){
				$errors[] = "Your passwords don't match";
			}
			if(empty($register->firstname)){
				$errors[] = "There was an issue with your first name";
			}
			if(empty($register->lastname)){
				$errors[] = "There was an issue with your last name";
			}
			if(empty($register->address)){
				$errors[] = "There was an issue with your address";
			}
			if(!$register->email_validate()){
				$errors[] = "There was an issue with your email address";
			}
			if(empty($errors)){
				mysql_query($register->register_query());
				echo mysql_error();
				$errors[] = "<strong>You have been successfully registered!</strong>"; // Not an error, but the output is already coded, so its easier this way.
				unset($_POST);
			}
		}
	}