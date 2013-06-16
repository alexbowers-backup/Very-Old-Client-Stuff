<?php
/*
** !! This file will run every hour !!
** It can be used to check/update different things
** Do not link files via relative path
*/

require("/home/sparklemon/public_html/php/cloudfiles.php");
require('/home/sparklemon/public_html/php/settings.php');

$auth = new CF_Authentication("coolist",$prefs_key_cloudfiles);
$auth->authenticate();
$conn = new CF_Connection($auth, $servicenet=True);

$container = $conn->get_container("sparklemon_queued");

$date = time();
$date_expire = time() - 60 * 60 * 24 * 30;

if ($_SERVER['REMOTE_ADDR']=="")
{
	//Script running from server
	//mysql_query("INSERT INTO log_file (message,date) VALUES ('Passed Server Verification','$date')");
	$result = mysql_query("SELECT * FROM user_files");
	while ($row = mysql_fetch_array($result)) {
		$fname = basename($row['file']);
		$fdate = $row['date'];
		$fid = $row['id'];
		if ($fdate < $date_expire && $row['submitted'] == 0) {
			$container->delete_object($fname);
			mysql_query("DELETE FROM user_files WHERE id='$fid'");
		}
	}
}
else
{
	//Script not running from server
	//mysql_query("INSERT INTO log_file (message,date) VALUES ('Failed Server Verification, IP: ".$_SERVER['REMOTE_ADDR']."','$date')");
}
?>
