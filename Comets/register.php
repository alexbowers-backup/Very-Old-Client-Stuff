<?php
	//require('includes/connect.php');
	require_once('includes/connect.php');
	require_once('process/user.class.php');
	$user = new User();
	require_once('process/register.php');
	if($user->signed_in){
		header('Location: index.php');
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
						<h1 class="message">The comets</h1>
							<h2>Membership</h2>
							<?php
								if(!empty($errors)){
									foreach($errors as $error){
										echo $error.'<br />';
									}
								}
							?>
							<form id="register_form" method="POST" action="?process">
								<fieldset>
										<legend>Register for The Comets</legend>
										<label for="name_group">Name </label>
										<fieldset id="name_group">
											<legend>Please only use your first and last names</legend>
											<input type="text" name="first_name" placeholder="First" value="<?=(isset($_POST['first_name']))?$_POST['first_name']:'';?>" tabindex="1"/> &bull;
											<input type="text" name="last_name" placeholder="Last" value="<?=(isset($_POST['last_name']))?$_POST['last_name']:'';?>"tabindex="2"/>
										</fieldset><br />
										<label for="email">Email Address </label><input type="email" name="email" placeholder="Ex: first.last@gmail.com" value="<?=(isset($_POST['email']))?$_POST['email']:'';?>" tabindex="3" style="width: 180px;"/><br /><br />
										<label for="password_group">Password </label>
										<fieldset id="password_group">
											<input type="password" name="password" id="password" placeholder="Password" tabindex="4"/> &bull;
											<input type="password" name="password_confirmation" id="password_confirmation" placeholder="Confirm Password" tabindex="5"/><br />
											<small>Between 8 and 16 characters long</small>
										</fieldset><br />
										<label for="address" title="First line of Address">Address </label><textarea name="address"id="address" placeholder="First line only" tabindex="6" style="width: 180px;"><?=(isset($_POST['address']))?$_POST['address']:'';?></textarea><br />
										<label for="birthday">Date of Birth </label><input type="date" name="dob" id="birthday" placeholder="dd/mm/yyyy" value="<?=(isset($_POST['dob']))?$_POST['dob']:'';?>" tabindex="7"/><br /><br />
										<label for="submit">Click to Register </label><input type="submit" name="submit" value="Register" tabindex="8" />
								</fieldset>
							</form>
					</div>
					<div id="sidebar">
						<h1>Menu</h1>
						<?php include('sidebar.php'); ?>
					</div>
			</div>
		</body>
</html>
