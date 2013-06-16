<?php
	require('../config.php');

	header("Content-Type: text/xml");
	$query = mysql_query("SELECT * FROM `subcatlist` WHERE `cname` = '".mysql_real_escape_string($_GET['cname'])."'");
?>

<myXML>
	<?php
	while($row = mysql_fetch_assoc($query)){
	?>
		<CategoryItem>
    		<name><?=$row['name'];?></name>
        	<sname><?=$row['sname'];?></sname>
    	</CategoryItem>
    <?php } ?>
</myXML>
