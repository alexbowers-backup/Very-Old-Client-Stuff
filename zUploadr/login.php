<?php
	require_once('pdo.php');
	require_once('class.error.php');
	require_once('class.user.php');
	$userClass = new user();
	// process login.
	if(isset($_POST['forget_user'])){

		// forgot_user_email
		if(isset($_POST['forget_user_email'])){

			// regex
			// check if exists in database
				// email the username to the person
			$email = filter_var($_POST['forget_user_email'], FILTER_VALIDATE_EMAIL);
			if($email === true){
				$email = $dbh->quote($email);
				$sth = $dbh->query('SELECT username FROM users WHERE email="$email"');
				$sth->setFetchMode(PDO::FETCH_ASSOC);
				if($sth->fetchColumn() > 0){
					// email the username
					$details = $sth->fetch();
					mail($details['email'], 'Your username', 'Your username is: ' . $details['username']);
				} else {
					$error = new error();
					$error::generateID('f');
					$error::errorBody('Email not found in the database');
					$error::db();
					$error::returnAddress('https://zuploadr.com/account/login.php');
				}

			} else {
				$error = new error();
				$error::generateID('g');
				$error::errorBody('Email doesn\'t appear to be valid');
				$error::db();
				$error::returnAddress('https://zuploadr.com/account/login.php');

			}

		}

	} elseif(isset($_POST['forget_pass'])) {

		// forgot_pass_email
		// forget_pass_user
		if(isset($_POST['forget_pass_email']) || isset($_POST['forget_pass_user'])){

			if(isset($_POST['forget_pass_email'])){

				$email = filter_var($_POST['forget_pass_email'], FILTER_VALIDATE_EMAIL);
				if($email === true) {

					$email = $dbh->quote($email);
					$sth = $dbh->query('SELECT email FROM user WHERE email="$email"');
					$sth->setFetchMode(PDO::FETCH_ASSOC);
					if($sth->fetchColumn() > 0) {

						$details = $sth->fetch();
						mail($details['email'], 'You apparently forgot your password', 'If you didnt forget your password, ignore this');

					} else {

						// error, No email matching
						$error = new error();
						$error::generateID('h');
						$error::errorBody('No email matches what you entered');
						$error::db();
						$error::returnAddress('https://zuploadr.com/account/login.php');
					}

				} else {

					// email not valid
					$error = new error();
					$error::generateID('p');
					$error::errorBody('Email doesn\'t appear to be valid');
					$error::db();
					$error::returnAddress('https://zuploadr.com/account/login.php');

				}

			} elseif(isset($_POST['forget_pass_user'])){

				$user = $dbh->quote($_POST['forget_pass_user']);
				$sth = $dbh->query('SELECT email FROM user WHERE username="$user"');
				$sth->setFetchMode(PDO::FETCH_ASSOC);
				if($sth->fetchColumn() > 0) {
					$details = $sth->fetch();
					// email the details
				} else {

					// error, no username matching
					$error = new error();
					$error::generateID('t');
					$error::errorBody('Username doesn\'t exist');
					$error::db();
					$error::returnAddress('https://zuploadr.com/account/login.php');

				}

			} else {

				// error nothing is set
					$error = new error();
					$error::generateID('q');
					$error::errorBody('Nothing entered');
					$error::db();
					$error::returnAddress('https://zuploadr.com/account/login.php');

			}

		}

	} else {

		// username, password, remember me
		if(isset($_POST['login_user']) and isset($_POST['login_pass'])){
			$userClass::login($_POST['login_user'], $_POST['login_pass']);
		} else {
			// error not all details are provided
			$error = new error();
			$error::generateID('r');
			$error::errorBody('Not all details are provided');
			$error::db();
			$error::returnAddress('https://zuploadr.com/account/login.php');
		}

	}

?>