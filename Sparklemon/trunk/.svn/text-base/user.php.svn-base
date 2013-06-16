<?php
/*
**	user.php
**	Page to view a person/profile
*/

$sidebar = true;
require('php/settings.php');
include('php/cookie_login.php');
require("php/sql_sanitize.php");
require('php/text_format.php');
require("php/get_badges.php");

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
$page_description = $i_name." is on Spark Lemon. On this page you can view the users description and files.";
require('header.php');
?>
<h1><?php echo $i_user_first." ".$i_user_last; ?></h1>
<a href="<?php echo $prefs_sitebase; ?>/browse/author/<?php echo $resource_id; ?>">User's Resources</a>
<div id="user_bio" <?php if ($email==$i_user_email) echo 'class="edit_area"'?>><?php echo $i_bio; ?></div>
</div>
<div class="sidebar">
    <img class="gravatar" src="<?php echo $prefs_sitebase; ?>/images/avatars/<?php echo user_get_avatar($resource_id);  ?>" />
    <span class="badges"><?php /*{ badges go here }*/ get_badges($resource_id); ?></span>
	<h1 style="margin: 5px 0 0 8px;">Recent Ratings</h1>
<ul class="rate">
<?php
	$result = mysql_query("SELECT * FROM rating WHERE user_id='$resource_id' LIMIT 5");
	$num = 0;
	while ($row = mysql_fetch_array($result)) {
		$num++;
		$rating = $row['rating'];
		$res_id = $row['resource_id'];
	
		// get the name of the resource
		$nresult = mysql_query("SELECT name FROM resources WHERE id='$res_id' LIMIT 1");
		while ($nrow = mysql_fetch_array($nresult)) { $res_name = $nrow['name']; }
	
		$link = $prefs_sitebase."/item/".$res_id."/".sanitize_title_with_dashes($res_name);
		$pixel_1 = ceil($rating*20);
		$pixel_2 = floor(100-($rating*20));
		
		echo '<li><div class="rating inline"><div id="show_vote" class="inner" style=""><div class="inner_front" style="width:'.$pixel_1.'px;"></div><div class="inner_back" style="width:'.$pixel_2.'px;"></div></div></div><a href="'.$link.'">'.$res_name.'</a></li>';
	}
	if ($num == 0) {
		echo 'This user hasn\'t made any ratings!';	
	}
	
?>
</div>
<?php
require('footer.php');
?>
