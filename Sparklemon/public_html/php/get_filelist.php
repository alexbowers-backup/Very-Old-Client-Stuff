<?php 

if (!isset($listMode)) { require('../php/settings.php'); }


$email = $_SESSION['email'];
$result = mysql_query("SELECT id FROM accounts WHERE email='$email' LIMIT 1");
if (mysql_num_rows($result)<1) {
	echo 'Non-existant user.';
	exit;
}
$row = mysql_fetch_array($result);
$uid = $row['id'];

$result = mysql_query("SELECT * FROM user_files WHERE owner='$uid'");
if (mysql_num_rows($result)<1) {
	echo 'You have no files.';
}
else {
	while ($row = mysql_fetch_array($result)) {	
		$fname = $row['original_name'];
		$furl = $row['file'];
		//echo '<li><a href="'.$furl.'">'.$fname.'</a></li>';
		if (isset($listMode) && $listMode == 1) { echo '<option value="'.$fname.'">'.$fname.'</option>'; }
		else { echo '<li>'.$fname.'</li>'; }
	}
}
//echo ' <em>{ uid = '.$uid.'; time = '.time().'}</em>';

?>