<?php
require('../php/settings.php');
include('../php/cookie_login.php');
include('../php/check_admin.php');
$page_title = "Payment Requests";
include("../header.php");
?>
<h1>Payment Requests</h1>
<p>View payment requests here.  Mark as complete when payment is done.<br /><br />
<a href="index.php">&lt; back</a>
</p>
<table class="normal">
	<tr>
		<th scope="col">User</th>
		<th scope="col">Amount</th>
		<th scope="col">Date</th>
		<th scope="col">Payed</th>
	</tr>
	<?php
	$query=mysql_query("SELECT * FROM user_payments ORDER BY id DESC");
	while ($row=mysql_fetch_array($query))
	{
		$user_id = $row['user'];
		$query2 = mysql_query("SELECT * FROM accounts WHERE id='$user_id' LIMIT 1");
		$row2 = mysql_fetch_array($query2);

		if ($row['complete'] == 0)
		{
		echo '
		<tr>
			<td>' . $row2['first_name'] . " " . $row2['last_name'] . "(" . $row2['email'].')</td>
			<td>Not Sent</td>
			<td>Not Sent</td>
			<td><a href="../process/user_payment.php?type=1&id=' . $row['id'] . '">[Mark as Complete]</a></td>
		</tr>';
		}
		else
		{
		echo '
		<tr>
			<td>' . $row2['first_name'] . " " . $row2['last_name'] . "(" . $row2['email'].')</td>
			<td>$' . number_format($row['amount'],2) . '</td>
			<td>'.date("jS F Y",$row['date']).'</td>
			<td>Sent</td>
		</tr>';
		}
	}
	?>
</table>

<?
include("../footer.php");
?>
