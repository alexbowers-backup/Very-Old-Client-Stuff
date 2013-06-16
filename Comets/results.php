<?php
	require_once('includes/connect.php');
	require_once('process/user.class.php');
	$user = new User();
?>
<html>
	<head>
    	<link rel="stylesheet" href="css/reset.css" />
        <link rel="stylesheet" href="css/style.css" />
        <title>The Comets</title>
    </head>
    <body>
    	<div id="container">
        	<div id="main">
		<h1>Race Results</h1>
		<table>
			<tr>
			    	<th>Name</th>
			        	<th>Race Name</th>
			       	<th>Race Date</th>
			        	<th>Race Result</th>
			        	<th>Race Type</th>
			</tr>
		    	<?php
						$query = mysql_query("SELECT `member`.`first_name` AS `first_name`,`member`.`last_name` AS `last_name`,`race`.`Race_Name` AS `race_name`, `race`.`Race_Type` AS `race_type`, `race_result`.`Race_Result` AS `race_result`,`race`.`Race_Date` AS `race_date` FROM `member`,`race`,`race_result` WHERE `member`.`member_no` = `race_result`.`Member_ID` AND `race`.`race_No` = `race_result`.`Race_No`");
						while($result = mysql_fetch_assoc($query)){
					?>
				                <tr>
				                	<td><?=$result['first_name'].' '.$result['last_name'];?></td>
				                	<td><?=$result['race_name'];?></td>
				                	<td><?=$result['race_date'];?></td>
				                	<td><?=$result['race_result'];?></td>
				                	<td><?=$result['race_type'];?></td>
				                </tr>
				                <?php } ?>
		</table>
        	</div>
          	<div id="sidebar">
          	  	<h1>Menu</h1>
		<?php include('sidebar.php'); ?>
   	</div>
        	</div>
    </body>
</html>
