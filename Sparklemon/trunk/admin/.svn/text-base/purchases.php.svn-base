<?php
require('../php/settings.php');
include('../php/cookie_login.php');
include('../php/check_admin.php');
$page_title = "Purchases";
include("../header.php");
?>
<h1>Purchases</h1>
<p>View recent item purchases here.<br /><br />
<a href="index.php">&lt; back</a>
</p>
<table class="normal">
	<tr>
		<th scope="col">Buyer</th>
		<th scope="col">Seller</th>
		<th scope="col">Amount</th>
		<th scope="col">Item</th>
		<th scope="col">Date</th>
	</tr>
	<?php
	$query=mysql_query("SELECT * FROM purchases ORDER BY id DESC");
	while ($row=mysql_fetch_array($query))
	{
		echo '
		<tr>
			<td>'.user_get_name($row['user_from']).'</td>
			<td>'.user_get_name($row['user_to']).'</td>
			<td>'.number_format($row['amount'],2).' ('.number_format($row['amount']/2,2).' gain)</td>
			<td><a href="../item.php?id='.$row['item_id'].'">'.$row['item_id'].'</a></td>
			<td>'.date("jS F Y",$row['date']).'</td>
		</tr>';
	}
	?>
</table>

<?
include("../footer.php");
?>