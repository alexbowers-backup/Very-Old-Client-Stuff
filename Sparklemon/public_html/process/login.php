<?php
/*
**	login.php
**	Process form to log users in
*/
require("../php/sql_sanitize.php");
require("../php/settings.php");

if (isset($_SESSION['email'])) {
	unset($_SESSION['email']);
}

//Login using cookie
if (isset($_COOKIE['auth']) && !isset($_POST['email'])) {
	//Get the number and email
	$values=explode(" ",$_COOKIE['auth']);
	$email=sql_sanitize($values[0]);
	$number=sql_sanitize($values[1]);
	if (mysql_num_rows(mysql_query("SELECT id FROM login_cookies WHERE email='$email' AND number='$number' LIMIT 1"))) {
		if (mysql_num_rows(mysql_query("SELECT id FROM accounts WHERE email='$email' AND confirmed=0 LIMIT 1"))) {
			header("Location: ../account/login.php?error=2&email=".$email);
			exit;
		}
		$_SESSION['email']=$email;
		$new_number=rand(100000000,999999999);
		setcookie("auth",$email." ".$new_number,time()+60*60*24*30,"/",".sparklemon.com"); //CHANGE FOR DOMAIN
		mysql_query("UPDATE login_cookies SET number='$new_number' WHERE number='$number'");
		if (isset($_SESSION['redirect']))
		{
			header("Location: ".urldecode($_SESSION['redirect']));
		}
		else
		{
			header("Location: ../index.php");
		}
	}
	else {
		header("Location: ../account/login.php?error=1&email=".$email);
	}
}

//Login using form
if (isset($_POST['email'])) {
	//Get username/password
	$email=sql_sanitize($_POST['email']);
	$password=hasher(sql_sanitize($_POST['password']));
	
	//Check to see if username/password match
	if (mysql_num_rows(mysql_query("SELECT id FROM accounts WHERE email='$email' AND password='$password' LIMIT 1"))) {
		if (mysql_num_rows(mysql_query("SELECT id FROM accounts WHERE email='$email' AND confirmed=0 LIMIT 1"))) {
			header("Location: ../account/login.php?error=2&email=".$email);
			exit;
		}
		$_SESSION['email']=$email;
		$new_number=rand(100000000,999999999);
		setcookie("auth",$email." ".$new_number,time()+60*60*24*30,"/",".sparklemon.com"); //CHANGE FOR DOMAIN
		mysql_query("INSERT INTO login_cookies (email,number,date) VALUES ('$email','$new_number','".time()."')");
		header("Location: ../index.php");
	}
	else {
		header("Location: ../account/login.php?error=0&email=".$email);
	}
}
?>