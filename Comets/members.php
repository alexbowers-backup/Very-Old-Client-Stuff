<?php
	require_once('includes/connect.php');
	require_once('process/user.class.php');
	$user = new User();
	if(!$user->signed_in){
		header('Location: index.php');
	}
	if(!$user->is_admin){
		header('Location: index.php');
	}
	if(isset($_GET['delete_id'])){
		if(isset($_GET['confirm'])){
			mysql_query("DELETE FROM `member` WHERE `member_no` = ".mysql_real_escape_string($_GET['delete_id']));
			header('Location: members.php');
		}
		if(isset($_GET['deny'])){
			header('Location: members.php');
		}
		$message = "Are you sure you want to delete this user?";
	}
	if(isset($_GET['update_id'])){
		if(isset($_GET['confirm'])){
			mysql_query("UPDATE `member` SET `subscribed`= ".mysql_real_escape_string($_GET['to'])." WHERE `member_no` = ". mysql_real_escape_string($_GET['update_id']));
			header('Location: members.php');
		}
		if(isset($_GET['deny'])){
			header('Location: members.php');
		}
		$message = "Are you sure you want to update this user?";
	}
?><html>
	<head>
    	<link rel="stylesheet" href="css/reset.css" />
        <link rel="stylesheet" href="css/style.css" />
        <title>The Comets</title>
    </head>
    <body>
    	<div id="container">
        	<div id="main">
		<h1>Member List</h1>
		<?php 
			if(isset($message)){
				if(isset($_GET['delete_id'])){
					echo '<strong>'.$message.'</strong>';
					echo "&nbsp;&nbsp;<a href='?delete_id=".$_GET['delete_id']."&confirm'>Yes</a>";
					echo '&nbsp;&bull;&nbsp;';
					echo "<a href='?delete_id=".$_GET['delete_id']."&deny'>No</a>";
					echo '<br /><br />';
				}
				if(isset($_GET['update_id'])){
					echo '<strong>'.$message.'</strong>';
					echo "&nbsp;&nbsp;<a href='?update_id=".$_GET['update_id']."&confirm&to=".$_GET['to']."''>Yes</a>";
					echo '&nbsp;&bull;&nbsp;';
					echo "<a href='?update_id=".$_GET['update_id']."&deny'>No</a>";
					echo '<br /><br />';
				}
			}
		?>
		<table>
			<tr>
			    	<th>Name</th>
			        	<th>Date of Birth</th>
			       	<th>Email Address</th>
			        	<th>Address</th>
			        	<th>Subscriber</th>
			        	<th>Action</th>
			</tr>
		    	<?php
						$query = mysql_query("SELECT * FROM `member`");
						while($result = mysql_fetch_assoc($query)){
					?>
				                <tr>
				                	<td><?=$result['first_name'].' '.$result['last_name'];?></td>
				                	<td><?=$result['dob'];?></td>
				                	<td><input type="text" name="email" value="<?=$result['email_address'];?>" /></td>
				                	<td><textarea name="address"><?=$result['address_line_one'];?></textarea></td>
				                	<td><?=($result['subscribed'] == 1)?'&#10004;<br /><a href="?update_id='.$result["member_no"].'&to=0">Change</a>':'&times;<br /><a href="?update_id='.$result["member_no"].'&to=1">Change</a>';?></td>
				                	<td><?=($result['subscribed'] == 0)?'<a href="?delete_id='.$result["member_no"].'">Delete User</a>':'';?></td>
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
