<?php

/*	ITEM_ADMINISTRATE
**	-----------------
**	performs an administrative
**	operation on a given item.
**	
**	ARGUMENTS (via 'get')
**	---------------------
**	ID -> resource id
**	ACTION -> action to perform
*/	

require('../php/settings.php');
include('../php/cookie_login.php');
require("../php/sql_sanitize.php");

$email = $_SESSION['email'];
$resource_id = sql_sanitize($_GET['id']);
$action = sql_sanitize($_GET['action']);

// first check to make sure everything is valid
$is_admin = false;
if (isset($_SESSION['email'])) {
	if (mysql_num_rows(mysql_query("SELECT * FROM accounts WHERE email='$email' AND admin=1")) > 0) {
		$is_admin = true;
	}
}
if (!$is_admin) {
	header('Location: ../index.php');
	exit;
}

$result = mysql_query("SELECT * FROM resources WHERE id='$resource_id' LIMIT 1");
if (mysql_num_rows($result) == 0) {
	header('Location: ../index.php');
}

// now determine the action to be taken

switch ($action)
	{
		case 'feature':
			//$result = mysql_query("UPDATE resources SET featured=0");
				
			$time = time();
			$result = mysql_query("UPDATE resources SET feature_date='$time' WHERE id='$resource_id' LIMIT 1");
			//$result = mysql_query("UPDATE resources SET featured=1 WHERE feature_date>0 ORDER BY feature_date DESC LIMIT 3");
			
			include('../header.php');
			echo '<h1>Success!</h1><p>Resource is now featured!</p>';
			include('../footer.php');
		break;
		
		case 'unfeature':
			//$result = mysql_query("UPDATE resources SET featured=0");
				
			$time = time();
			$result = mysql_query("UPDATE resources SET feature_date=0 WHERE id='$resource_id' LIMIT 1");
			//$result = mysql_query("UPDATE resources SET featured=1 WHERE feature_date>0 ORDER BY feature_date DESC LIMIT 3");
			
			include('../header.php');
			echo '<h1>Success!</h1><p>Resource is no longer featured &gt;:)</p>';
			include('../footer.php');
		break;
		
		case 'flag':
			$result = mysql_query("UPDATE resources SET hidden=1 WHERE id='$resource_id' LIMIT 1");
				
			include('../header.php');
			echo '<h1>Success!</h1><p>Resource has been made invisible</p>';
			include('../footer.php');
		break;
		
		case 'unflag':
			$result = mysql_query("UPDATE resources SET hidden=0 WHERE id='$resource_id' LIMIT 1");
			
			include('../header.php');
			echo '<h1>Success!</h1><p>Resource has been made visible</p>';
			include('../footer.php');
		break;
		
		default:
			header('Location: ../index.php');
		break;
	}
	
?>