<?php
/*
** delete_userfile.php
** Removes a users file
*/

require("../php/cloudfiles.php");
require("../php/sql_sanitize.php");
require("../php/settings.php");

$auth = new CF_Authentication("coolist",$prefs_key_cloudfiles);
$auth->authenticate();
$conn = new CF_Connection($auth, $servicenet=True);

$container = $conn->get_container("sparklemon_queued");

$user_id = user_get_id($_SESSION['email']);
$file_id = sql_sanitize($_GET['id']);

//echo $user_id." ".$file_id;

$result = mysql_query("SELECT * FROM user_files WHERE owner='$user_id' AND id='$file_id'");
while ($row = mysql_fetch_array($result)) {
	$fname = basename($row['file']);
	$fid = $row['id'];

	if ($row['submitted'] == 0) {
		$container->delete_object($fname);
		mysql_query("DELETE FROM user_files WHERE id='$fid'");
	}
}

header("Location: ../account/settings.php");
?>
