<?php
/*
**	register.php
**
**	processes the data inputted by the user
**	from ../register.php
*/

require("../php/sql_sanitize.php");
require("../php/settings.php");
require("../php/postmark.php");

$f_name = sql_sanitize($_POST['f_name']);
$l_name = sql_sanitize($_POST['l_name']);
$email = sql_sanitize($_POST['email']);
$password = hasher(sql_sanitize($_POST['password1']));

$back_url = "&fname=".$_POST['f_name']."&lname=".$_POST['l_name']."&email=".$_POST['email'];

///// ERRORS /////

/* email is invalid */
if (!email_validate($_POST['email'])) {
	header("Location: ../account/register.php?error=0".$back_url);
	exit;
}

/* passwords don't match */
if ($_POST['password1'] != $_POST['password2']) {
	header("Location: ../account/register.php?error=1".$back_url);
	exit;
}

/* password is too short */
if (strlen($_POST['password1'])<6) {
	header("Location: ../account/register.php?error=2".$back_url);
	exit;
}

/* email exists */
$result=mysql_query("select * from accounts where email='$email'");
if(mysql_num_rows($result)>0) {
	header("Location: ../account/register.php?error=3".$back_url);
	exit;
}

/* password is too long */
if (strlen($_POST['password1'])>30) {
	header("Location: ../account/register.php?error=4".$back_url);
	exit;
}

/* name is too long */
if (strlen($f_name)>40 || strlen($l_name)>40) {
	header("Location: ../account/register.php?error=5".$back_url);
	exit;
}
/* reCAPTCHA is wrong */
require_once('../php/recaptchalib.php');
$resp = recaptcha_check_answer ($captcha_private_key,
	$_SERVER["REMOTE_ADDR"],
	$_POST["recaptcha_challenge_field"],
	$_POST["recaptcha_response_field"]);
if (!$resp->is_valid) {
	header("Location: ../account/register.php?error=6".$back_url);
	exit;
}

/* Email in use */
if (mysql_num_rows(mysql_query("SELECT id FROM accounts WHERE email='$email' LIMIT 1"))) {
	header("Location: ../account/register.php?error=7".$back_url);
	exit;
}

///// END ERRORS /////

$token = email_token_create($email);

Mail_Postmark::compose()
->addTo($email,$f_name." ".$l_name)
->subject("Spark Lemon Account Confirmation")
->messagePlain("Hello ".$f_name.",\n\nThank you for registering at SparkLemon. To confirm your registration, please click on the following link.\n\n".$prefs_sitebase."/confirm.php?token=".urlencode($token)."&email=".urlencode($email)."&id=0\n\n".$prefs_email_signature)
->send();

$time = time();
mysql_query("INSERT INTO accounts (email, password, confirmed, first_name, last_name, joined, avatar_id, bio) VALUES ('$email', '$password', '0', '$f_name', '$l_name', '$time', '0', '')") or die(mysql_error());

/*// create a token
$token = md5(rand(100,10000000));
mysql_query("INSERT INTO email_tokens (token, email, used, type, date) VALUES ('$token','$email', '0', '0', '$time')") or die(mysql_error());

// send the email
$headers = "From: Game Development Marketplace <accounts@gamedevelopmentmarketplace.com>";
mail($email,"GDM Confirmation","Hello ".$f_name.",\n\nThank you for registering at GDM (pronounced 'gee-dee-emm', if you don't mind). To confirm your registration, please click on the following link.\n\nhttp://upurload.com/gdm/confirm.php?token=".urlencode($token)."&email=".urlencode($email)."&id=0\n\nThanks,\n- Me",$headers);*/
header("Location: ../index.php?msg=0");

?>