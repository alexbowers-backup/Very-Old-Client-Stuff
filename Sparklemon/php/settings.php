<?php
//if (substr_count($_SERVER['HTTP_ACCEPT_ENCODING'], 'gzip')) ob_start("ob_gzhandler"); else ob_start();
// ^ GZIP

/*
**	settings.php
**	defines some common things
*/
session_start();

/* Variable settings */
$prefs_sitebase = "http://zando.co.uk/zando/sparklemon";
$prefs_email_address = "noreply@sparklemon.com";
$prefs_email_title = "Spark Lemon";
$prefs_email_signature = "Thanks,\n- Spark Lemon Staff";
$prefs_email_html_signature = "<p>Thanks,<br /><i>- Spark Lemon Staff</i></p>";
$prefs_key_cloudfiles = "80189a282f01a88c669f62338eca954d";

/* MySQL Connection */
$mysql_hostname = "localhost";
$mysql_user = "root";
$mysql_password = "qrpjeots";
$mysql_database = "sparklemon";

/* Postmark Mail API */
define('POSTMARKAPP_API_KEY','62234b61-c778-4a14-9943-e0f557b04cfd');
define('POSTMARKAPP_MAIL_FROM_ADDRESS','noreply@sparklemon.com');
define('POSTMARKAPP_MAIL_FROM_NAME','Spark Lemon');

$captcha_private_key = "6LdpR8ASAAAAALdkex02KmrpgWU2Q7-Fgn6WEcH8";
$captcha_public_key = "6LdpR8ASAAAAAE1Nfx52pt7bPCXhJ7OkdvoOsWcV";

mysql_connect($mysql_hostname, $mysql_user, $mysql_password) or die(mysql_error());
mysql_select_db($mysql_database) or die(mysql_error());

/* Form Defaults (HTML5 Placeholders) */
$prefs_form_default = array("fname" => "Robert", "lname" => "Smith", "email" => "example@nowhere.com", "password" => "&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;", "credits" => "0.00");

/* Beginning of some functions */
function hasher($hashString) {
    return '0ced76fb3'.sha1('f97d982c9'.$hashString);
}

function gravatar_get($email) {
	$gravatar = 'http://www.gravatar.com/avatar/' . md5($email) . '?s=64';
	echo '<img src="' . $gravatar . '" class="gravatar" />';
}
function gravatar_get_url($email) {
	echo 'http://www.gravatar.com/avatar/' . md5($email) . '?s=64';
}

/* validates a given email */
function email_validate($email) {
	$pattern = "/^([\w\!\#$\%\&\'\*\+\-\/\=\?\^\`{\|\}\~]+\.)*[\w\!\#$\%\&\'\*\+\-\/\=\?\^\`{\|\}\~]+@((((([a-z0-9]{1}[a-z0-9\-]{0,62}[a-z0-9]{1})|[a-z])\.)+[a-z]{2,6})|(\d{1,3}\.){3}\d{1,3}(\:\d{1,5})?)$/i";
	if (preg_match($pattern, $email)) {
		 return true;
	}
	else {
		return false;
	}
}

/* Find the users ID */
function user_get_id($email) {
	$result=mysql_query("SELECT id FROM accounts WHERE email='$email' LIMIT 1");
	if(mysql_num_rows($result)>0) {
		$row=mysql_fetch_array($result);
		return $row['id'];	
	}
}

function user_get_position($pos) {
	switch ($pos) {
		case 1:
		return '<span class="highlight orange">Admin</span>';
		break;
		
		default:
		return '<span class="highlight green">Member</span>';
		break;
	}
}

/* Find the users avatar URL */
function user_get_avatar($user_id) {
	$result=mysql_query("SELECT avatar_url FROM avatars WHERE user_id='$user_id' LIMIT 1");
	if(mysql_num_rows($result)>0) {
		$row=mysql_fetch_array($result);
		return $row['avatar_url'];	
	}
	else
	{
		return "avatar_default.png";
	}
}

/* Get a users name and email */
function user_get_name($user_id) {
	$result=mysql_query("SELECT * FROM accounts WHERE id='$user_id' LIMIT 1");
	if(mysql_num_rows($result)>0) {
		$row=mysql_fetch_array($result);
		return $row['first_name']." ".$row['last_name']." (".$row['email'].")";
	}
}

/* Get a users name only */
function user_get_name_only($user_id) {
	$result=mysql_query("SELECT * FROM accounts WHERE id='$user_id' LIMIT 1");
	if(mysql_num_rows($result)>0) {
		$row=mysql_fetch_array($result);
		return $row['first_name']." ".$row['last_name'];
	}
}

function email_token_create($n_email,$n_type) {
	/* create a token */
	$t = md5(rand(100,10000000));
	$time = time();
	mysql_query("INSERT INTO email_tokens (token, email, used, type, date) VALUES ('$t','$n_email', '0', '$n_type', '$time')") or die(mysql_error());
	
	return $t;
}
?>
