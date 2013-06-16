<?php

	$username = mysql_real_escape_string($_POST['username']);
	$password = md5($_POST['password']);
	
	$query = sprintf(mysql_query('SELECT `user_id` FROM Users WHERE `username` = "%s" AND `password` = "%s"'),$username,$password);
	
	$rows = mysql_num_rows($query);
	
	if($rows != 0) {
		$return = array();
		$return[0] = 'success';
		$return[1] = mysql_result($query,0);
		return $return;
	} else {
		return false;
	}
?>