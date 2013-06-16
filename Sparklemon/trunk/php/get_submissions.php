<?php 

// 	require('../php/settings.php');

$email = $_SESSION['email'];
$result = mysql_query("SELECT id FROM accounts WHERE email='$email' LIMIT 1");
if (mysql_num_rows($result)<1) {
	echo 'Non-existant user.';
	exit;
}
$row = mysql_fetch_array($result);
$uid = $row['id'];

$result = mysql_query("SELECT * FROM resources WHERE queued='1' AND canceled='0' ORDER BY id ASC"); // WHERE user_id='$uid'
$numtotal = mysql_num_rows($result);
$output = '';

if ($numtotal < 1) {
	// no files in queue...
}
else {
	$numcount = 0;
	while ($row = mysql_fetch_array($result)) {
		$numcount++;
		if ($row['user_id'] == $uid) {
			$name = $row['name'];
			$fid = $row['id'];
			$extra = '<span style="float: right; margin-top: -2px"><span style="margin-right: 7px; vertical-align: 7px;">'.$numcount.' of '.$numtotal.'</span><a href="'.$prefs_sitebase.'/process/cancel_submission.php?id='.$fid.'"><img src="http://sparklemon.com/images/icons/delete.png" alt="Cancel" title="Cancel Submission?"></a></span>';
			$output .= '<li>'.$name.$extra.'</li>';
		}
	}
}
if ($output != '') {
	echo $output;
}
else {
	echo 'You have no pending submissions.';
}
?>
