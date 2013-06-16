<?php
/*
register.php - form to register
*/

//Log user out if he is logged in
require_once("../php/settings.php");
if (isset($_SESSION['email'])) {
	unset($_SESSION['email']);
}

$page_title = "Register";
$js_script = '<script type="text/javascript">$(function() { $("#f_name").focus(); });</script>';
require('../header.php');
/*echo '<br />'.substr(md5(uniqid(rand(), true)), 0, 9).'<br />';*/
?>

<form action="../process/register.php" method="post" name="register_form" autocomplete="off">
<p>
    <fieldset>
        <legend>Register</legend>
        <?php 
			/* echo any errors */
			if (isset($_GET['error']))
			{
				switch ($_GET['error'])
				{
					case 0:
						echo '<p class="error">Email is not valid.</p>';
					break;
					case 1:
						echo '<p class="error">Passwords do not match.</p>';
					break;
					case 2:
						echo '<p class="error">Password needs to be at least 6 characters long.</p>';
					break;
					case 3:
						echo '<p class="error">Email is already in use.</p>';
					break;
					case 4:
						echo '<p class="error">Password is more than 30 characters long.</p>';
					break;
					case 5:
						echo '<p class="error">First or last name is more than 40 characters long.</p>';
					break;
					case 6:
						echo '<p class="error">reCAPTCHA is incorrect.</p>';
					break;
					case 7:
						echo '<p class="error">The email you have entered is already associated with another account.</p>';
					break;
				}
			}
		?>
        <ol>
            <li>
                <label for="f_name">First Name</label>
                <input type="text" name="f_name" id="f_name" tabindex="1" value="<?php echo $_GET['fname']; ?>" required placeholder="<?php echo $prefs_form_default['fname']; ?>" />
            </li><li>
                <label for="l_name">Last Name</label>
                <input type="text" name="l_name" id="l_name" tabindex="2" value="<?php echo $_GET['lname']; ?>" required placeholder="<?php echo $prefs_form_default['lname']; ?>" />
            </li><li>
                <label for="email">Email</label>
                <input type="email" name="email" id="email" tabindex="3" value="<?php echo $_GET['email']; ?>" required placeholder="<?php echo $prefs_form_default['email']; ?>" />
                <div id="email_i"></div>
            </li><li>
                <label for="password">Password</label>
                <input type="password" name="password1" id="password" tabindex="4" required placeholder="<?php echo $prefs_form_default['password']; ?>" />
                <div id="password_i"></div>
            </li><li>
                <label for="password">Password Again</label>
                <input type="password" name="password2" id="password2" tabindex="5" required placeholder="<?php echo $prefs_form_default['password']; ?>" />
                <div id="password2_i"></div>
            <li style="margin-top: 12px">
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
    <!--<input type="submit" id="submit" value="Register" onClick="this.disabled=1; setTimeout('$(\'#submit\').attr(\'disabled\', \'\')', 2000); document.login_form.submit();" />-->
    <input type="submit" tabindex="10" id="submit" value="Register" />
</p>
</form>
	
<script type="text/javascript" src="../js/validate.js"></script>

<? require('../footer.php'); ?>