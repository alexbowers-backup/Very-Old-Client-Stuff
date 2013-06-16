<?php
require('../php/settings.php');
include('../php/cookie_login.php');
include('../php/check_admin.php');
$page_title = "Queued Files";
include("../header.php");

//Get number of queued files
$query = mysql_query("SELECT * FROM resources WHERE queued='1' AND canceled='0' ORDER BY id");
if (!$query) { echo "MySQL Error: ".mysql_error(); }
$num_queued = mysql_num_rows($query);
?>

<h1>Queued Files</h1>
<?php if ($num_queued > 0) : ?>
<p>One or more file(s) are currently in the queue. Click to view details.
<ol>
	<?php
	while ($row=mysql_fetch_array($query)) {
		$i_seller = $row['user_id'];
		$i_name = $row['name'];
		$i_id = $row['id'];
		$result = mysql_query("SELECT * FROM accounts WHERE id='$i_seller' LIMIT 1");
		while ($row2=mysql_fetch_array($result)) {
			$i_seller_name = $row2['first_name'] . " " . $row2['last_name'];
		}
		echo '<li><a href="view_queued.php?fid='.$i_id.'"><strong>'.$i_name.'</strong> by '.$i_seller_name.'</a></li>';
	}
	?>
	
</ol>
</p>
<?php else : ?>
<p>Submission queue is empty.</p>
<?php endif; ?>

<?
include("../footer.php");
?>