<?php

require("php/sql_sanitize.php");
require("php/settings.php");

if (!isset($_GET['token']) || !isset($_GET['email']) || !isset($_GET['id'])) {
	include("header.php");
	die("<p>Invalid link. How <em>did you</em> get here?</p>");
	include("footer.php");
}

$token = sql_sanitize($_GET['token']);
$email = sql_sanitize(urldecode($_GET['email']));
$type = sql_sanitize($_GET['id']);

$mintime = time() - 86400; // (24 * 60 * 60) {24 hours}
$result = mysql_query("SELECT id FROM email_tokens WHERE token='$token' AND email='$email' AND used='0' AND date>='$mintime' LIMIT 1");

/* a quick error check */
if (mysql_num_rows($result) == 0) {
		include("header.php");
		die("<p>Invalid token.  Please make sure you respond to the email in less than 24 hours.</p>");
		include("footer.php");
		exit;
}
	
if ($type == 0) {
	mysql_query("UPDATE email_tokens SET used='1' WHERE token='$token' AND email='$email' AND type='$type'");
	mysql_query("UPDATE accounts SET confirmed='1' WHERE email='$email'");
	
	header("Location: index.php?msg=1");
}
if ($type == 1) {
		include("header.php");
		?>

	<form id="validate_form" name="reset_form" action="process/password.php?<?php echo "token=".$token."&email=".$email."&id=".$type; ?>" method="post" autocomplete="off"><p>
    <fieldset>
        <legend>Reset Password</legend>
        <?php 
			/* echo any errors */
			if (isset($_GET['error'])) {
				switch ($_GET['error']) {
					case 0:
						echo '<p class="error">Passwords do not match.</p>';
					break;
					case 1:
						echo '<p class="error">Password needs to be at least 6 characters long.</p>';
					break;
				}
			}
		?>
        <ol>
			<li>
                <label for="password1">Password</label>
                <input type="password" name="password1" id="password" tabindex="4" />
                <div id="password_i"></div>
            </li><li>
                <label for="password">Password Again</label>
                <input type="password" name="password2" id="password2" tabindex="5" />
                <div id="password2_i"></div>
            </li>
        </ol>
    </fieldset>
    <input type="submit" value="Reset" onClick="this.disabled=1; document.reset_form.submit()" />
</p></form>

<script type="text/javascript" src="js/validate.js"></script>

<?php
		include("footer.php");
}

?>