<?php
/*
set.php - change user's settings
*/

require('../php/settings.php');
require('../php/get_countries.php');

$c = ' ';
$email = $_SESSION['email'];
$result = mysql_query("SELECT * FROM accounts WHERE email='$email' LIMIT 1");
if (mysql_num_rows($result) < 1) {
	header("Location: ../index.php");
	exit;
}
$footnote = 'File icons by <a href="http://ashung.deviantart.com/">ashung</a>.';
$uploadBox = true;

$row = mysql_fetch_array($result);
$uid = $row['id'];
$ucon = strtoupper($row['country']);
$fname = $row['first_name'];
$lname = $row['last_name'];

if ($ucon != '') {
	$c = $ucon;	
}

$page_title = "Settings";
$more_stuff = '<link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.6/themes/base/jquery-ui.css" id="theme">
<link rel="stylesheet" href="'.$prefs_sitebase.'/upload/jquery.fileupload-ui.css">';
$more_stuff .= '<link rel="stylesheet" href="'.$prefs_sitebase.'/css/payment.css">';

if (isset($_GET['con'])) {
	$c = urldecode($_GET['con']);
} 

require('../header.php');

?>
<?php

	/*if (isset($_GET['balance'])) {
		$balance = $_GET['balance'];
	}
	else {
		$balance = 5;
	}*/
	$balance = $credits;
	if ($balance < 15) {
		$bar_height = 55 + ($balance*16); // every $5 is 80 pixels
		$button_style = 'disabled';
		$button_link = '#';
	}
	else {
		$bar_height = 368;
		$button_style = 'enabled';
		$button_link = $prefs_sitebase . "/process/user_payment.php?type=0";
	}
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
					case 7:
						echo '<p class="error">You have already requested a payment.</p>';
					break;
					case 8:
						echo '<p class="error">You must have at least $15 in your account to do that.</p>';

					break;
				}
			}
		?>
        <ol>
        	<li>
            	<label>Avatar</label>
				<?php
                $email = $_SESSION['email'];
				$query = mysql_query("SELECT credits FROM accounts WHERE email='$email' LIMIT 1");
				$row = mysql_fetch_array($query);
				$avatar = user_get_avatar(user_get_id($_SESSION['email']));
				if ($avatar == "") {
					gravatar_get($_SESSION['email']);
				}
				else {
					echo '<img src="'.$prefs_sitebase.'/images/avatars/'.$avatar.'" class="gravatar" />';
				}
				?><a href="../avatar.php" style="margin-left: 14px;">{ change }</a>
            </li><li>
                <label for="f_name">First Name</label>
                <input type="text" name="f_name" id="f_name" tabindex="1" value="<?php echo $fname; ?>" required placeholder="<?php echo $prefs_form_default['fname']; ?>"/>
            </li><li>
                <label for="l_name">Last Name</label>
                <input type="text" name="l_name" id="l_name" tabindex="2" value="<?php echo $lname; ?>" required placeholder="<?php echo $prefs_form_default['lname']; ?>"/>
            </li><li>
                <label for="email">Email</label>
                <input type="email" name="email" id="email" tabindex="3" value="<?php echo $email; ?>" required placeholder="<?php echo $prefs_form_default['email']; ?>"/>
                <div id="email_i"></div>
            </li><li>
                <label for="country">Country</label>
                <select name="country" id="country" tabindex="6" style="width: 186px; padding: 6px 8px;">
                    <?php

						country_list($c);
					?>                    
                </select>
            </li><li>
                <label for="password">Old Password</label>
                <input type="password" name="opassword" id="opassword" tabindex="8" placeholder="<?php echo $prefs_form_default['password']; ?>"/>
                <div id="opassword_i"></div>
            </li><li>
                <label for="password">New Password</label>
                <input type="password" name="password1" id="password" tabindex="10" placeholder="<?php echo $prefs_form_default['password']; ?>" />
                <div id="password_i"></div>
            </li><li>
                <label for="password">Repeat New Password</label>
                <input type="password" name="password2" id="password2" tabindex="12" placeholder="<?php echo $prefs_form_default['password']; ?>" />
                <div id="password2_i"></div>
            </li>
        </ol>
    </fieldset>
    <input type="submit" value="Change" onClick="this.disabled=1; document.settings_form.submit()" />
</form>
	
<script type="text/javascript" src="../js/validate.js"></script>
</div>

<div id="upload-box"><h2>Uploader</h2><p></p>
	<p><ul style="list-style: square;">
        <li>You may upload <span class="caps">Png</span>, <span class="caps">Jpeg</span>, and <span class="caps">Zip</span> files</li>
        <li>Please make the thumbnail image is 100 x 100 <span class="caps">px</span> and the preview image is 560 x 280 <span class="caps">px</span></li>
        <li>Your files will be removed automatically after submission</li>
        <li>You can also drag and drop files below to upload</li>
	<li>Files not submitted after 30 days will be deleted</li>
    </ul>
    <form class="upload" action="<?php echo $prefs_sitebase ?>/process/upload_item.php" style="margin:auto;" method="POST" enctype="multipart/form-data">
    <input type="file" name="file" multiple>
    <button>Upload</button>
    <div>Upload files</div>
</form>
<table class="upload_files"></table>
<table class="download_files"></table>
<h2>Your Files</h2>
<ul class="file-list"></ul>
<h2>Queued Submissions</h2>
<ul class="submission-list"><?php include('../php/get_submissions.php'); ?></ul>
<a class="accented" href="<?php echo $prefs_sitebase ?>/submit.php">Want to submit an item?</a>
</div>
<!--<img src="http://sparklemon.com/images/money-chart.gif" style="float: right"/>-->
<div id="payment-side" style="float: right">
    <h2>Balance</h2>
    <div id="overlay"></div>
    <div id="bar"></div>
    <a id="request-button" class="disabled" href="<?php echo $button_link; ?>">request payment</a>
    <h3>$<?php echo number_format($balance,2); ?></h3>
</div>
<script type="text/javascript">
    $(window).load(function(){  
        $('#bar').css('display','block');
        $('#payment-side').css('background','#e8e8e8');
        $('#bar').animate({ height: <?php echo $bar_height; ?> }, 1500, function() {
            <?php if ($button_style != 'disabled') : ?>
                $('#request-button').removeClass('disabled').addClass('enabled');
            <?php endif; ?>
        });
    });
</script>
<? require('../footer.php'); ?>
