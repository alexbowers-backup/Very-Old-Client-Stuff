<?php
	$root = '../../';
	session_start();
	require($root . 'lib/php/functions.php');
	
	if(is_logged_in()){
		// logged in, check trial
		//check whether the user has had trial before.
			// if they have then return an error.
			
			// if not then check if they are currently a premium user. If they are, and haven't had trial, add a week onto the trial deadline.
			
		// redirect to homepage with a message saying 'Your now upgraded'
		$uid = $_SERVER['uid'];
		$key = $_SERVER['key'];
		
		
	} else {
		// not logged in. Return with error
		$error = "n";
		$error .= base64_encode(openssl_random_pseudo_bytes(7));
		header('Location: index.php?errorId=' . $error);
	}

?>