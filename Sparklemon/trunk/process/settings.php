<?php
/*
**	settings.php
**
**	processes the data inputted by the user
**	from ../settings.php
*/

require("../php/sql_sanitize.php");
require("../php/settings.php");
require("../php/postmark.php");

$temail = $_SESSION['email'];

$f_name = sql_sanitize($_POST['f_name']);
$l_name = sql_sanitize($_POST['l_name']);
$email = sql_sanitize($_POST['email']);
$country = sql_sanitize($_POST['country']);
if ($country == ' ') { $country = ''; }

$opassword = hasher(sql_sanitize($_POST['opassword']));
$password = hasher(sql_sanitize($_POST['password1']));
$password2 = hasher(sql_sanitize($_POST['password2']));
$passwordRAW = sql_sanitize($_POST['password1']);

//$back_url = "&fname=".$f_name."&lname=".$l_name."&email=".$email.'&con=$country';
$back_url = "&fname=$f_name&lname=$l_name&email=$email&con=$country";

///// ERRORS /////

/* email is invalid */
if (!email_validate($email)) {
	header("Location: ../account/settings.php?error=0".$back_url);
	exit;
}

if ((isset($_POST['opassword']) && isset($_POST['password1']) && isset($_POST['password2'])) && ($_POST['opassword']!="" && $_POST['password1']!="" && $_POST['password2']!="")) {
	/* passwords don't match */
	if ($password != $password2) {
		header("Location: ../account/settings.php?error=1".$back_url);
		exit;
	}
	
	/* password is too short */
	if (strlen($passwordRAW)>=0 && strlen($passwordRAW)<6) {
		header("Location: ../account/settings.php?error=2".$back_url);
		exit;
	}
	
	/* password is too long */
	if (strlen($passwordRAW)>30) {
		header("Location: ../settings.php?error=4".$back_url);
		exit;
	}
}

/* email exists */
$result = mysql_query("select * from accounts where email='$email'");
if(mysql_num_rows($result)>0 && $email!=$temail) {
	header("Location: ../account/settings.php?error=3".$back_url);
	exit;
}

/* name is too long or short */
if ((strlen($f_name)>40 || strlen($l_name)>40) || (strlen($f_name)<=1 || strlen($l_name)<=1)) {
	header("Location: ../account/settings.php?error=5".$back_url);
	exit;
}

/* current password is WRONG! */
$result = mysql_query("SELECT * FROM accounts WHERE email='$temail' LIMIT 1");
if (mysql_num_rows($result)<1) {
	header("Location: ../index.php");
	exit;
}
$row = mysql_fetch_array($result);
$tpw = $row['password'];
$t_country = $row['country'];
$t_fname = $row['first_name'];
$t_lname = $row['last_name'];
if ($tpw != $opassword || $opassword == hasher('')) {
	header("Location: ../account/settings.php?error=6".$back_url);
}
///// END ERRORS /////

/* change first name */
if ($f_name != $t_fname) {
	mysql_query("UPDATE accounts SET first_name='$f_name' WHERE email='$temail'");
}

if ($country != $t_country) {
	mysql_query("UPDATE accounts SET country='$country' WHERE email='$temail'");
}

/* change last name */
if ($l_name != $t_lname) {
	mysql_query("UPDATE accounts SET last_name='$l_name' WHERE email='$temail'");
}

if ($email != $temail) {
	mysql_query("UPDATE accounts SET confirmed='0',email='$email' WHERE email='$temail'"); // un-confirm & set email
	
	$token = email_token_create($email,0);
	
	Mail_Postmark::compose()
	->addTo($email,$t_fname." ".$t_lname)
	->subject("Spark Lemon Email Confirmation")
	->messageHtml(file_get_contents("../email/template_top.txt")."Spark Lemon Email Confirmation".file_get_contents("../email/template_middle.txt").'<p><b>Hello '.$t_fname.',</b></p>
<p>Since you changed your email, you need to confirm it again. Please click on the following link.</p>
<p><a href="'.$prefs_sitebase.'/confirm.php?token='.urlencode($token).'&email='.urlencode($email).'&id=0">'.$prefs_sitebase.'/confirm.php?token='.urlencode($token).'&email='.urlencode($email).'&id=0</a></p>
'.$prefs_email_html_signature.file_get_contents("../email/template_bottom.txt"))
	->messagePlain("Hello ".$t_fname.",\n\nSince you changed your email, you need to confirm it again. Please click on the following link.\n\n".$prefs_sitebase."/confirm.php?token=".urlencode($token)."&email=".urlencode($email)."&id=0\n\n".$prefs_email_signature,$headers)
	->send();
	/*
	// create a token
	mysql_query("INSERT INTO email_tokens (token, email, used, type, date) VALUES ('$token','$email', '0', '0', '$time')") or die(mysql_error());
	
	// send the email
	$headers = "From: Game Development Marketplace <accounts@gamedevelopmentmarketplace.com>";
	mail($email,"GDM Confirmation","Hello ".$f_name.",\n\nSince you changed your email, you need to confirm it again. Please click on the following link.\n\nhttp://upurload.com/gdm/confirm.php?token=".urlencode($token)."&email=".urlencode($email)."&id=0\n\nThanks,\n- SparkLemon Staff",$headers);
	unset($_SESSION['email']);
	setcookie("auth","",time()-1,"/",".upurload.com");*/
}
if (($opassword != $password) && strlen($password)!=0) {
	// change password
	mysql_query("UPDATE accounts SET password='$password' WHERE email='$temail'");
	unset($_SESSION['email']);
}

if ($email != $temail || $opassword != $password) {
	unset($_SESSION['email']);
	setcookie("auth","",time()-1,"/",".sparklemon.com");
	header("Location: logout.php");
}
else
{
	header("Location: ../index.php?msg=4");
}