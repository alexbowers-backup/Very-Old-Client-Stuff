<?php
require('../php/settings.php');
include('../php/cookie_login.php');
include('../php/check_admin.php');
$page_title = "User List";
include("../header.php");

?>
<h1>User List</h1>
<a href="index.php">&lt; back</a>
</p>
<table class="normal">
	<tr>
		<th scope="col">ID</th>
		<th scope="col">Name</th>
		<th scope="col">Email</th>
		<th scope="col">Credits</th>
		<th scope="col">Confirmed</th>
		<th scope="col">Position</th>
        <th scope="col">Joined</th>
	</tr>
	<?php
	$query = mysql_query("SELECT * FROM accounts ORDER BY id DESC");
	while ($row=mysql_fetch_array($query))
	{
		if ($row['confirmed']==1) { $confirmed = '<span class="highlight green">Yes</span>'; } else { $confirmed = '<span class="highlight">No</span>'; }
		echo '
		<tr>
			<td>'.$row['id'].'</td>
			<td><a href="user/'.$row['id'].'">'.$row['first_name'].' '.$row['last_name'].'</a></td>
			<td><a href="email.php?user='.$row['id'].'">'.$row['email'].'</a></td>
			<td>'.$row['credits'].'</td>
			<td>'.$confirmed.'</td>
			<td>'.user_get_position($row['admin']).'</td>
			<td>'.date("jS F Y",$row['joined']).'</td>
		</tr>';
	}
	?>
</table>

<?
include("../footer.php");
?>