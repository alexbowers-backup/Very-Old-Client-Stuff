<?php
/*
**	password.php
**
**	resets user's password
**	from ../confirm.php
*/

require("../php/sql_sanitize.php");
require("../php/settings.php");

$token = sql_sanitize($_GET['token']);
$email = sql_sanitize($_GET['email']);
$type = sql_sanitize($_GET['type']);
$password = hasher(sql_sanitize($_POST['password1']));

$back_url = "&token=".$token."&email=".$email."&id=1";

///// ERRORS /////

/* -- ERROR CHECKING -- */
if ($_POST['password1'] != $_POST['password2']) { // passwords don't match
	header("Location: ../confirm.php?error=0".$back_url);
	exit;
}
if (strlen($_POST['password1'])<6) { // too short!
	header("Location: ../confirm.php?error=1".$back_url);
	exit;
}
/* -- END -- */

mysql_query("UPDATE email_tokens SET used='1' WHERE token='$token' AND email='$email' AND type='$type'");
mysql_query("UPDATE accounts SET password='$password' WHERE email='$email'");

header("Location: ../index.php?msg=2");

?>