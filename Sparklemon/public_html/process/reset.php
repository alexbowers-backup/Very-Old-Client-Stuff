<?php
/*
**	reset.php
**
**	sends password reset email
**	from ../login.php
*/

require("../php/sql_sanitize.php");
require("../php/settings.php");
require("../php/postmark.php");

$email = sql_sanitize($_POST['email']);
$back_url = "&email=".$email;

///// ERRORS /////

/* email exists */
$result=mysql_query("select * from accounts where email='$email' LIMIT 1");
if(mysql_num_rows($result)<1) {
	header("Location: ../account/login.php?code=0&error=0".$back_url);
	exit;
}
/* reCAPTCHA is wrong */
require_once('../php/recaptchalib.php');
$resp = recaptcha_check_answer ($captcha_private_key,
	$_SERVER["REMOTE_ADDR"],
	$_POST["recaptcha_challenge_field"],
	$_POST["recaptcha_response_field"]);
if (!$resp->is_valid) {
	header("Location: ../account/login.php?code=0&error=1".$back_url);
	exit;
}
$row = mysql_fetch_array($result);
$name = $row['first_name'];
$name_l = $row['last_name'];

///// END ERRORS /////

$token = email_token_create($email,1);

/* send the email */
Mail_Postmark::compose()
->addTo($email,$name." ".$name_l)
->subject("Spark Lemon Password Reset")
->messagePlain("Hello ".$name.",\n\nA password reset was requested for your account. If you did not request one, please ignore this email. To reset your password, please click on the following link.\n\n".$prefs_sitebase."/confirm.php?token=".urlencode($token)."&email=".urlencode($email)."&id=1\n\n".$prefs_email_signature)
->send();

header("Location: ../index.php?msg=3");

/*echo 'Success.';
require('../footer.php');*/

?>