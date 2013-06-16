<?php
	require_once('includes/connect.php');
	require_once('process/user.class.php');
	$user = new User();
	if(!$user->signed_in){
		header('Location: index.php');
	}
	if(isset($_GET['process'])){
			if(isset($_GET['confirm'])){
				$user->email = mysql_real_escape_string($_GET['email']);
				$user->address = mysql_real_escape_string($_GET['address']);
				$user->update_data();
				header('Location: profile.php');
			}
			if(isset($_GET['deny'])){
				header('Location: profile.php');
			}
			$message = "Are you sure you want to update this user?";
	}

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
        		<h1>The Comets</h1>
        		<?php
        		if(isset($message)){
				if(isset($_GET['process'])){
					echo '<strong>'.$message.'</strong>';
					echo "&nbsp;&nbsp;<a href='?process&confirm&email=".$_POST['email']."&address=".$_POST['address']."'>Yes</a>";
					echo '&nbsp;&bull;&nbsp;';
					echo "<a href='?process&deny'>No</a>";
					echo '<br /><br />';
				}
			}
			?>
		<form id="register_form" method="POST" action="?process">
				<table>
				    	<tr>
					 	<th>Name</th>
					 	<th title="YYYY-MM-DD">Date of Birth</th>
					 	<th>Email Address</th>
					 	<th>Address</th>
					 	<th>Subscribed</th>
					</tr>
					<?php
						$query = mysql_query("SELECT * FROM `member` WHERE `member_no` = {$_SESSION['uid']}");
						$result = mysql_fetch_assoc($query);
					?>
				                <tr>
				                	<td><?=$result['first_name'].' '.$result['last_name'];?></td>
				                	<td><?=$result['dob'];?></td>
				                	<td><input type="text" name="email" value="<?=$result['email_address'];?>" /></td>
				                	<td><textarea name="address"><?=$result['address_line_one'];?></textarea></td>
				                	<td><?=($result['subscribed'] == 1)?'&#10004;':'&times;';?></td>
				                </tr>
				</table><br />
		    		<label for="submit">Click to Update </label><input type="submit" name="submit" value="Update"/>
		</form>
        	</div>
          	<div id="sidebar">
          	  	<h1>Menu</h1>
		<?php include('sidebar.php'); ?>
   	</div>
        	</div>
    </body>
</html>