<?php
/*
**	buyitem.php
**	Page to buy a resource
*/

require('php/settings.php');
include('php/cookie_login.php');
$email=$_SESSION['email'];
$result=mysql_query("SELECT * FROM accounts WHERE email='$email' LIMIT 1");
if(mysql_num_rows($result)<1) {
	header("Location: account/login.php?error=-1");
	exit;
}
require("php/sql_sanitize.php");
require('header.php');

$resource_id=sql_sanitize($_GET['id']);

$result=mysql_query("SELECT * FROM resources WHERE id='$resource_id' LIMIT 1");
while ($row=mysql_fetch_array($result)) {
	$i_seller=$row['user_id'];
	$i_price=$row['price'];
	$i_name=$row['name'];
	$i_type=$row['type'];
	$i_subtype=$row['subtype'];
	$i_description=$row['description'];
	$i_preview=$row['preview'];
	$i_thumbnail=$row['thumbnail'];
	$i_sales=$row['sales'];
	$i_date=$row['date'];
	$i_id=$row['id'];
}

if (isset($_GET['bought'])) {
	?>
	<h1>Thank you!  Item purchased</h1>
	<p>A receipt has been sent to your email. You can download your item now by clicking the &quot;Download&quot; link below. You can redownload a file by going to <a href="/account/downloads.php"><em>downloads</em></a>. Once you have downloaded the file, you may go back and rate it.</p>
	<p>Please click only once: <a href="process/download.php?id=<?php echo $i_id; ?>">Download</a></p>
	<?php
	echo '<p><strong>You now have $'.number_format($credits,2).' in your account.</strong></p>';
}
/*else {
if ($i_id<1)
{
	echo '<h1>Item not found!</h1>
	<p>The item you were looking to buy doesn\'t exist on our database.  If you clicked the buy button please go back and try again, otherwise please contact us to report this error.</p>
	';
	require('footer.php');
	exit;
}
?>
<h1>Buy &quot;<?php echo $i_name; ?>&quot;</h1>
<p>
You are buying <strong><?php echo $i_name; ?></strong> for $<?php echo number_format($i_price,2); ?>
</p>
<p>
<?php
if (isset($_GET['error'])) {
	switch ($_GET['error']) {
		case 1:
			echo '<p class="error">Invalid request.  Please try again.</p>';
			echo '<p class="error">You do not have enough credits to purchase this item.</p>';
		break;
	}
}
if ($credits>=$i_price)
{
	$secure_string=md5(rand(999,90000));
	$_SESSION['buy_id']=$secure_string; //Prevents user from accidently clicking a "Buy" button
	echo 'Please click the buy button below to confirm this purchase.<br /><br /><a href="process/buy.php?secure_id='.$secure_string.'&item='.$resource_id.'">BUY</a>';
}
else
{
	echo 'You need to <a href="account/credits.php">buy credits</a> to purchase this item as you only have $'.number_format($credits,2)." in your account.";
}

?>
</p>
<?php
}*/
require('footer.php');
?>
