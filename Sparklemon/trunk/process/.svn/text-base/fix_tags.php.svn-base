<?php

/*
**	simple file for fixing items with
**	improperly formatted tags.
*/

require('../php/settings.php');
$result = mysql_query("SELECT tags FROM resources");
while ($row = mysql_fetch_array($result)) {	
	$tags = $row['tags'];
	$o_tags = $tags;
	
	// change all commas into spaces
	$tags = str_replace(', ', ' ', $tags);
	$tags = str_replace(',', ' ', $tags);
	// if the last character of the string is a space, trim it.
	if (substr($tags, -1) == ' ') { $tags = substr($tags, -1); }

	mysql_query("UPDATE resources SET tags='$tags' WHERE tags='$o_tags'");
	if ($tags == $o_tags) {
		echo "Item already formatted properly.<br>";
	}
	else {
		echo "<strong>Reformatted!</strong><br>";
	}
}

?>