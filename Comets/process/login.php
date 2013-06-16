<?php
	if(isset($_GET['process'])){
		require_once('login.class.php');

		$login = new Login();

		$login->email = mysql_real_escape_string($_POST['email']);
		$login->password = mysql_real_escape_string($_POST['password']);
		$errors = array();
		if(!$login->signed_in){
			if($login->user_exists()){
				$result = mysql_query($login->login_query());
				if(mysql_num_rows($result)  == 1){
					$_SESSION['uid'] = mysql_result($result,0);
					$login->signed_in = true;
					$errors[] = "<strong>You've been logged in successfully</strong>";
					unset($_POST);
				} else {
					$errors[] = "The data is incorrect";
				}
			} else {
				$errors[] = "That user doesn't exist";
			}
		} else {
			header('Location: index.php');
		}
	}