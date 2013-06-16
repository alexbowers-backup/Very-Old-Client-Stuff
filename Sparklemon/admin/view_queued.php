<?php
require('../php/settings.php');
include('../php/cookie_login.php');
include('../php/check_admin.php');
require("../php/item_type.php");
require("../php/sql_sanitize.php");

$page_title = "File Approval";
include("../header.php");

$resource_id = sql_sanitize($_GET['fid']);

$result = mysql_query("SELECT * FROM resources WHERE id='$resource_id' LIMIT 1");

if (mysql_num_rows($result) == 0) {
	echo "<h1>Not Found</h1>
	<p>The file you are looking for has not been found in the system.</p>";
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
	$i_date = $row['date'];
	$i_file = $row['file'];
}

$result = mysql_query("SELECT * FROM accounts WHERE id='$i_seller' LIMIT 1");
while ($row=mysql_fetch_array($result)) {
	$i_seller_name = $row['first_name'] . " " . $row['last_name'];
}

$result = mysql_query("SELECT * FROM user_files WHERE id='$i_preview' LIMIT 1");
while ($row=mysql_fetch_array($result)) {
	$f_p_link = $row['file'];
	$f_p_name = $row['original_name'];
	$f_p_owner = $row['owner'];
}

$result = mysql_query("SELECT * FROM user_files WHERE id='$i_thumbnail' LIMIT 1");
while ($row=mysql_fetch_array($result)) {
	$f_t_link = $row['file'];
	$f_t_name = $row['original_name'];
	$f_t_owner = $row['owner'];
}

$result = mysql_query("SELECT * FROM user_files WHERE id='$i_file' LIMIT 1");
while ($row=mysql_fetch_array($result)) {
	$f_f_link = $row['file'];
	$f_f_name = $row['original_name'];
	$f_f_owner = $row['owner'];
}
?>

<h1 style="margin-bottom: 0;"><?php echo $i_name; ?> <span style="font-size: 15pt; margin-left: 2px; vertical-align: 1px"> by <?php echo $i_seller_name; ?></span></h1>

<form>
<fieldset><ol>
	<h2>Files</h2>
	<li>
		<label for="thumb">Thumbnail Image</label>
		<a href="<?php echo $f_t_link; ?>"><?php echo $f_t_name; ?></a>
	</li><li>
		<label for="preview">Preview Image</label>
		<a href="<?php echo $f_p_link; ?>"><?php echo $f_p_name; ?></a>
	</li><li>
		<label for="zip">Zip Archive</label>
		<a href="<?php echo $f_f_link; ?>"><?php echo $f_f_name; ?></a>
	</li>
	<h2>Description</h2>
	<li>
		<label for="short_desc">Short Description</label>
		<?php echo $i_short_description; ?>
	</li><li>
		<label for="long_desc">Long Description</label>
		<?php echo $i_long_description; ?>
	</li>
	<h2>Other</h2>
	<li>
		<label for="price">Price</label>
		$<?php echo $i_price; ?>
	</li><li>
		<label for="tags">Tags</label>
		<?php echo $i_tags; ?>
	</li><li>
		<label for="cat1">Category</label>            
		<?php
		//Get item list subtype
		$show_subtype = get_item_type($i_type);
		?> <span id="arrow"><img src="<?php echo $prefs_sitebase; ?>/images/dropdown_arrow.png" style="vertical-align: middle;" alt="--&gt;" /></span> <?php echo $show_subtype; ?>
	</li>
	</ol></fieldset>
<input type="submit" class="green-btn" value="Approve" />
</form>

<?
include("../footer.php");
?>