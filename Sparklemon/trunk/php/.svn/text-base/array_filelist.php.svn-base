<?php 

$stack = array();

$email = $_SESSION['email'];
$result = mysql_query("SELECT id FROM accounts WHERE email='$email' LIMIT 1");
if (mysql_num_rows($result)<1) { exit; }
$row = mysql_fetch_array($result);
$uid = $row['id'];

$result = mysql_query("SELECT * FROM user_files WHERE owner='$uid'");
if (mysql_num_rows($result)<1) { /* nothing happens... */ }
else {
	while ($row = mysql_fetch_array($result)) {	
		array_push($stack,$row['original_name']);
	}
}

?>