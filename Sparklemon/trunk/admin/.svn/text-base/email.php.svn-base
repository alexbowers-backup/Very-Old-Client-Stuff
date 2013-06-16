<?php
require('../php/settings.php');
include('../php/cookie_login.php');
include('../php/check_admin.php');
$page_title = "Email User";
include("../header.php");

$f_user=$_GET['user'];
$query=mysql_query("SELECT * FROM accounts WHERE id='$f_user' LIMIT 1");
$row=mysql_fetch_array($query);
$f_name=$row['first_name'];
$l_name=$row['last_name'];
?>
<h1>Email User</h1>
<p>Email the user a message.</p>
<form action="../process/admin_email.php" method="post" name="email_user">
	<p>User: <span class="fake_input"><?php echo $f_name." ".$l_name; ?></span></p>
	<p>Subject: &nbsp;&nbsp; Spark Lemon <input type="text" name="subject" /></p>
	<p>Message:<br />
	<textarea name="message" cols="50" rows="10">Dear <?php echo $f_name; ?>,



<?php echo $prefs_email_signature; ?></textarea></p>
	<input type="hidden" name="user" value="<?php echo $f_user; ?>" />
	<p><input type="submit" value="Send Email" /></p>
</form>
<?php
include("../footer.php");
?>