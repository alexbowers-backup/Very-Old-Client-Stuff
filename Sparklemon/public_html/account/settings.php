<?php
/*
set.php - change user's settings
*/

require('../php/settings.php');
$email = $_SESSION['email'];
$result=mysql_query("SELECT * FROM accounts WHERE email='$email' LIMIT 1");
if(mysql_num_rows($result)<1) {
	header("Location: ../index.php");
	exit;
}
$uploadBox = true;
$row = mysql_fetch_array($result);
$uid = $row['id'];
$fname = $row['first_name'];
$lname = $row['last_name'];
$page_title = "Settings";
$more_stuff = '<link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.6/themes/base/jquery-ui.css" id="theme">
<link rel="stylesheet" href="'.$prefs_sitebase.'/upload/jquery.fileupload-ui.css">';
require('../header.php');
?>

<form action="../process/settings.php" method="post" name="settings_form" autocomplete="off"><p>
    <fieldset>
        <legend>Settings</legend>
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
					case 6:
						echo '<p class="error">Your "old password" is wrong...</p>';
					break;
				}
			}
		?>
        <ol>
        	<li>
            	<label>Avatar</label>
				<?php
                $email=$_SESSION['email'];
				$query=mysql_query("SELECT credits FROM accounts WHERE email='$email' LIMIT 1");
				$row=mysql_fetch_array($query);
				$avatar=user_get_avatar(user_get_id($_SESSION['email']));
				if ($avatar=="") {
					gravatar_get($_SESSION['email']);
				}
				else
				{
					echo '<img src="'.$prefs_sitebase.'/images/avatars/'.$avatar.'" class="gravatar" />';
				}
				?><a href="../avatar.php" style="margin-left: 14px;">{ change }</a>
            </li><li>
                <label for="f_name">First Name</label>
                <input type="text" name="f_name" tabindex="1" value="<?php echo $fname; ?>" required placeholder="<?php echo $prefs_form_default['fname']; ?>"/>
            </li><li>
                <label for="l_name">Last Name</label>
                <input type="text" name="l_name" tabindex="2" value="<?php echo $lname; ?>" required placeholder="<?php echo $prefs_form_default['lname']; ?>"/>
            </li><li>
                <label for="email">Email</label>
                <input type="email" name="email" id="email" tabindex="3" value="<?php echo $email; ?>" required placeholder="<?php echo $prefs_form_default['email']; ?>"/>
                <div id="email_i"></div>
            </li><li>
                <label for="password">Old Password</label>
                <input type="password" name="opassword" id="opassword" tabindex="4" placeholder="<?php echo $prefs_form_default['password']; ?>"/>
                <div id="opassword_i"></div>
            </li><li>
                <label for="password">New Password</label>
                <input type="password" name="password1" id="password" tabindex="5" placeholder="<?php echo $prefs_form_default['password']; ?>" />
                <div id="password_i"></div>
            </li><li>
                <label for="password">Repeat New Password</label>
                <input type="password" name="password2" id="password2" tabindex="6" placeholder="<?php echo $prefs_form_default['password']; ?>" />
                <div id="password2_i"></div>
            </li>
        </ol>
    </fieldset>
    <input type="submit" value="Change" onClick="this.disabled=1; document.settings_form.submit()" />
</p>
</form>
	
<script type="text/javascript" src="../js/validate.js"></script>
</div>

<div id="upload-box"><h2>Uploader</h2><p></p>
	<p><ul style="list-style: square;">
        <li>You may upload <span class="caps">Png</span>, <span class="caps">Jpeg</span>, and <span class="caps">Zip</span> files</li>
        <li>Please make the thumbnail image 100 x 100 and the preview image 560 x 280</li>
        <li>Your files will be removed automatically after submission</li>
        <li>You can also drag and drop files below to upload</li>
    </ul></p>
    <form class="upload" action="<?php echo $prefs_sitebase ?>/process/upload_item.php" style="margin:auto;" method="POST" enctype="multipart/form-data">
    <input type="file" name="file" multiple>
    <button>Upload</button>
    <div>Upload files</div>
</form>
<table class="upload_files"></table>
<table class="download_files"></table>
<h2>Your Files</h2>
<ul class="file-list"></ul>
<a class="accented" href="<?php echo $prefs_sitebase ?>/submit.php">Want to submit an item?</a>
</div>
<? require('../footer.php'); ?>