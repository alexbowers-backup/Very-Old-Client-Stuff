<?php
require('../php/settings.php');
include('../php/cookie_login.php');
include('../php/check_admin.php');
include("../php/sql_sanitize.php");
require("../php/postmark.php");

$user_id = sql_sanitize($_GET['id']);
$result = mysql_query("SELECT * FROM accounts WHERE id='$user_id' LIMIT 1");

if (mysql_num_rows($result) == 0) { // user not found
	header("HTTP/1.0 404 Not Found");
	echo file_get_contents("http://sparklemon.com/error.php"); 
	exit;
}
while ($row=mysql_fetch_array($result)) {
	$u_name = $row['first_name'].' '.$row['last_name'];
	$u_fname = $row['first_name'];
	$u_lname = $row['last_name'];
	$u_email = $row['email'];
	$u_credits = $row['credits'];
	$u_position = user_get_position($row['admin']);
	
	$disabled = '';
	if ($row['admin']==1) {
		$disabled = 'disabled = "true"';
	}
	
	$u_joined = $row['joined'];
	$u_confirmed = $row['confirmed'];
		//$i_featured = $row['featured'];
}

if (isset($_POST['modify_user'])) { // if it's processing the page, then... process it!
	//////////////////////
		$f_name = sql_sanitize($_POST['f_name']);
		$l_name = sql_sanitize($_POST['l_name']);
		$n_email = sql_sanitize($_POST['email']);
		$n_credits = sql_sanitize($_POST['credits']);

		$password = hasher(sql_sanitize($_POST['password1']));
		
		$reconfirm = false;
		if (isset($_POST['reconfirm_email'])) { $reconfirm = true; }
		
		$remove_avatar = false;
		if (isset($_POST['remove_avatar'])) { $remove_avatar = true; }
		
		$reset_pw = false;
		if (isset($_POST['reset_pw'])) { $reset_pw = true; }
		
		
		///// ERRORS /////
		/*// email is invalid
		if (!email_validate($n_email)) {
			header("Location:".$prefs_sitebase.'/admin/user/'.$user_id.'?error=0');
			exit;
		}
		// password is too short
		if (strlen($password)>0 && strlen($password)<6) {
			header("Location:".$prefs_sitebase.'/admin/user/'.$user_id.'?error=2');
			exit;
		}
		// email exists elsewhere
		$result=mysql_query("SELECT * FROM accounts WHERE email='$n_email'");
		if (mysql_num_rows($result)>0 && $n_email!=$u_email) {
			header("Location:".$prefs_sitebase.'/admin/user/'.$user_id.'?error=3');
			exit;
		}
		// name is too long or short
		if ((strlen($f_name)>40 || strlen($l_name)>40) || (strlen($f_name)<=1 || strlen($l_name)<=1)) {
			header("Location:".$prefs_sitebase.'/admin/user/'.$user_id.'?error=5');
			exit;
		}*/
		///// END ERRORS /////
		
		
		if (!$disabled) { // not applicable for admins
			/* change first name */
			if ($f_name != $u_fname) {
				mysql_query("UPDATE accounts SET first_name='$f_name' WHERE id='$user_id'");
			}
			
			/* change last name */
			if ($l_name != $u_lname) {
				mysql_query("UPDATE accounts SET last_name='$l_name' WHERE id='$user_id'");
			}
			/* change email _value_ */
			if ($n_email != $u_email) {
				mysql_query("UPDATE accounts SET email='$n_email' WHERE id='$user_id'"); // set email
			}
			/* resend confirmation email (and unconfirm user) */
			if ($reconfirm) {
				mysql_query("UPDATE accounts SET confirmed='0' WHERE id='$user_id'"); // un-confirm account
				
				$token = email_token_create($u_email,0);

				/* send the email */
				Mail_Postmark::compose()
				->addTo($u_email,$f_name." ".$l_name)
				->subject("Spark Lemon Account Confirmation")
				->messagePlain("Hello ".$f_name.",\n\nYour email needs to be confirmed again. Please click on the following link.\n\n".$prefs_sitebase."/confirm.php?token=".urlencode($token)."&email=".urlencode($u_email)."&id=0\n\n".$prefs_email_signature)
				->send();
			}
			if ($remove_avatar) {
				mysql_query("DELETE FROM avatars WHERE user_id='$user_id'"); // remove avatar
			}
			if ($reset_pw) {
				//echo "Resetting password";
			}
			
			if (strlen($password)!=0) {
				// change password
				mysql_query("UPDATE accounts SET password='$password' WHERE id='$user_id'");		
			}
		}
		
		/* change credits */
		if ($n_credits != $u_credits) {
			mysql_query("UPDATE accounts SET credits='$n_credits' WHERE id='$user_id'"); // set email
		}
		header("Location:".$prefs_sitebase.'/admin/user/'.$user_id);
	//////////////////////
}
else { // no POSTDATA sent, so echo the form
	$page_title = $u_name;
	include("../header.php"); ?>
    
	<h1><?php echo $u_name; ?></h1>
	<a href="<?php echo $prefs_sitebase.'/admin/userlist.php'; ?>">&lt; back</a>
	<!--<ul>
		<li>Email: <?php echo $u_email; ?> - <input type="button" value="re-confirm?"/></li>
	</ul>-->
	
	<form action="<?php echo $prefs_sitebase.'/admin/user/'.$user_id; ?>" method="post" name="settings_form" autocomplete="off"><p>
		<fieldset>
			<?php 
				/* echo any errors */
				if (isset($_GET['error'])) {
					switch ($_GET['error']) {
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
							echo '<p class="error">Email is already in use by another account.</p>';
						break;
						case 4:
							echo '<p class="error">Password is more than 30 characters long.</p>';
						break;
						case 5:
							echo '<p class="error">First or last name is too short or too long.</p>';
						break;
					}
				}
			?>
			<ol>
				<li>
					<label>Avatar</label>
					<?php
					$query=mysql_query("SELECT credits FROM accounts WHERE email='$u_email' LIMIT 1");
					$row=mysql_fetch_array($query);
					$avatar=user_get_avatar($user_id);
					if ($avatar=="") {
						gravatar_get($u_email);
					}
					else
					{
						echo '<img src="'.$prefs_sitebase.'/images/avatars/'.$avatar.'" class="gravatar" />';
					}
					?> <input type="checkbox" name="remove_avatar" value="yes" <?php echo $disabled; ?>/> Remove avatar?
				</li><li>
					<label for="f_name">First Name</label>
					<input type="text" name="f_name" tabindex="1" value="<?php echo $u_fname; ?>" <?php echo $disabled; ?> required placeholder="<?php echo $prefs_form_default['fname']; ?>" />
				</li><li>
					<label for="l_name">Last Name</label>
					<input type="text" name="l_name" tabindex="2" value="<?php echo $u_lname; ?>" <?php echo $disabled; ?> required placeholder="<?php echo $prefs_form_default['lname']; ?>" />
				</li><li>
					<label for="email">Email</label>
					<input type="email" name="email" id="email" tabindex="3" value="<?php echo $u_email; ?>" <?php echo $disabled; ?> style="width: 210px" /><input type="checkbox" name="reconfirm_email" value="yes" <?php echo $disabled; ?> placeholder="<?php echo $prefs_form_default['email']; ?>" /> Resend confirmation?
					<div id="email_i"></div>
				</li><li>
					<label for="password">(New) Password</label>
					<input type="password" name="password1" id="password" tabindex="5" <?php echo $disabled; ?> placeholder="<?php echo $prefs_form_default['password']; ?>"/>
					<div id="password_i"></div>
				</li><li>
                    <label for="credits">Credits</label>
					<input type="text" name="credits" tabindex="6" value="<?php echo number_format($u_credits,2); ?>" <?php /*echo $disabled;*/ ?> required placeholder="<?php echo $prefs_form_default['credits']; ?>"/>
				</li><li>
					<label>Confirmed?</label>
					<?php if ($u_confirmed==1) { echo '<span class="highlight green">Yes</span>'; } else { echo '<span class="highlight">No</span>'; }?>
				</li><li><label>Position</label>
					<?php echo $u_position; ?>
				</li>
				<input type="hidden" name="modify_user" value="1" />
			</ol>
		</fieldset>
		<input type="submit" value="Change" <?php /*echo $disabled;*/ ?>/>
	</p>
	</form>

<?
    include("../footer.php");
}
?>