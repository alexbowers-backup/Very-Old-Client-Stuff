<?php
	session_start();
	include('connect.php');
	if(isset($_POST['username'])) {
		$username = $_POST['username'];
		$query = mysql_query("SELECT `user_id` FROM `users` WHERE `username` = '$username'") or die(mysql_error());
	if(mysql_num_rows($query) != 0) {
		$user_id = mysql_result($query,0);
		$unique_id = uniqid();
		$_SESSION['id'] = $unique_id;
		$query2 = mysql_query("INSERT INTO `sessions` (`user_id`,`session_code`) VALUES ('$user_id', '$unique_id') ON DUPLICATE KEY UPDATE `session_code` = '$unique_id'");
		
	} else {
		echo 'Username doesn\'t exist';
	}
	}
	$query3 = mysql_query("SELECT * FROM `sessions` WHERE `session_code` = '".$_SESSION['id']."'");
	if(mysql_num_rows($query3) == 0) {
		unset($_SESSION['id']);
	} else {
		echo 'You are logged in';
	}
	