<?php
/*
** rating.php
** Rating VIEW script for file ratings
** Also include rating.js!
*/
require('settings.php');

if (isset($_GET['resource_id']))
{
	$resource_id=$_GET['resource_id'];
	if (isset($_GET['vote']))
	{
		$vote=round($_GET['vote']);
		if ($vote>=1 && $vote<=5)
		{
			if (user_get_id($_SESSION['email']))
			{
				$user_id=user_get_id($_SESSION['email']);
				if (mysql_num_rows(mysql_query("SELECT * FROM rating WHERE user_id='$user_id' AND resource_id='$resource_id'"))==0 && mysql_num_rows(mysql_query("SELECT * FROM purchases WHERE user_from='$user_id' AND item_id='$resource_id'"))>0 && mysql_num_rows(mysql_query("SELECT * FROM resources WHERE id='$resource_id'"))>0)
				{
					mysql_query("INSERT INTO rating (user_id,resource_id,rating) VALUES ('$user_id','$resource_id','$vote')");
				}
			}
		}
	}
	$rating=0;
	$query=mysql_query("SELECT * FROM rating WHERE resource_id='$resource_id'");
	$rate_number=mysql_num_rows($query);
	while ($row=mysql_fetch_array($query))
	{
		$rating+=$row['rating'];
	}
	if ($rate_number>0 && $rating>0)
	{
		$final_rating=$rating/$rate_number;
		$pixel_1=ceil($final_rating*20);
		$pixel_2=floor(100-($final_rating*20));
	}
	else
	{
		$final_rating=0;
		$pixel_1=0;
		$pixel_2=100;
		$rate_number=0;
	}
	echo '<div id="show_vote" class="inner" style="display:none;"><div class="inner_front" style="width:'.$pixel_1.'px;"></div><div class="inner_back" style="width:'.$pixel_2.'px;"></div><div class="inner_text">'.number_format($final_rating,1).'/5 ('.$rate_number.' Votes)</div></div>';
	if (user_get_id($_SESSION['email']))
	{
		$user_id=user_get_id($_SESSION['email']);
		if (mysql_num_rows(mysql_query("SELECT * FROM rating WHERE user_id='$user_id' AND resource_id='$resource_id'"))==0 && mysql_num_rows(mysql_query("SELECT * FROM purchases WHERE user_from='$user_id' AND item_id='$resource_id'"))>0 && mysql_num_rows(mysql_query("SELECT * FROM resources WHERE id='$resource_id'"))>0)
		{
			echo '<div id="hover_vote" class="inner" style="display:none;">';
			?>
				<div id="vote_1" class="inner_vote" style="width:22px; z-index:6;"></div>
				<div id="vote_2" class="inner_vote" style="width:41px; z-index:5;"></div>
				<div id="vote_3" class="inner_vote" style="width:60px; z-index:4;"></div>
				<div id="vote_4" class="inner_vote" style="width:80px; z-index:3;"></div>
				<div id="vote_5" class="inner_vote" style="width:100px; z-index:2;"></div>
				<div class="inner_vote_back"></div>
			<?php
			echo '<div class="inner_text" style="position:relative; top:20px;">'.number_format($final_rating,1).'/5 ('.$rate_number.' Votes)</div></div>';
		}
	}
}


?>