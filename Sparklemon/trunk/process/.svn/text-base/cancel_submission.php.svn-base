<?php
/*
** delete_userfile.php
** Removes a users file
*/

require("../php/cloudfiles.php");
require("../php/sql_sanitize.php");
require("../php/settings.php");

$user_id = user_get_id($_SESSION['email']);
$submission_id = sql_sanitize($_GET['id']);

$result = mysql_query("SELECT * FROM resources WHERE id='$submission_id' AND queued='1' AND user_id='$user_id' AND canceled='0' LIMIT 1");
if (mysql_num_rows($result) > 0) {
	$row = mysql_fetch_array($result);
	$thumb = $row['thumbnail'];
	$preview = $row['preview'];
	$file = $row['file'];
}

mysql_query("UPDATE resources SET canceled='1' WHERE id='$submission_id' AND queued='1' AND user_id='$user_id' AND canceled='0' LIMIT 1") or die('Unable to find/cancel sumbission.');

mysql_query("UPDATE user_files SET submitted='0' WHERE id='$thumb' AND owner='$user_id' LIMIT 1");
mysql_query("UPDATE user_files SET submitted='0' WHERE id='$preview' AND owner='$user_id' LIMIT 1");
mysql_query("UPDATE user_files SET submitted='0' WHERE id='$file' AND owner='$user_id' LIMIT 1");

header("Location: ../account/settings.php");

?>