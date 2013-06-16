<?php
require('../php/settings.php');
include('../php/cookie_login.php');
$page_title = "Downloads";
$email=$_SESSION['email'];
$result=mysql_query("SELECT * FROM accounts WHERE email='$email' LIMIT 1");
if(mysql_num_rows($result)<1) {
	header("Location: ../account/login.php?error=-1");
	exit;
}

$user_id = user_get_id($email);
$query=mysql_query("SELECT * FROM purchases WHERE user_from='$user_id' LIMIT 1");
if (mysql_num_rows($query)==0) {
	include("../header.php");
	echo '<h1>Downloads</h1>
	<p>You have not purchased any files.</p>';
	include("../footer.php");
	exit;
}

include("../header.php");
?>
<h1>Downloads</h1>
<p>Download your purchased files below.</p>
<table class="normal">
	<tr>
		<th scope="col">File</th>
		<th scope="col">Downloads</th>
		<th scope="col">Download File</th>
	</tr>
	<?php
	$query=mysql_query("SELECT * FROM purchases WHERE user_from='$user_id' ORDER BY id DESC");
	while ($row=mysql_fetch_array($query))
	{
		$item_id=$row['item_id'];
		$query2=mysql_query("SELECT * FROM resources WHERE id='$item_id' LIMIT 1");
		while ($row2=mysql_fetch_array($query2))
		{
			$file_name=$row2['name'];
			$file_id=$row2['file'];
		}

		echo '
		<tr class="file_row">
			<td>'.$file_name.'</td>
			<td class="file_downloads">'.$row['downloads'].'</td>
			<td class="file_link"><a href="../process/download.php?id='.$file_id.'">Download</a></td>
		</tr>';
	}
	?>
</table>
<?
include("../footer.php");
?>