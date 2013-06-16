<?php
/*
**	update_bio.php
**
**	processes update bio info. data
*/
require("../php/sql_sanitize.php");
require("../php/settings.php");
require("../php/text_format.php");

$email=$_SESSION['email'];
if ($email!="")
{
	$value=htmlspecialchars(wpautop($_POST['value']));
	
	$value=str_replace("&lt;p&gt;","<p>",$value);
	$value=str_replace("&lt;/p&gt;","</p>",$value);
	$value=str_replace("&lt;b&gt;","<b>",$value);
	$value=str_replace("&lt;/b&gt;","</b>",$value);
	$value=str_replace("&lt;ul&gt;","<ul>",$value);
	$value=str_replace("&lt;/ul&gt;","</ul>",$value);
	$value=str_replace("&lt;ol&gt;","<ol>",$value);
	$value=str_replace("&lt;/ol&gt;","</ol>",$value);
	$value=str_replace("&lt;li&gt;","<li>",$value);
	$value=str_replace("&lt;/li&gt;","</li>",$value);
	$nvalue=sql_sanitize($value);
	
	mysql_query("UPDATE accounts SET bio='$nvalue' WHERE email='$email'");
	
	echo $value;
}
else
{
	echo "Error updating!  Please login and try again.";
}

?>