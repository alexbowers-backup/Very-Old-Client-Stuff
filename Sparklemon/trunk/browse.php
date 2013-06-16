<?php

require('php/settings.php');
require("php/sql_sanitize.php");
require('php/text_format.php');

$type = sql_sanitize($_GET['type']);
$subtype = sql_sanitize($_GET['subtype']);
$sorting = sql_sanitize($_GET['sort']);
$type_id = sql_sanitize($_GET['id']);
$type_id = htmlentities($type_id); // strips HTML special characters

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
	
	case 'author':
	$result = mysql_query("SELECT * FROM resources WHERE user_id='$type_id' ORDER BY name ASC");
	$class = 6;
	break;
	
	case 'tag':
	//$result = mysql_query("SELECT * FROM resources WHERE user_id='$type_id' ORDER BY name ASC");
	/*$tag_search = $type_id;
	$tag_length = strlen($tag_search);
	$result = mysql_query(
		"SELECT 
			SUM(((LENGTH(Body) - LENGTH(REPLACE(tags, '$tag_search', '')))/'$tag_length'))
			AS occurrences
		FROM resources 
		GROUP BY id
		ORDER BY occurrences DESC");*/
	$result = mysql_query("SELECT * FROM resources WHERE tags LIKE '%$type_id%'");
	$class = 7;
	break;

	default:
	$result = mysql_query("SELECT * FROM resources ORDER BY name ASC");
	$class = 0;
	break;
}

include('header.php');
?>
<?php if ($class != 6 && $class != 7) : ?>
    <div id="sort">
        <a href="<?php echo $prefs_sitebase; ?>/browse/newer"<?php if ($class == 2) {echo ' class="select"';} ?>>Newest</a>
        <a href="<?php echo $prefs_sitebase; ?>/browse/older"<?php if ($class == 1) {echo ' class="select"';} ?>>Oldest</a>
        <a href="<?php echo $prefs_sitebase; ?>/browse/name"<?php if ($class == 0) {echo ' class="select"';} ?>>Name</a>
        <a href="<?php echo $prefs_sitebase; ?>/browse/sales"<?php if ($class == 5) {echo ' class="select"';} ?>>Sales</a>
        <a href="<?php echo $prefs_sitebase; ?>/browse/hiprice"<?php if ($class == 4) {echo ' class="select"';} ?>>Highest Price</a>
        <a href="<?php echo $prefs_sitebase; ?>/browse/loprice"<?php if ($class == 3) {echo ' class="select"';} ?>>Lowest Price</a>
    </div>
<?php elseif ($class == 7) : ?>
	<h1>Items with "<?php echo $type_id; ?>" tag</h1>
<?php elseif ($class == 6) :
	$iresult = mysql_query("SELECT * FROM accounts WHERE id='$type_id' LIMIT 1");
	if (mysql_num_rows($iresult) == 0) {
		$title_name = 'Non-Existant User';
	}
	else {
		while ($irow = mysql_fetch_array($iresult)) {
			$title_name = $irow['first_name'];
		}
	}
?>
<h1><?php
if ($title_name == 'Non-Existant User') { echo $title_name; }
else {
	// this part is kind of weird
	$s = 's';
	// check to see if the last character is an "S", and if so, don't echo an " 's " after the name 
	if ($title_name[strlen($title_name)-1] == 's') { $s = ''; }
	echo $title_name."'".$s." Resources";
}

?></h1>
<?php endif; ?>
<ul class="listing">
<?php
$num = 0;
while ($row = mysql_fetch_array($result)) {
	if ($row['queued'] == 0 && $row['hidden'] == 0) {
		$num++;
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
if ($num == 0) {
	echo 'No resources found.';	
}
echo '</ul>';

include('footer.php');

?>