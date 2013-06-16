<?php
/*
main_search.php

Search file results for main search
*/
include("php/settings.php");
require('php/text_format.php');

if (!isset($_SESSION['email'])) {
	//exit;
}

// Filter
$search=preg_replace("/[^a-zA-Z0-9\s]/", "", $_GET['search']);

if (strlen($search) == 0) {
	exit;
}

$found = 0;
//echo '<ul class="search_box">';

$names = array(); //
$links = array(); // three arrays to store the results
$types = array(); //

$result = mysql_query("SELECT * FROM accounts");
while ($row=mysql_fetch_array($result)) {
	if ($found > 5) {
		break;
	}	
	$searchtext = $row['first_name'].' '.$row['last_name'];
	
	if (stripos($searchtext,$search)!==false) {
		$names[] = $row['first_name'].' '.$row['last_name'];
		$links[] = $prefs_sitebase."/user/".$row['id'];
		$types[] = 1; // 1 = user
		
		// OLDER ==> echo '<li>'.$row['first_name'].' '.$row['last_name'].'</li>';
		// NEWER ==> echo '<li><img class="icon" src="'.$prefs_sitebase.'/images/icons/user.png" /><a href="#">'.$row['first_name'].' '.$row['last_name'].'</a></li>';
		$found += 1;
	}
}
$found = 0;
$result = mysql_query("SELECT * FROM resources WHERE queued='0' && hidden='0'");
while ($row=mysql_fetch_array($result)) {
	if ($found > 8) {
		break;
	}	
	$searchtext = $row['name'];
	if (stripos($searchtext,$search)!==false) {
		$names[] = $row['name'];
		$links[] = $prefs_sitebase."/item/".$row['id']."/".sanitize_title_with_dashes($row['name']);
		$types[] = 2; // 2 = resource
		$found +=1 ;
	}
}

// NEWER ==> echo '<li><img class="icon" src="'.$prefs_sitebase.'/images/icons/user.png" /><a href="#">'.$row['first_name'].' '.$row['last_name'].'</a></li>';
array_multisort($names, $links, $types); // great function! :D
$i = 0;
while ($i < 8) {
	if (empty($names)) {
		break;
	}
	if ($types[$i] == 1) { // if it's a user
		echo '<li><img class="icon" src="'.$prefs_sitebase.'/images/icons/user.png" /><a href="'.$links[$i].'">'.$names[$i].'</a></li>';
	}
	if ($types[$i] == 2) { // if it's a resource
		echo '<li><img class="icon" src="'.$prefs_sitebase.'/images/icons/box.png" /><a href="'.$links[$i].'">'.$names[$i].'</a></li>';
	}
	$i += 1;
}

/*$i = 0;
while ($i<2) {
	echo '<li><img class="icon" src="'.$prefs_sitebase.'/images/icons/box.png" /><a href="#">Fake Resource</a></li>';
	$i++;
}*/
//echo '</ul>';
?>