<?php
require('../php/settings.php');
include('../php/cookie_login.php');
include('../php/check_admin.php');
$page_title = "Administration";
include("../header.php");

//Get number of queued files
$query=mysql_query("SELECT id FROM resources WHERE queued='1'");
if (!$query) {
	echo "MySQL Error: ".mysql_error();
}
$num_queued=mysql_num_rows($query);
?>
<h1>Administrator CP</h1>
<p>Here you can manage files, users, payments, etc.
<ul>
	<li><a href="queued_files.php">Queued Files (<?php echo $num_queued; ?>)</a></li>
	<li><a href="userlist.php">User List</a></li>
	<li><a href="payments.php">Credit Payments</a></li>
	<li><a href="purchases.php">Item Purchases</a></li>
</ul>
</p>
<?
include("../footer.php");
?>