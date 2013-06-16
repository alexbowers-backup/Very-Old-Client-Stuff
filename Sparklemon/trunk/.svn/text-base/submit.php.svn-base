<?php 
require_once("php/settings.php");
$page_title = "Submit Resource";
$listMode = 1;
if (!isset($_SESSION['email'])) { header("Location: index.php"); }

if ($_GET['code']==1) { 
	$more_stuff = '<link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.6/themes/base/jquery-ui.css" id="theme"><link rel="stylesheet" href="http://sparklemon.com/upload/jquery.fileupload-ui.css">';
	$uploading = true;
}

require("header.php");

if (!isset($_GET['code']) && !isset($_GET['sucess'])) : ?>

<form action="process/submit_file.php" method="post" name="submission_form" autocomplete="off" enctype="multipart/form-data">
<p>
    <fieldset>
        <legend>Submit Resource</legend>
        <?php 
			/* ERRORS */
			if (isset($_GET['error']))
			{
				switch ($_GET['error'])
				{
					case 0:
						echo '<p class="error">reCAPTCHA is incorrect.</p>';
						break;
					case 1:
						echo '<p class="error">Short description is too long (120 characters maximum) or does not exist.</p>';
						break;
					case 2:
						echo '<p class="error">Long description is too long (10,000 characters maximum).</p>';
						break;
					case 3:
						echo '<p class="error">Price must be between $1 and $100.</p>';
						break;
					case 4:
						echo '<p class="error">Please select a thumbnail, preview, <b>and</b> zip file.</p>';
						break;
					case 5:
						echo '<p class="error">Item name must be between 5 and 30 characters long.</p>';
						break;
					case 6:
						echo '<p class="error">Submitted thumbnail is not a valid file type.</p>';
						break;
					case 7:
						echo '<p class="error">Submitted preview is not a valid file type.</p>';
						break;
					case 8:
						echo '<p class="error">Submitted ZIP is not a *.zip file.</p>';
						break;
					case 9:
						echo '<p class="error">One (or more) of those files is already linked to a submission.</p>';
						break;
				}
			}
		?>
        <h1><input type="text" name="item_name" tabindex="1" style="width: 250px; padding: 4px 10px; height: 40px; font: 20pt 'OtariBold-Limited', Georgia, 'Times New Roman', Times, serif;" value="<?php echo urldecode($_GET['name']); ?>" required placeholder="Lorem Ipsum" /> by <?php 
			$email = $_SESSION['email'];
			$query = mysql_query("SELECT * FROM accounts WHERE email='$email' LIMIT 1");
			$row = mysql_fetch_array($query);
			$name = $row['first_name'].' '.$row['last_name'];
			echo $name;
		?></h1>
        <ol>
        <h2>Files</h2>
            <li>
                <label for="thumb">Thumbnail Image</label>
                <select name="thumb" id="thumb" tabindex="3" required>
                	<option value="blank"></option>
                    <?php
						if (isset($_GET['thumb'])) { $tempfile = urldecode($_GET['thumb']); }
						else { $tempfile = ''; }
						include('php/get_filelist.php');
					?>
                </select> <small>100 x 100</small>
            </li><li>
                <label for="preview">Preview Image</label>
                <select name="preview" id="preview" tabindex="6" required>
                	<option value="blank"></option>
                    <?php
						if (isset($_GET['prev'])) { $tempfile = urldecode($_GET['prev']); }
						else { $tempfile = ''; }
						include('php/get_filelist.php');
					?>
				</select> <small>560 x 280</small>
            </li><li>
                <label for="zip">Zip Archive</label>
                <select name="zip" id="zip" tabindex="9" required>
                	<option value="blank"></option>
                    <?php
						if (isset($_GET['arch'])) { $tempfile = urldecode($_GET['arch']); }
						else { $tempfile = ''; }
						include('php/get_filelist.php');
					?>
                </select>
            </li>
            <h2>Description</h2>
            <li>
                <label for="short_desc">Short Description (<span id="charNumber">120</span> characters left)</label>
                <textarea name="short_desc" maxlength="120" id="short_desc" tabindex="12" cols=40 rows=3 required placeholder="Duis rutrum enim quis massa pellentesque..."><?php echo urldecode($_GET['short_desc']); ?></textarea>
            </li><li>
                <label for="long_desc">Long Description (optional)</label>
                <textarea name="long_desc" id="long_desc" tabindex="15" cols=40 rows=8 required placeholder="Integer mollis euismod ante, at condimentum leo..."><?php echo urldecode($_GET['long_desc']); ?></textarea>
            </li>
            <h2>Other</h2>
            <li>
                <label for="price">Price (USD)</label>
                <input type="text" name="price" tabindex="18" value="<?php if (isset($_GET['price'])) { echo urldecode($_GET['price']); } ?>" required placeholder="10.00" />
            </li><li>
                <label for="tags">Tags</label>
                <input type="text" name="tags" tabindex="21" value="<?php echo urldecode($_GET['tags']); ?>" required placeholder="awesome, useful, ..." /> <small>(comma-separated)</small>
            </li><li>
                <label for="cat1">Category</label>        
                <select name="cat1" id="cat1" tabindex="24">
                	<option value="blank"></option>
                    <?php
					$c1 = -1;
                    if (isset($_GET['c1'])) {
						$c1 = urldecode($_GET['c1']);
					} 
					$s = 'selected';
					?>
                    <option value="0" <?php if ($c1 == 0) echo $s; ?>>Graphics</option>
                    <option value="1" <?php if ($c1 == 1) echo $s; ?>>Sound/Music</option>
                    <option value="2" <?php if ($c1 == 2) echo $s; ?>>Scripts/Plugins</option>
                    <option value="3" <?php if ($c1 == 3) echo $s; ?>>Engines</option>
                </select>
                <span id="arrow" class="hidden"><img src="<?php echo $prefs_sitebase; ?>/images/dropdown_arrow.png" style="vertical-align: middle;" alt="--&gt;" /></span>
                <select name="cat2" id="cat2" class="hidden" tabindex="27"></select>
            </li><br />
			<script>
				var RecaptchaOptions = { theme : 'clean' };
            </script>
			<?php 
				require_once('php/recaptchalib.php');
				echo recaptcha_get_html($captcha_public_key); // public key
			?>
			</li>
        </ol>
    </fieldset>
    <input type="submit" value="Queue Resource" />
