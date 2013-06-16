<?php
/*
**	item.php
**	Page to view a resource
*/

$sidebar = true;
require('php/settings.php');
include('php/cookie_login.php');
require("php/sql_sanitize.php");
require("php/item_type.php");

$resource_id = sql_sanitize($_GET['id']);

$user_id = user_get_id($_SESSION['email']);

$result = mysql_query("SELECT * FROM resources WHERE id='$resource_id' LIMIT 1");

if (mysql_num_rows($result) == 0) {
	$page_title = "Files";
	require('header.php');
	echo "<h1>Spark Lemon Files</h1>
	<p>Looking for something?  Try using the search bar above to get started.</p>";
	require('footer.php');
	exit;
}
while ($row=mysql_fetch_array($result)) {
	$i_seller = $row['user_id'];
	$i_price = $row['price'];
	$i_name = $row['name'];
	$i_type = $row['type'];
	$i_subtype = $row['subtype'];
	$i_short_description = $row['short_description'];
	$i_long_description = $row['long_description'];
	$i_preview = $row['preview'];
	$i_thumbnail = $row['thumbnail'];
	$i_tags = $row['tags'];
	$i_sales = $row['sales'];
	$i_date = $row['date'];
	$i_hidden = $row['hidden'];
	$i_feature_date = $row['feature_date'];
	
	$i_featured = false;
	if ($i_feature_date > 0) { $i_featured = true; }
	//$i_featured = $row['featured'];
}
$page_title = $i_name;
$page_description = $i_short_description;
require('header.php');
?>
<h1 class="inline"><!-- Lorem Ipsum--><?php echo $i_name; ?></h1><ol class="breadcrumbs"><li><!--Scripts--><?php

//Get item list type/subtype
$show_subtype = get_item_type($i_type);

$is_admin = false;
$email = $_SESSION['email'];
if (isset($_SESSION['email'])) {
	if (mysql_num_rows(mysql_query("SELECT * FROM accounts WHERE email='$email' AND admin=1")) > 0) {
		$is_admin = true;
	}
}

if ($credits>=$i_price) {
	$secure_string = md5(rand(999,90000));
	$_SESSION['buy_id'] = $secure_string; //Prevents user from accidently clicking a "Buy" button twice
	$buy_string = '<form name="buy_form" action="'.$prefs_sitebase.'/process/buy.php?secure_id='.$secure_string.'&item='.$resource_id.'" method="post">
	Please enter your password to confirm: <input type="password" name="password" />
	<input type="submit" value="Buy" onClick="this.disabled=1; document.buy_form.submit()" />
	</form>
	';
}
else {
	$buy_string='You need to <a href="'.$prefs_sitebase.'/account/credits.php">buy credits</a> to purchase this item as you only have $'.number_format($credits,2)." in your account.";
}
?>

</li><li><!--C#--><?php echo $show_subtype; ?></li></ol>
<p>
<div class="preview"><img src="<?php echo $i_preview; ?>" /><?php if ($i_type==1){echo '<audio src="'.$prefs_sitebase.'/files/Dance_Via_Email.mp3" type="audio/mp3" controls="controls">';} ?></div>
</p>
<p><?php echo $i_long_description; ?></p></div>
<div class="sidebar">
    <div class="user">
        <!--<img class="gravatar" src="<?php echo $prefs_sitebase; ?>/images/avatars/<?php echo user_get_avatar($i_seller);  ?>" />-->
        <h1 class="inline username"><a href="<?php echo $prefs_sitebase; ?>/user/<?php echo $i_seller; ?>"><?php echo user_get_name_only($i_seller); ?></a></h1>
        <img class="gravatar" src="<?php echo $prefs_sitebase; ?>/images/avatars/<?php echo user_get_avatar($i_seller);  ?>" />
        <span class="badges">{ badges go here }</span>
    </div>
	<?php if (mysql_num_rows(mysql_query("SELECT * FROM purchases WHERE user_from='$user_id' AND item_id='$resource_id'"))==0) : ?>
	<div class="buybox">
		<a id="buypress" href="#" style="text-decoration:none;">
		<div <?php if ($user_id!=$i_seller) {echo 'class="button buy"';} ?>>BUY {<span class="price"><!--$5-->$<?php echo $i_price; ?></span>}<?php if ($user_id==$i_seller) {echo " (You own this)";} ?></div></a>
		<?php
		if (isset($_GET['error'])) {
			switch ($_GET['error']) {
				case 1:
					echo '<p class="error">Invalid request.  Please try again.</p>';
				break;
				case 2:
					echo '<p class="error">You do not have enough credits to purchase this item.</p>';
				break;
				case 3:
					echo '<p class="error">Incorrect password.  Please try again.</p>';
				break;
			}
		}
		?>
	</div>
	<?php
	else:
	?>
	<a href="<?php echo $prefs_sitebase; ?>/process/download.php?id=<?php echo $resource_id; ?>" style="text-decoration:none;"><div class="button buy">Download</div></a>
	<?php
	endif;
	?>
	<div class="buytext" style="background-color: #a3ce8d; margin-top: 10px; margin-left: -10px; padding:5px; width: 290px; display: none; text-align: center; background: -webkit-gradient(linear, left bottom, left top, color-stop(0, #85b567), color-stop(1, #b2db99)); background: -moz-linear-gradient(center bottom, #85b567 0%, #b2db99 100%);">
		<?php echo $buy_string; ?>
	</div>
    <p style="margin-left: 15px;"><strong>Sales:</strong> <?php echo $i_sales; ?><br /><strong>Date Added:</strong> <?php echo date("jS F Y",$i_date); ?></p>
    
    <div class="rating"></div>
</div>
<?php if ($is_admin) : ?>

    <div class="sidebar">
		<h1 style="margin: 5px 0 0 8px;">Moderate</h1>
        <ul style="padding-left: 35px;">
			<?php if (!$i_featured) {echo '<li><a href="'.$prefs_sitebase.'/process/item_administrate.php?id='.$resource_id.'&action=feature">Add to featured</a></li>'; }
			else { echo '<li><a href="'.$prefs_sitebase.'/process/item_administrate.php?id='.$resource_id.'&action=unfeature">Remove from featured</a></li>'; } ?>

        	<?php if (!$i_hidden) { echo '<li><a href="'.$prefs_sitebase.'/process/item_administrate.php?id='.$resource_id.'&action=flag">Make invisible</a></li>'; }
			else { echo '<li><a href="'.$prefs_sitebase.'/process/item_administrate.php?id='.$resource_id.'&action=unflag">Make visible</a></li>'; } ?>
        </ul>
    </div>
    
<?php endif; ?>

<script>
var resource_id=<?php echo $resource_id; ?>;
$("#buypress").click (function () {
	$(".buybox").hide();
	$(".buytext").show();
});

$('audio').mediaelementplayer({
    // width of audio player
    audioWidth: 560,
    // height of audio player
    audioHeight: 32,
    // initial volume when the player starts
    startVolume: 1,
    // useful for <audio> player loops
    loop: false,
    // enables Flash and Silverlight to resize to content size
    enableAutosize: true,
    // the order of controls you want on the control bar (and other plugins below)
    features: ['playpause','progress','duration','volume']
 
});
</script>
<script src="<?php echo $prefs_sitebase; ?>/js/rating.js" type="text/javascript"></script>
<?php
require('footer.php');
?>