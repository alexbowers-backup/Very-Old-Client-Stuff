<?php
/*
**	buy.php
**	Buys an item
*/
require("../php/settings.php");
require("../php/postmark.php");

if (isset($_SESSION['email']))
{
	$email=$_SESSION['email'];
	$query=mysql_query("SELECT * FROM accounts WHERE email='$email' LIMIT 1");
	$row=mysql_fetch_array($query);
	$credits=$row['credits'];
	$user_id=$row['id'];
	$password=$row['password'];
}
else
{
	header("Location: ../account/login.php?error=-1");
}

if (!isset($_SESSION['buy_id']) || $_SESSION['buy_id']!=$_GET['secure_id'])
{
	header("Location: ".$prefs_sitebase."/item.php?error=1&id=".$_GET['item']);
	exit;
}
else
{
	unset($_SESSION['buy_id']);
}

$resource_id=$_GET['item'];

$result=mysql_query("SELECT * FROM resources WHERE id='$resource_id' LIMIT 1");
while ($row=mysql_fetch_array($result)) {
	$i_seller=$row['user_id'];
	$i_price=$row['price'];
	$i_name=$row['name'];
	$i_id=$row['id'];
	$i_sales=$row['sales'];
}

if (hasher($_POST['password'])!=$password)
{
	header("Location: ".$prefs_sitebase."/item.php?error=3&id=".$_GET['item']);
	exit;
}

if ($credits>=$i_price)
{
	$query=mysql_query("SELECT * FROM accounts WHERE email='$email' LIMIT 1");
	$row=mysql_fetch_array($query);
	$f_name=$row['first_name'];
	$l_name=$row['last_name'];
	
	Mail_Postmark::compose()
	->addTo($email,"Sparklemon User")
	->subject("Spark Lemon Item Purchase: ".$i_name)
	->messagePlain("Hello ".$f_name.",\n\nYou have purchased '".$i_name."' item for $".$i_price.".  You can view and download all your purchases on your Spark Lemon account.\n\n".$prefs_email_signature)
	->send();
	
	$new_credits=$credits-$i_price;
	mysql_query("UPDATE accounts SET credits='$new_credits' WHERE id='$user_id'");
	
	$query=mysql_query("SELECT * FROM accounts WHERE id='$i_seller' LIMIT 1");
	$row=mysql_fetch_array($query);
	$new_credits=$row['credits']+($i_price/2);
	mysql_query("UPDATE accounts SET credits='$new_credits' WHERE id='$i_seller'");
	
	$new_sales=$i_sales+1;
	mysql_query("UPDATE resources SET sales='$new_sales' WHERE id='$i_id'");
	
	$date=time();
	mysql_query("INSERT INTO purchases (user_from,user_to,amount,item_id,date,downloads) VALUES ('$user_id','$i_seller','$i_price','$i_id','$date','6')");
	header("Location: ../buyitem.php?bought&id=".$_GET['item']);
}
else
{
	header("Location:  ".$prefs_sitebase."/item.php?error=2&id=".$_GET['item']);
	exit;
}
?>