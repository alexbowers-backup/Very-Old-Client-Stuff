<?php
	$code = mysql_real_escape_string($_GET['code']);
	mysql_query('UPDATE `members` SET `active` = 1 WHERE `activate_code` = "'.$code.'"');
	header('Location: index.php');