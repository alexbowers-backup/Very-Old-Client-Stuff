<?php
/*
**	avatar.php
**	Form to modify/upload avatar
*/
require("php/settings.php");
$page_title = "Avatar";
require("header.php");
?>

<form name="upload_form" enctype="multipart/form-data" action="process/upload_avatar.php" method="post" autocomplete="off"><p>
    <fieldset>
        <legend>Upload Avatar</legend>
        <?php 
			/* echo any errors */
			if (isset($_GET['error'])) {
				switch ($_GET['error']) {
					case 0:
						echo '<p class="error">File size must be under 500kb.</p>';
					break;
					case 1:
						echo '<p class="error">Upload failed: An unknown error has occured.</p>';
					break;
					case 2:
						echo '<p class="error">The file must be in PNG, JEPG, JPG, or GIF format.</p>';
					break;
				}
			}
		?>
        <ol>
            <li>
                <label for="upload">Choose File</label>
                <input type="file" name="file" />
            	</li><li>
            </li>
            <li>
            	<p>The file must be in PNG, JEPG, JPG, or GIF format.</p>
            </li>
        </ol>
    </fieldset>
	<input type="submit" value="Upload" onClick="this.disabled=1; document.upload_form.submit()" />
	</p>
</form>

<?php require("footer.php"); ?>