<?php
/*
**	login.php
**	Form to login for users
*/

// Log user out if he is logged in
require_once("../php/settings.php");
if (isset($_SESSION['email'])) {
	unset($_SESSION['email']);
}

$page_title = "Login";
require("../header.php");

if (!isset($_GET['code'])) :
?>
<form id="validate_form" name="login_form" action="../process/login.php" method="post" autocomplete="off">
<p>
    <fieldset>
        <legend>Login</legend>
        <?php 
			/* echo any errors */
			if (isset($_GET['error'])) {
				switch ($_GET['error']) {
					case -1:
						echo '<p class="error">Please login to continue.</p>'; //For general purposes
					break;
					case 0:
						echo '<p class="error">Password/Email combination unsucessful.</p>';
					break;
					case 1:
						echo '<p class="error">Auto-login unsucessful.</p>';
					break;
					case 2:
						echo '<p class="error">Please confirm email before logging in.</p>';
					break;
				}
			}
		?>
        <ol>
            <li>
                <label for="email" tabindex="1">Email</label>
                <input type="email" name="email" id="email" value="<?php echo $_GET['email']; ?>" required placeholder="<?php echo $prefs_form_default['email']; ?>" />
                <div id="email_i"></div>
            </li><li>
                <label for="password">Password</label>
                <input type="password" name="password" id="password" required placeholder="<?php echo $prefs_form_default['password']; ?>" />
                <div id="password_i"></div>
            </li>
        </ol>
    </fieldset>
    <!--<input type="submit" id="submit" value="Login" onClick="this.disabled=1; setTimeout('$(\'#submit\').attr(\'disabled\', \'\')', 2000); document.login_form.submit();" />-->
    <input type="submit" id="submit" value="Login" />
</p>
</form>

<p><a href="login.php?code=0">Forgot your password</a>?</p>
<p><a href="login.php?code=1">Resend confirmation email</a>.</p>

<script type="text/javascript" src="../js/validate.js"></script>

<?php elseif ($_GET['code'] == 0) : ?>

<form id="validate_form" name="reset_form" action="../process/reset.php" method="post" autocomplete="off"><p>
    <fieldset>
        <legend>Reset Password</legend>
        <?php 
			/* echo any errors */
			if (isset($_GET['error'])) {
				switch ($_GET['error']) {
					case 0:
						echo '<p class="error">Email not found.</p>';
					break;
					case 1:
						echo '<p class="error">reCAPTCHA is wrong.</p>';
					break;
				}
			}
		?>
        <ol>
            <li>
                <label for="email">Email</label>
                <input type="text" name="email" id="email" value="<?php echo $_GET['email']; ?>" />
                <div id="email_i"></div>
            	</li><li>
				<script>
				var RecaptchaOptions = {
				   theme : 'clean'
				};
				</script>
					<?php 
						require_once('../php/recaptchalib.php');
						echo recaptcha_get_html($captcha_public_key); // public key
					?>
            </li>
        </ol>
    </fieldset>
    <input type="submit" value="Reset"  onClick="this.disabled=1; document.reset_form.submit()"  />
</p></form>

<script type="text/javascript" src="../js/validate.js"></script>

<?php elseif ($_GET['code'] == 1) : ?>

<form id="validate_form" name="resend_form" action="../process/resend.php" method="post" autocomplete="off"><p>
    <fieldset>
        <legend>Resend Confirmation Email</legend>
        <?php 
			/* echo any errors */
			if (isset($_GET['error'])) {
				switch ($_GET['error']) {
					case 0:
						echo '<p class="error">That email has already been confirmed or '."doesn't exist...</p>";
					break;
					case 1:
						echo '<p class="error">reCAPTCHA is wrong.</p>';
					break;
				}
			}
		?>
        <ol>
            <li>
                <label for="email">Email</label>
                <input type="text" name="email" id="email" value="<?php echo $_GET['email']; ?>" />
                <div id="email_i"></div>
            	</li><li>
				<script>
				var RecaptchaOptions = {
				   theme : 'clean'
				};
				</script>
					<?php 
						require_once('../php/recaptchalib.php');
						echo recaptcha_get_html($captcha_public_key); // public key
					?>
            </li>
        </ol>
    </fieldset>
    <input type="submit" value="Reset"  onClick="this.disabled=1; document.resend_form.submit()"  />
</p></form>

<script type="text/javascript" src="../js/validate.js"></script>

<?php
endif;
require("../footer.php");
?>