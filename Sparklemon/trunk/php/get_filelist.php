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
		$fid = $row['id'];

		$extra = "";

		if ($row['submitted'] == 0) {
			//$extra = '<a href="'.$prefs_sitebase.'/process/delete_userfile.php?id='.$fid.'" style="float: right;">[Delete]</a>';
			$extra = '<a href="'.$prefs_sitebase.'/process/delete_userfile.php?id='.$fid.'" style="float: right; margin-top: -2px"><img src="http://sparklemon.com/images/icons/delete.png" alt="Delete" title="Delete?"></a>';
		}
		else {
			//$extra = '<span style="float: right;">[Submitted]</span>';
			$extra = '<span style="float: right; margin-top: -2px"><img src="http://sparklemon.com/images/icons/submitted.png" alt="Submitted" title="Submitted"></span>';
		}
		//echo '<li><a href="'.$furl.'">'.$fname.'</a></li>';
		
		if ($tempfile == $fid) { $selected = ' selected'; }
		else { $selected = ''; }
		
		if (isset($listMode) && $listMode == 1) { echo '<option value="'.$fid.'"' . $selected . '>'.$fname.'</option>'; }
		else { echo '<li>'.$fname.$extra.'</li>'; }
	}
}
//echo ' <em>{ uid = '.$uid.'; time = '.time().'}</em>';

?>
