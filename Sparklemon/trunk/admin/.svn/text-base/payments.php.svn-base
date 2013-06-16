<?php
require('../php/settings.php');
include('../php/cookie_login.php');
include('../php/check_admin.php');
$page_title = "Payments";
include("../header.php");
?>
<h1>Payments</h1>
<p>View recent payments made with PayPal here. Red rows mean that the payment user wasn&rsquo;t found and the user will have to be matched up manually.<br /><br />
<a href="index.php">&lt; back</a>
</p>
<table class="normal">
	<tr>
		<th scope="col">Email</th>
		<th scope="col">First Name</th>
		<th scope="col">Last Name</th>
		<th scope="col">Amount</th>
		<th scope="col">Date</th>
	</tr>
	<?php
	$query=mysql_query("SELECT * FROM transactions ORDER BY id DESC");
	while ($row=mysql_fetch_array($query))
	{
		if ($row['userid']>0)
		{
			echo '<tr>';
		}
		else
		{
			echo '<tr style="color:#A62626">';
		}
		echo '
			<td>'.$row['email'].'</td>
			<td>'.$row['first_name'].'</td>
			<td>'.$row['last_name'].'</td>
			<td>$'.number_format($row['amount'],2).'</td>
			<td>'.date("jS F Y",$row['time']).'</td>
		</tr>';
	}
	?>
</table>

<?
include("../footer.php");
?>