<?php
/*
main_search.php

Search file results for main search
*/
include("php/settings.php");
require('php/text_format.php');

if (!isset($_SESSION['email'])) { }

// Filter
$search=preg_replace("/[^a-zA-Z0-9\s]/", "", $_GET['search']);

if (strlen($search) == 0) {
	exit;
}


$names = array(); //
$links = array(); // three arrays to store the results
$types = array(); //

// Searching user NAMES
$found = 0;
$result = mysql_query("SELECT * FROM accounts");
while ($row = mysql_fetch_array($result)) {
	if ($found > 5) {
		break;
	}	
	$searchtext = $row['first_name'].' '.$row['last_name'];
	
	if (stripos($searchtext,$search)!==false) {
		$names[] = $searchtext;
		$links[] = $prefs_sitebase."/user/".$row['id'];
		$types[] = 1; // 1 = user
		$found++;
	}
}
// Searching resource NAMES
$found = 0;
$result = mysql_query("SELECT id, name FROM resources WHERE queued='0' && hidden='0'");
while ($row = mysql_fetch_array($result)) {
	if ($found > 8) {
		break;
	}	
	$searchtext = $row['name'];
	if (stripos($searchtext,$search)!==false) {
		$names[] = $searchtext;
		$links[] = $prefs_sitebase."/item/".$row['id']."/".sanitize_title_with_dashes($searchtext);
		$types[] = 2; // 2 = resource
		$found++;
	}
}
// Searching resource TAGS
$found = 0;
$result = mysql_query("SELECT id, name, tags FROM resources WHERE queued='0' && hidden='0'");
while ($row = mysql_fetch_array($result)) {
	if ($found > 8) {
		break;
	}
	$searchtext = $row['tags'];
	if (stripos($searchtext,$search) !== false) {
		if (!in_array($row['name'],$names)) {
			$names[] = $row['name'];
			$links[] = $prefs_sitebase."/item/".$row['id']."".sanitize_title_with_dashes($row['name']);
			$types[] = 2; // 2 = resource
			$found++;
		}
	}
}

array_multisort($names, $links, $types); // great function! :D
$i = 0;
while ($i < 8) {
	if (empty($names)) {
		break;
	}
	if ($types[$i] == 1) { // if it's a user
		echo '<a href="'.$links[$i].'"><li><img class="icon" src="'.$prefs_sitebase.'/images/icons/user.png" />'.$names[$i].'</li></a>';
	}
	if ($types[$i] == 2) { // if it's a resource
		echo '<a href="'.$links[$i].'"><li><img class="icon" src="'.$prefs_sitebase.'/images/icons/box.png" />'.$names[$i].'</li></a>';
	}
	$i += 1;
}

?>