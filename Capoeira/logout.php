<?php
	require('user.class.php');
	$user::logout();
	header('Location: index.php');
?>