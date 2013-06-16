<?php
/*
**	user.php
**	Page to view a person/profile
*/

$sidebar = true;
require('php/settings.php');
include('php/cookie_login.php');
require("php/sql_sanitize.php");

$resource_id = sql_sanitize($_GET['id']);

$result = mysql_query("SELECT * FROM accounts WHERE id='$resource_id' LIMIT 1");

if (mysql_num_rows($result) == 0) {
	$page_title = "Users";
	require('header.php');
	echo "<h1>Spark Lemon Users</h1>
	<p>Looking for something?  Try using the search bar above to get started.</p>";
	require('footer.php');
	exit;
}
while ($row=mysql_fetch_array($result)) {
	$i_user_first = $row['first_name'];
	$i_user_last = $row['last_name'];
	$i_user_email = $row['email'];
	$i_bio = $row['bio'];
	$i_name = $i_user_first . " " . $i_user_last;
}
$page_title = $i_name;
$page_description = $i_name." is on Spark Lemon.  On this page you can view the users description and files.";
require('header.php');
?>
<h1><?php echo $i_user_first." ".$i_user_last; ?></h1>
<div id="user_bio" <?php if ($email==$i_user_email) echo 'class="edit_area"'?>><?php echo $i_bio; ?></div>
<?php
require('footer.php');
?>
