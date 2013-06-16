<?php
/*
** !! This file will run every hour !!
** It can be used to check/update different things
*/

/* MySQL Connection */
$mysql_hostname = "localhost";
$mysql_user = "sparklemon";
$mysql_password = "SLmainRY100";
$mysql_database = "sparklemon";

mysql_connect($mysql_hostname, $mysql_user, $mysql_password) or die(mysql_error());
mysql_select_db($mysql_database) or die(mysql_error());

$date=time();

if ($_SERVER['REMOTE_ADDR']=="")
{
	//Script running from server
	mysql_query("INSERT INTO log_file (message,date) VALUES ('Passed Server Verification','$date')");
}
else
{
	//Script not running from server
	mysql_query("INSERT INTO log_file (message,date) VALUES ('Failed Server Verification, IP: ".$_SERVER['REMOTE_ADDR']."','$date')");
}
?>