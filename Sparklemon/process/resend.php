<?php
/*
**	resend.php
**
**	processes the data inputted by the user
**	from ../login.php
*/

require("../php/sql_sanitize.php");
require("../php/settings.php");
require("../php/postmark.php");

$email = sql_sanitize($_POST['email']);
$back_url = "&code=1&email=".$email;

/* -- ERRORS -- */

/* email is confirmed or doesn't exist */
$result = mysql_query("SELECT * FROM accounts WHERE email='$email' AND confirmed='0' LIMIT 1");
if(mysql_num_rows($result)<1) {
	header("Location: ../account/login.php?error=0".$back_url);
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
/* END ERRORS */

$token = email_token_create($email,0);

/* send the email */
Mail_Postmark::compose()
->addTo($email,"Sparklemon User")
->subject("Spark Lemon Account Confirmation")
->messageHtml(file_get_contents("../email/template_top.txt")."Spark Lemon Account Confirmation".file_get_contents("../email/template_middle.txt").'<p><b>Hello '.$f_name.',</b></p>
<p>Since you changed your email, you need to confirm it again. Please click on the following link.</p>
<p><a href="'.$prefs_sitebase.'/confirm.php?token='.urlencode($token).'&email='.urlencode($email).'&id=0">'.$prefs_sitebase.'/confirm.php?token='.urlencode($token).'&email='.urlencode($email).'&id=0</a></p>
'.$prefs_email_html_signature.file_get_contents("../email/template_bottom.txt"))
->messagePlain("Hello ".$f_name.",\n\nSince you changed your email, you need to confirm it again. Please click on the following link.\n\n".$prefs_sitebase."/confirm.php?token=".urlencode($token)."&email=".urlencode($email)."&id=0\n\n".$prefs_email_signature)
->send();

unset($_SESSION['email']);
setcookie("auth","",time()-1,"/",".upurload.com");

header("Location: ../index.php?msg=5");

?>