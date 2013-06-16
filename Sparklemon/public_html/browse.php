<?php

require('php/settings.php');
require("php/sql_sanitize.php");

$type = sql_sanitize($_GET['type']);
$subtype = sql_sanitize($_GET['subtype']);
$sorting = sql_sanitize($_GET['sort']);

switch ($sorting) {
	case 'name':
	$result = mysql_query("SELECT * FROM resources ORDER BY name");
	break;
	
	case 'older':
	$result = mysql_query("SELECT * FROM resources ORDER BY date");
	break;
	
	case 'newer':
	$result = mysql_query("SELECT * FROM resources ORDER BY date DESC");
	break;
	
	case 'loprice':
	$result = mysql_query("SELECT * FROM resources ORDER BY price");
	break;
	
	case 'hiprice':
	$result = mysql_query("SELECT * FROM resources ORDER BY price DESC");
	break;
	
	case 'sales':
	$result = mysql_query("SELECT * FROM resources ORDER BY sales");
	break;

	default:
	$result = mysql_query("SELECT * FROM resources ORDER BY name");
	break;
}

include('header.php');
echo '<ul class="listing">';
//$result = mysql_query("SELECT * FROM resources ORDER BY name");
while ($row = mysql_fetch_array($result)) {
	if (($row['type'] == $type && ($row['subtype'] == $subtype || !isset($_GET['subtype'])) || !isset($_GET['type']))) {	
		$name = $row['name'];
		$thumb = $row['thumbnail'];
		$link = $prefs_sitebase."/item/".$row['id'];
		$author_id = $row['user_id'];
		
		$user_row = mysql_fetch_array(mysql_query("SELECT * FROM accounts WHERE id='$author_id' LIMIT 1"));
		$author = $user_row['first_name'].' '.$user_row['last_name'];
		
		echo '<li><img src="'.$thumb.'" /><span><a href="'.$link.'">'.$name.'</a> by '.$author.'</li></span>';
	}
}
echo '</ul>';

include('footer.php');

?>