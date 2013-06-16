<?php
require('../php/settings.php');
include('../php/cookie_login.php');
$page_title = "Credits";
include("../header.php");
$result=mysql_query("SELECT * FROM accounts WHERE email='$email' LIMIT 1");
if(mysql_num_rows($result)<1) {
	header("Location: ../account/login.php?error=-1");
	exit;
}
?>
<h1>Buy Credits</h1>
<p>Credits allow you to buy items at the Spark Lemon Marketplace.  Select the amount of credits you want to buy below and safely use a PayPal account or your credit card to purchase them.  Please note that credits are not refundable.</p
><br /><br />
<form action="https://www.paypal.com/cgi-bin/webscr" method="post">
<input type="hidden" name="cmd" value="_s-xclick">
<input type="hidden" name="hosted_button_id" value="3YGV3XFBVAJG6">
<table width="100%" border="0" align="center">
	<tr>
		<th scope="col">$10.00 Credits</th>
		<th scope="col">$20.00 Credits</th>
		<th scope="col">$30.00 Credits</th>
		<th scope="col">$40.00 Credits</th>
		<th scope="col">$50.00 Credits</th>
	</tr>
	<tr>
		<td align="center"><input class="select_button" type="radio" name="os0" value="$10.00 Credits" /></td>
		<td align="center"><input class="select_button" type="radio" name="os0" value="$20.00 Credits" /></td>
		<td align="center"><input class="select_button" type="radio" name="os0" value="$30.00 Credits" /></td>
		<td align="center"><input class="select_button" type="radio" name="os0" value="$40.00 Credits" /></td>
		<td align="center"><input class="select_button" type="radio" name="os0" value="$50.00 Credits" /></td>
	</tr>
</table>
<input type="hidden" name="currency_code" value="USD">
<br />
<p id="buy_button" style="text-align:center; display:none;"><input type="image" src="../images/paypal_button.png" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!"></span>
<img alt="" border="0" src="https://www.paypal.com/en_US/i/scr/pixel.gif" width="1" height="1">
</form>
<script>
$(".select_button").click(function () {
	$("#buy_button").fadeIn();
})
</script>
<?
include("../footer.php");
?>
