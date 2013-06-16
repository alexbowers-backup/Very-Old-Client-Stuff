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
				}
			}
		?>
        <h1><input type="text" name="item_name" tabindex="1" style="width: 250px; padding: 4px 10px; height: 40px; font: 20pt 'OtariBold-Limited', Georgia, 'Times New Roman', Times, serif;" value="<?php echo urldecode($_GET['name']); ?>" /> by <?php 
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
                <select name="thumb" id="thumb">
                	<option value="blank"></option>
                    <?php include('php/get_filelist.php'); ?>
                </select> <small>100 x 100</small>
            </li><li>
                <label for="preview">Preview Image</label>
                <select name="preview" id="preview">
                	<option value="blank"></option>
                    <?php include('php/get_filelist.php'); ?>
                </select> <small>560 x 280</small>
            </li><li>
                <label for="zip">Zip Archive</label>
                <select name="zip" id="zip">
                	<option value="blank"></option>
                    <?php include('php/get_filelist.php'); ?>
                </select>
            </li>
            <h2>Description</h2>
            <li>
                <label for="short_desc">Short Description (<span id="charNumber">120</span> characters left)</label>
                <textarea name="short_desc" maxlength="120" id="short_desc" cols=40 rows=3><?php echo urldecode($_GET['short_desc']); ?></textarea>
            </li><li>
                <label for="long_desc">Long Description (optional)</label>
                <textarea name="long_desc" id="long_desc" cols=40 rows=8><?php echo urldecode($_GET['long_desc']); ?></textarea>
            </li>
            <h2>Other</h2>
            <li>
                <label for="price">Price</label>
                <input type="text" name="price" value="<?php if (isset($_GET['price'])) { echo urldecode($_GET['price']); } ?>" />
            </li><li>
                <label for="tags">Tags</label>
                <input type="text" name="tags" value="<?php echo urldecode($_GET['tags']); ?>" /> <small>(comma-separated)</small>
            </li><li>
                <label for="cat1">Category</label>            
                <select name="cat1" id="cat1">
                	<option value="blank"></option>
                    <option value="0">Graphics</option>
                    <option value="1">Sound/Music</option>
                    <option value="2">Scripts/Plugins</option>
                    <option value="3">Engines</option>
                </select>
                <span id="arrow" class="hidden"><img src="<?php echo $prefs_sitebase; ?>/images/dropdown_arrow.png" style="vertical-align: middle;" alt="--&gt;" /></span>
                <select name="cat2" id="cat2" class="hidden"></select>
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
				value = '<option value="0">Sprites</option><option value="1">Backgrounds</option><option value="2">User Interfaces</option>';
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
