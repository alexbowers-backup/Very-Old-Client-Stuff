<?php
/*
**	upload_avatar.php
**
**	Upload's a users custum avatar
*/
require("../php/settings.php");
require("../php/image_resize.php");

if (!isset($_SESSION['email'])) {
	header("Location: ../login.php?error=-1");
	exit;
}

$email=$_SESSION['email'];

//Find the users ID
$result=mysql_query("SELECT id FROM accounts WHERE email='$email' LIMIT 1");
if(mysql_num_rows($result)<1) {
	header("Location: ../index.php");
	exit;
}

$row=mysql_fetch_array($result);
$user_id=$row['id'];

///// ERRORS /////

if ($_FILES["file"]["size"]>1024*500) {
	//File size too big
	header("Location: ../avatar.php?error=0");
	exit;
}

if ($_FILES["file"]["error"]>0) {
	//Upload errors
	header("Location: ../avatar.php?error=1");
	exit;
}

$ext=pathinfo($_FILES["file"]["name"],PATHINFO_EXTENSION);
if ($ext!="gif" && $ext!="png" && $ext!="jpg" && $ext!="jepg") {
	//File type incorrect
	header("Location: ../avatar.php?error=2");
	exit;
}

///// END ERRORS /////

if (($_FILES["file"]["type"]=="image/png") || ($_FILES["file"]["type"]=="image/jpeg") || ($_FILES["file"]["type"]=="image/pjpeg") || ($_FILES["file"]["type"]=="image/gif")) {
	$result=mysql_query("SELECT avatar_url FROM avatars WHERE user_id='$user_id' LIMIT 1");
	if(mysql_num_rows($result)>0) {
		mysql_query("DELETE FROM avatars WHERE user_id='$user_id'");
	}
	
	$row=mysql_fetch_array($result);
	$old_file=$row['avatar_url'];
	if ($old_file!="") {
		if (file_exists("../images/avatars/".$old_file)) {
			unlink("../images/avatars/".$old_file);
		}
	}
	
	$new_name=md5(time()).".".$ext;
	$new_file="../images/avatars/".$new_name;
	move_uploaded_file($_FILES["file"]["tmp_name"],$new_file);
	$image=new SimpleImage();
	$type=$image->load($new_file);
	$image->resize(60,60);
	$image->save($new_file,$type);
	mysql_query("INSERT INTO avatars (user_id,avatar_url) VALUES ('$user_id','$new_name')");
	header("Location: ../index.php");
}
else {
	//File type incorrect
	header("Location: ../avatar.php?error=2");
}

?>