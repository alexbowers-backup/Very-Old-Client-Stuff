<?php
	session_start();
	include('connect.php');
?>
<!doctype html>
<html>
	<head>
		<title>One PC Logged In - NetTuts</title>
	</head>
	<body>
		<form method="post" action="login.php">
			<input type="text" name="username" placeholder="Username" />
			<input type="submit" value="Login" />
		</form>
		<br />
		<?php
			if(isset($_SESSION['id'])) {
				echo 'You are logged in';
			}
		?>
	</body>
</html>