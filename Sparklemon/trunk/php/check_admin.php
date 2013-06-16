<?php

if (isset($_SESSION['email'])) {
	$email=$_SESSION['email'];
	if (mysql_num_rows(mysql_query("SELECT * FROM accounts WHERE email='$email' AND admin=1"))<1) {
		header("Location: ".$prefs_sitebase);
		exit;
	}
}
else {
	header("Location: ".$prefs_sitebase);
	exit;
}

?>