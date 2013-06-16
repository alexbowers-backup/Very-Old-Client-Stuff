<?php
require('../php/settings.php');
include('../php/cookie_login.php');
include('../php/check_admin.php');
$page_title = "File Approval";
include("../header.php");
?>

<h1 style="margin-bottom: 0;">Blah blah <span style="font-size: 15pt; margin-left: 2px; vertical-align: 1px"> by Bob Smith</span></h1>

<form>
    <fieldset><ol>
        <h2>Files</h2>
            <li>
                <label for="thumb">Thumbnail Image</label>
                <a href="#">984a87btasc.png</a>
            </li><li>
                <label for="preview">Preview Image</label>
                <a href="#">d09f8e9nfs9mn.png</a>
            </li><li>
                <label for="zip">Zip Archive</label>
                <a href="#">swf948a35sfwa3e1s.png</a>
            </li>
            <h2>Description</h2>
            <li>
                <label for="short_desc">Short Description</label>
                Suspendisse potenti. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos posuere.
            </li><li>
                <label for="long_desc">Long Description</label>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. In semper magna id felis malesuada fermentum. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Phasellus facilisis laoreet risus. Aliquam odio felis, porta eget porta vel, cursus sed lorem. Sed tincidunt ante id nibh convallis pretium massa nunc.
            </li>
            <h2>Other</h2>
            <li>
                <label for="price">Price</label>
                $100,000
            </li><li>
                <label for="tags">Tags</label>
                fake, placeholder, awesome, nothing, green
            </li><li>
                <label for="cat1">Category</label>            
                Graphics <span id="arrow"><img src="<?php echo $prefs_sitebase; ?>/images/dropdown_arrow.png" style="vertical-align: middle;" alt="--&gt;" /></span> Fake
            </li>
	</ol></fieldset>
    <input type="submit" class="green-btn" value="Approve" />
</form>

<?
include("../footer.php");
?>