<?php
/*
**	dl_buy.php
**	Buys extra re-downloads
*/
require("../php/settings.php");
require("../php/postmark.php");
require("../php/sql_sanitize.php");


if (isset($_SESSION['email']))
{
	$email=$_SESSION['email'];
	$query=mysql_query("SELECT * FROM accounts WHERE email='$email' LIMIT 1");
	$row=mysql_fetch_array($query);
	$credits=$row['credits'];
	$user_id=$row['id'];
	$password=$row['password'];
}
else {
	header("Location: ../account/login.php?error=-1");
}

if (!isset($_GET['id'])) {
	header("Location:  ".$prefs_sitebase."/account/downloads.php");
}

$file_id = sql_sanitize($_GET['id']);
$i_price = 1; // 5 redownloads is $1


// get file name
$query = mysql_query("SELECT * FROM resources WHERE id='$file_id' LIMIT 1");
$row = mysql_fetch_array($query);
$file_name = $row['name'];


if ($credits>=$i_price)
{
	$query=mysql_query("SELECT * FROM accounts WHERE email='$email' LIMIT 1");
	$row=mysql_fetch_array($query);
	$f_name=$row['first_name'];
	$l_name=$row['last_name'];
	
	Mail_Postmark::compose()
	->addTo($email,"Sparklemon User")
	->subject("Spark Lemon Item Purchase: ".$i_name)
	->messagePlain("Hello ".$f_name.",\n\nYou have purchased 5 extra downloads for ".$file_name.".  You can view and download all your purchases on your Spark Lemon account.\n\n".$prefs_email_signature)
	->send();
	
	// remove credits
	$new_credits=$credits-$i_price;
	mysql_query("UPDATE accounts SET credits='$new_credits' WHERE id='$user_id'");
	
	// add downloads
	$query = mysql_query("SELECT * FROM purchases WHERE user_from='$user_id'");
	while ($row = mysql_fetch_array($query))
	{
		if ($row['item_id'] == $file_id)
		{
			$download = 1;
			$new_downloads = $row['downloads']+5;
			$item_purchase = $row['id'];
			mysql_query("UPDATE purchases SET downloads='$new_downloads' WHERE id='$item_purchase'");
		}
		else { echo 'Error finding purchase.'; }
	}
			
	////
	$date=time();
	//mysql_query("INSERT INTO purchases (user_from,user_to,amount,item_id,date,downloads) VALUES ('$user_id','SL_Server','$i_price',-1,'$date','0')");
	header("Location:  ".$prefs_sitebase."/account/downloads.php");
}
else
{
	header("Location:  ".$prefs_sitebase."/account/downloads.php");
	exit;
}
?>