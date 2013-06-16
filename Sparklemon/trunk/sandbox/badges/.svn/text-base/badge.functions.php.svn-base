<?php
$mysql_hostname = "localhost";
$mysql_user = "sparklemon";
$mysql_password = "SLmainRY100";
$mysql_database = "sparklemon";
mysql_connect($mysql_hostname, $mysql_user, $mysql_password) or die(mysql_error());
mysql_select_db($mysql_database);


function get_earnings_badge($uid){ // returns a class name, to display an image
	$query = mysql_query("SELECT SUM(`amount`) as `sales_total` FROM `purchases` WHERE `user_to`='$uid' LIMIT 1") or die(mysql_error());
	$result = mysql_fetch_assoc($query);
	echo $result['sales_total'];
	if($result['sales_total'] != 0){
		switch($tot = ($result['sales_total']/2)){
			case $tot < 100:
				echo "less than 100";
				break;
			case $tot > 100:
				echo "more than 100";
				break;
			default:
				echo "default value";
				break;
		}
	} else {
		echo "No Sales Made";
	}
}

function get_purchase_badge($uid){
	$query = mysql_query("SELECT SUM(`amount`) as `purchase_total` FROM `purchases` WHERE `user_from`='$uid' LIMIT 1") or die(mysql_error());
	$result = mysql_fetch_assoc($query);
	switch($tot = ($result['purchase_total'])){
		case $tot < 100:
			echo "less than 100";
			break;
		case $tot > 100:
			echo "more than 100";
			break;
		default:
			echo "default value";
			break;
	}
}

echo get_earnings_badge(9);
?>