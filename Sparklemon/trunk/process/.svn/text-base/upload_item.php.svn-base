<?php
/*
**	upload_item.php
**
**	uploads an item to be accepted by an admin
*/

require('../php/sql_sanitize.php');
require('../php/settings.php');
require('../php/cloudfiles.php');

set_time_limit(60 * 60 * 24);

if ($_SESSION['email']=="" || !isset($_SESSION['email']))
{
	exit;
}

$auth = new CF_Authentication("coolist",$prefs_key_cloudfiles);
$auth->authenticate();
$conn = new CF_Connection($auth, $servicenet=True);

$container = $conn->get_container("sparklemon_queued");

$new_name=rand(10000,99999)."_".md5(time());

$files_allowed=array('jpeg','jpg','gif','png','zip');

if ((!empty($_FILES["file"])) && ($_FILES['file']['error']==0)) {
	$filename=basename($_FILES['file']['name']);
	$file_extension=substr($filename,strrpos($filename,'.')+1);
	if (in_array(strtolower($file_extension),$files_allowed)) {
		$object=$container->create_object($new_name.".".strtolower($file_extension));
		$object->load_from_filename($_FILES['file']['tmp_name']);
		$url=$object->public_uri(); //URL is public, but link SHOULD be kept private
		$user=user_get_id($_SESSION['email']);
		$date=time();
		$original_name=mysql_real_escape_string($filename);
		
		mysql_query("INSERT INTO user_files (owner,file,original_name,submitted,date) VALUES ('$user','$url','$original_name','0','$date')");
		
		/*echo $new_name.".".$file_extension;*/
		echo '{"name":"'.$_FILES['file']['name'].'","type":"'.$_FILES['file']['type'].'","size":"'.$_FILES['file']['size'].'"}';
	}
	else {
		echo '{"name":"File Not Allowed!"}';
	}
}
else {
	echo '{"name":"File Could Not Upload!"}';
}

?>
