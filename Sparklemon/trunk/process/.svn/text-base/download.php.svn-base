<?php
/*
**	download.php
**	Downloads a file from the rackspace API if a user owns it
*/
require('../php/settings.php');
require('../php/cloudfiles.php');

$file_id = mysql_real_escape_string( (int) $_GET['id']);
$file_name = "";

// require the user to be logged in and valid
$email = $_SESSION['email'];
$user_id = user_get_id($email);
$result = mysql_query("SELECT * FROM accounts WHERE email='$email' LIMIT 1");
if (mysql_num_rows($result)<1) {
	header("Location: ../account/login.php?error=-1");
	exit;
}

$download = 0;
$error = 3;

// get resource info
$query = mysql_query("SELECT * FROM resources WHERE id='$file_id' LIMIT 1");
while ($row = mysql_fetch_array($query)) {
	$error = 2;
	if( $user_id != $row['user_id']) {
		$query2 = mysql_query("SELECT * FROM purchases WHERE user_from='$user_id'");
		while ($row2 = mysql_fetch_array($query2)) {
			$error = 1; 
			if (/*$row2['downloads'] > 0 && */$row2['item_id'] == $row['id'])
			{
				$error = 0;
				$download = 1;
				$new_downloads = $row2['downloads']+1;
				$item_purchase = $row2['id'];
				$dl_file=$row['file'];
				mysql_query("UPDATE purchases SET downloads='$new_downloads' WHERE id='$item_purchase'");
			}
		}
	} else {
		$error = 0;
		$download = 1;
		$dl_file=$row['file'];
	}
}

if ($download==1)
{
	$mysql = mysql_query("SELECT * FROM files WHERE id='$dl_file'");
	while ($row = mysql_fetch_array($mysql)) {
		$file_name = $row['file_link'];
	}
	if ($file_name != "") {
		$auth = new CF_Authentication("coolist",$prefs_key_cloudfiles);
		$auth->authenticate();
		$conn = new CF_Connection($auth, $servicenet=True);
		
		$my_docs = $conn->get_container("sparklemon_files");
		$doc = $my_docs->get_object($file_name);
		
		header("Pragma: public");
		header("Expires: 0");
		header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
		header("Cache-Control: public");
		header("Content-Description: File Transfer");
		header("Content-Type: ".$doc->content_type);
		header('Content-Disposition: attachment; filename="'.$file_name.'"');
		header("Content-Transfer-Encoding: binary");
		header("Content-Length: ".$doc->content_length);
		$output = fopen("php://output", "w");
		$doc->stream($output);
		fclose($output);
	}
}
else
{
	echo "An error has occured -  Error " . $error . ".";
}
?>
