
<?php
	require_once('includes/connect.php');
	require_once('process/user.class.php');
	$user = new User();

	if(isset($_GET['process'])){
		if(empty($_POST['first_name']) && empty($_POST['last_name'])){
			$errors[] = "You haven't entered a name";
		}
		if(empty($_POST['email'])){
			$errors[] = "You haven't entered an email address";
		} else {
			if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
				$errors[] = "The email you entered isn't valid";
			}
		}
		if(empty($_POST['message'])){
			$errors[] = "The message has no text";
		}

		if(empty($errors)){
			// Send email
			$to = 'info@thecometclub.com';
			$subject = 'The Comets Contact';
			$message = "From: {$_POST['email']}  ({$_POST['first_name']} {$_POST['last_name']})

			Body: 
			{$_POST['message']}";
			mail($to,$subject,$message);
			$errors[] = "The email has been sent.";
			unset($_POST);
		}
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
							<h2>Contact Us</h2>
							<?php
								if(!empty($errors)){
									foreach($errors as $error){
										echo $error.'<br />';
									}
								}
							?>
							<form id="register_form" method="POST" action="?process">
								<fieldset>
										<legend>Message us at The Comets</legend>
										<label for="name_group">Name </label>
										<fieldset id="name_group">
											<legend>Please only use your first and last names</legend>
											<input type="text" name="first_name" placeholder="First" value="<?=(isset($_POST['first_name']))?$_POST['first_name']:'';?>" tabindex="1"/> &bull;
											<input type="text" name="last_name" placeholder="Last" value="<?=(isset($_POST['last_name']))?$_POST['last_name']:'';?>"tabindex="2"/>
										</fieldset><br /><br />
										<label for="email">Email Address </label><input type="email" name="email" placeholder="Ex: first.last@gmail.com" value="<?=(isset($_POST['email']))?$_POST['email']:'';?>" tabindex="3" style="width: 180px;"/><br /><br />
										<label for="message" title="Message">Address </label><textarea name="message"id="message" placeholder="Enter your message here." tabindex="6" style="width: 180px; height:100px;"><?=(isset($_POST['message']))?$_POST['message']:'';?></textarea><br />
										<label for="submit">Click to Send </label><input type="submit" name="submit" value="Send" tabindex="8" />
								</fieldset>
							</form>
							<hr />
							<strong style="text-align: right;">Email</strong> &nbsp; <span><a href="mailto:info@thecometclub.com">info@thecometclub.com</a></span><br />
							<strong style="text-align: right;">Phone</strong> &nbsp; <span>+123.456.789</span><br />
							<strong style="text-align: right;">Address</strong> &nbsp; <span>13 Some Road</span><br />
							<strong style="text-align: right;">zip</strong> &nbsp; <span>123450</span><br />
							<strong style="text-align: right;">State</strong> &nbsp; <span>State</span><br />
							<strong style="text-align: right;">Country</strong> &nbsp; <span>United States of America</span><br />
					</div>
					<div id="sidebar">
						<h1>Menu</h1>
						<?php include('sidebar.php'); ?>
					</div>
			</div>
		</body>
</html>
