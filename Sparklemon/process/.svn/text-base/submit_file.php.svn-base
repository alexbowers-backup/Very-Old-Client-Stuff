<?php
/*
 **  submit_file.php
 **  Adds the users file to the queue for admin approval
 */
require("../php/settings.php");

if ($_SESSION['email'] == "" || !isset($_SESSION['email'])) {
	header("Location: ../account/login.php?error=-1");
	exit;
}

$i_item_name = mysql_real_escape_string($_POST['item_name']);
$i_thumb = mysql_real_escape_string($_POST['thumb']);
$i_preview = mysql_real_escape_string($_POST['preview']);
$i_zip = mysql_real_escape_string($_POST['zip']);
$i_short_desc = mysql_real_escape_string(htmlspecialchars($_POST['short_desc']));
$i_long_desc = mysql_real_escape_string(htmlspecialchars($_POST['long_desc']));
$i_price = mysql_real_escape_string(number_format($_POST['price'],2));
$i_tags = mysql_real_escape_string($_POST['tags']);
$i_cat1 = mysql_real_escape_string($_POST['cat1']);
$i_cat2 = mysql_real_escape_string($_POST['cat2']);

$back_url = $prefs_sitebase . "/submit.php?name=" . urlencode($i_item_name) . "&short_desc=" . urlencode($i_short_desc) . "&long_desc=" . urlencode($i_long_desc) . "&price=" . urlencode($i_price) . "&tags=" . urlencode($i_tags);


///// ERRORS /////

/* reCAPTCHA is wrong */
require_once('../php/recaptchalib.php');
$resp = recaptcha_check_answer($captcha_private_key, $_SERVER["REMOTE_ADDR"], $_POST["recaptcha_challenge_field"], $_POST["recaptcha_response_field"]);
if (!$resp->is_valid) {
	header("Location: " . $back_url . "&error=0");
	exit;
}

/* Short description is longer than 120 chars */
if (strlen($i_short_desc) > 120 || strlen($i_short_desc) == "") {
	header("Location: " . $back_url . "&error=1");
	exit;
}

/* Long description is longer than 10000 chars */
if (strlen($i_long_desc) > 10000) {
	header("Location: " . $back_url . "&error=2");
	exit;
}

/* Name is longer than 30 or shorter than 5 */
if (strlen($i_item_name) > 30 || strlen($i_item_name) < 5) {
	header("Location: " . $back_url . "&error=5");
	exit;
		}

/* Price isn't in between $1 and $100 */
if ($i_price < 1 || $i_price > 100) {
	header("Location: " . $back_url . "&error=3");
	exit;
}

/* All files not selected */
if ($i_thumb == "blank" || $i_preview == "blank" || $i_zip == "blank") {
	header("Location: " . $back_url . "&error=4");
	exit;
}

//Add to table
if ($i_long_desc == "") {
	$i_long_desc = $i_short_desc;
}
$i_date = time();
$i_user_id = user_get_id($_SESSION['email']);

$m = mysql_query("INSERT INTO resources (user_id,name,type,subtype,queued,short_description,long_description,thumbnail,preview,tags,price,file,date) VALUES ('$i_user_id','$i_item_name','$i_cat1','$i_cat2','1','$i_short_desc','$i_long_desc','$i_thumb','$i_preview','$i_tags','$i_price','$i_zip','$i_date')");

//Change file storage setting
mysql_query("UPDATE user_files SET submitted='1' WHERE id='$i_thumb'");
mysql_query("UPDATE user_files SET submitted='1' WHERE id='$i_preview'");
mysql_query("UPDATE user_files SET submitted='1' WHERE id='$i_zip'");

if (!$m) {
	echo "MySQL Error: ".mysql_error();
}
else {
	header("Location: " . $prefs_sitebase . "/submit.php?sucess");
	exit;
}

?>