<?php
require('../php/settings.php');
include('../php/cookie_login.php');
include('../php/check_admin.php');
$page_title = "Queued Files";
include("../header.php");

//Get number of queued files
$query = mysql_query("SELECT id FROM resources WHERE queued='1'");
if (!$query) { echo "MySQL Error: ".mysql_error(); }
$num_queued = mysql_num_rows($query);
?>

<h1>Queued Files</h1>
<?php if ($num_queued > 0) : ?>
<p>One or more file(s) are currently in the queue. Click to view details.
<ul>
	<li><a href="view_queued.php?fid=34">Blah blah</a> by Bob Smith</li>
    <li><a href="view_queued.php?fid=35">halB halB</a> by htimS boB</li></ul>
</p>
<?php else : ?>
<p>Submission queue is empty.</p>
<?php endif; ?>

<?
include("../footer.php");
?>