<!DOCTYPE html>
<html>
	<head>
		<meta charset=utf-8 />
		<title>Register - Spark Lemon</title>
		<link rel="stylesheet" href="css/master.css" type="text/css" media="screen" title="no title" charset="utf-8" />
		<link rel="shortcut icon" href="http://sparklemon.com/favicon.ico">
        <meta name="viewport" content="width=device-width; initial-scale=1.0">
        <!--[if lt IE 9]>
        <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
    </head>
	<body>
		<div id="hold">
		<header><a href="./" class="i"><img src="css/img/head.png" alt="Spark Lemon" /></a></header>
		<div id="container">
			<form autocomplete="off" method="post" action="#" name="login_form">
				<fieldset>
			        <legend>Register</legend>
	                <ol>
			            <div class="col">
			            	<li>
				                <label for="first-name">First Name</label>
				                <input type="text" required placeholder="Robert" id="first-name" name="first-name">
				            </li><li>
				                <label for="last-name">Last Name</label>
				                <input type="text" required placeholder="Smith" id="last-name" name="last-name">
				            </li><li>
				                <label for="email">Email</label>
				                <input type="email" required placeholder="example@nowhere.com" id="email" name="email">
				           </li>
			            </div>
			            <div class="col">
			            	<li>
				                <label for="password">Password</label>
				                <input type="password" required placeholder="&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;" id="password" name="password">
				            </li><li>
				                <label for="password">Password (Again)</label>
				                <input type="password" required placeholder="&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;" id="password" name="password">
				            </li><li>
				        </div>
				        <span class="clearfix"></span>
				        <li style="margin-top: 10px;">	
				        	<?php 
						        require_once('php/recaptchalib.php');
								$publickey = "6LdlccASAAAAADm0n5Z5oQn3QLwmP04yOjKdBSVj"; // you got this from the signup page
								echo recaptcha_get_html($publickey);
							?>
						</li>
			        </ol>
			    </fieldset>
			    <input type="submit" value="Register" id="submit">
			</form>
		</div>
		</div>
		<footer>&copy; 2011 <a href="http://sparklemon.com" class="i" style="color: inherit;">Spark Lemon</a>. All rights reserved.</footer>
	</body>
</html>