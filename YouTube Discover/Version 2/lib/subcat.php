<?php
	require('../config.php');

	$cname = mysql_real_escape_string($_COOKIE['cname']);
	
	$query = mysql_query('SELECT `sname`,`name` FROM subcatlist WHERE cname = "'.$cname.'"');
	$array = array();
	$i = 1;
	if(mysql_num_rows($query) != 0 ){
		$array[0] = 'success';
		
		while($row = mysql_fetch_assoc($query)){
			$array[i]['sname'] = $row['sname'];
			$array[i]['name'] = $row['name'];
		}
	} else {
		$array[0] = 'failiure';
	}
	echo mysql_error();
	//echo json_encode($array);
	
?>