<?php
/*
**	user_payment.php
**
**	deals with user payment requests
*/

require("../php/settings.php");

if ($_GET['type'] == 0)
{
	$user_id = user_get_id($_SESSION['email']);

	$query = mysql_query("SELECT * FROM user_payments WHERE user='$user_id' AND complete='0' LIMIT 1");
	if (mysql_num_rows($query) > 0)
	{
		header("Location: ../account/settings.php?error=7");
		exit;
	}

	$query = mysql_query("SELECT * FROM accounts WHERE id='$user_id' LIMIT 1");
	$row = mysql_fetch_array($query);

	if ($row['credits'] < 15)
	{
		header("Location: ../account/settings.php?error=8");
		exit;
	}

	mysql_query("INSERT INTO user_payments (user, date, amount, complete) VALUES ('$user_id','0','0','0')");

	header("Location: ../index.php?msg=6");
}

if ($_GET['type'] == 1)
{
	require("../php/check_admin.php");

	$query = mysql_query("SELECT * FROM user_payments WHERE id='" . $_GET['id'] . "' LIMIT 1");
	$row = mysql_fetch_array($query);
	$user_id = $row['user'];
	$query = mysql_query("SELECT * FROM accounts WHERE id='$user_id' LIMIT 1");
	$row = mysql_fetch_array($query);
	$amount = $row['credits'];

	mysql_query("UPDATE user_payments SET date='" . time() . "', amount='$amount', complete='1' WHERE id='" . $_GET['id'] . "'");

	header("Location: ../admin/payment_requests.php");
}
?>
