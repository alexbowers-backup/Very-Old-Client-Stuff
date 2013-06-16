<?php
/*
**	upload_item.php
**
**	uploads an item to be accepted by an admin
*/

require("../php/sql_sanitize.php");
require("../php/settings.php");
require('../php/cloudfiles.php');

$auth = new CF_Authentication("coolist",$prefs_key_cloudfiles);
$auth->authenticate();
$conn = new CF_Connection($auth, $servicenet=True);

$container = $conn->get_container("sparklemon_queued");

$new_name=md5(time());

$files_allowed=array("jpeg","jpg","png","zip");

if ((!empty($_FILES["file"])) && ($_FILES['file']['error']==0)) {
	$filename=basename($_FILES['file']['name']);
	$file_extension=substr($filename,strrpos($filename,'.')+1);
	if (in_array($file_extension,$files_allowed)) {
		$object=$container->create_object($new_name.".".$file_extension);
		$object->load_from_filename($_FILES['file']['tmp_name']);
		/*echo $new_name.".".$file_extension;*/
		echo '{"name":"'.$_FILES['file']['name'].'","type":"'.$_FILES['file']['type'].'","size":"'.$_FILES['file']['size'].'"}';
	}
	else {
		echo "Extension error.";
	}
}
else {
	echo "An error has occured.";
}

?>