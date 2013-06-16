<?php

require('php/settings.php');
require("php/sql_sanitize.php");
require('php/text_format.php');

$type = sql_sanitize($_GET['type']);
$subtype = sql_sanitize($_GET['subtype']);
$sorting = sql_sanitize($_GET['sort']);

switch ($sorting) {
	case 'name':
	$result = mysql_query("SELECT * FROM resources ORDER BY name ASC");
	$class = 0;
	break;
	
	case 'older':
	$result = mysql_query("SELECT * FROM resources ORDER BY date+0 ASC");
	$class = 1;
	break;
	
	case 'newer':
	$result = mysql_query("SELECT * FROM resources ORDER BY date+0 DESC");
	$class = 2;
	break;
	
	case 'loprice':
	$result = mysql_query("SELECT * FROM resources ORDER BY price+0 ASC");
	$class = 3;
	break;
	
	case 'hiprice':
	$result = mysql_query("SELECT * FROM resources ORDER BY price+0 DESC");
	$class = 4;
	break;
	
	case 'sales':
	$result = mysql_query("SELECT * FROM resources ORDER BY sales+0 ASC");
	$class = 5;
	break;

	default:
	$result = mysql_query("SELECT * FROM resources ORDER BY name ASC");
	$class = 0;
	break;
}

include('header.php');
?>
<div id="sort">
<a href="<?php echo $prefs_sitebase; ?>/browse/newer"<?php if ($class == 2) {echo ' class="select"';} ?>>Newest</a>
<a href="<?php echo $prefs_sitebase; ?>/browse/older"<?php if ($class == 1) {echo ' class="select"';} ?>>Oldest</a>
<a href="<?php echo $prefs_sitebase; ?>/browse/name"<?php if ($class == 0) {echo ' class="select"';} ?>>Name</a>
<a href="<?php echo $prefs_sitebase; ?>/browse/sales"<?php if ($class == 5) {echo ' class="select"';} ?>>Sales</a>
<a href="<?php echo $prefs_sitebase; ?>/browse/hiprice"<?php if ($class == 4) {echo ' class="select"';} ?>>Highest Price</a>
<a href="<?php echo $prefs_sitebase; ?>/browse/loprice"<?php if ($class == 3) {echo ' class="select"';} ?>>Lowest Price</a>
</div>
<ul class="listing">
<?php
while ($row = mysql_fetch_array($result)) {
	if ($row['queued'] == 0) {
		if ($row['type'] == $type && ($row['subtype'] == $subtype || !isset($_GET['subtype'])) || !isset($_GET['type'])) {	
			$name = $row['name'];
			$thumb = $row['thumbnail'];
			$link = $prefs_sitebase."/item/".$row['id']."/".sanitize_title_with_dashes($row['name']);
			$author_id = $row['user_id'];
			$desc = $row['short_description'];
			
			$user_row = mysql_fetch_array(mysql_query("SELECT * FROM accounts WHERE id='$author_id' LIMIT 1"));
			$author = $user_row['first_name'].' '.$user_row['last_name'];
			
			echo '<li><img src="'.$thumb.'" width="100" height="100" /><div><p>'.$desc.'</p></div><span><a href="'.$link.'">'.$name.'</a> by '.$author.'</span></li>';
		}
	}
}
echo '</ul>';

include('footer.php');

?>