</p>
</form>

<script type="text/javascript" src="../js/validate.js"></script>
<script type="text/javascript">
	$(function(){
		$('#short_desc').keyup(function() {
			var length = $(this).val().length;
			$('#charNumber').text(120-length);
		});
		$('#short_desc').change(function() {
			var length = $(this).val().length;
			$('#charNumber').text(120-length);
		});
		$('#cat1').change(function() {
			var value;
			value = "";
			switch ($('#cat1').val()) {
				case "0":
				value = '<option value="0">Sprites</option><option value="1">Backgrounds</option><option value="2">User Interfaces</option><option value="3">Other</option>';
				$("#cat2").removeClass("hidden");
				$("#arrow").removeClass("hidden");
				break;
				
				case "1":
				value = '<option value="0">Background</option>';
				$("#cat2").removeClass("hidden");
				$("#arrow").removeClass("hidden");
				break;
				
				case "2":
				value = '<option value="0">C</option><option value="1">Java</option><option value="2">GML</option><option value="3">Lua</option><option value="4">Python</option>';
				$("#cat2").removeClass("hidden");
				$("#arrow").removeClass("hidden");
				break;
				
				default:
				value = '';
				$("#cat2").addClass("hidden");
				$("#arrow").addClass("hidden");
				break;
			}
			if (value!="") {
				value = '<option value="blank"></option>' + value;
			}
			$('#cat2').html(value);
		});
	});
</script>

<?php elseif ($_GET['code'] == 1) : ?>
Code = 1.
<?php elseif (isset($_GET['sucess'])) : ?>
<h1>Item Submitted</h1>
<p>Thanks!  Your item has been submitted and will be reviewed by administrators.  We will contact you via email with a response within a week.</p>
<?php endif;
require("footer.php"); ?>
